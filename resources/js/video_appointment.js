const emptyTimeSlots = document.querySelectorAll('.empty-time-slot');
const timeTable = document.querySelector('.bordered-table');
let selectedDateCell = null; // เพิ่มตัวแปรเพื่อตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่
let selectedTimeSlot = null; // เพิ่มตัวแปรเพื่อเก็บช่วงเวลาที่ถูกเลือก
let selectedTimeSlotCell = null;

emptyTimeSlots.forEach(slot => {
    slot.addEventListener('click', () => {
        // ตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่
        if (selectedDateCell) {
            toggleSelected(slot);

            // เมื่อผู้ใช้เลือกเวลาในตารางที่สอง
            const selectedTime = slot.textContent;
            const timeId = slot.id;
            const timeMapping = {
                '1': '19.00-19.30',
                '2': '19.30-20.00',
                '3': '20.00-20.30',
                '4': '20.30-21.00',
                '5': '21.00-21.30',
                '6': '21.30-22.00',
                '7': '22.00-22.30',
                '8': '22.30-23.00'
            };

            const selectedTimeRange = timeMapping[timeId];
            if (selectedTimeRange) {
                const [startTime, endTime] = selectedTimeRange.split('-');
                document.getElementById('appointment_time_start').value = startTime;
                document.getElementById('appointment_time_end').value = endTime;
            }
        } else {
            alert('โปรดเลือกวันที่ก่อนเลือกเวลา');
        }
    });
});

function showSuccessAlert() {
    // แสดงข้อความแจ้งเตือนเมื่อ Submit สำเร็จ
    alert('บันทึกข้อมูลเรียบร้อยแล้ว');
    return true; // ให้ฟอร์มดำเนินการ Submit ต่อ
}

// JavaScript สำหรับการสร้างปฎิทิน
const tableBody = document.querySelector('tbody');
const currentMonthElement = document.getElementById('currentMonth');
const prevMonthButton = document.getElementById('prevMonth');
const nextMonthButton = document.getElementById('nextMonth');
let currentDate = new Date();

tableBody.addEventListener('click', (event) => {
    const clickedCell = event.target;
    if (clickedCell.tagName === 'TD' && clickedCell.textContent.trim() !== '') {
        toggleSelectedDate(clickedCell);
        updateAppointmentTimes(); // เรียกใช้ฟังก์ชันเมื่อมีการคลิกวันที่
    }
});

function updateAppointmentTimes() {
    if (selectedDateCell) {
        const startTimeInput = document.getElementById('appointment_time_start');
        const endTimeInput = document.getElementById('appointment_time_end');
        const startTime = startTimeInput.value;
        const endTime = endTimeInput.value;
        selectedDateCell.setAttribute('data-start-time', startTime);
        selectedDateCell.setAttribute('data-end-time', endTime);
    } else {
        document.getElementById('appointment_time_start').value = '';
        document.getElementById('appointment_time_end').value = '';
    }
}
function toggleSelectedDate(cell) {
    const cellData = cell.textContent.trim();
    if (/^\d+$/.test(cellData)) {
        if (cell === selectedDateCell) {
            cell.classList.remove('selected-date');
            selectedDateCell = null;
            document.getElementById('appointment_date').value = '';
            if (selectedTimeSlotCell) {
                selectedTimeSlotCell.classList.remove('selected');
                selectedTimeSlotCell = null; // เคลียร์เซลล์ที่มีช่วงเวลาที่ถูกเลือก
            }
            document.getElementById('appointment_time_start').value = '';
            document.getElementById('appointment_time_end').value = '';
        } else {
            if (selectedDateCell) {
                selectedDateCell.classList.remove('selected-date');
            }
            selectedDateCell = cell;
            selectedDateCell.classList.add('selected-date');
            const selectedYear = currentDate.getFullYear();
            const selectedMonth = currentDate.getMonth() + 1;
            const selectedDay = cell.textContent;
            const formattedDate = `${selectedYear}-${selectedMonth.toString().padStart(2, '0')}-${selectedDay.toString().padStart(2, '0')}`;
            document.getElementById('appointment_date').value = formattedDate;
            if (selectedTimeSlotCell) {
                selectedTimeSlotCell.classList.remove('selected');
                selectedTimeSlotCell = null; // เคลียร์เซลล์ที่มีช่วงเวลาที่ถูกเลือก
            }
            document.getElementById('appointment_time_start').value = '';
            document.getElementById('appointment_time_end').value = '';
        }
    }
}


function toggleSelected(cell) {
    const selectedCells = document.querySelectorAll('.selected');
    if (selectedCells.length === 0) {
        cell.classList.add('selected');
        selectedTimeSlotCell = cell; // เก็บเซลล์ที่มีช่วงเวลาที่ถูกเลือก
    } else {
        selectedCells.forEach(selectedCell => {
            selectedCell.classList.remove('selected');
        });
        cell.classList.add('selected');
        selectedTimeSlotCell = cell; // เก็บเซลล์ที่มีช่วงเวลาที่ถูกเลือก
    }
}

function updateCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    currentMonthElement.textContent = new Intl.DateTimeFormat('en-US', { year: 'numeric', month: 'long' }).format(currentDate);

    // Clear the table
    tableBody.innerHTML = '';

    // รีเซ็ตสีในตารางที่สอง
    const selectedCells = document.querySelectorAll('.selected');
    selectedCells.forEach(selectedCell => {
        selectedCell.classList.remove('selected');
    });

    // รีเซ็ตค่าในช่อง appointment_time_start และ appointment_time_end
    document.getElementById('appointment_time_start').value = '';
    document.getElementById('appointment_time_end').value = '';

    // Fill in the table
    let day = 1;
    for (let i = 0; i < 6; i++) {
        const row = tableBody.insertRow(-1);
        for (let j = 0; j < 7; j++) {
            const cell = row.insertCell(j);
            if ((i === 0 && j < new Date(year, month, 1).getDay()) || day > daysInMonth) {
                cell.textContent = '';
            } else {
                cell.textContent = day;
                const startTimeInput = document.getElementById('appointment_time_start');
                const endTimeInput = document.getElementById('appointment_time_end');
                const startTime = startTimeInput.value;
                const endTime = endTimeInput.value;
                cell.setAttribute('data-start-time', startTime);
                cell.setAttribute('data-end-time', endTime);
                day++;
            }
        }
    }
}


prevMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
});

nextMonthButton.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
});

updateCalendar();
