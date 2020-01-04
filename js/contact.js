    // Working Contact Form
    $('#contact-form').submit(function() {
        var action = $(this).attr('action');

        $("#message").slideUp(750, function() {
            $('#message').hide();

            $('#submit')
                .before('')
                .attr('disabled', 'disabled');

            $.post(action, {
                    name: $('#name').val() +' '+ $('#lastname').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    comments: '<div><strong>' + 'Phone: ' + '</strong>' + $('#phone').val() + '</div><div><strong>' + 'Message:</strong></div>' + $('#comments').val()
                },
                function(data) {
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    $('#cform img.contact-loader').fadeOut('slow', function() {
                        $(this).remove()
                    });
                    $('#submit').removeAttr('disabled');
                    if (data.match('success') != null) $('#cform').slideUp('slow');
                }
            );

        });

        return false;

    });
    // Working Contact Form
    $('#enroll-form').submit(function() {
        var action = $(this).attr('action');
        $("#message").slideUp(750, function() {
            $('#message').hide();

            $('#submit')
                .before('')
                .attr('disabled', 'disabled');

            $.post(action, {
                    name: $('#name').val() +' '+ $('#lastname').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    comments: '<div><strong>' + 'Type: ' + '</strong>' + $('#type').val() + '</div><div><strong>' + 'City: ' + '</strong>' + $('#city').val() + '</div><div><strong>' + 'Phone: ' + '</strong>' + $('#phone').val() + '</div><div><strong>' + 'Message:</strong></div>' + $('#comments').val()
                },
                function(data) {
                    document.getElementById('message').innerHTML = data;
                    $('#message').slideDown('slow');
                    $('#cform img.contact-loader').fadeOut('slow', function() {
                        $(this).remove()
                    });
                    $('#submit').removeAttr('disabled');
                    if (data.match('success') != null) $('#cform').slideUp('slow');
                }
            );

        });

        return false;

    });
