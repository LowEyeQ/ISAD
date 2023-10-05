/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/video_appointment.js ***!
  \*******************************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
var emptyTimeSlots = document.querySelectorAll('.empty-time-slot');
var timeTable = document.querySelector('.bordered-table');
var selectedDateCell = null; // เพิ่มตัวแปรเพื่อตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่
var selectedTimeSlot = null; // เพิ่มตัวแปรเพื่อเก็บช่วงเวลาที่ถูกเลือก
var selectedTimeSlotCell = null;
emptyTimeSlots.forEach(function (slot) {
  slot.addEventListener('click', function () {
    // ตรวจสอบว่ามีวันที่ถูกเลือกหรือไม่
    if (selectedDateCell) {
      toggleSelected(slot);

      // เมื่อผู้ใช้เลือกเวลาในตารางที่สอง
      var selectedTime = slot.textContent;
      var timeId = slot.id;
      var timeMapping = {
        '1': '19.00-19.30',
        '2': '19.30-20.00',
        '3': '20.00-20.30',
        '4': '20.30-21.00',
        '5': '21.00-21.30',
        '6': '21.30-22.00',
        '7': '22.00-22.30',
        '8': '22.30-23.00'
      };
      var selectedTimeRange = timeMapping[timeId];
      if (selectedTimeRange) {
        var _selectedTimeRange$sp = selectedTimeRange.split('-'),
          _selectedTimeRange$sp2 = _slicedToArray(_selectedTimeRange$sp, 2),
          startTime = _selectedTimeRange$sp2[0],
          endTime = _selectedTimeRange$sp2[1];
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

function updateAppointmentTimes() {
  if (selectedDateCell) {
    var startTimeInput = document.getElementById('appointment_time_start');
    var endTimeInput = document.getElementById('appointment_time_end');
    var startTime = startTimeInput.value;
    var endTime = endTimeInput.value;
    selectedDateCell.setAttribute('data-start-time', startTime);
    selectedDateCell.setAttribute('data-end-time', endTime);
  } else {
    document.getElementById('appointment_time_start').value = '';
    document.getElementById('appointment_time_end').value = '';
  }
}
function toggleSelectedDate(cell) {
  var cellData = cell.textContent.trim();
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
      var selectedYear = currentDate.getFullYear();
      var selectedMonth = currentDate.getMonth() + 1;
      var selectedDay = cell.textContent;
      var formattedDate = "".concat(selectedYear, "-").concat(selectedMonth.toString().padStart(2, '0'), "-").concat(selectedDay.toString().padStart(2, '0'));
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

// function toggleSelectedDate(cell) {
//     const cellData = cell.textContent.trim(); // ดึงข้อมูลจากเซลล์และตัดช่องว่างหน้าและหลังออก
//     if (/^\d+$/.test(cellData)) { // ตรวจสอบว่าเป็นตัวเลขหรือไม่
//         if (cell === selectedDateCell) {
//             // ถ้าคลิกที่เซลล์วันที่เดียวกันอีกครั้งให้ยกเลิกการเลือก
//             cell.classList.remove('selected-date');
//             selectedDateCell = null;

//             // ยกเลิกการเลือกช่วงเวลาที่เลือกไว้ก่อนหน้านี้
//             if (selectedTimeSlot) {
//                 const selectedTimeSlotCell = document.querySelector(`.bordered-table th:contains('${selectedTimeSlot}')`);
//                 if (selectedTimeSlotCell) {
//                     selectedTimeSlotCell.classList.remove('selected');
//                     selectedTimeSlot = null;
//                 }
//             }

//             // ล้างค่าในช่อง "date"
//             document.getElementById('appointment_date').value = '';

//             // ยกเลิกค่าในช่อง "appointment_time_start" และ "appointment_time_end"
//             document.getElementById('appointment_time_start').value = '';
//             document.getElementById('appointment_time_end').value = '';
//         } else {
//             // ถอดเลือกเซลล์วันที่ก่อนหน้า (หากมี)
//             if (selectedDateCell) {
//                 selectedDateCell.classList.remove('selected-date');
//             }

//             // เลือกเซลล์วันที่ใหม่
//             selectedDateCell = cell;
//             selectedDateCell.classList.add('selected-date');

//             // อัพเดตค่าในช่อง "date" ให้เป็นวันที่ที่เลือก
//             const selectedYear = currentDate.getFullYear();
//             const selectedMonth = currentDate.getMonth() + 1;
//             const selectedDay = cell.textContent;
//             const formattedDate = `${selectedYear}-${selectedMonth.toString().padStart(2, '0')}-${selectedDay.toString().padStart(2, '0')}`;
//             document.getElementById('appointment_date').value = formattedDate;

//             // ยกเลิกค่าในช่อง "appointment_time_start" และ "appointment_time_end"
//             document.getElementById('appointment_time_start').value = '';
//             document.getElementById('appointment_time_end').value = '';
//         }
//     }
// }

// ฟังก์ชันเลือกเวลา
// function toggleSelected(cell) {
//     const selectedCells = document.querySelectorAll('.selected');
//     if (selectedCells.length === 0) {
//       cell.classList.add('selected');
//     } else {
//       selectedCells.forEach(selectedCell => {
//         selectedCell.classList.remove('selected');
//       });
//       cell.classList.add('selected');
//     }
// }
function toggleSelected(cell) {
  var selectedCells = document.querySelectorAll('.selected');
  if (selectedCells.length === 0) {
    cell.classList.add('selected');
    selectedTimeSlotCell = cell; // เก็บเซลล์ที่มีช่วงเวลาที่ถูกเลือก
  } else {
    selectedCells.forEach(function (selectedCell) {
      selectedCell.classList.remove('selected');
    });
    cell.classList.add('selected');
    selectedTimeSlotCell = cell; // เก็บเซลล์ที่มีช่วงเวลาที่ถูกเลือก
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

  // Clear the table
  tableBody.innerHTML = '';

  // รีเซ็ตสีในตารางที่สอง
  var selectedCells = document.querySelectorAll('.selected');
  selectedCells.forEach(function (selectedCell) {
    selectedCell.classList.remove('selected');
  });

  // รีเซ็ตค่าในช่อง appointment_time_start และ appointment_time_end
  document.getElementById('appointment_time_start').value = '';
  document.getElementById('appointment_time_end').value = '';

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
        var startTimeInput = document.getElementById('appointment_time_start');
        var endTimeInput = document.getElementById('appointment_time_end');
        var startTime = startTimeInput.value;
        var endTime = endTimeInput.value;
        cell.setAttribute('data-start-time', startTime);
        cell.setAttribute('data-end-time', endTime);
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