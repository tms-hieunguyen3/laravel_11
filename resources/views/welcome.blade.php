<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        @import url(https://fonts.googleapis.com/css?family=Pacifico);
        @import url(https://fonts.googleapis.com/css?family=Shadows+Into+Light);
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@700..900");

        html,
        body {
            padding: 0;
            margin: 0;
        }

        .title {
            font-family: "Inter";
            font-weight: 900;
            font-size: 5vw;
            width: 60vw;
            margin: 0 20vw;
            line-height: 2em;
        }

        .fancy-font {
            line-height: 1em;
            font-size: 1.5em;
        }

        .font-shadows {
            font-family: "Shadows Into Light";
            letter-spacing: 0.14em;
        }

        .font-pacifico {
            font-family: "Pacifico";
        }

        #sunny,
        #rainy {
            position: absolute;
            display: grid;
            place-items: center;
            overflow: hidden;
            height: 100vh;
            width: 100%;
        }

        #sunny {
            background: #84aaf5;
            color: black;
            z-index: 201;
        }

        #rainy {
            background: #001338;
            color: white;
            z-index: 101;
        }

        #sun,
        #moon {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: white;
            opacity: 0.9;
            box-shadow: 0px 0px 40px 15px white;
            z-index: -2;
        }

        #sun {
            left: 6vw;
        }

        #moon {
            right: 6vw;
        }

        .crater {
            background-color: lightgray;
            height: 25px;
            width: 25px;
            border-radius: 50%;
            position: relative;
        }

        .crater:before {
            content: "";
            position: absolute;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            box-shadow: -5px 0 0 2px darkgray;
            top: 2px;
            left: 7px;
        }

        .crater:nth-child(1) {
            top: 15%;
            left: 55%;
            transform: scale(1.4);
        }

        .crater:nth-child(2) {
            top: 40%;
            left: 70%;
            transform: scale(1.3);
        }

        .crater:nth-child(3) {
            left: 20%;
            transform: scale(1);
        }

        .crater:nth-child(4) {
            left: 30%;
            top: 30%;
            transform: scale(1.8);
        }

        #rain {
            position: absolute;
            z-index: -1;
            inset: 0;
        }

        .drop {
            position: absolute;
            bottom: 100%;
            width: 2px;
            aspect-ratio: 1;
            border-radius: 50%;
            animation: drop 0.5s linear infinite;

            &:after {
                position: absolute;
                top: -120px;
                height: 120px;
                width: 2px;
                background-color: inherit;
                content: "";
            }
        }

        @keyframes drop {
            0% {
                bottom: 100%;
                opacity: 1;
            }
            75% {
                bottom: 10%;
                opacity: 1;
            }
            100% {
                bottom: -10%;
                opacity: 0;
            }
        }

        #clouds {
            position: absolute;
            z-index: -1;
            inset: 0;
        }

        .cloud {
            position: absolute;
            width: 150px;
            height: 150px;
            left: -200px;
            background-color: white;
            border-radius: 50%;
            animation: cloudMove linear infinite;

            &:before,
            &:after {
                content: "";
                border-radius: 50%;
                background: #fff;
                position: absolute;
            }

            &:before {
                width: 70%;
                height: 70%;
                left: -30%;
                top: 30%;
            }

            &:after {
                width: 80%;
                height: 80%;
                right: -35%;
                bottom: 0;
            }
        }

        @keyframes cloudMove {
            0% {
                left: -200px;
            }
            100% {
                left: 110vw;
            }
        }


    </style>
</head>
<body>
<div id="sunny">
    <h2 class="title">The weather is <span class="fancy-font font-pacifico">sunny</span>
    </h2>
    <div id="sun"></div>
    <div id="clouds"></div>
</div>
<div id="rainy">
    <h2 class="title">The weather is <span class="fancy-font font-shadows">rainy</span>
    </h2>
    <div id="moon">
        <div class="crater"></div>
        <div class="crater"></div>
        <div class="crater"></div>
        <div class="crater"></div>
    </div>
    <div id="rain"></div>
</div>
<script>
    const sunny = document.getElementById("sunny");
    const sun = document.getElementById("sun");
    const moon = document.getElementById("moon");

    const handleMove = (e) => {
        sunny.style.width = `${(e.clientX / window.innerWidth) * 100}%`;
        sun.style.bottom = `${(e.clientX / window.innerWidth) * 100 - 45}%`;
        moon.style.top = `${(e.clientX / window.innerWidth) * 100 + 10}%`;
    };

    document.onmousemove = (e) => handleMove(e);

    document.ontouchmove = (e) => handleMove(e.touches[0]);

    const rain = document.getElementById("rain");

    for (var i = 0; i < 50; i++) {
        const drop = document.createElement("div");
        drop.classList.add("drop");
        drop.style.left = `${Math.floor(Math.random() * 100)}%`;
        drop.style.backgroundColor = `rgba(255, 255, 255, ${Math.random()})`;
        drop.style.animationDelay = `${Math.floor(Math.random() * 500)}ms`;
        drop.style.animationDuration = `${Math.random() * (0.9 - 0.5) + 0.5}s`;
        rain.appendChild(drop);
    }

    const clouds = document.getElementById("clouds");

    for (var i = 0; i < 6; i++) {
        const cloud = document.createElement("div");
        cloud.classList.add("cloud");
        cloud.style.top = `${Math.floor(Math.random() * (80 - 10) + 10)}vh`;
        cloud.style.opacity = `${Math.random() * (0.8 - 0.4) + 0.4}`;
        cloud.style.transform = `scale(${Math.random() * (1 - 0.4) + 0.4})`;
        cloud.style.animationDelay = `${Math.floor(Math.random() * 19)}s`;
        cloud.style.animationDuration = `${Math.random() * (25 - 19) + 19}s`;
        clouds.appendChild(cloud);
    }

</script>
</body>
</html>
