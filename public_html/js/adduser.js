$(document).ready(function () {

    $("#add").on("click", addusers)


    function addusers(e) {
        e.preventDefault();

        var first = document.getElementById("firstname").value;
        var last = document.getElementById("lastname").value;
        var email = document.getElementById("email").value;
        var pass1 = document.getElementById("password1").value;
        var pass2 = document.getElementById("password2").value;

        var statusser = ['Tillykke du er oprettet', 'Mail allerede brugt. Brug en anden.', 'Password matcher ikke', 'Ingen forbindelse', 'ERROR: Could not able to execute.'];

        const form = $($(this).parent("form"));

        const uiBox = $(form.children(".ui-message"));

        if(!checkRequired(form, "Vigtigt","Skriv lige i felterne", uiBox)) {

            $.ajax({
                data: {
                    firstname : first,
                    lastname : last,
                    email : email,
                    password1 : pass1,
                    password2 : pass2
                },
                url: 'php/adduser.php',
                method: 'POST', // or GET

                success: function(msg) {
                    console.log(statusser[msg.status]);
                    console.log(msg);

                    if(msg.status === 0){
                        uiBox.html(createDismissibleMessage("success", "Oprettet", statusser[msg.status]));
                        setTimeout(function () {
                            window.location.href = "login";
                        }, 1500);

                    }
                    else{
                        uiBox.html(createDismissibleMessage("danger", "Fejl", statusser[msg.status]))
                    }
                },
                error: function (msg) {
                    console.log(msg);
                }
            });

            form[0].reset();
        }


    }
});