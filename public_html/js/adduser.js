$(document).ready(function () {

    $("#add").on("click", addusers)


    function addusers(e) {
        e.preventDefault();

        console.log("Knappen er blevet trykket på");

        $.ajax({
            data: 'orderid',
            url: 'php/adduser.php',
            method: 'POST', // or GET
            success: function(msg) {
                alert(msg);
            }
        });
    }
});