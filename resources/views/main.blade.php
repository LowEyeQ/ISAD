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
        <div class="pic_home"></div>
    </section>
    <section id="service">Service</section>
    <section id="about">
        <h1 style="color: rgb(12, 39, 145); font-size: 80px; padding-left: 75px; padding-top: 50px; padding-bottom: 20px;">About</h1>
        <img src="https://i.pinimg.com/564x/fe/a9/bb/fea9bbe8c5bd39e12f89bfd8d018ef12.jpg"  style="width:25%; border-radius: 700px; float: left; margin-right: 80px; margin-bottom: 20px;">
        <h6 style="color: rgb(0, 0, 0); font-size: 20px; padding-top: 130px; padding-bottom: 20px;">เกี่ยวกับโรงพยาบาลสัตว์มะแอ๊ะ: "การให้บริการดูแลสุขภาพสัตว์และการปกป้องสัตว์ที่คุณรัก"</h6>
        <h6 style="color: rgb(85, 84, 87); font-size: 15px; margin-right:80px; line-height: 2;">เราคือโรงพยาบาลสัตว์ที่มุ่งมั่นในการดูแลและรักษาสุขภาพของสัตว์เลี้ยงและสัตว์เศรษฐกิจทุกชนิดด้วยความพิถีพิถันและความใส่ใจที่สูงสุด ทีมแพทย์และบุคลากรของเรามีประสบการณ์และความเชี่ยวชาญในการวินิจฉัยโรค รักษา และเสริมสร้างสุขภาพสัตว์ของคุณให้ดีที่สุด

เราใช้เทคโนโลยีทันสมัยและอุปกรณ์ทางการแพทย์ที่ล้ำสมัยเพื่อให้การรักษามีประสิทธิภาพและแม่นยำที่สุด และเราเสนอบริการแพทย์สัตว์ในทุกสาขา เช่น ศัลยกรรมสัตว์, จัดการโรคภูมิแพ้, การวินิจฉัยภาพรังสี, และการบำบัดรักษาอื่น ๆ

เราเข้าใจความสำคัญของสัตว์เลี้ยงในชีวิตของคุณ และเราเสมอมุ่งมั่นที่จะให้บริการที่ดีที่สุดแก่พลเมืองและสัตว์ที่พวกเขาให้ความรัก มาร่วมกับเราในการดูแลสัตว์ของคุณ และทำให้มันอยู่ในสุขภาพที่ดีและมีคุณภาพชีวิตที่ดีขึ้นอีกครั้ง"</h6>
    </section>
    <section id="contact">
    <h1 style="color: rgb(249, 249, 249); font-size: 80px; padding-top: 50px; padding-bottom: 50px;">Contact</h1>
        <p style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 5px; padding-bottom: 20px;">Hi my name is Aom Or You can call me Collee3 I like to play Valo with my friends T Love Dog and Cat very Much!!</p>
        <p style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 20px; padding-bottom: 20px;">ที่ตั้งโรงพยาบาลสัตว์มะแอ๊ะ: 1 Chalong Krung 1 Alley, Lat Krabang, Bangkok 10520, Thailand</p>
        <p style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 30px; padding-bottom: 20px;">เบอร์ติดต่อโรงพยาบาลสัตว์มะแอ๊ะ: 091-998-5399</p>
        <p style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 30px; padding-bottom: 20px;">เปิดบริการทุกวัน: จันทร์ - อาทิตย์ 9.00-24.00</p>
        <p style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 30px; padding-bottom: 20px;">ติดตามข่าวสารได้ที่: LINE FACEBOOK INTRAGRAM</p>
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
