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
        #calling {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #calling.show {
            visibility: visible;
            animation: fadein 0.5s;
        }

        #calling .action {
            display: flex;
            justify-content: space-around;
        }

        #calling .img {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            overflow: hidden;
        }

        #calling img {
            width: 100%;
            border-radius: 100%
        }

        #calling .icon {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        #calling .icon .yes {
            cursor: pointer;
            width: 45px;
            height: 45px;
            background-color: #2ED573;
            margin: auto;
            border-radius: 100%;
            padding-top: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #calling .icon .no {
            display: flex;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background-color: #FF0000;
            margin: auto;
            border-radius: 100%;
            padding-top: 4px;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        #loading_page {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-color: white;
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            z-index: 99999;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        #loading_page img {
            width: 60px;
            height: 60px;
            animation: load_page 1s ease-in-out infinite;
        }

        @keyframes load_page {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        
    </style>
</head>


<body>
    <div id="app"></div>
    {{-- <div id="loading_page">
        <img src="/images/logo.png" alt="">
        <div class="typewriter">Beehive</div>
    </div> --}}
    <div id="calling" class="">
        <div class="action">
            <div class="img">
                <img src="/images/avt1.png" alt="">
            </div>
            <div class="icon">
                <div class="yes">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="no">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // document.getElementById('loading_page').style.display = 'none'
    });
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="/js/global.js"></script>

</html>
