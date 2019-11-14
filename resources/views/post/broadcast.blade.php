<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Nunito', sans-serif;
        }

        .wrapper {
            width: 100%;
        }

        .container {
            margin: 0 5%;
            position: relative;

        }

        .header {
            padding: 13px 0;
            background: -webkit-linear-gradient(left, #95adbe, #160f30);
            background: linear-gradient(left, #95adbe, #160f30);
            color: white;
        }
        .header-text {
            position: absolute;
            left: 0;
            top: 35%;
            width: 100%;
            text-align: center;
            font-size: 18px;
            font-family: 'Courier New', Courier, monospace

        }

        #sponsor {
            width: 100%;
        }

        @media (min-width: 768px) { 
            #sponsor {
                width: auto;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div class="header">
            <div class="container">
                <img src="{{ asset("templates/images/tek.png")}}" alt="Logo TEK" height="64px">
            </div>
        </div>

        <div class="container">
            <h3 class="title">{{ $title }}</h3>

            <p>
                {!! $body !!}
                <br><br>
                Salam,
                {{ $senderName }}<br>
                {{ $senderMail}}
            </p>

            <hr>

        </div>

    </div>
</body>
</html>