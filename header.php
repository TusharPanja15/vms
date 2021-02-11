<!doctype html>
<html lang="en">


<head>

    <title>Welcome &middot</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <style type="text/css">
        /* Custom scroll bar */

        ::-webkit-scrollbar {
            width: 25px;
        }

        ::-webkit-scrollbar-track {
            background-color: #343a40;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #978ffb;
            border-radius: 20px;
            border: 6px solid transparent;
            background-clip: content-box;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #971ffb;
        }

        /* Modal padding fix */

        body:not(.modal-open) {
            padding-right: 0px !important;
        }



        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .selector-for-some-widget {
            box-sizing: content-box;
        }

        .Form {
            border: 2px solid #dadce0;
            border-radius: 10px;
            margin: 90px auto;
            padding: 80px;
            width: 850px;
        }

        #login-button {
            float: right;
            width: 100px;
        }

        #toogle-button {
            float: left;
            width: 180px;
        }

        .form-buttons,
        .checkbox {
            margin-top: 20px;
        }

        .forgetPassword {
            margin-top: 20px;
            float: left;
        }

        #signInForm {
            text-align: center;
            display: none;
        }

        img {
            width: 320px;
        }

        .main-card {
            margin: 50px;
            padding: 50px;
        }

        #popup-name {
            display: none;
        }

        #arrow-img {
            width: 55px;
            height: 55px;
            float: right;
            margin-top: 20px;
        }

        .arrow-img-card {
            border: none;
            float: left;
            width: 350px;
            height: 80px;
        }

        .btn-group {
            padding: 15px;
            gap: 20px;
            margin: 10px;
        }

        #ordersIMG {
            width: 80%;
            height: 80%;
        }

        /* User Features at main.php*/

        .card {
            margin: 50px auto;
        }

        .container-content {
            width: 20rem;
        }

        @media screen and (max-width: 700px) {
            .container-content {
                width: 15rem;
            }
        }


        /* Users profile image at My Profile */

        #card-noBorder {
            border: none;
        }

        .img-thumbnail {
            width: 250px;
            height: 250px;
            border-radius: 50%;
        }

        @media screen and (max-width: 700px) {
            .img-thumbnail .flip-card-back {
                width: 180px;
                height: 180px;
                border-radius: 50%;
            }
        }

        @media screen and (max-width: 200px) {
            .img-thumbnail .flip-card-back {
                width: 120px;
                height: 120px;
                border-radius: 50%;
            }
        }


        /* My Orders menu orders.php*/

        @media screen and (max-width: 700px) {
            #orders {
                width: 100%;
            }
        }













        /* html,
        .content {
            height: 100%;
            background: -moz-linear-gradient(-45deg,
                    #de437d 0%,
                    #5b44b9 100%);
                    
            background: -webkit-linear-gradient(-45deg,
                    #de437d 0%,
                    #5b44b9 100%);
                    
            background: linear-gradient(135deg,
                    #de437d 0%,
                    #5b44b9 100%);
                    
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#de437d', endColorstr='#5b44b9', GradientType=1);
            
        } */



        #chartdiv {
            width: 100%;
            height: 500px;
            background-color: #161616;
        }

        .amcharts-graph-g2 .amcharts-graph-stroke {
            stroke-dasharray: 3px 3px;
            stroke-linejoin: round;
            stroke-linecap: round;
            -webkit-animation: am-moving-dashes 1s linear infinite;
            animation: am-moving-dashes 1s linear infinite;
        }

        @-webkit-keyframes am-moving-dashes {
            100% {
                stroke-dashoffset: -31px;
            }
        }

        @keyframes am-moving-dashes {
            100% {
                stroke-dashoffset: -31px;
            }
        }

        .lastBullet {
            -webkit-animation: am-pulsating 1s ease-out infinite;
            animation: am-pulsating 1s ease-out infinite;
        }

        @-webkit-keyframes am-pulsating {
            0% {
                stroke-opacity: 1;
                stroke-width: 0px;
            }

            100% {
                stroke-opacity: 0;
                stroke-width: 50px;
            }
        }

        @keyframes am-pulsating {
            0% {
                stroke-opacity: 1;
                stroke-width: 0px;
            }

            100% {
                stroke-opacity: 0;
                stroke-width: 50px;
            }
        }

        .amcharts-graph-column-front {
            -webkit-transition: all 0.3s 0.3s ease-out;
            transition: all 0.3s 0.3s ease-out;
        }

        .amcharts-graph-column-front:hover {
            fill: #496375;
            stroke: #496375;
            -webkit-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }

        .amcharts-graph-g3 {
            stroke-linejoin: round;
            stroke-linecap: round;
            stroke-dasharray: 500%;
            stroke-dasharray: 0 \0/;
            /* fixes IE prob */
            stroke-dashoffset: 0 \0/;
            /* fixes IE prob */
            -webkit-animation: am-draw 40s;
            animation: am-draw 40s;
        }

        @-webkit-keyframes am-draw {
            0% {
                stroke-dashoffset: 500%;
            }

            100% {
                stroke-dashoffset: 0%;
            }
        }

        @keyframes am-draw {
            0% {
                stroke-dashoffset: 500%;
            }

            100% {
                stroke-dashoffset: 0%;
            }
        }
    </style>

</head>

<body>