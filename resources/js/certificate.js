document.addEventListener("DOMContentLoaded", function () {
    // รับแถวทั้งหมดในตาราง
    const rows = document.querySelectorAll("body");
    document.querySelectorAll("")
    alert(rows.length);

    // เพิ่มตัวตรวจสอบเหตุการณ์คลิกให้กับแต่ละแถว
    rows.forEach(function (row) {
        row.addEventListener("click", function () {
            // ตรวจสอบว่าแถวมีแอตทริบิวต์ "id" หรือไม่
            if (row.hasAttribute("id")) {
                // รับค่าแอตทริบิวต์ id ของแถวที่คลิก
                const id = row.getAttribute("id");

                // สร้าง URL โดยอ้างอิงจาก id (คุณสามารถปรับแต่งส่วนนี้)
                //const url = "details.html?id=" + id;
                const url = row.getAttribute("href");
                // เปลี่ยนเส้นทางไปยังหน้าใหม่
                window.location.href = url;
            }
        });
    });
});



