<?php include 'functions.php'; ?>
<html>
<head>
        <title>E-Recruitment BTPN</title>
        <meta charset="UTF-8">
        <meta name="description" content="Login">
        <meta name="keywords" content="Seruput, Web Dashboard Seruput, Login Seruput">
        <meta name="author" content="Mhd Fachri Adrianta">
        <link rel="icon" href="images/logobtpn.png" />
        <link rel="stylesheet" type="text/css" href="csstwo/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="csstwo/style.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

<body>

<div class="container">
            <div class="row header-sign-in">
                <div class="col-md-12">
                    <img class="logo-header" height="110" src="images/logo_btpn_two.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 form-sign-in">
                    <div class="row">
                        <div class="col-md-6 d-none d-sm-block">
                            <img class="icon-header" height="276" src="images/ui_login.png" alt="">
                        </div>
                        <div class="col-md-4">
                            <p class="title-form">
                                Sign In
                            </p>
                            <p class="subtitle-form">
                                Let’s make a report today
                            </p>
                            <form method="POST" action="?act=login">
                                <div class="form-group content-sign-in">
								<?php if ($_POST) include 'aksi.php'; ?>
                                  <label class="title-input-type-primary-seruput" for="exampleInputEmail1">Username</label>
                                  <input name="user" type="text" class="form-control input-type-primary-seruput" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Username" required autofocus>
                                </div>
                                <div class="form-group content-sign-in">
                                  <label class="title-input-type-primary-seruput" for="exampleInputPassword1">Password</label>
                                  <div class="inputBox">
                                  <input name="pass" type="password" class="form-control input-type-primary-seruput" id="password" placeholder="Password" required autofocus>
                                  <div id="toggle" onclick="showHide();"></div>
                                </div>
                                </div>
                                <button type="submit" name="signin" class="btn  btn-primary-seruput">Sign In</button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <p style="text-align:center;" class="subtitle-form">
                                Username = manajeritsupport,
                                Password = medan12071997
            </p> -->
        </div>

        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script type="text/javascript">
        const password = document.getElementById('password');
        const toggle = document.getElementById('toggle');
        
        function showHide(){
            if(password.type === 'password'){
                password.setAttribute('type', 'text');
                toggle.classList.add('hide')
            } else{
                password.setAttribute('type', 'password');
                toggle.classList.remove('hide')
            }
        }
    </script>

        <script src="js/jquery.min.js"></script>
		<script src="js/browser.min.js"></script>
		<script src="js/breakpoints.min.js"></script>
		<script src="js/util.js"></script>
		<script src="js/main.js"></script>

</body>

</html>