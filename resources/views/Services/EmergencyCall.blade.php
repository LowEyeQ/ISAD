<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อระบบฉุกเฉิน</title>
</head>
<body>
    <h1>คำเตือนตอนกดติดต่อ จะส่งgpsไปให้emp , ใส่รูป</h1>
    <div class="container">
        <h1>ติดต่อระบบฉุกเฉิน</h1>
        <form method="post" action="{{ route('emergency-call') }}">
            @csrf
            <label for="emergency_number">หมายเลขฉุกเฉิน:</label>
            <input type="text" name="emergency_number">
            <label for="emergency_message">ข้อความเกี่ยวกับสถานการณ์:</label>
            <textarea name="emergency_message"></textarea>
            <button type="button" onclick="confirmEmergency()">ติดต่อ</button>
        </form>
        </form>
    </div>

    <!-- JavaScript สำหรับเปิด Phone Link เมื่อคลิกที่ "ติดต่อ" -->
    <script>
        function confirmEmergency() {
            if (confirm("คุณต้องการติดต่อจริง ๆ ใช่หรือไม่?")) {
                const address = "ที่อยู่ของคุณ"; // ใส่ที่อยู่จริงของคุณที่นี่
                const phoneNumber = "123456789"; // เปลี่ยนเป็นหมายเลขโทรศัพท์ที่คุณต้องการ

                // สร้างลิงก์โทรศัพท์โดยการเรียก phone link
                const phoneLink = `tel:${phoneNumber}`;

                // ส่งไปยังหมายเลขฉุกเฉินพร้อมกับที่อยู่
                window.location.href = `${phoneLink}?address=${encodeURIComponent(address)}`;
            }
        }
    </script>

</body>
</html>
