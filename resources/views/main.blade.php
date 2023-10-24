<!DOCTYPE html>
<html >

<head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
{{-- <link href="{{ asset('css/dark-mode.css') }}" rel="stylesheet" id="dark-mode-stylesheet"> --}}
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title> Ma-ae Veterinary Hospital </title>
    <link rel="stylesheet" href="{{ mix('css/welcome.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');
    </style>
</head>
<div class="bg-white dark:bg-black">
    <body >

    <header>
        {{-- <div>
            <!-- Dark Mode Toggle Button -->
            <button id="theme-toggle" class="px-4 py-2 rounded-lg">
                Toggle Dark Mode
            </button>
        </div> --}}

        <a href="/">
            <x-application-logo width="100" height="100" fill="none" stroke="white" stroke-width="3" stroke-linejoin="round"/>
        </a>

        <nav>
            <a href="/main" class="menu-items">Home</a>
            <ul class="dropdown">
                <a href="#service" class="menu-items">Service</a>
                <ul class="submenu"style="line-height:40px">
                    <li><a href="/EmergencyCall" class="sub">Emergency call</a></li>
                    <li><a href="/videocall" class="sub">Video Call</a></li>
                    <li><a href="/appointment" class="sub">Appointment</a></li>
                    {{-- <li><a href="/certificate" class="sub">Certificate</a></li> --}}
                </ul>
            </ul>
            <a href="#about" class="menu-items">About</a>

            <a href="#contact" class="menu-items">Contact</a>
            <a href="{{ route('login') }}" class="menu-items">Login</a>
            <a href="{{ route('register') }}" class="menu-items">Register</a>
        </nav>
    </header>


    <section id="name">
        <div class="cat">
            <div class="tail"></div>
            <div class="triangle"></div>
            <div class="trian"></div>
            <div class="body"></div>
            <div class="head">
                <div class="eye">
                    <div class="pupil"></div>
                </div>
                <div class="eye">
                    <div class="pupil"></div>
                </div>
                <div class="nose"></div>
                <div class="mouth"></div>
        </div>

        <div class="dog">
            <div class="df"></div>
            <div class="dtf"></div>
            <div class="tid"></div>
            <div class="dla"></div>
            <div class="dbd"></div>
            <div class="dha">
                <div class="dey">
                    <div class="dns"></div>
                </div>
                <div class="dey">
                    <div class="dpi"></div>
                </div>
                <div class="dnos"></div>
                <div class="dmout"></div>

        </div>
        <div class="trd"></div>

    </div>
        <div class="word" style="margin-top: 110px;">
            <span>M</span>
            <span>A</span>
            <span>-</span>
            <span>A</span>
            <span>E</span>
            <p>-------------------</p>
            <h1><strong>Veterinary Hospital</strong></h1>
        </div>
    </section>



    <section id="home" style="padding: 0; background-color:white;">
        <!--<div class="pic_home"></div>-->

        <div class = "slider-wrapper">
            <div class="slider">
                <img id="slide-1"src="{{ asset('storage/background.jpg') }}" alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-2"src="{{ asset('storage/background1.jpg') }}" alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-3"src="{{ asset('storage/background2.jpg') }}"  alt="3D rendering of an imaginary green planet in space"/>
                <img id="slide-4"src="{{ asset('storage/background3.jpg') }}" alt="3D rendering of an imaginary green planet in space"/>
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
                <a href="#slide-4"></a>
        </div>
    </section>



    <section id="service" >
            <h2 style="color: rgb(255, 255, 255); font-size: 80px; padding-left: 75px; padding-top: 1px; padding-bottom: 20px;">Service</h2>


            <div id="videocall" class="service-wrapper"style="margin-left: 5px">
                <a href="{{route('videocall.index')}}">
                <div class="img-wrapper">
                        <img class="image" width="250%" src="https://supplychainguru.co.th/wp-content/uploads/2021/06/young-asia-businessman-using-laptop-talk-colleagues-about-plan-video-call-meeting-while-work-from-home-living-room-self-isolation-social-distancing-quarantine-corona-virus-prevention-min-scaled.jpg" alt="Oh no!">
                    <div class="text-overlay" id="textOverlay" style="color: rgb(255, 255, 255); margin-top: 25px;">ติดต่อกับสัตวแพทย์ออนไลน์ผ่านวิดีโอการสนทนา<br> (Google meet) <br> รับคำแนะนำและการรักษาเบื้องต้นในรูปแบบออนไลน์</div>
                </div>
                </a>
                <div class="detail-wrapper" >
                    <h1 class="text">Video Call</h1>
                </div><small></small>
            </div>

            <div id="appointment" class="service-wrapper" style="margin-left: 450px; margin-top: -400px;">
                <a href="{{route('appointment.index')}}">
                    <div class="img-wrapper">
                        <img class="image" width="230%" src="https://previews.123rf.com/images/kchung/kchung1408/kchung140801555/30903156-appointment-word-circle-marked-on-a-calendar-by-a-red-pen.jpg" alt="Oh no!">
                        <div class="text-overlay" id="textOverlay" style="color: rgb(255, 255, 255); margin-top: -10px;">จองนัดหมายกับสัตวแพทย์ล่วงหน้า ช่วยประหยัดเวลาของคุณ</div>
                    </div>
                </a>
                <div class="detail-wrapper">
                    <h1 class="text">Appointment</h1>
                </div>
            </div>

            <div id="certificate" class="service-wrapper" style="margin-left: 900px; margin-top: -400px;">
                <a href="{{route('certificate')}}">
                    <div class="img-wrapper">
                        <img class="image" width="135%" style="position: relative; left:-53px" src="https://i.pinimg.com/564x/74/3b/17/743b17fe5f7fe261d0dce4baa41c47fe.jpg" alt="Oh no!">
                        <div class="text-overlay" id="textOverlay" style="color: rgb(255, 255, 255)">สร้างใบรับรองออนไลน์ได้แบบอัตโนมัติ รับรองสุขภาพสัตว์เลี้ยงของคุณ</div>
                    </div>
                </a>
                <div class="detail-wrapper">
                    <h1 class="text">Certificate</h1>
                </div>
            </div>



            <!-- <div class="styled-text" style="margin-left: 0%; margin-top: 30px;">
            <h3 style="color: rgb(12, 39, 145)">Video Call</h3>
            </div>
            <div class="styled-text" style="margin-left: 37%; margin-top: -40px;">
            <h3 style="color: rgb(12, 39, 145">Appointment</h3>
            </div>
            <div class="styled-text" style="margin-left: 74%; margin-top: -40px;">
            <h3 style="color: rgb(12, 39, 145)">Certificate</h3>
            </div> -->

            <div id="howToSection" style="font-family: 'Kanit', sans-serif">
                <h3 style="color: white; margin-top: 30px; margin-top: 5%; text-decoration: underline; text-shadow: 3px 2px rgb(28, 12, 120);">วิธีใช้งาน</h3>
                <br><p style="color: white; margin-right: 830px;">1. ต้อง log in ก่อนใช้งาน<br>2. เลือกวันที่จากปฏิทิน<br>3. เลือกเวลาจากตารางเวลา<br>4. กรอกรายละเอียดต่างๆ<br>5. รอแจ้งเตือนเกี่ยวกับรายละเอียดต่างๆที่อีเมล<br>6. เข้าห้องสนทนาตามเวลาที่กำหนด</p></h5>
                <br>
                <h3 style=" color: rgb(227, 255, 236) ; margin-left: 450px; margin-top: -22%; text-decoration: underline; text-shadow: 3px 2px rgb(28, 12, 120);">วิธีใช้งาน</h3>
                <br><p style=" color: rgb(227, 255, 236); margin-left: 450px; margin-right:400px;" >1. ต้อง log in ก่อนใช้งาน<br>2. เลือกวันที่จากปฏิทิน<br>3. กรอกรายละเอียดต่างๆ<br>4. รอแจ้งเตือนเกี่ยวกับรายละเอียดต่างๆที่อีเมล<br>5. ไปโรงพยาบาลตามวันเวลาที่นัดหมาย<br>6. แจ้งพนักงานตามที่นัดหมายไว้</p></h5>
                <h4 style=" margin-left: 410px; margin-right: 150px; color: rgb(255, 155, 155); text-shadow: 3px 2px rgb(28, 12, 120); margin-top: 30px;">[หมายเหตุ ฟังก์ชันนี้มีการชำระค่าบริการ]</h4>
                <br>
                <h3 style=" color: rgb(255, 235, 244) ; margin-left: 900px; margin-top: -28%; text-decoration: underline; text-shadow: 3px 2px rgb(28, 12, 120);">วิธีใช้งาน</h3>
                <br><p style=" color: rgb(255, 235, 244) ; margin-left: 900px; margin-right:-50px;">1. ต้อง log in ก่อนใช้งาน<br>2. เลือกสัตว์เลี้ยงที่ต้องการ พร้อมกับครั้งที่ตรวจสุขภาพ สำหรับออกเอกสารใบรับรองสุขภาพ ณ ครั้งนั้น<br>3. สามารถดาวน์โหลด หรือ พิมพ์เอกสารได้</p></h5>
                <h4 style="margin-left: 450px; color: rgb(255, 155, 155); text-shadow: 3px 2px rgb(28, 12, 120); margin-left: 900px; margin-top: 54px;">[หมายเหตุ ฟังก์ชันนี้สำหรับสัตว์ที่เคยตรวจสุขภาพเท่านั้น]</h4>

                <h4 style="color: rgb(249, 255, 207); text-shadow: 3px 2px rgb(28, 12, 120); margin-left: 100px; margin-top: 70px;"> >>> ถ้ามีข้อสงสัยหรือต้องการแจ้งปัญหาสามารถติดต่อได้ที่ Contact ด้านล่างของเว็ปไซต์ <<< </h4>
            </div>



    </section>


    <section id="about" style="padding: 0; background-color:white; margin-left: 50px;">
        <h1 style="color: rgb(12, 39, 145); font-size: 80px; padding-left: 75px; padding-top: 50px; padding-bottom: 20px;">About</h1>
        <img src="https://i.pinimg.com/564x/fe/a9/bb/fea9bbe8c5bd39e12f89bfd8d018ef12.jpg"  style="width:25%; border-radius: 700px; float: left; margin-right: 80px; margin-bottom: 20px;">
        <h6 style="color: rgb(0, 0, 0); font-size: 20px; padding-top: 130px; padding-bottom: 20px;">เกี่ยวกับโรงพยาบาลสัตว์มะแอ๊ะ: "การให้บริการดูแลสุขภาพสัตว์และการปกป้องสัตว์ที่คุณรัก"</h6>
        <h6 style="color: rgb(85, 84, 87); font-size: 15px; margin-right:80px; line-height: 2;">เราคือโรงพยาบาลสัตว์ที่มุ่งมั่นในการดูแลและรักษาสุขภาพของสัตว์เลี้ยงและสัตว์เศรษฐกิจทุกชนิดด้วยความพิถีพิถันและความใส่ใจที่สูงสุด ทีมแพทย์และบุคลากรของเรามีประสบการณ์และความเชี่ยวชาญในการวินิจฉัยโรค รักษา และเสริมสร้างสุขภาพสัตว์ของคุณให้ดีที่สุด

เราใช้เทคโนโลยีทันสมัยและอุปกรณ์ทางการแพทย์ที่ล้ำสมัยเพื่อให้การรักษามีประสิทธิภาพและแม่นยำที่สุด และเราเสนอบริการแพทย์สัตว์ในทุกสาขา เช่น ศัลยกรรมสัตว์, จัดการโรคภูมิแพ้, การวินิจฉัยภาพรังสี, และการบำบัดรักษาอื่น ๆ

เราเข้าใจความสำคัญของสัตว์เลี้ยงในชีวิตของคุณ และเราเสมอมุ่งมั่นที่จะให้บริการที่ดีที่สุดแก่พลเมืองและสัตว์ที่พวกเขาให้ความรัก มาร่วมกับเราในการดูแลสัตว์ของคุณ และทำให้มันอยู่ในสุขภาพที่ดีและมีคุณภาพชีวิตที่ดีขึ้นอีกครั้ง"</h6>
    </section>

    <section id="contact" style="height: 50px;">
    <h1 style="color: rgb(249, 249, 249); font-size: 50px; padding-top: 5px; padding-bottom: 3px; text-align: center;">Contact</h1>
        <h2 style="color: rgb(255, 255, 255); font-size: 20px; padding-top: 8px; padding-bottom: 10px; ; text-shadow: 3px 2px rgb(28, 12, 120);"><< โรงพยาบาลสัตว์มะแอ๊ะ | MA-AE Veterinary Hospital >></h2>
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
        <img src="https://scontent.fbkk5-1.fna.fbcdn.net/v/t39.30808-6/385874857_1914900128895040_4635870647940025611_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=49d041&_nc_eui2=AeGe60xG5p65JriDO9jlhHrUFK7Ad9PVc4YUrsB309Vzhqr3kTxgDS-QFWnr4A0YFa3_V0s25NUN6XB1zKIHkk6x&_nc_ohc=9YdSaBKvjowAX8DYJrx&_nc_ht=scontent.fbkk5-1.fna&oh=00_AfAzjmcOqSIfRCTPd1pYvbnm1OiYQGEhdvdLNR9gZMMKRQ&oe=6527486F"  style="width:7%; border-radius: 700px; float: left; margin-left: 10px; margin-top: -80px; opacity: 100%;">

        <!-- <img  src="https://scontent.fbkk5-6.fna.fbcdn.net/v/t39.30808-6/387734742_1917507261967660_4736496105246853158_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=49d041&_nc_eui2=AeHf2TVWA-mObC7FLBA80BIauG5tJafsO9S4bm0lp-w71ASW1PB4fwqKz08E5vxX8U6Cdt7b9Ngn3w-xFK2iKVu_&_nc_ohc=YkajFOabtSUAX-rtwk3&_nc_ht=scontent.fbkk5-6.fna&oh=00_AfAIf95IUH2V3Cvqm2f_Ddbbw7tUzDFuKDVrbWAOGVwjzQ&oe=6526DF32"  style="width:7%; border-radius: 700px; float: left; margin-left: 10px; margin-top: -80px;"> -->
        {{-- <img src="{{ mix('/storage/profile face hospital.png') }}" alt="tag"> --}}
        {{-- <img src="/storage/profile face hospital.png"  style="width:35%; border-radius: 700px; float: left; margin-left: 900px; margin-top: -250px;"> --}}
    </section>

    <script  src="{{ mix('js/welcome.js') }}"></script>
</div>
</body>

</html>
