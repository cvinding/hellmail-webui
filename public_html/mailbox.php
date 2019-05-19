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
        <!--<button class="navbar-brand" type="button" data-toggle="sendmodal"><i class="fas fa-shipping-fast"></i> Send Mail</button>-->

        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Sendmail" style="margin-right: 10px;">Send Mail</button>


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
    <div style="float: right; margin: 50px;">
        <button type="button" class="logoutbutton btn btn-default" onclick="location.href = '/login';">Logout</button>
    </div>
<div style="min-height: 600px;">
    <div class="container">
        <div class="" style="margin-top: 100px; margin-bottom: 50px;">
            <h1 class="container">Indbakke</h1>
        </div>
        <div class="container" style="margin-bottom: 100px; min-height: 350px;">
            <ul class="list-group" id="inmails">
            </ul>
        </div>
    </div>

    <nav aria-label="Page navigation example" class="container" style="margin-bottom: 50px;">
        <ul class="pagination container" id="pageside">
            <li class="page-item">
                <a class="page-link" href="#!" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
                <div class="row" id="pagenumber" style="margin: 0;">
                    <li class="page-item"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                </div>
            <li class="page-item">
                <a class="page-link" href="#!" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>


    <!-- Modal -->
    <div id="Sendmail" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Send Mail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form method="post" style="padding: 10px;">
                    <div class="ui-message"></div>

                    <div class="form-group">
                        <label for="sendto">Modtager</label>
                        <input type="text" required="required" class="form-control" id="sendto" placeholder="Modtager@hellmail.dk">
                    </div>
                    <div class="form-group">
                        <label for="sendsubject">Emne</label>
                        <input type="text" required="required" class="form-control" id="sendsubject" placeholder="Emne">
                    </div>
                    <div class="form-group">
                        <label for="sendbody">Tekst</label>
                        <textarea class="form-control" id="sendbody" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="sendmail-yes">Send</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="Showmail" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="showmailmodaltitle">Mail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form style="padding: 10px;">
                    <div class="form-group">
                        <label for="formGroupExampleInput" >Fra</label>
                        <input disabled="disabled" type="text" class="form-control" id="showmailmodalfrom" placeholder="Modtager@hellmail.dk">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Emne</label>
                        <input disabled="disabled" type="text" class="form-control" id="showmailmodalsubject" placeholder="Emne">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tekst</label>
                        <textarea disabled="disabled" class="form-control" id="showmailmodalbody" rows="5"></textarea>
                    </div>
                </form>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-success">Send</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div id="Sletmail" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaltitle">Slet Mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalbody">
                    Er du sikker på du vil slette mail?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletemails-yes">Ja</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nej</button>
                </div>
            </div>
        </div>
    </div>


    <?php require_once "../templates/footer.html"; ?>

    </body>

</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="/js/mailpage.js"></script>
<script src="/js/sendmail.js"></script>