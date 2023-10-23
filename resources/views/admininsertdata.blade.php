<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        form {
            margin: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #000000;
            color: white;
            border: none;
            padding: 7.5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
        }

        table {
            width: 100%;
            margin: 10px;
            background-color: #fff;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #000;
            color: white;
        }

        img {
            max-width: 75px;
            height: auto;
        }
    </style>
    <form method="POST" action="{{ route('admin.store') }}"onsubmit="return showSuccessAlert()">
        @csrf
<div class="form-group" style="margin-bottom: 10px;">
    <label for="first_name" style="font-size: 18px; color: #333;">ชื่อ</label>
    <input type="text" id="name" name="name" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block;">
</div>

<div class="form-group" style="margin-bottom: 10px;">
    <label for="first_name" style="font-size: 18px; color: #333;">ชื่อจริง</label>
    <input type="text" id="first_name" name="first_name" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block;">
</div>

<div class="form-group" style="margin-bottom: 10px;">
    <label for="last_name" style="font-size: 18px; color: #333;">นามสกุล</label>
    <input type="text" id="last_name" name="last_name" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block;">
</div>

<div class="form-group" style="margin-bottom: 10px;">
    <label for="user_id" style="font-size: 18px; color: #333;">รหัสลูกค้า(ถ้ามี)</label>
    <input type="text" id="user_id" name="user_id" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block;">
</div>

<div class="form-group" style="margin-bottom: 10px;">
    <label for="location" style="font-size: 18px; color: #333;">ที่เกิดเหตุ</label>
    <input type="text" id="location" name="location" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block;">
</div>

<div class="form-group" style="margin-bottom: 10px;">
    <label for="description" style="font-size: 18px; color: #333;">รายละเอียด</label>
    <textarea id="description" name="description" class="form-control" style="width: 50%; padding: 5px; border: 1px solid #ccc; border-radius: 5px; display: block; resize: vertical;"></textarea>
</div>




        <button type="submit" style="background-color: #000000; color: white; border: none; padding: 7.5px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 4px;">บันทึก</button>


      </form>
      <table class="table"style="max-width: 900px; margin: 0 auto;">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>ชื่อจริง</th>
                <th>นามสกุล</th>
                <th>ที่เกิดเหตุ</th>
                <th>รายละเอียด</th>
                <th>รูปตอนเกิดเหตุ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emergencyCalls as $call)
            <tr style="border: 1px solid black;">
                <td style="padding: 10px;">{{ $call->name }}</td>
                <td style="padding: 10px;">{{ $call->first_name }}</td>
                <td style="padding: 10px;">{{ $call->last_name }}</td>
                <td style="padding: 10px;">{{ $call->location }}</td>
                <td style="padding: 10px;">{{ $call->description }}</td>
                <td style="padding: 10px;">
                    @if ($call->additional_image)
                    <img src="{{ asset($call->additional_image) }}" alt="Additional Image" width="100">
                @else
                    ไม่มีรูป
                @endif</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
</body>
</html>
