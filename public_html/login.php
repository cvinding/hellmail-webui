<!DOCTYPE html>
<html lang="dk">
    <head>
        <meta charset="UTF-8">
        <title>Hellmail</title>
        <link rel="stylesheet" href="libs/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="libs/font-awesome/css/all.css">
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body background="assets/loginbackground.jpg">

    <div class="container" style="background-color: black; width: 600px;">
            <div class="loginbox media" style="border:1px solid black; border-radius: 5px; background-color: white; padding: 50px; margin: 0; width: 500px;">
                <div class="media-body login">
                    <h5 class="mt-0" style="text-align: center">Login</h5>

                    <form class="login">
                        <div class="ui-message"></div>
                        <div class="form-group">
                            <label for="username-input">Email</label>
                            <input type="text" class="form-control" required="required" name="username-input" id="username-input" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password-input">Kodeord</label>
                            <input type="password" class="form-control" required="required" name="password-input" id="password-input" placeholder="Kodeord">
                        </div>
                        <!--<button type="button" id="submit-login" name="submit-login" class="btn btn-success container" style="margin-top: 20px">Login</button>-->
                        <div style="margin-top: 25px;">
                            <button type="button" class="btn btn-primary" id="submitlogin" style="float: left; width: 150px;">Login</button>
                            <button type="button" class="container btn btn-secondary" onclick="location.href = '/createacc';" style=" width: 150px; float: right">Opret dig</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>


    </body>


</html>
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<script src="libs/popper/popper.min.js"></script>
<script src="libs/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="/js/helper.js"></script>
<script src="/js/login.js"></script>