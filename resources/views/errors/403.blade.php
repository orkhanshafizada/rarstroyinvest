<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 | Page</title>
    <style>
        body {
            background-color: #332851;
            overflow: hidden;
        }

        body .base {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-direction: column;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        body .base h1 {
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
            font-family: "Ubuntu", sans-serif;
            text-transform: uppercase;
            text-align: center;
            font-size: 30vw;
            display: block;
            margin: 0;
            color: #9ae1e2;
            position: relative;
            z-index: 0;
            animation: colors 0.4s ease-in-out forwards;
            animation-delay: 1.7s;
        }

        body .base h1:before {
            content: "U";
            position: absolute;
            top: -9%;
            right: 42%;
            transform: rotate(180deg);
            font-size: 12vw;
            color: #f6c667;
            z-index: -1;
            text-align: center;
            animation: lock 0.2s ease-in-out forwards;
            animation-delay: 1.5s;
        }

        body .base h2 {
            font-family: "Cabin", sans-serif;
            color: #9ae1e2;
            font-size: 5vw;
            margin: 0;
            text-transform: uppercase;
            text-align: center;
            animation: colors 0.4s ease-in-out forwards;
            animation-delay: 2s;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        body .base h5 {
            font-family: "Cabin", sans-serif;
            color: #9ae1e2;
            font-size: 2vw;
            margin: 0;
            text-align: center;
            opacity: 0;
            animation: show 2s ease-in-out forwards;
            color: #ca3074;
            animation-delay: 3s;
            -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        }

        @keyframes lock {
            50% {
                top: -4%;
            }
            100% {
                top: -6%;
            }
        }

        @keyframes colors {
            50% {
                transform: scale(1.1);
            }
            100% {
                color: #ca3074;
            }
        }

        @keyframes show {
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="base io">
    <h1 class="io">403</h1>
    <h2>Access Denied</h2>
    <h5>(sorry dude...)</h5>
</div>
</body>
</html>
