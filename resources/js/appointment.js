const emptyTimeSlots = document.querySelectorAll('.empty-time-slot');
const timeTable = document.querySelector('.bordered-table');
let selectedDateCell = null; // เพิ่มตัวแปรเพื่อตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่


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


function toggleSelectedDate(cell) {
    const cellData = cell.textContent.trim();
    if (/^\d+$/.test(cellData)) {
        if (cell === selectedDateCell) {
            cell.classList.remove('selected-date');
            selectedDateCell = null;
            document.getElementById('appointment_date').value = '';
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
        }
    }
}
function toggleSelected(cell) {
    const selectedCells = document.querySelectorAll('.selected');
    if (selectedCells.length === 0) {
        cell.classList.add('selected');
    } else {
        selectedCells.forEach(selectedCell => {
            selectedCell.classList.remove('selected');
        });
        cell.classList.add('selected');
    }
}

function updateCalendar() {
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    currentMonthElement.textContent = new Intl.DateTimeFormat('en-US', { year: 'numeric', month: 'long' }).format(currentDate);

    tableBody.innerHTML = '';

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

