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

<div class="navmenu row">
    <div class="row">
        <i class="fas fa-mail-bulk fa-5x" style="padding-bottom: 20px; padding-left: 20px; margin-right: 120px;"></i>

        <h1 class="bannertitle">Hellbo Services</h1>
    </div>
</div>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i class="fas fa-shipping-fast"></i> Send Mail</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/mailbox"><i class="fas fa-envelope-open-text"></i></i> Indbakke</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/mailboxsend"><i class="fas fa-at"></i> Sendte mails</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Søg">
        </form>
    </div>
</nav>

<div class="container">
    <div class="" style="margin-top: 100px; margin-bottom: 50px;">
        <h1 class="container">Sendte mails</h1>
    </div>
    <div class="container" style="margin-bottom: 150px;">
        <ul class="list-group">
            <li class="list-group-item"><span class="listsubject">DU er fyret!!</span> <span class="listfrom">Kent Clausen</span><span class="listbody">Kent her er din krop..</span><button type="button" style="float: right;"><i class="fas fa-trash"></i></button> </li>
            <li class="list-group-item"><span class="listsubject">Så er der kage!</span> <span class="listfrom">Kantinen</span><span class="listbody">Vi har lavet utrolig lækker kage som er i lokale...</span><button type="button" style="float: right;"><i class="fas fa-trash"></i></button>
            </li>
            <li class="list-group-item"><span class="listsubject">Skift af operativsystem!</span> <span class="listfrom">Bill Gates</span><span class="listbody">Vi oplever mange problemer ved brug af linux så vi er skiftet til windows.</span><button type="button" style="float: right;"><i class="fas fa-trash"></i></button>
            </li>
        </ul>
    </div>
</div>

<?php require_once "../templates/footer.html"; ?>

</body>

</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
