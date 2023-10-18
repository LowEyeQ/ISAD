<!DOCTYPE html>
<html>
<head>
    <title>Omise Payment</title>
</head>
<body>
    <div class="container">
        @if(isset($img_qr))
            <img src="{{ $img_qr }}" style="width: 600px; height: 600px;">
        @endif



        <a href="{{ $authorize_uri }}">กลับหน้าหลัก</a>


    </div>
</body>
</html>
