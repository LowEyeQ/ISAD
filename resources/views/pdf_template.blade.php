
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


     {{-- <link rel="stylesheet" href="{{ mix('css/pdf.css') }}"> --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <title>PDF Template</title>

        <style>
            @font-face {
                font-family: 'THSarabunNew';
                font-weight: normal;
                font-style: normal;
                font-synthesis: style;
                src: url({{ storage_path('/fonts/THSarabunNew.ttf') }}") format('truetype');
            }

            @font-face {
                font-family: 'THSarabunNew';
                font-weight: bold;
                font-style: normal;
                font-variant: normal;
                font-synthesis: style;
                src: url({{ storage_path('/fonts/THSarabunNew Bold.ttf') }}") format('truetype');
            }

            body {
                font-family: 'THSarabunNew';
                margin:20p
            }
            h1 {
                text-align: center;
                font-size: 26px;
            }
            p{
                line-height: 60%;
            }
            tr{
                font-family: 'THSarabunNew';
            }
            td{
                font-family: 'THSarabunNew';
            }
            .exam{
                width:398px;
            }
            .pass{
                width:140px;
            }
            .npass{
                width:140px;
            }
            .result{
                text-align:center;
            }
        </style>
        <script src="{{ mix('js/script.js') }}"></script>
</head>
<body>
    <h1>ใบรับรองการตรวจสุขภาพสัตว์เลี้ยง</h1>
    <p>ชื่อสถานพยาบาล &nbsp; โรงพยาบาลสัตว์มะแอ๊ะ(Ma-ae veterinary Hospital) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ใบอนุญาตสถานพยาบาลสัตว์เลขที่ &nbsp; 1135782566</p>
    <p>ชื่อ-สกุล {{$Vet->first_name}} {{$Vet->last_name}}</p>
    <p>เลขที่ใบประกอบวิชาชีพการสัตวแพทย์ {{$Vet->veterinary_license}}</p>
    <p>ทำการตรวจสุขภาพสัตว์เลี้ยงชื่อ {{$Pet->pet_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; สายพันธุ์ {{$Pet->breed}} </p>
    <p>เพศ {{$Pet->gender}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อายุ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปี&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เดือน</p>
    <p>หมายเลขไมโครชิพ</p>
    <h1>ผลการตรวจ Physical Examination</h1>
    <div class="result">
        <p>วันที่ทำการตรวจสุขภาพ (วัน/เดือน/ปี) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อุณหภูมิร่างกายของสัตว์ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;F</p>
        <table border="1">
            <tr>
                <th class="exam">สิ่งที่ทำการตรวจ</th>
                <th class="pass">ผ่าน</th>
                <th class="npass">ไม่ผ่าน</th>
            </tr>
            <tr>
                <td> 1. การทำงานระบบหายใจ</td>
                <td>check</td>
                <td></td>
            </tr>
            <tr>
                <td> 2. การทำงานของหัวใจ</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 3. ความสมบูรณ์ของเยื่อเมือก</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 4. สภาพผิวหนังและขน</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 5. ความสมบูรณ์ต่อมน้ำเหลือง</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 6. ความสมบูรณ์ของตา</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 7. ความสมบูรณ์ของหู</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 8. ความสมบูรณ์ของจมูก</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 9. ความสมบูรณ์ของช่องปาก</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 10. ความสมบูรณ์ของเต้านม</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td> 11. ความสมบูรณ์ของช่องท้อง</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td> 12. ความสมบูรณ์ของข้อกระดูก</td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <h1>ดำเนินการตรวจสุขภาพ และให้คำรับรองการตรวจโดย</h1>
        <p>ชื่อ-สกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ใบประกอบวิชาชีพ</p>
        </div>

</body>
</html>
