$(document).ready(function () {

    //let sideantal = 10;

   // emptymailbox();



let mailside = window.location.href.split(".dk/")[1];
mailside = mailside.split(".")[0];
let inbox = "RECIEVED";

//console.log(mailside);

if(mailside === "mailbox"){
inbox = "RECIEVED";
}
if(mailside === "mailboxsend"){
inbox = "SENT";
}


retrieveMails(inbox);
let globalmails;

function retrieveMails(inbox){
	const href = window.location.href;
	let page;	

	if(href.indexOf("?")===-1){
		page=1;

	}
	else{
	page=href.split("=")[1];
}
 	$.ajax({
		data:{
		page : page,
		inbox : inbox
},
                url: 'https://hellmail.dk/php/getMails.php',
                method: 'POST', // or GET

                success: function(mails) {
                getmails(mails);
		globalmails = mails;   
                pagenavigation(Math.ceil(globalmails.antal/25));
		},
                error: function (mails) {
                 
		}
        });

}

    //getmails(inputmails);
    /*
    <li class="page-item"><a class="page-link" href="#!">1</a></li>
    <li class="page-item"><a class="page-link" href="#!">2</a></li>
    <li class="page-item"><a class="page-link" href="#!">3</a></li>
    */

    function createPageItems(sidetal) {

        let li = document.createElement("li");
        li.className = "page-item";

        let a = document.createElement("a");
        a.className = "page-link";
        a.href = mailside + ".php?page=" + sidetal;
        a.innerHTML = sidetal;

        /*let card = document.createElement("div");
        card.className = "card newsbox";
*/
        li.appendChild(a);

        return li;
    }

    function pagenavigation(sider) {

        const output = $("#pagenumber");
        output.html("");

        for (let i = 1; i < sider+1; i++) {
            output.append(createPageItems(i));
        }
    }

    function createMails(subject, bodytext, from, id) {

        let li = document.createElement("li");
        li.className = "list-group-item";

        let spansub = document.createElement("span");
        spansub.className = "listsubject";
        spansub.innerHTML = subject;

        li.appendChild(spansub);


        let spanfrom = document.createElement("span");
        spanfrom.className = "listfrom";
        spanfrom.innerHTML = from;

        li.appendChild(spanfrom);


        let spanbody = document.createElement("span");
        spanbody.className = "listbody";
        spanbody.innerHTML = bodytext;

        li.appendChild(spanbody);


        let buttontrash = document.createElement("button");
        buttontrash.className="deletemail";
        buttontrash.type = "button";
        buttontrash.style.cssFloat = "right";
        buttontrash.id = "deletemail-" + id;

        let trash = document.createElement("i");
        trash.className = "fas fa-trash";

        buttontrash.appendChild(trash);
        li.appendChild(buttontrash);


        let buttonshow = document.createElement("button");
        buttonshow.className = "showmailpopup";
        buttonshow.type = "button";
        buttonshow.style.cssFloat = "right";
        buttonshow.id = "showmail-" + id;

        let eye = document.createElement("i");
        eye.className = "fas fa-eye";

        buttonshow.appendChild(eye);
        li.appendChild(buttonshow);


        return li;
    }

    function reversemails(obj, f){
	var arr = [];
  	for (var key in obj) {
    		// add hasOwnPropertyCheck if needed
            arr.push(key);
        }
        for (var i=arr.length-1; i>=0; i--) {
            f.call(obj, arr[i]);
        }

}

    function getmails(mails) {

        const outputmail = $("#inmails");
        outputmail.html("");

        /*for (let i = 0; i < mails.length; i++) {
            console.log(i);
            outputmail.append(createMails(mails[i][0], mails[i][1], mails[i][2], mails[i][3]));
        }*/
	//console.log(mails.antal);
	reversemails(mails, function(mailkey){
	if(mailkey !== "antal"){
	
	
		if(this[mailkey].body.length < "70"){
                let shortbody = this[mailkey].body;
                outputmail.append(createMails(this[mailkey].subject, shortbody, this[mailkey].from, mailkey));
        	}
                if(this[mailkey].body.length > "70"){
                let longbody = this[mailkey].body.substring(0, 70) + "...";
                outputmail.append(createMails(this[mailkey].subject, longbody, this[mailkey].from, mailkey));
                }
	}

	})
        /*for (var mail in mails){

            if(mails[mail].body.length < "70"){
                let shortbody = mails[mail].body;
                outputmail.append(createMails(mails[mail].subject, shortbody, mails[mail].from, mail));
            }
            if(mails[mail].body.length > "70"){
                let longbody = mails[mail].body.substring(0, 70) + "...";
                outputmail.append(createMails(mails[mail].subject, longbody, mails[mail].from, mail));
            }

        }*/

        $(".showmailpopup").on("click", function () {
            showModalMail(mails, $(this)[0].id.split("-")[1]);
        })
        $(".deletemail").on("click", clickDeleteMails)
    }
    function showModalMail(mails, mailid) {

        console.log("Rigtig ID : " + mailid);

        $("#showmailmodalsubject").val(mails[mailid].subject);
        $("#showmailmodalbody").val(mails[mailid].body);
        $("#showmailmodalfrom").val(mails[mailid].from);

        $("#Showmail").modal('show');
    }
    function clickDeleteMails(e) {
        e.preventDefault();

        const id = $(this)[0].id;

        $("#Sletmail").modal('show');

        $("#deletemails-yes").attr("data-id", id.split("-")[1]);
        $("#deletemails-yes").on("click", clickDeleteConfirm);
    }
    function clickDeleteConfirm(e) {
        e.preventDefault();

        let mailID = $(this).attr("data-id");


        console.log("MAILID :" + mailID);

        //delete globalmails[mailID];

	$.ajax({
            type: "POST",
            url: 'php/deletemail.php',
            dataType: 'json',
            data: {arguments: mailID},

            success: function (obj) {
                console.log(obj);
            }
        });

        //request("/api/info/deleteProduct", "POST", "id=" + productID, function (result) {

            $(".deletemail").off("click", clickDeleteMails);
            $("#deletemails-yes").off("click", clickDeleteConfirm);

            /*
            const uiBox =$(".UI-message");
            if (result.status){
                uiBox.html(createDismissibleMessage("success", "Gjort", "Produktet er slettet"));

            }
            if (!result.status){
                uiBox.html(createDismissibleMessage("danger", "Fejl", "Produktet er ikke blevet slettet"));
            }*/

        getmails(globalmails);
        emptymailbox();

        //});
    }

    function isEmpty(inputmails) {
        for(var mail in inputmails) {
            if(inputmails.hasOwnProperty(mail))
                return false;
        }
        return true;
    }
    function emptymailbox() {
        const mailbox = $("#inmails");
        if(isEmpty(globalmails)){
            mailbox.html("DER ER INGEN MAILS!");
        }

    }

});
