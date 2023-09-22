<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <title> Ma-ae Veterinary Hospital </title>
    @vite(['resources/css/welcome.css', 'resources/js/script.js'])
</head>

<body>
    <header>
        <a href="#" class="logo">Logo</a>
        <nav>
            <a href="#home" class="active menu-items">Home</a>
            <ul class="dropdown">
                <li>
                    <a href="#" class="menu-items">Service</a>
                    <ul class="submenu">
                        <li><a href="#" class="sub">Veterinary Delivery</a></li>
                        <li><a href="#" class="sub">Video Call</a></li>
                        <li><a href="#" class="sub">Appointment</a></li>
                    </ul>
                </li>
            </ul>
            <a href="#about" class="menu-items">About</a>
            <a href="#contact" class="menu-items">Contact</a>
            <a href="{{ route('login') }}" class="menu-items">Login</a>
        </nav>
    </header>

    <section id="home">
        <img class="pic_home" src="https://lh3.googleusercontent.com/2Tbi2DKjvR0izsrSRPZFi6ik3Mb5cUc1cG1uTv78Yxj9cE0rCQEoz4KzHB5ymJa3AfyICB-3lGkN4zgU1t4s13mfWtw97paZ25mvbk9LbA">
    </section>
    <section id="service">Service</section>
    <section id="about">About</section>
    <section id="contact">Contact</section>
    <section id="login">Login</section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>