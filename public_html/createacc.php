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

    <form class="container" style="margin-top: 80px; margin-bottom: 150px; max-width: 450px;">
        <h1  style="text-align: center; margin-bottom: 40px;">Opret dig her</h1>
        <div class="row" style="margin: 0;">
            <div class="form-group">
                <label for="formGroupExampleInput">Fornavn</label>
                <input type="text" class="form-control" id="firstname" placeholder="Fornavn">
            </div>
            <div class="form-group" style="margin-left: 20px;">
                <label for="formGroupExampleInput">Efternavn</label>
                <input type="text" class="form-control" id="lastname"  placeholder="Efternavn">
            </div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Adresse</label>
            <input type="text" class="form-control" id="address" placeholder="Adresse">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput5">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput6">Kodeord</label>
            <input type="password" class="form-control" id="password1" placeholder="Kodeord">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput7">Kodeord</label>
            <input type="password" class="form-control" id="password2" placeholder="Kodeord">
        </div>
        <p style="margin-bottom: 15px;">&nbsp;</p>
        <button type="button" class="container btn btn-success" style="max-width: 100px; float: left">Opret</button>
        <button type="button" class="container btn btn-secondary" onclick="location.href = '/';" style="max-width: 200px; float: right">Allerede registeret?</button>
    </form>

    </body>
    <?php require_once "../templates/footer.html"; ?>


</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
