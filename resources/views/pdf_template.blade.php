
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>


     {{-- <link rel="stylesheet" href="{{ mix('css/pdf.css') }}"> --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <title>Certificate</title>

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
                margin:20px;
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
            .check{
                text-align:center;
            }
            .space{
                margin-left:50px;
            }
        </style>
        <script src="{{ mix('js/pdf.js') }}"></script>
</head>
<body>
    <h1>ใบรับรองการตรวจสุขภาพสัตว์เลี้ยง</h1>
    <div style="margin-left: 67px;">
        <p>ชื่อสถานพยาบาล &nbsp;&nbsp; โรงพยาบาลสัตว์มะแอ๊ะ(Ma-ae veterinary Hospital) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ใบอนุญาตสถานพยาบาลสัตว์เลขที่ &nbsp; 1135782566</p>
        <p> ชื่อ-สกุล &nbsp;&nbsp; {{$Vet->first_name}} {{$Vet->last_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ใบประกอบวิชาชีพการสัตวแพทย์ &nbsp;&nbsp; {{$Vet->veterinary_license}}</p>
        <p>ทำการตรวจสุขภาพสัตว์เลี้ยงชื่อ &nbsp;&nbsp; {{$Pet->pet_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; สายพันธุ์ &nbsp; {{$Pet->breed}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เพศ &nbsp;&nbsp;{{$Pet->gender}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อายุ&nbsp;&nbsp;{{$age_in_months/12| number_format(0)}}&nbsp;&nbsp;ปี&nbsp;&nbsp;{{$age_in_months%12}}&nbsp;&nbsp;เดือน</p>
        <p>หมายเลขไมโครชิพ &nbsp;&nbsp; {{$Pet->microchip}}</p>
        <p>test &nbsp;&nbsp; {{$Pet->date_of_birth}}</p>
    </div>
    <h1>ผลการตรวจ Physical Examination</h1>

    <div class="result">
        <p>วันที่ทำการตรวจสุขภาพ (ปี - เดือน - วัน) &nbsp;&nbsp;&nbsp;&nbsp;{{$MediExam->date}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; อุณหภูมิร่างกายของสัตว์ &nbsp; {{$MediExam->temp}}&nbsp;&nbsp;F</p>
        <table border="1" style="margin-left: 75px;">
            <tr>
                <th class="exam">สิ่งที่ทำการตรวจ</th>
                <th class="pass">ผ่าน / ไม่ผ่าน</th>
            </tr>
            <tr>
                <td class="space"> 1. การทำงานระบบหายใจ</td>
                <td class="check">{{$MediExam->respiratory}}</td>
            </tr>
            <tr>
                <td class="space"> 2. การทำงานของหัวใจ</td>
                <td class="check">{{$MediExam->heart}}</td>
            </tr>
            <tr>
                <td class="space"> 3. ความสมบูรณ์ของเยื่อเมือก</td>
                <td class="check">{{$MediExam->mucous_tissue}}</td>
            </tr>
            <tr>
                <td class="space"> 4. สภาพผิวหนังและขน</td>
                <td class="check">{{$MediExam->skin_hair}}</td>
            </tr>
            <tr>
                <td class="space"> 5. ความสมบูรณ์ต่อมน้ำเหลือง</td>
                <td class="check">{{$MediExam->lymph_node}}</td>
            </tr>
            <tr>
                <td class="space"> 6. ความสมบูรณ์ของตา</td>
                <td class="check">{{$MediExam->eyes}}</td>
            </tr>
            <tr>
                <td class="space"> 7. ความสมบูรณ์ของหู</td>
                <td class="check">{{$MediExam->ears}}</td>
            </tr>
            <tr>
                <td class="space"> 8. ความสมบูรณ์ของจมูก</td>
                <td class="check">{{$MediExam->nose}}</td>
            </tr>
            <tr>
                <td class="space"> 9. ความสมบูรณ์ของช่องปาก</td>
                <td class="check">{{$MediExam->oral_cavity}}</td>
            </tr>
            <tr>
                <td class="space"> 10. ความสมบูรณ์ของเต้านม</td>
                <td class="check">{{$MediExam->breast}}</td>
            </tr>

            <tr>
                <td class="space"> 11. ความสมบูรณ์ของช่องท้อง</td>
                <td class="check">{{$MediExam->abdominal_cavity}}</td>
            </tr>
            <tr>
                <td class="space"> 12. ความสมบูรณ์ของข้อกระดูก</td>
                <td class="check">{{$MediExam->joint}}</td>
            </tr>
        </table>
        <h1>ดำเนินการตรวจสุขภาพ และให้คำรับรองการตรวจโดย</h1>
        <p>ชื่อ-สกุล &nbsp;&nbsp; {{$Vet->first_name}} {{$Vet->last_name}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เลขที่ใบประกอบวิชาชีพการสัตวแพทย์ &nbsp;&nbsp; {{$Vet->veterinary_license}}</p>
        </div>

</body>
</html>
