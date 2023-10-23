<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อระบบฉุกเฉิน</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: none;
        }

        input[type="text"],
        input[type="file"] {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        input[type="text"]::placeholder,
        input[type="file"]::placeholder {
            font-weight: bold;
            color: #4e4b4b;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>ติดต่อระบบฉุกเฉิน</h1>

        <h1>จำนวนคิว: <span id="queueNumber"></span></h1>
        <form method="post" action="{{ route('upload-image') }}" enctype="multipart/form-data" id="contactForm">
            @csrf
            <label for="additional_image">เลือกรูปภาพเพิ่มเติม:</label>
            <input type="file" name="additional_image" accept="image/*">
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <input type="hidden" id="phoneNumber" name="phoneNumber" value="123456789"> <!-- เปลี่ยนเบอร์โทรตามที่คุณต้องการ -->
            <input type="text" id="name" name="name" required placeholder="ชื่อ">
            <button type="button" id="contactButton">ติดต่อ</button>
        </form>
    </div>

    <script>
        const randomQueueNumber = Math.floor(Math.random() * 5) + 1;
        document.getElementById('queueNumber').textContent = randomQueueNumber;

        const contactButton = document.getElementById('contactButton');
        contactButton.addEventListener('click', function() {
            if (confirm("คุณต้องการติดต่อจริง ๆ ใช่หรือไม่?")) {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        document.getElementById('latitude').value = latitude;
                        document.getElementById('longitude').value = longitude;

                        const phoneNumber = document.getElementById('phoneNumber').value;
                        const address = document.getElementById('address').value;

                        const phoneLink = `tel:${phoneNumber},,${latitude},${longitude},${address}`;
                        window.location.href = phoneLink;

                        // ส่งข้อมูลไปยัง controller ผ่าน AJAX
                        const formData = new FormData(document.getElementById('contactForm'));
                        formData.append('latitude', latitude);
                        formData.append('longitude', longitude);

                        fetch("{{ route('upload-image') }}", {
                            method: "POST",
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            // ทำอะไรก็ตามที่คุณต้องการเมื่อรับคำตอบจาก controller
                            console.log(data);
                        })
                        .catch(error => {
                            console.error("เกิดข้อผิดพลาดในการส่งข้อมูล: " + error);
                        });
                    }, function (error) {
                        console.error("ไม่สามารถดึงค่า GPS ได้: " + error.message);
                    });
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            }
        });

    </script>
</body>
</html>
