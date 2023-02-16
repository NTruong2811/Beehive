<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;1,300&display=swap"
        rel="stylesheet">
    <link rel="icon" href="images/logo.png" type="image/icon type">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Beehive</title>
    <style>
        /* * {
            padding: 0px !important;
            margin: 0px !important;
        } */
        .row>* {
            margin: 0px !important;
            padding: 0px !important;
        }
/* 
        #app {
            display: grid;
            grid-template-columns: 80px 1fr;
        } */

        body {
            /* font-family:"Nunito Sans", Arial, sans-serif !important;
            fo */
            background-color: #FBFAFC !important;
        }

        ::-webkit-scrollbar {
            width: 0px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: white;
            opacity: 0;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 20px;
        }

        a {
            /* color: white !important; */
            text-decoration: none !important;
        }

        /* Handle on hover */
    </style>
</head>

<body>
    <div id="app"></div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/global.js"></script>


</html>
