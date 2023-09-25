<!DOCTYPE html>
<html>

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <title> Ma-ae Veterinary Hospital </title>
    <link rel="stylesheet" href="{{ mix('css/welcome.css') }}">
    <script src="{{ mix('js/script.js') }}"></script>
</head>

<body>

    <header>
        <a href="/">
            <x-application-logo width="100" height="100" fill="none" stroke="white" stroke-width="3" stroke-linejoin="round"/>
        </a>

        <nav>
            <a href="/main" class="active menu-items">Home</a>
            <ul class="dropdown">
                <a href="#" class="menu-items">Service</a>
                <ul class="submenu"style="line-height:28px">
                    <li><a href="#" class="sub">Veterinary Delivery</a></li>
                    <li><a href="#" class="sub">Video Call</a></li>
                    <li><a href="/calendar" class="sub">Appointment</a></li>
                    <li><a href="/certificate" class="sub">Certificate</a></li>
                </ul>
            </ul>
            <a href="#about" class="menu-items">About</a>
            <a href="#contact" class="menu-items">Contact</a>
            <a href="{{ route('login') }}" class="menu-items">Login</a>
            <a href="{{ route('register') }}" class="menu-items">Register</a>
        </nav>
    </header>

    <section id="home">
        <img class="pic_home"
            src="https://lh3.googleusercontent.com/2Tbi2DKjvR0izsrSRPZFi6ik3Mb5cUc1cG1uTv78Yxj9cE0rCQEoz4KzHB5ymJa3AfyICB-3lGkN4zgU1t4s13mfWtw97paZ25mvbk9LbA">
    </section>
    <section id="service">Service</section>
    <section id="about">About</section>
    <section id="contact">Contact</section>
    <section id="login">Login</section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
