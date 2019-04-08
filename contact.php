<?php

require 'vendor/autoload.php';

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$comments = $_POST['comments'];

if(trim($name) == '') {
	echo '<div class="error_message">You must enter your name.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">You have entered an invalid e-mail address. Please try again.</div>';
	exit();
}

if(trim($comments) == '') {
	echo '<div class="error_message">Please enter your message.</div>';
	exit();
}

// Configuration option.
// Enter the email address that you want to emails to be sent to.

$address = "support@seytech.co";


// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'You have been contacted by ' . $name . '.';


// Send Grid
$from = new SendGrid\Email(null, $email);
$to = new SendGrid\Email(null, $address);
$content = new SendGrid\Content("text/plain", $comments);
$mail = new SendGrid\Mail($from, $e_subject, $to, $content);

$apiKey = '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';

$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);

$statusCode = strval($response->statusCode());
if ($statusCode[0] == '2') {
    echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h3>Email Sent Successfully.</h3>";
	echo "<p>Thank you <strong>$name</strong>, your message has been submitted to us.</p>";
	echo "</div>";
	echo "</fieldset>";
} else {
    echo "<fieldset>";
    echo "<div class='error_message'>";
    echo "<h3>Failed.</h3>";
    echo "<p>We are having a problem, please send an email to support@seytech.co for now.</p>";
    echo "</div>";
    echo "</fieldset>";
}

//echo $response->statusCode();
//echo $response->headers();
//echo $response->body();

