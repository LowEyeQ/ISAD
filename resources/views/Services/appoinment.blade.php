<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/appointment.css') }}">

    <title>Appointment</title>
</head>
<body>
    <div class="calendar">
        <div class="name">Appointment Calendar</div>
        <div>
            <button id="prevMonth" style="border: none; background-color: white; font-size: 40px; float: left;"><</button>
            <span id="currentMonth" style="text-align: center; font-size: 32px; display: inline-block;"></span>
            <button id="nextMonth" style="border: none; background-color: white; font-size: 40px; float: right;">></button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>SUNDAY</th>
                    <th>MONDAY</th>
                    <th>TUESDAY</th>
                    <th>WEDNESDAY</th>
                    <th>THURSDAY</th>
                    <th>FRIDAY</th>
                    <th>SATURNDAY</th>
                </tr>
            </thead>
            <tbody>
                <!-- ใส่ข้อมูลวันที่ที่เลือกได้ที่นี่ -->
            </tbody>
        </table>
        <div style="height: 30px;"></div>
        <table class="bordered-table">
            <thead>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div style="height: 20px;"></div>

        <div class="input_data">
            <form action="/" method="post" onsubmit="return showSuccessAlert()">

                @csrf <!-- ใส่คำสั่ง CSRF สำหรับ Laravel -->
                <h1>กรุณากรอกรายละเอียด</h1>
                <input type="text" id="pet_id" name="pet_id" placeholder="Your pet's name" required>
                <input type="text" id="appointment_date" name="appointment_date" placeholder="ํYour selected date (auto fill)" required readonly>
                <input type="time" id="appointment_timet" name="appointment_time" required>
                <textarea id="reason" name="reason" rows="4" placeholder="How can we help you?" required></textarea>

                <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้</h3>
                <h4 style="color: red;">1.หากคุณลูกค้าไม่เข้าห้องสนทนาภายในเวลา 15 นาทีนับจากเวลานัดหมายที่จองไว้ ทางเราขอสงวนสิทธิ์ข้ามคิวของคุณลูกค้าโดยไม่มีการคืนค่าบริการที่ชำระมาครับ/ค่ะ</h4>
                <h4 style="color: red;">2.ขอความกรุณาเข้าห้องสนทนาตามเวลาที่นัดจองไว้เท่านั้นครับ/ค่ะ</h4>
                <button type="submit">Submit</button>
            </form>
        </div>
        <script src="{{ mix('js/appointment.js') }}"></script>
</body>
</html>
