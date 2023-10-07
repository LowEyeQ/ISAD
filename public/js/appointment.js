/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/appointment.js ***!
  \*************************************/
var emptyTimeSlots = document.querySelectorAll('.empty-time-slot');
var timeTable = document.querySelector('.bordered-table');
var selectedDateCell = null; // เพิ่มตัวแปรเพื่อตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่

// JavaScript สำหรับการสร้างปฎิทิน
var tableBody = document.querySelector('tbody');
var currentMonthElement = document.getElementById('currentMonth');
var prevMonthButton = document.getElementById('prevMonth');
var nextMonthButton = document.getElementById('nextMonth');
var currentDate = new Date();
tableBody.addEventListener('click', function (event) {
  var clickedCell = event.target;
  if (clickedCell.tagName === 'TD' && clickedCell.textContent.trim() !== '') {
    toggleSelectedDate(clickedCell);
    updateAppointmentTimes(); // เรียกใช้ฟังก์ชันเมื่อมีการคลิกวันที่
  }
});

function toggleSelectedDate(cell) {
  var cellData = cell.textContent.trim();
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
      var selectedYear = currentDate.getFullYear();
      var selectedMonth = currentDate.getMonth() + 1;
      var selectedDay = cell.textContent;
      var formattedDate = "".concat(selectedYear, "-").concat(selectedMonth.toString().padStart(2, '0'), "-").concat(selectedDay.toString().padStart(2, '0'));
      document.getElementById('appointment_date').value = formattedDate;
    }
  }
}
function toggleSelected(cell) {
  var selectedCells = document.querySelectorAll('.selected');
  if (selectedCells.length === 0) {
    cell.classList.add('selected');
  } else {
    selectedCells.forEach(function (selectedCell) {
      selectedCell.classList.remove('selected');
    });
    cell.classList.add('selected');
  }
}
function updateCalendar() {
  var year = currentDate.getFullYear();
  var month = currentDate.getMonth();
  var daysInMonth = new Date(year, month + 1, 0).getDate();
  currentMonthElement.textContent = new Intl.DateTimeFormat('en-US', {
    year: 'numeric',
    month: 'long'
  }).format(currentDate);
  tableBody.innerHTML = '';

  // Fill in the table
  var day = 1;
  for (var i = 0; i < 6; i++) {
    var row = tableBody.insertRow(-1);
    for (var j = 0; j < 7; j++) {
      var cell = row.insertCell(j);
      if (i === 0 && j < new Date(year, month, 1).getDay() || day > daysInMonth) {
        cell.textContent = '';
      } else {
        cell.textContent = day;
        day++;
      }
    }
  }
}
prevMonthButton.addEventListener('click', function () {
  currentDate.setMonth(currentDate.getMonth() - 1);
  updateCalendar();
});
nextMonthButton.addEventListener('click', function () {
  currentDate.setMonth(currentDate.getMonth() + 1);
  updateCalendar();
});
updateCalendar();
/******/ })()
;