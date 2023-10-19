<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/video_appointment.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <title>Videocall</title>
</head>
<body>

    {{-- <div id="daily-bar-chart">
        {!! $chart->container() !!}
    </div>
    {!! $chart->script() !!} --}}
</body>
</html>

<a href="/" class="logo-link">
    <x-application-logo width="80" height="80" fill="none" stroke="#c9c9c9" stroke-width="1"
        stroke-linejoin="round" />
</a>
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
                    <th class="day-header">SUNDAY</th>
                    <th class="day-header">MONDAY</th>
                    <th class="day-header">TUESDAY</th>
                    <th class="day-header">WEDNESDAY</th>
                    <th class="day-header">THURSDAY</th>
                    <th class="day-header">FRIDAY</th>
                    <th class="day-header">SATURNDAY</th>
                </tr>
            </thead>
            <tbody>
                <!-- ใส่ข้อมูลวันที่ที่เลือกได้ที่นี่ -->
            </tbody>
        </table>
        <div style="height: 30px;"></div>
        <!-- <h3>เลือกช่วงเวลาที่คุณต้องการใช้บริการ</h3> -->
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

        <div style="height: 30px;"></div>

        <div class="input_data">
            <form action="{{ route('videocall') }}" method="post" onsubmit="return showSuccessAlert()" enctype="multipart/form-data">

                @csrf <!-- ใส่คำสั่ง CSRF สำหรับ Laravel -->

                <h1>กรุณากรอกรายละเอียด</h1>
                <!-- <input type="text" id="pet_id" name="pet_id" placeholder="ชื่อYour pet's name" required> -->
                <!-- <input type="text" id="first_name" name="Sender's firstname" placeholder="ชื่อจริงผู้ชำระเงิน (Sender's firstname)" required>
                <input type="text" id="last_name" name="Sender's lastname" placeholder="นามสกุลผู้ชำระเงิน (Sender's lastname)" required> -->

                <input type="text" id="appointment_date" name="appointment_date" placeholder="ํวันที่นัดจอง (Appointment date : auto fill)" required readonly>
                <input type="text" id="appointment_time_start" name="appointment_time_start" placeholder="ํเวลาเริ่มการสนทนา (Appointment time start : auto fill)" required readonly>
                <input type="text" id="appointment_time_end" name="appointment_time_end"placeholder="ํเวลาสิ้นสุดการสนทนา (Appointment time end : auto fill)" required readonly>

                <!-- {{-- <input type="text" id="payment_id" name="payment_id" placeholder="ค่าบริการที่ต้องชำระ (Service Fee) : 100.00 บาท" readonly style="background-color: #fff"> --}} -->
                <textarea id="reason" name="reason" rows="4" placeholder="รายละเอียดเพิ่มเติมที่ต้องการแจ้งไว้ (How can we help you?)"></textarea>
                <input type="text" id="veterinary_id" name="veterinary_id" placeholder="แพทย์ผู้ให้บริการ(Veterinary) : น.สพ.ณัฐวุฒิ ธีระวิทย์(หมอโอ๊ค)" readonly style="background-color: #fff">
                <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้ก่อนทำการยืนยัน</h3>
                <h4 style="color: red;">1.ขอความกรุณาเข้าห้องสนทนาตามเวลาที่นัดจองไว้เท่านั้นครับ/ค่ะ</h4>
                <h4 style="color: red;">2.หากคุณลูกค้าไม่เข้าห้องสนทนาภายในเวลา 15 นาทีนับจากเวลานัดหมายที่จองไว้ ทางเราขอสงวนสิทธิ์ข้ามคิวของคุณลูกค้า</h4>

                <!-- {{-- <div style="display: flex; justify-content: center; align-items: center; margin: 20px;">
                    <img src="{{ asset('storage/payment.jpg') }}" alt="Your Image" style="max-height: 500px; max-width: 300px;">
                </div> --}} -->
                <!-- <h1>แนบสลิปการชำระเงิน</h1> -->
                    <!-- {{-- <label for="imageUpload">แนบสลิปการชำระเงิน:</label> -->
                    <!-- <input type="file" id="imageUpload" name="image" accept="image/*" required> --}} -->
                    <!-- <textarea id="reason" name="reason" rows="4" placeholder="รายละเอียดเพิ่มเติมที่ต้องการแจ้งไว้ (How can we help you?)"></textarea> -->
                    <button type="submit">Submit</button>
                </form>
            </form>
        </div>

        <script>
            function showSuccessAlert() {
                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จแล้ว',
                    showConfirmButton: false,
                    timer: 15000 // 1.5 วินาที
                });

                return true; // ทำให้ฟอร์มยืนยันต่อไป
            }
        </script>

        <script src="{{ mix('js/video_appointment.js') }}"></script>
</body>
</html>
