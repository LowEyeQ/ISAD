<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stlesheet" href="style.css">
    <title>ปฎิทินนัดหมาย</title>
    <style>
        /* CSS สำหรับสไตล์ปฎิทิน */
        body {
            display: grid;
            place-items: center; /* จัดให้อยู่ตรงกลางทั้งแนวนอนและแนวดิ่ง */
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh; /* ความสูงเท่ากับ viewport คือจอเว็บ */
            margin: 0;
        }
        .calendar {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: center;
            /* border: 1px solid #ccc; */
        }
        table th {
            background-color: #333;
            color: #fff;
        }
        table td {
            background-color: #fff;
        }
        .selected {
            background-color: #3498db;
            color: #fff;
        }


        <button class="button-13" role="button">Button 13</button>

        .confirm-button-container {
            background-color: #fff;
            border: 1px solid #d5d9d9;
            border-radius: 8px;
            box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
            box-sizing: border-box;
            color: #0f1111;
            cursor: pointer;
            display: inline-block;
            font-family: "Amazon Ember",sans-serif;
            font-size: 13px;
            line-height: 29px;
            padding: 0 10px 0 11px;
            position: relative;
            text-align: center;
            text-decoration: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            width: 100px;
        }

        .button-13:hover {
            background-color: #f7fafa;
        }

        .button-13:focus {
            border-color: #008296;
            box-shadow: rgba(213, 217, 217, .5) 0 2px 5px 0;
            outline: 0;
        }
        .input_data{
            background-color: #C2DCD9;
            width: 1200px;
            height: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form{
            background: #fff;;
            display: flex;
            flex-direction: column;
            padding: 2vw 4vw;
            width: 90%;
            max-width: 600px;
            border-radius: 10px;
        }
        form input, form textarea{
            background: #F2F2F2 ;
            border: 0;
            padding: 20px;
            margin: 10px 0;
            outline: none;
            font-size: 16px;
            border-radius: 30px;
        }
        form button{
            padding: 15px;
            background: #ff5361;
            color: #fff;
            font-size: 18px;
            border: 0;
            outline: none;
            cursor: pointer;
            width: 150px;
            margin: 20px auto 0;
            border-radius: 30px
        }
    </style>
</head>
<body>
    <div class="calendar">
        <h1>ปฎิทินจองวันนัดหมาย</h1>
        <div>
            <button id="prevMonth">เดือนก่อนหน้า</button>
            <span id="currentMonth">กันยายน 2023</span>
            <button id="nextMonth">เดือนถัดไป</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>วันอาทิตย์</th>
                    <th>วันจันทร์</th>
                    <th>วันอังคาร</th>
                    <th>วันพุธ</th>
                    <th>วันพฤหัสบดี</th>
                    <th>วันศุกร์</th>
                    <th>วันเสาร์</th>
                </tr>
            </thead>
            <tbody>
                <!-- ใส่ข้อมูลวันที่ที่เลือกได้ที่นี่ -->
            </tbody>
        </table>
        <div class="input_data">
            <form action="/" method="post" onsubmit="return showSuccessAlert()">
                @csrf <!-- ใส่คำสั่ง CSRF สำหรับ Laravel -->
                <input type="text" id="pet_id" name="pet_id" placeholder="Your pet's id" required>
                <input type="date" id="appointment_date" name="appointment_date" required>
                <input type="time" id="appointment_time" name="appointment_time" required step="900">
                <textarea id="reason" name="reason" rows="4" placeholder="How can we help you?" required></textarea>
                {{-- <input type="text" id="veterinary_id" name="veterinary_id" placeholder="Veterinary ID" required> --}}
                <button type="submit">Submit</button>
            </form>

    <script>
            function showSuccessAlert() {
                    // แสดงข้อความแจ้งเตือนเมื่อ Submit สำเร็จ
                    alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                    return true; // ให้ฟอร์มดำเนินการ Submit ต่อ
                }
        // JavaScript สำหรับการสร้างปฎิทิน
        const tableBody = document.querySelector('tbody');
        const currentMonthElement = document.getElementById('currentMonth');
        const prevMonthButton = document.getElementById('prevMonth');
        const nextMonthButton = document.getElementById('nextMonth');
        let currentDate = new Date();

        function toggleSelected(cell) {
            if (cell.classList.contains('selected')) {
                cell.classList.remove('selected');
            } else {
                cell.classList.add('selected');
            }
        }

        function updateCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            currentMonthElement.textContent = new Intl.DateTimeFormat('en-US', { year: 'numeric', month: 'long' }).format(currentDate);

            // Clear the table
            tableBody.innerHTML = '';

            // Fill in the table
            let day = 1;
            for (let i = 0; i < 6; i++) {
                const row = tableBody.insertRow(-1);
                for (let j = 0; j < 7; j++) {
                    const cell = row.insertCell(j);
                    if ((i === 0 && j < new Date(year, month, 1).getDay()) || day > daysInMonth) {
                        cell.textContent = '';
                    } else {
                        cell.textContent = day;
                        cell.addEventListener('click', () => {
                            // การเลือกวันที่
                            toggleSelected(cell);
                        });
                        day++;
                    }
                }
            }
        }

        prevMonthButton.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendar();
        });

        nextMonthButton.addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendar();
        });

        updateCalendar();
    </script>
</body>
</html>

