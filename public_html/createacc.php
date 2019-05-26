<?php session_start()?>
<!DOCTYPE html>
<html lang="dk">
    <head>
        <meta charset="UTF-8">
        <title>Hellmail</title>
        <link rel="stylesheet" href="libs/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="libs/font-awesome/css/all.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
    <?php require_once "../templates/banner.html"; ?>

    <form action="php/adduser.php" method="post" class="container" style="margin-top: 80px; margin-bottom: 150px; max-width: 450px;">

        <h1  style="text-align: center; margin-bottom: 40px;">Opret dig her</h1>

        <div class="ui-message"></div>

        <div class="row" style="margin: 0;">
            <div class="form-group">
                <label for="firstname">Fornavn</label>
                <input type="text" class="form-control" required="required" id="firstname" name="addfirstname" placeholder="Fornavn">
            </div>
            <div class="form-group" style="margin-left: 20px;">
                <label for="lastname">Efternavn</label>
                <input type="text" class="form-control" required="required" id="lastname" name="addlastname" placeholder="Efternavn">
            </div>
        </div>
        <label for="email">Email</label>
        <div class="row" style="margin: 0;">
            <div class="form-group">
                    <input type="text" class="form-control" required="required" id="email" name="addemail" placeholder="Email">
            </div>
            <div class="form-group" style="margin-left: 20px;">
                <input type="text" disabled="disabled" class="form-control" placeholder="Email" value="@hellmail.dk">
            </div>
        </div>
        <div class="form-group">
            <label for="password1">Kodeord</label>
            <input type="password" class="form-control" required="required" id="password1" name="addpassword1" placeholder="Kodeord">
        </div>
        <div class="form-group">
            <label for="password2">Kodeord</label>
            <input type="password" class="form-control" required="required" id="password2" name="addpassword2" placeholder="Kodeord">
        </div>
        <p style="margin-bottom: 15px;">&nbsp;</p>
        <button type="button" name="submit" class="container btn btn-success" id="add" style="max-width: 100px; float: left">Opret</button>
        <button type="button" class="container btn btn-secondary" onclick="location.href = '/login';" style="max-width: 200px; float: right">Allerede registeret?</button>
    </form>

    </body>
    <?php require_once "../templates/footer.html"; ?>


</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="/js/helper.js"></script>
<script src="/js/adduser.js"></script>
