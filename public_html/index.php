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

        <div style="margin-top: 80px; text-align: center">
            <h1 style="margin-bottom: 20px;">Hellbo mailserver</h1>
            <p style="font-size: large">Ved at bruge Hellbo mailserver spare du for en masse besvær med at sende breve.<br>
            Du får et bedre overblik over alle dine beskeder og samtidige mulighed for at slette dem du ikke er interesseret i.<br>
            Konceptet er simpelt og gjort utrolig brugervenlig, så man ikke behøver at lede efter funktionerne.<br>
            Utrolig nok er det hele gratis!! Ja du hørte rigtigt GRATIS! <br>
            Opret dig i dag og blive en del af Hellbo familien med de seje mails.</p>
        </div>
        <div class="container" style="margin-top: 50px; margin-bottom: 80px; max-width: 350px; min-height: 50px;">
            <div>
                <button type="button" class="btn btn-primary" onclick="location.href = '/createacc';" style="float: left; width: 150px; height: 50px; font-size: x-large;">Opret dig</button>
                <button type="button" class="btn btn-primary" onclick="location.href = '/login';" style="float: right; width: 120px; height: 50px; font-size: x-large;">Login</button>
            </div>
        </div>



    </body>
    <?php require_once "../templates/footer.html"; ?>

</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
