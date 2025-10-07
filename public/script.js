alert("👋 Welcome to HERNANDEZ CRUD project! Enjoy your stay 😊");

const toggleBtn = document.querySelector(".toggle-btn button");

// Function to toggle dark mode and swap icon
function toggleTheme() {
  document.body.classList.toggle("dark");

  // Swap icon based on current theme
  if (document.body.classList.contains("dark")) {
    toggleBtn.textContent = "☀️ Toggle Light Mode";
    localStorage.setItem("theme", "dark");
  } else {
    toggleBtn.textContent = "🌙 Toggle Dark Mode";
    localStorage.setItem("theme", "light");
  }
}

// Auto-apply saved theme and icon on page load
if (localStorage.getItem("theme") === "dark") {
  document.body.classList.add("dark");
  toggleBtn.textContent = "☀️ Toggle Dark Mode";
} else {
  toggleBtn.textContent = "🌙 Toggle Dark Mode";
}
