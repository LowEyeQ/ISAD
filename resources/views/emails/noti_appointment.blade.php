
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" href="{{ mix('css/notify.css') }}">
    <title>ยืนยันการชำระเงิน</title>

    <style>


        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e4e4e4;
            border-radius: 5px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            color: #4b4949;
            font-size: 18px;
        }

        small {
            color: #666;
            font-size: 15px;
            text-align: left;
        }

        .big {
            color: #fff;
            text-align: center;
            text-shadow: 3px 2px rgb(28, 12, 120)
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px auto;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        </style>

</head>
<body>

    <!-- <img src="https://scontent.fbkk5-1.fna.fbcdn.net/v/t39.30808-6/385874857_1914900128895040_4635870647940025611_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=49d041&_nc_eui2=AeGe60xG5p65JriDO9jlhHrUFK7Ad9PVc4YUrsB309Vzhqr3kTxgDS-QFWnr4A0YFa3_V0s25NUN6XB1zKIHkk6x&_nc_ohc=9YdSaBKvjowAX8DYJrx&_nc_ht=scontent.fbkk5-1.fna&oh=00_AfAzjmcOqSIfRCTPd1pYvbnm1OiYQGEhdvdLNR9gZMMKRQ&oe=6527486F"  style="width:8%; border-radius: 700px; float: left; margin-left: 5%; margin-top: -25%; opacity: 100%;"> -->
    <div class="container" >
      <div><header style="background-color: #007BFF; /* สีพื้นหลังของ Header */
            color: white; /* สีข้อความ */
            text-align: center; /* จัดตำแหน่งข้อความกลาง */
            padding: 20px; /* ระยะห่างของข้อความกับขอบของ Header */
            width: 93%;
            border-radius: 10px;"><h1 class="big">ยืนยันการชำระเงิน</h1></header></div>
        <p style="text-align: left; font-size: 18px;">เรียน คุณ{{$firstname}}  {{$lastname}}</p>


        <p style="text-align: center; font-size: 25px; font-color: black"><strong>การชำระเงินของคุณเสร็จสมบูรณ์แล้ว</strong></p>
        <p style="text-align: left; font-size: 18px;">ขอบคุณที่ใช้บริการเรา!</p>

        <p>รายละเอียดการนัดหมาย:</p>
        <ul>
            <li style="font-size: 16px;">สัตว์เลี้ยงที่จะนัดหมาย:  {{$petname}}</li>
            <li style="font-size: 16px;">วันที่นัดหมาย:  {{$date_appoint}}</li>
            <li style="font-size: 16px;">เวลาที่นัดหมาย:  {{$time_appoint}}</li>
            <li style="font-size: 16px;">รายละเอียด: {{$reason}}</li>
            <li style="font-size: 16px;">จำนวนเงิน: $100.00</li>
            <li style="font-size: 18px;">สถานะ: <h1 style="color: green;">ชำระเงินสำเร็จ</h1></li>
<>            <li style="font-size: 16px;">วันที่ทำรายการ: {{ $date }} </li>
            <li style="font-size: 16px;">เวลาที่ทำรายการ: {{ $time }}</li>
        </ul>

      <div>
        <p style="font-size: 16px;">หากคุณต้องการข้อมูลเพิ่มเติมหรือมีคำถามเกี่ยวกับการนัดหมาย โปรดติดต่อเราที่
          <br>
            โทร : 062-552-4841 ตลอด 24 ชั่วโมง ทุกวัน
          <br>
            อีเมล : <a href="maaehospital@gmail.com">maaehospital@gmail.com</a>
        </p>
      </div>

        <small style="white-space: pre-line;">ขอแสดงความนับถือ</small>
        <br>
        <small style="white-space: pre-line;">ทีมงาน MA-AE Veterinary Hospital</small>
        <br>
        <a class="button" href="http://127.0.0.1:8000/" style="color: rgb(255, 255, 255)">กลับสู่เว็บไซต์</a>
    </div>
</body>
</html>


<!-- <h1>ยืนยันการชำระเงิน</h1>
        <p>การชำระเงินของคุณเสร็จสมบูรณ์แล้ว</p>
        <p>ขอบคุณที่ใช้บริการเรา!</p>
        <p>รายละเอียดการชำระเงิน:</p>
        <ul>
            <li>จำนวนเงิน: $100.00</li>
            <li>รายละเอียด: ชำระเงินสำเร็จ</li>
            <li>เวลาที่ทำรายการ: {{ $date }} {{ $time }}</li>
        </ul>
        <p>หากคุณต้องการข้อมูลเพิ่มเติมหรือมีคำถามเกี่ยวกับการชำระเงิน โปรดติดต่อเราที่ <a href="maaehospital@gmail.com">maaehospital@gmail.com</a></p>
        <p>ขอบคุณอีกครั้ง!</p>
        <a class="button" href="http://127.0.0.1:8000/">กลับสู่เว็บไซต์</a> -->

