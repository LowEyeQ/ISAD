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
    <div id="googleMap" style="width: 100%; height: 400px;">
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
            const mapURL = `https://www.google.com/maps?q=${latitude},${longitude}`;
             const mapLink = `<a href="${mapURL}" target="_blank">Open in Google Maps</a>`;

            document.getElementById('location').innerHTML = 'Latitude: ' + latitude + '<br>Longitude: ' + longitude;
            document.getElementById('googleMap').innerHTML = mapLink;
        }

    </script>


</body>
</html>
