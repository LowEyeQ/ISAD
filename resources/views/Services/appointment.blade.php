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

            <form  method="post" action="{{ route('appointment') }}" onsubmit="return showSuccessAlert()">

                @csrf <!-- ใส่คำสั่ง CSRF สำหรับ Laravel -->
                <h1>กรุณากรอกรายละเอียด</h1>

                <label for="pet_selection">Select or Enter Pet's Name:</label>
                <select id="pet_selection" name="pet_selection" required>
                    <option value="" disabled selected>Select a pet</option>
                    @foreach($userPets as $pet)
                    <option value="{{ $pet->pet_id }}">{{ $pet->pet_id }} - {{ $pet->pet_name }}</option>
                    @endforeach
                </select>
                <input type="text" id="appointment_date" name="appointment_date" placeholder="ํYour selected date (auto fill)" required >
                <input type="time" id="appointment_time" name="appointment_time" required>
                <textarea id="reason" name="reason" rows="4" placeholder="How can we help you?" required></textarea>

                <form action="/upload" method="post" enctype="multipart/form-data">
                    <label for="imageUpload">แนบสลิปการชำระเงิน:</label>
                    <input type="file" id="imageUpload" name="image" accept="image/*" required>
                    <textarea id="reason" name="reason" rows="4" placeholder="รายละเอียดเพิ่มเติมที่ต้องการแจ้งไว้ให้เราทราบ (How can we help you?)"></textarea>
                    <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้ก่อนทำการยืนยัน</h3>
                    <h4 style="color: red;">1.หากมีผู้นัดจองในวันเดียวกันเป็นจำนวนมาก อาจต้องมีการรอคิวเข้าใช้บริการครับ/ค่ะ</h4>
                    <h4 style="color: red;">2.สำหรับการเข้าไปใช้บริการ สามารถแจ้งชื่อผู้ใช้ และชื่อของสัตว์เลี้ยงที่ได้จองไว้กับเจ้าหน้าที่ได้เลยครับ/ค่</h4>
                    <button type="submit" id="submit-button">Submit</button>
                </form>
                <!-- <h3 style="color: red;">กรุณาอ่านรายละเอียดดังต่อไปนี้ก่อนทำการยืนยัน</h3>
                <h4 style="color: red;">1.หากมีผู้นัดจองในวันเดียวกันเป็นจำนวนมาก อาจต้องมีการรอคิวเข้าใช้บริการครับ/ค่ะ</h4>
                <h4 style="color: red;">2.สำหรับการเข้าไปใช้บริการ สามารถแจ้งชื่อผู้ใช้ และชื่อของสัตว์เลี้ยงที่ได้จองไว้กับเจ้าหน้าที่ได้เลยครับ/ค่</h4>
                <button type="submit" id="submit-button">Submit</button> -->
            </form>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function showSuccessAlert() {

                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จแล้ว',
                    showConfirmButton: false,
                    timer:5000// 1.5 วินาที
                });

                return true;
        }
        </script>
        <script src="{{ mix('js/appointment.js') }}"></script>
</body>
</html>
