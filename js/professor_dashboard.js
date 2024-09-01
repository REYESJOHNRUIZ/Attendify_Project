// professor_dashboard.js

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

          classesContainer.innerHTML = ''; // Clear previous classes

          data.forEach(cls => {
              const classDiv = document.createElement('div');
              classDiv.className = 'class';
              classDiv.innerHTML = `
                  <div onclick="showAttendance('${cls.class_no}')">${cls.class_no}</div>
              `;
              classesContainer.appendChild(classDiv);
          });

          showPage('classes-page');
      })
      .catch(error => console.error('Error fetching classes:', error));
}

function showAttendance(classNo) {
  fetch(`../php/get_attendance_data.php?class_no=${classNo}&date=2024-09-01`)
      .then(response => response.json())
      .then(data => {
          const attendancePage = document.getElementById('attendance-page');
          const attendanceTbody = attendancePage.querySelector('#attendance-tbody');
          
          if (!attendanceTbody) {
              console.error('Error: attendance-tbody element not found.');
              return;
          }

          attendanceTbody.innerHTML = ''; // Clear any previous data

          data.forEach(record => {
              const row = document.createElement('tr');

              row.innerHTML = `
                  <td>${record.student_no}</td>
                  <td>${record.last_name}</td>
                  <td>${record.first_name}</td>
                  <td class="attendance-status">${record.status}</td>
              `;

              attendanceTbody.appendChild(row);
          });

          showPage('attendance-page');
      })
      .catch(error => console.error('Error fetching attendance:', error));
}

function showPage(pageId) {
  const pages = document.querySelectorAll('.page');
  pages.forEach(page => {
      page.classList.remove('active');
  });
  document.getElementById(pageId).classList.add('active');
}
