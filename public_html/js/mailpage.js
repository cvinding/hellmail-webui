$(document).ready(function () {

    let sideantal = 10;

    pagenavigation(sideantal);
    emptymailbox();

    //var inputmails = ["Julefrokost", "Det er snart jul og i den anledning har vi valgt at afholde en julefrokost", "Kent@hellmail.dk", "1"];
    //var inputmails = [ ["Julefrokost", "Det er snart jul og i den anledning har vi valgt at afholde en julefrokost", "Kent@hellmail.dk", "1"], ["Så er der kage", "Der er fandme kage i kantinen i dag", "Christian@hellmail.dk", "2"], ["Ny bygning", "Firmaet har opkøbt det lille firma (Microsoft) ved siden af eftersom vi skal bruge mere plads.", "Chefen@hellmail.dk", "3"], ["Nye medarbejdere", "Vi har stor mangel på medarbejdere så der er derfor ansat 100 nye medarbejdere.", "hrchef@hellmail.dk", "4"], ["Ny chef", "Vi har fået ny direktør eftersom jeg siger op. Tak for nogle gode år.", "Tobias@hellmail.dk", "5"] ];

    var inputmails = {
      7:{
          subject:"Julefrokost",
          from:"Kent@hellmail.dk",
          body:"Det er snart jul og i den anledning har vi valgt at afholde en julefrokost",
          id:"1"
      },
      8:{
          subject: "Så er der kage",
          from: "Christian@hellmail.dk",
          body:"Der er fandme kage i kantinen i dag",
          id:"2"
      },
      9:{
          subject:"Ny bygning",
          from:"Chefen@hellmail.dk",
          body:"Firmaet har opkøbt det lille firma (Microsoft) ved siden af eftersom vi skal bruge mere plads.",
          id:"3"
      },
      10:{
          subject:"Nye medarbejdere",
          from:"hrchef@hellmail.dk",
          body:"Vi har stor mangel på medarbejdere så der er derfor ansat 100 nye medarbejdere.",
          id:"4"
      },
      11:{
          subject:"Ny chef",
          from:"Tobias@hellmail.dk",
          body:"Vi har fået ny direktør eftersom jeg siger op. Tak for nogle gode år.",
          id:"5"
      }
    };

    getmails(inputmails);
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
        a.href = "#!";
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

    function getmails(mails) {

        const outputmail = $("#inmails");
        outputmail.html("");

        /*for (let i = 0; i < mails.length; i++) {
            console.log(i);
            outputmail.append(createMails(mails[i][0], mails[i][1], mails[i][2], mails[i][3]));
        }*/

        for (var mail in mails){

            if(mails[mail].body.length < "70"){
                let shortbody = mails[mail].body;
                outputmail.append(createMails(mails[mail].subject, shortbody, mails[mail].from, mail));
            }
            if(mails[mail].body.length > "70"){
                let longbody = mails[mail].body.substring(0, 70) + "...";
                outputmail.append(createMails(mails[mail].subject, longbody, mails[mail].from, mail));
            }

        }

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

        delete inputmails[mailID];

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

        getmails(inputmails);
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
        if(isEmpty(inputmails)){
            mailbox.html("DER ER INGEN MAILS!");
        }

    }

});