<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

    <title>SIS - ADEN International Business School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#961530" />
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#961530">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#961530">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">  

    <style type="text/css">
        .login {
            margin: 60px auto 0;
            max-width: 800px;
            padding: 15px;
            border: 1px solid #cbcbcb;
        }
        .login h2 {
            background: #fff none repeat scroll 0 0;
            display: inline-block;
            margin: 0;
            padding: 10px 20px;
            position: relative;
            top: -40px;
        }
        .login .btn {
            text-align: center;
            border-radius: 0;
            box-shadow: none;
            background: #961530;
            color: #fff;
            font-size: 20px
        }
        .login .btn:hover {
            text-align: center;
            background: #333;
        }
        .login-text {
            display: block
        }
        .login svg {
            display: inline-block;
            height: 46px;
            width: 46px;
            fill: #fff
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login text-center">
                    <h2>ADEN SIS</h2>
                    <h2>ADEN International Business School</h2>
<?php
                    if(isset($correo)){?>
                        <p class="alert alert-danger">La cuenta de correo <b><?=$correo?></b> no est&aacute; registrada en el sitio</p>
                        <img style="display:none" src="https://accounts.google.com/Logout?hl=es">
<?php               }
?>
                    <a class="btn btn-primary btn-block" href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=<?=urlencode(GOOGLE_OAUTH_REDIRECT_URI);?>&client_id=<?=GOOGLE_OAUTH_CLIENT_ID;?>&scope=email&access_type=online&approval_prompt=auto">
                        <span class="login-icon" aria-hidden="true">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"> <g> <g> <path d="M31.692,10.991c-1.195,0.859-2.314,1.664-3.432,2.468c-0.379,0.273-0.752,0.555-1.143,0.811 c-0.081,0.052-0.271,0.047-0.342-0.013c-1.548-1.286-3.306-2.124-5.291-2.455c-3.425-0.571-6.514,0.211-9.208,2.408 c-2.064,1.684-3.354,3.864-3.786,6.492c-0.539,3.274,0.289,6.212,2.436,8.745c1.786,2.109,4.082,3.375,6.806,3.779 c3.386,0.502,6.438-0.338,9.082-2.541c1.307-1.09,2.289-2.432,2.963-3.997c0.043-0.101,0.08-0.206,0.137-0.353 c-3.49,0-6.941,0-10.418,0c0-1.855,0-3.676,0-5.52c5.603,0,11.198,0,16.895,0c0,0.654,0.017,1.311-0.003,1.967 c-0.068,2.479-0.605,4.852-1.766,7.05c-2.512,4.761-6.418,7.749-11.685,8.821c-5.227,1.064-10.003-0.087-14.186-3.413 c-3.104-2.468-5.088-5.683-5.834-9.593C1.94,20.524,3.162,15.925,6.5,11.937c2.552-3.05,5.842-4.94,9.757-5.658 c4.946-0.907,9.473,0.132,13.529,3.117C30.435,9.874,31.025,10.43,31.692,10.991z"/> <path d="M40.325,19.34c-0.626,0-1.202,0-1.822,0c0-0.672,0-1.331,0-2.019c-0.735,0-1.427,0-2.144,0 c0-0.615,0-1.2,0-1.826c0.69,0,1.381,0,2.091,0c0-0.755,0-1.471,0-2.21c0.617,0,1.212,0,1.84,0c0,0.726,0,1.441,0,2.196 c0.719,0,1.407,0,2.118,0c0,0.617,0,1.194,0,1.811c-0.682,0-1.37,0-2.083,0C40.325,17.987,40.325,18.644,40.325,19.34z"/></g></g></svg>
                        </span>
                        <span class="login-text">
                            Ingresar con cuenta ADEN
                        </span>
                    </a>
                </div>
            </div>    
        </div>
    </div>
</body>
</html>