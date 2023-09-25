<!DOCTYPE html>
<html>
<head>
    <title>User Location</title>
</head>
<body>
    <h1>User Location</h1>
    </div>
    <!-- ส่วนที่จะแสดงข้อมูลตำแหน่งผู้ใช้ -->
    <div id="location">
        <p>Loading location...</p>
    </div>

    <!-- สร้างสคริปต์ JavaScript เพื่อรับข้อมูลตำแหน่ง -->
    <script>
        // ตัวอย่างการใช้ JavaScript ในการรับข้อมูลตำแหน่ง
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            document.getElementById('location').innerHTML = 'Geolocation is not supported by this browser.';
        }

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById('location').innerHTML = 'Latitude: ' + latitude + '<br>Longitude: ' + longitude;
        }

    </script>


</body>
</html>
