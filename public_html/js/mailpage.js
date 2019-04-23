$(document).ready(function () {

    let sideantal = 10;

    pagenavigation(sideantal);



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
            console.log(i);
            output.append(createPageItems(i));
        }
    }

});