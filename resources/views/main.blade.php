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
                <a href="#service" class="menu-items">Service</a>
                <ul class="submenu"style="line-height:28px">
                    <li><a href="#" class="sub">Veterinary Delivery</a></li>
                    <li><a href="#" class="sub">Video Call</a></li>
                    <li><a href="/appointment" class="sub">Appointment</a></li>
                    <li><a href="/certificate" class="sub">Certificate</a></li>
                </ul>
            </ul>
            <a href="#about" class="menu-items">About</a>
            <a href="#contact" class="menu-items">Contact</a>
            <a href="{{ route('login') }}" class="menu-items">Login</a>
            <a href="{{ route('register') }}" class="menu-items">Register</a>
        </nav>
    </header>

    <section id="home" style="padding: 0;">
        <!--<div class="pic_home"></div>-->
        <div class = "slider-wrapper">
            <div class="slider">
                <img id="slide-1"src="https://i.pinimg.com/564x/98/0e/4c/980e4c47f797e115da1e6fcccdd563aa.jpg" alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-2"src="https://i.pinimg.com/564x/1e/b1/98/1eb1980645512761ba94f8702080d07d.jpg" alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-3"src="https://i.pinimg.com/564x/62/48/eb/6248eb225b79bcb7be84724301e29e43.jpg" alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-4"src="https://i.pinimg.com/564x/03/21/fd/0321fda853773474ba85a19d7c55bbba.jpg" alt="3D rendering of an imaginary green planet in space"/>
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
                <a href="#slide-4"></a>
        </div>
    </section>
    <section id="service">
            <h2>Service</h2>
            <div id="delivery">
                <x-delivery-icon class="icon" width="100"/>
                <h3 class="text">Veterinary Delivery</h3>
            </div>

            <h3>Veterinary Delivery</h3>
            <h5 style="margin-left: 300px; margin-right: 150px;">เป็นฟังก์ชันที่คุณสามารถนัดแพทย์ไปรักษาสัตว์เลี้ยงตามที่อยู่อาศัยของคุณ ฟังก์ชันใหม่นี้เป็นฟังก์ชันไว้เพื่อสำหรับคนที่ไม่สามารถพาไปโรงพยาบาลสัตว์ได้เอง เช่น การเคลื่อนสัตว์ที่ลำบาก หรือ คุณไม่มีเวลาพาไปโรงพยาบาลสัตว์โดยตรง</h5>
            <h4 style="margin-left: 420px; color: red"">[หมายเหตุ ฟังก์ชันนี้สำหรับการรักษาสัตว์ที่มีอาการไม่สาหัส]</h4>
            <h3>Appointment</h3>
            <h5 style="margin-left: 300px; margin-right: 150px;">เป็นฟังก์ชันที่คุณสามารถนัดแพทย์ไปรักษาสัตว์เลี้ยงตามที่อยู่อาศัยของคุณ ฟังก์ชันใหม่นี้เป็นฟังก์ชันไว้เพื่อสำหรับคนที่ไม่สามารถพาไปโรงพยาบาลสัตว์ได้เอง เช่น การเคลื่อนสัตว์ที่ลำบาก หรือ คุณไม่มีเวลาพาไปโรงพยาบาลสัตว์โดยตรง</h5>
            <h4 style="margin-left: 420px; color: red"">[หมายเหตุ ฟังก์ชันนี้สำหรับการรักษาสัตว์ที่มีอาการไม่สาหัส]</h4>
            <h3>Appointment</h3>
            <h5 style="margin-left: 300px; margin-right: 150px;">เป็นฟังก์ชันที่คุณสามารถนัดแพทย์ไปรักษาสัตว์เลี้ยงตามที่อยู่อาศัยของคุณ ฟังก์ชันใหม่นี้เป็นฟังก์ชันไว้เพื่อสำหรับคนที่ไม่สามารถพาไปโรงพยาบาลสัตว์ได้เอง เช่น การเคลื่อนสัตว์ที่ลำบาก หรือ คุณไม่มีเวลาพาไปโรงพยาบาลสัตว์โดยตรง</h5>
            <h4 style="margin-left: 420px; color: red"">[หมายเหตุ ฟังก์ชันนี้สำหรับการรักษาสัตว์ที่มีอาการไม่สาหัส]</h4></section>
    <section id="about">
        <h1 style="color: rgb(12, 39, 145); font-size: 80px; padding-left: 75px; padding-top: 50px; padding-bottom: 20px;">About</h1>
        <img src="https://i.pinimg.com/564x/fe/a9/bb/fea9bbe8c5bd39e12f89bfd8d018ef12.jpg"  style="width:25%; border-radius: 700px; float: left; margin-right: 80px; margin-bottom: 20px;">
        <h6 style="color: rgb(0, 0, 0); font-size: 20px; padding-top: 130px; padding-bottom: 20px;">เกี่ยวกับโรงพยาบาลสัตว์มะแอ๊ะ: "การให้บริการดูแลสุขภาพสัตว์และการปกป้องสัตว์ที่คุณรัก"</h6>
        <h6 style="color: rgb(85, 84, 87); font-size: 15px; margin-right:80px; line-height: 2;">เราคือโรงพยาบาลสัตว์ที่มุ่งมั่นในการดูแลและรักษาสุขภาพของสัตว์เลี้ยงและสัตว์เศรษฐกิจทุกชนิดด้วยความพิถีพิถันและความใส่ใจที่สูงสุด ทีมแพทย์และบุคลากรของเรามีประสบการณ์และความเชี่ยวชาญในการวินิจฉัยโรค รักษา และเสริมสร้างสุขภาพสัตว์ของคุณให้ดีที่สุด

เราใช้เทคโนโลยีทันสมัยและอุปกรณ์ทางการแพทย์ที่ล้ำสมัยเพื่อให้การรักษามีประสิทธิภาพและแม่นยำที่สุด และเราเสนอบริการแพทย์สัตว์ในทุกสาขา เช่น ศัลยกรรมสัตว์, จัดการโรคภูมิแพ้, การวินิจฉัยภาพรังสี, และการบำบัดรักษาอื่น ๆ

เราเข้าใจความสำคัญของสัตว์เลี้ยงในชีวิตของคุณ และเราเสมอมุ่งมั่นที่จะให้บริการที่ดีที่สุดแก่พลเมืองและสัตว์ที่พวกเขาให้ความรัก มาร่วมกับเราในการดูแลสัตว์ของคุณ และทำให้มันอยู่ในสุขภาพที่ดีและมีคุณภาพชีวิตที่ดีขึ้นอีกครั้ง"</h6>
    </section>

    <section id="contact" style="height: 50px;">
    <h1 style="color: rgb(249, 249, 249); font-size: 50px; padding-top: 5px; padding-bottom: 3px; text-align: center;">Contact</h1>
        <h2 style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 8px; padding-bottom: 10px;"><< โรงพยาบาลสัตว์มะแอ๊ะ | MA-AE Hospital >></h2>
        <div class="contact-info">
            <p style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 5px;"><strong>ที่ตั้ง:</strong> เลขที่ 1 ซอยฉลองกรุง 1 แขวงลาดกระบัง เขตลาดกระบัง กรุงเทพมหานคร 10520</p>
            <p style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 5px;"><strong>เบอร์โทรศัพท์:</strong> 062-552-4841</p>
            <p style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 5px;"><strong>เวลาเปิด-ปิด:</strong> เปิดบริการทุกวัน ตลอด 24 ชั่วโมง</p>
        </div>
        <div class="social-media">
            <p style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 7px;"><strong>ติดตามข่าวสาร:</strong>
            &nbsp;&nbsp;&nbsp;
            <a style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 5px;" href="https://www.facebook.com/profile.php?id=61551834848811">Facebook</a>
            &nbsp;&nbsp;
            <a style="color: rgb(255, 255, 255); font-size: 18px; padding-top: 5px; padding-bottom: 5px;" href="https://www.instagram.com/ma_ae_hospital/">Instagram</a>
            </p>

        </div>
        <img  src="https://www.it.kmitl.ac.th/wp-content/themes/itkmitl2017wp/img/life/life-13.jpg"  style="width:50%; border-radius: 700px; float: left; margin-left: 900px; margin-top: -260px; opacity: 85%;">
        <a href="https://www.facebook.com/profile.php?id=61551834848811"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/800px-2021_Facebook_icon.svg.png"  style="width:3%; border-radius: 500px; float: left; margin-left: 125px; margin-top: -50px;"></a>
        <a href="https://www.instagram.com/ma_ae_hospital/"><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Instagram_logo_2022.svg"  style="width:3%; border-radius: 500px; float: left; margin-left: 185px; margin-top: -50px;"></a>
        <img src="https://scontent.fbkk7-2.fna.fbcdn.net/v/t39.30808-6/385874857_1914900128895040_4635870647940025611_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=49d041&_nc_eui2=AeGe60xG5p65JriDO9jlhHrUFK7Ad9PVc4YUrsB309Vzhqr3kTxgDS-QFWnr4A0YFa3_V0s25NUN6XB1zKIHkk6x&_nc_ohc=g1JvXofFx2EAX-LU77-&_nc_ht=scontent.fbkk7-2.fna&_nc_e2o=s&oh=00_AfCn59ps7XOCWwWhNktZwnsQjUDYG7Dy5NPiojtk00kvkA&oe=652159AF"  style="width:7%; border-radius: 700px; float: left; margin-left: 10px; margin-top: -80px; opacity: 100%;">

        {{-- <img src="{{ mix('/storage/profile face hospital.png') }}" alt="tag"> --}}
        {{-- <img src="/storage/profile face hospital.png"  style="width:35%; border-radius: 700px; float: left; margin-left: 900px; margin-top: -250px;"> --}}
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
