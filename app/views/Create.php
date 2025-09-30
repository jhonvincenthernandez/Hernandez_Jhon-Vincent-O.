<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <style>
    /* Default Light Mode */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f6f8;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      transition: background 0.3s, color 0.3s;
    }

    .container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
      width: 360px;
      text-align: center;
      transition: background 0.3s, color 0.3s;
    }

    h1 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #444;
    }

    label {
      display: block;
      margin: 10px 0 5px;
      font-weight: 600;
      text-align: left;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      margin-bottom: 15px;
      transition: border 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
      border: 1px solid #007bff;
    }

    input[type="submit"] {
      width: 100%;
      background: #007bff;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background 0.3s;
    }

    input[type="submit"]:hover {
      background: #0056b3;
    }

    .toggle-btn {
      text-align: right;
      margin-bottom: 15px;
    }

    .toggle-btn button {
      background: transparent;
      border: none;
      font-size: 20px;
      cursor: pointer;
      transition: transform 0.3s;
    }

    .toggle-btn button:hover {
      transform: rotate(20deg);
    }

    /* Dark Mode */
    body.dark {
      background: #121212;
      color: #eee;
    }

     body.dark .toggle-btn button {
      color: #eee;
    }

    body.dark h1{
         color: #eee;
    }

    body.dark .container {
      background: #1e1e1e;
      color: #eee;
    }

    body.dark input[type="text"],
    body.dark input[type="email"] {
      background: #2a2a2a;
      border: 1px solid #555;
      color: #eee;
    }

    body.dark input[type="submit"] {
      background: #0d6efd;
    }

    body.dark input[type="submit"]:hover {
      background: #0a58ca;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="toggle-btn">
      <button onclick="toggleTheme()">🌙 Toggle Dark Mode</button>
    </div>
    <h1>Create User</h1>
    <form action="<?=site_url('/crud/create'); ?>" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <input type="submit" value="Create">
    </form>
  </div>

  <script>
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

  </script>
</body>
</html>
