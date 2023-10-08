<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/appointment.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Appointment</title>
</head>

<a href="/" class="logo-link">
    <x-application-logo width="80" height="80" fill="none" stroke="#c9c9c9" stroke-width="1"
        stroke-linejoin="round" />
</a>

<body>
    <div class="calendar">
    <div class="Chart-name">The number of people on the day you selected</div>

        <div class="chart-container" id="chart">
            {!!$chart->container() !!}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        {!! $chart->script() !!}
        <!-- <button type="submit" id="check-button">Check</button> -->

        <div class="name">Appointment Calendar</div>
        <div>
            <button id="prevMonth" style="border: none; background-color: white; font-size: 40px; float: left;"><</button>
                    <span id="currentMonth" style="text-align: center; font-size: 32px; display: inline-block;"></span>
                    <button id="nextMonth"
                        style="border: none; background-color: white; font-size: 40px; float: right;">></button>
        </div>
        <table>
            <thead>
                <tr></tr>
                <th class="day-header">SUNDAY</th>
                <th class="day-header">MONDAY</th>
                <th class="day-header">TUESDAY</th>
                <th class="day-header">WEDNESDAY</th>
                <th class="day-header">THURSDAY</th>
                <th class="day-header">FRIDAY</th>
                <th class="day-header">SATURDAY</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div style="height: 20px;"></div>

        <div class="input_data">

            <form method="post" action="{{ route('appointment') }}" onsubmit="return showSuccessAlert()" enctype="multipart/form-data">

                @csrf <!-- ใส่คำสั่ง CSRF สำหรับ Laravel -->
                <h1>กรุณากรอกรายละเอียด</h1>

                <label for="pet_selection">เลือกสัตว์เลี้ยงที่ต้องการนัดจอง (Select or Enter Pet's Name):</label>
                <select id="pet_selection" name="pet_selection" required>
                    <option value="" disabled selected>Select a pet</option>
                    @foreach ($userPets as $pet)
                        <option value="{{ $pet->pet_id }}">{{ $pet->pet_id }} - {{ $pet->pet_name }}</option>
                    @endforeach
                </select>

                <input type="text" id="appointment_date" name="appointment_date"
                    placeholder="วันที่นัดจอง (Appointment date : auto fill)" required>

                <input type="time" id="เวลาที่นัดจอง (appointment_time)" name="appointment_time" required>
                <!-- <textarea id="reasons" name="reason" rows="4" placeholder="How can we help you?" required></textarea> -->
                <h3 style="color: red;">**หากทำการชำระเงินแล้วจะถือเป็นการยืนยันการนัดจอง</h3>
                <div style="display: flex; justify-content: center; align-items: center; margin: 20px;">
                    <img src="{{ asset('storage/payment.jpg') }}" alt="Your Image"
                        style="max-height: 500px; max-width: 300px;">
                </div>
                <label for="imageUpload">แนบสลิปการชำระเงิน:</label>
                <input type="file" id="imageUpload" name="image" accept="image/*" required>
                <textarea id="reason" name="reason" rows="4"
                    placeholder="รายละเอียดเพิ่มเติมที่ต้องการแจ้งไว้ให้เราทราบ (How can we help you?)"></textarea>
                <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้ก่อนทำการยืนยัน</h3>
                <h4 style="color: red;">1.หากมีผู้นัดจองในวันเดียวกันเป็นจำนวนมาก อาจต้องมีการรอคิวเข้าใช้บริการครับ/ค่ะ
                </h4>
                <h4 style="color: red;">2.สำหรับการเข้าไปใช้บริการ สามารถแจ้งชื่อผู้ใช้
                    และชื่อของสัตว์เลี้ยงที่ได้จองไว้กับเจ้าหน้าที่ได้เลยครับ/ค่ะ</h4>
                <button type="submit" id="submit-button">Submit</button>
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

        <script src="{{ mix('js/appointment.js') }}"></script>
</body>

</html>
