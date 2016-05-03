/* Vérification email */
function escapeRegExp(string) {
    return string.replace(/([.*+?^${}()|\[\]\/\\])/g, "\\$&");
}

$('#error').css('opacity', '0');

function verify_email() {
    $('#email').blur(
        function() {
            if ($('#email').val() != '')
            {
                var regular_exp = new RegExp("[^@]+@.+\.(net|com|fr|org|io)");
                var test_email = regular_exp.test(escapeRegExp($('#email').val()));
                if (test_email == false)
                {
                    $('#error').text("Ceci n'est pas une adresse mail.");
                    $('#error').animate({opacity:1},300);
                    return (false);
                }
                else
                {
                    $('#error').animate({opacity:0},300);
                    return (true);
                }
            }
        }
    );
}

function email_all() {
    var email_result = verify_email();
}

email_all();