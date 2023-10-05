<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/video_appointment.css') }}">

    <title>Videocall</title>
</head>
<body>
    <div class="calendar">
        <div class="name">Video Call Appointment Calendar</div>
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
        <h3>เลือกช่วงเวลาที่คุณต้องการใช้บริการ</h3>
        <table class="bordered-table">
            <thead>
                <tr>
                    <th class="available">19.00-19.30</th>
                    <th class="available">19.30-20.00</th>
                    <th class="available">20.00-20.30</th>
                    <th class="available">20.30-21.00</th>
                    <th class="available">21.00-21.30</th>
                    <th class="available">21.30-22.00</th>
                    <th class="available">22.00-22.30</th>
                    <th class="available">22.30-23.00</th>
                </tr>
                <tr>
                    <td id = "1" class="empty-time-slot"></td>
                    <td id = "2" class="empty-time-slot"></td>
                    <td id = "3" class="empty-time-slot"></td>
                    <td id = "4" class="empty-time-slot"></td>
                    <td id = "5" class="empty-time-slot"></td>
                    <td id = "6" class="empty-time-slot"></td>
                    <td id = "7" class="empty-time-slot"></td>
                    <td id = "8" class="empty-time-slot"></td>
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
                <input type="text" id="appointment_time_start" name="appointment_time_start" placeholder="ํYour selected time start (auto fill)" required readonly>
                <input type="text" id="appointment_time_end" name="appointment_time_end"placeholder="ํYour selected time end (auto fill)" required readonly>
                <textarea id="reason" name="reason" rows="4" placeholder="How can we help you?" required></textarea>
                <input type="text" id="veterinary_id" name="veterinary_id" placeholder="แพทย์ผู้ให้บริการ : น.สพ.ณัฐวุฒิ ธีระวิทย์" required readonly>

                <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้</h3>
                <h4 style="color: red;">1.หากคุณลูกค้าไม่เข้าห้องสนทนาภายในเวลา 15 นาทีนับจากเวลานัดหมายที่จองไว้ ทางเราขอสงวนสิทธิ์ข้ามคิวของคุณลูกค้าโดยไม่มีการคืนค่าบริการที่ชำระมาครับ/ค่ะ</h4>
                <h4 style="color: red;">2.ขอความกรุณาเข้าห้องสนทนาตามเวลาที่นัดจองไว้เท่านั้นครับ/ค่ะ</h4>
                <button type="submit">Submit</button>
            </form>
        </div>
        <script src="{{ mix('js/video_appointment.js') }}"></script>
</body>
</html>
