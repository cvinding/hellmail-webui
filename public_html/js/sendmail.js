$(document).ready(function () {

    $("#sendmail-yes").on("click", senddata);


    checkRequired = function(form, title, msg, msgOut){
        var formChildren = form.find(':input');
        var toReturn = 0;
        $("label").removeClass("required-field");
        for(var i = 0; i < formChildren.length; i++){
            if(formChildren[i].getAttribute("required") != null){
                var input = $("#" + formChildren[i].id).val();
                if(!checkField(input)){

                    $('label[for='+  formChildren[i].id  +']').addClass("required-field");
                    msgOut.html(createDismissibleMessage("danger",title,msg));
                    // return false;
                    toReturn++;
                }
            }
        }
        return (toReturn > 0);
    };

    function checkField(input) {
        return (input !== undefined && input !== null && input !== '');
    }


/*
    function checkinput(e) {

        const form = $($(this).parent("div")[0]).closest("form");

        const uiBox = $(form.children(".ui-message"));

        if(!checkRequired(form, "Vigtigt","Skriv lige i felterne", uiBox)) {

            uiBox.html(createDismissibleMessage("success", "Godt gået", "Du gjorde det"))

            sendinformation(e);

            form[0].reset();
            uiBox.html("");

            //$('#Sendmail').modal('hide');
        }
    }
*/


    function sendinformation(e) {
        e.preventDefault();

        let sendmailto = $("#sendto").val();

        let sendmailsubject = $("#sendsubject").val();

        let sendmailbody = $("#sendbody").val();

        console.log(sendmailto);
        console.log(sendmailsubject);
        console.log(sendmailbody);
    }

    createDismissibleMessage = function (type, strongMsg, message) {
        // Create the strong part of the message
        let strong = document.createElement("strong");
        strong.append(strongMsg);

        // Create the span part of the message
        let span = document.createElement("span");
        span.setAttribute("aria-hidden", true);
        span.innerHTML = "&times;";

        // Create the button part of the message
        let button = document.createElement("button");
        button.type = "button";
        button.className = "close";
        button.setAttribute("data-dismiss", "alert");
        button.setAttribute("aria-label","Close");
        button.append(span);

        // Create the div part of the message
        let div = document.createElement("div");
        div.className = "alert alert-" + type + " alert-dismissible fade show";
        div.role = "alert";
        div.append(button);
        div.append(strong);
        div.append(" " + message + "\n");

        // Return all elements appended to the div
        return div;
    };

    function senddata() {

        var to = document.getElementById("sendto").value;
        var subject = document.getElementById("sendsubject").value;
        var message = document.getElementById("sendbody").value;
	//console.log(to);
	//console.log(subject);
	//console.log(message);

        var statusser = ['Tillykke', 'Indtast modtager og emne'];

        const form = $($(this).parent("div")[0]).closest("form");
        const uiBox = $(form.children(".ui-message"));

        if(!checkRequired(form, "Vigtigt","Skriv lige i felterne", uiBox)) {

            $.ajax({
                data: {
                    to : to,
                    subject : subject,
                    message : message
                },
                url: 'php/sendmail.php',
                method: 'POST', // or GET

                success: function(msg) {
                    //console.log(msg);
                    if(msg.status === 0){
                        uiBox.html(createDismissibleMessage("success", "Mail sendt", statusser[msg.status]));

                        form[0].reset();

                        setTimeout(function () {
                            $('#Sendmail').modal('hide');
                            uiBox.html("");
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
        }


    }

});
