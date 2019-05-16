
$(document).ready(function () {

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
});