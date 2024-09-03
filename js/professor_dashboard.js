let classNo = '';
let courseCode = '';

document.addEventListener('DOMContentLoaded', () => {
    const datePicker = document.getElementById('attendance-date-picker');
    const today = new Date().toISOString().split('T')[0];
    datePicker.value = today;

    datePicker.addEventListener('change', () => {
        const date = datePicker.value;
        if (classNo && courseCode) {
            showAttendance(classNo, courseCode, date);
        } else {
            console.error('classNo or courseCode is not defined.');
        }
    });
});

function showClasses(courseCode) {
    fetch(`../php/get_classes.php?course_code=${courseCode}`)
        .then(response => response.json())
        .then(data => {
            const classesPage = document.getElementById('classes-page');
            const classesContainer = classesPage.querySelector('.classes');

            if (data.error) {
                console.error('Error fetching classes:', data.error);
                return;
            }

            classesContainer.innerHTML = '';

            data.forEach(cls => {
                const classDiv = document.createElement('div');
                classDiv.className = 'class';
                classDiv.innerHTML = `
                    <div onclick="selectClass('${cls.class_no}', '${courseCode}')">${cls.class_no}</div>
                `;
                classesContainer.appendChild(classDiv);
            });

            showPage('classes-page');
        })
        .catch(error => console.error('Error fetching classes:', error));
}

function selectClass(selectedClassNo, selectedCourseCode) {
    classNo = selectedClassNo;
    courseCode = selectedCourseCode;
    const date = document.getElementById('attendance-date-picker').value;
    showAttendance(classNo, courseCode, date);
}

function showAttendance(classNo, courseCode, date) {
  fetch(`../php/get_attendance_data.php?class_no=${classNo}&date=${date}`)
      .then(response => response.json())
      .then(data => {
          const attendancePage = document.getElementById('attendance-page');
          const attendanceTbody = attendancePage.querySelector('#attendance-tbody');
          const classHeader = document.getElementById('class-header');

          classHeader.innerText = `${courseCode} ${classNo}`;

          if (!attendanceTbody) {
              console.error('Error: attendance-tbody element not found.');
              return;
          }

          // Remove duplicates from the fetched data
          const uniqueStudents = Array.from(new Set(data.map(s => s.student_no)))
              .map(student_no => {
                  return data.find(s => s.student_no === student_no);
              });

          attendanceTbody.innerHTML = '';

          uniqueStudents.forEach(record => {
              const row = document.createElement('tr');

              row.innerHTML = `
                  <td>${record.student_no}</td>
                  <td>${record.last_name}</td>
                  <td>${record.first_name}</td>
                  <td class="attendance-status">
                      <input type="radio" name="status-${record.student_no}" value="Present" ${record.status === 'Present' ? 'checked' : ''}>
                  </td>
                  <td class="attendance-status">
                      <input type="radio" name="status-${record.student_no}" value="Absent" ${record.status === 'Absent' ? 'checked' : ''}>
                  </td>
                  <td class="attendance-status">
                      <input type="radio" name="status-${record.student_no}" value="Excused" ${record.status === 'Excused' ? 'checked' : ''}>
                  </td>
              `;

              attendanceTbody.appendChild(row);
          });

          showPage('attendance-page');
      })
      .catch(error => console.error('Error fetching attendance:', error));
}


function updateAttendanceDate() {
    const datePicker = document.getElementById('attendance-date-picker');
    const selectedDate = datePicker.value;
    
    if (classNo && courseCode) {
        showAttendance(classNo, courseCode, selectedDate);
    } else {
        console.error('classNo or courseCode is not defined.');
    }
}

function saveAttendance() {
  const attendanceData = [];
  const rows = document.querySelectorAll('#attendance-tbody tr');

  rows.forEach(row => {
      const studentNo = row.querySelector('td:nth-child(1)').innerText;
      const status = row.querySelector('input[name="status-' + studentNo + '"]:checked')?.value || '';

      attendanceData.push({
          student_no: studentNo,
          status: status
      });
  });

  const date = document.getElementById('attendance-date-picker').value;
  const classNo = document.getElementById('class-header').innerText.split(' ')[1];

  fetch('../php/save_attendance.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify({
          class_no: classNo,
          date: date,
          attendance: attendanceData
      })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          alert('Attendance saved successfully.');
      } else {
          alert('Failed to save attendance.');
      }
  })
  .catch(error => console.error('Error saving attendance:', error));
}

function showPage(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(page => {
        page.classList.remove('active');
    });
    document.getElementById(pageId).classList.add('active');
}

function goBack() {
    const currentActivePage = document.querySelector('.page.active');
    
    if (currentActivePage.id === 'attendance-page') {
        showPage('classes-page');
    } else if (currentActivePage.id === 'classes-page') {
        showPage('courses-page');
    } else {
        console.error('No previous page to navigate to.');
    }
}
