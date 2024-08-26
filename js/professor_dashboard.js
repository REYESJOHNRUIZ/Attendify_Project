let currentPage = "courses-page";

function showClasses(classNo) {
  currentPage = "classes-page";
  document.getElementById("courses-page").classList.remove("active");
  document.getElementById("classes-page").classList.add("active");
  
}

function showAttendance(classNo) {
  currentPage = "attendance-page";
  document.getElementById("classes-page").classList.remove("active");
  document.getElementById("attendance-page").classList.add("active");

  const date = new Date().toISOString().split('T')[0]; 
  fetch(`../php/get_attendance.php?class_no=${classNo}&date=${date}`)
    .then(response => response.json())
    .then(data => {
      const tbody = document.getElementById("attendance-tbody");
      tbody.innerHTML = "";
      if (data.message) {
        tbody.innerHTML = `<tr><td colspan="6">${data.message}</td></tr>`;
      } else {
        data.forEach(student => {
          tbody.innerHTML += `
            <tr>
              <td>${student.student_no}</td>
              <td>${student.last_name}</td>
              <td>${student.first_name}</td>
              <td><span class="present" onclick="markAttendance(this, 'present')"></span></td>
              <td><span class="absent" onclick="markAttendance(this, 'absent')"></span></td>
              <td><span class="excused" onclick="markAttendance(this, 'excused')"></span></td>
            </tr>
          `;
        });
      }
    })
    .catch(error => console.error('Error fetching attendance:', error));
}


function goBack() {
  if (currentPage === "attendance-page") {
    document.getElementById("attendance-page").classList.remove("active");
    document.getElementById("classes-page").classList.add("active");
    currentPage = "classes-page";
  } else if (currentPage === "classes-page") {
    document.getElementById("classes-page").classList.remove("active");
    document.getElementById("courses-page").classList.add("active");
    currentPage = "courses-page";
  }
}

function markAttendance(element, type) {
  element.classList.toggle("active");
  const siblings = element.parentElement.children;
  for (let i = 0; i < siblings.length; i++) {
    if (siblings[i] !== element) {
      siblings[i].classList.remove("active");
    }
  }
}
