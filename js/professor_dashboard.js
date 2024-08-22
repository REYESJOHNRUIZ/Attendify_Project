let currentPage = "courses-page";

function showClasses() {
  currentPage = "classes-page";
  document.getElementById("courses-page").classList.remove("active");
  document.getElementById("classes-page").classList.add("active");
}

function showAttendance() {
  currentPage = "attendance-page";
  document.getElementById("classes-page").classList.remove("active");
  document.getElementById("attendance-page").classList.add("active");
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
