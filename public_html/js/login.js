$(document).ready(function () {


    $("#submitlogin").on("click", login)


    function login(e) {
        e.preventDefault();


        var brugernavn = document.getElementById("username-input").value;
        var password = document.getElementById("password-input").value;

        var statusser = ['Du bliver logget ind', 'Forkert brugernavn eller kodeord'];

        const form = $($($(this).parent("div")).parent("form"));

        const uiBox = $(form.children(".ui-message"));

        if(!checkRequired(form, "Vigtigt","Skriv lige i felterne", uiBox)) {


            $.ajax({
                data: {
                    brugernavn : brugernavn,
                    password : password
                },
                url: 'php/login.php',
                method: 'POST', // or GET

                success: function(msg) {
                    //console.log(statusser[msg.status]);
                    //console.log(msg);

                    if(msg.status === 0){
                        uiBox.html(createDismissibleMessage("success", "Godkent", statusser[msg.status]));
                        setTimeout(function () {
                            window.location.href = "mailbox";
                        }, 1500);
                    }
                    else{
                        uiBox.html(createDismissibleMessage("danger", "Fejl", statusser[msg.status]))
                    }
                },
                error: function (msg) {
                    //console.log(msg);
                }
            });

	$.ajax({
		data:{
			brugernavn : brugernavn
		},
		url: 'php/getMails.php',
		method: 'POST',

		success: function(msg){
		},
		error: function(msg){
		}


	});
        }


    }
});
