<!DOCTYPE html>
<html>
<head>
    <title>Certificate Table</title>
    <!-- <link rel="stylesheet" type="text/css" href="certable.css"> -->
    <link rel="stylesheet" href="{{ mix('css/certificate.css') }}">
    <script src="{{ mix('js/certificate.js') }}"></script>
</head>
<body>
  <!-- <img src="C\Users\H:P\Downloads\jf-brou-915UJQaxtrk-unsplash.jpg" alt="Image Description" width="800" height="500"> -->
  <main>
    <div class="TableC">
      <!-- <h1> Purin's Certificate Data Table </h1> -->
      <div class="table-container">
      <table>
        <caption> Purin's Certificate Data Table </caption>
        <tr>
            <th> Examination ID </th>
            <th> Pet ID </th>
            <th> Pet Name </th>
            <th> Date </th>
            <th> Veterinary ID </th>
        </tr>
        <tr id="ex1" href="{{route('export_pdf')}}"><!-- เพิ่มใหม่ -->
            <td data-cell="Examination ID" > EX0001 </td>
            <td data-cell="Pet ID" > D00001 </td>
            <td data-cell="Pet Name" > Teddy </td>
            <td data-cell="Date" > 14/2/2023 </td>
            <td data-cell="Veterinary ID" > V00001 </td>
        </tr>
        <tr id="ex2">
          <td data-cell="Examination ID" > EX0002 </td>
          <td data-cell="Pet ID" > C00001 </td>
          <td data-cell="Pet Name" > Kitty </td>
          <td data-cell="Date" > 20/2/2023 </td>
          <td data-cell="Veterinary ID" > V00003 </td>
      </tr>
      </table>
    </div>
    </div>
  </main>
</body>
</html>
