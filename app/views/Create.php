<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create User</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- GSAP & Particles.js -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<style>
/* 🌌 Aurora Gradient Background */
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(270deg, #0f0c29, #302b63, #24243e);
    background-size: 400% 400%;
    animation: aurora 25s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    color: #fff;
    overflow-x: hidden;
}
@keyframes aurora {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* 🔹 Particles Background */
#particles-js {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: -1;
}

/* 🔹 Glassmorphism Card */
.container {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border-radius: 20px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 0 30px rgba(0,255,255,0.2);
    text-align: center;
    color: #fff;
    position: relative;
}

/* Neon Glow Animation */
@keyframes neonGlow {
    0%, 100% { text-shadow: 0 0 5px #00ffff, 0 0 10px #00ffff, 0 0 20px #00ffff; }
    50% { text-shadow: 0 0 15px #00ffff, 0 0 30px #00ffff, 0 0 50px #00ffff; }
}

/* Title */
h1 {
    font-size: 28px;
    margin-bottom: 25px;
    color: #fff;
    animation: neonGlow 3s infinite ease-in-out;
}

/* Form Fields */
.form-group {
    margin-bottom: 20px;
    position: relative;
}
label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    font-size: 14px;
    color: #00ffff;
}
.form-group i {
    position: absolute;
    top: 38px;
    left: 12px;
    color: #00ffff;
}
input {
    width: 90%;
    padding: 12px 12px 12px 12px;
    border: none;
    border-radius: 12px;
    font-size: 14px;
    outline: none;
    background: rgba(255,255,255,0.1);
    color: #fff;
    transition: 0.3s;
}
input:focus {
    border: 2px solid #00ffff;
    box-shadow: 0 0 15px #00ffff;
}

/* Button */
button {
    width: 90%;
    padding: 12px;
    border: none;
    border-radius: 30px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    color: #fff;
    background: linear-gradient(135deg, #0ff, #0aa);
    box-shadow: 0 0 10px #0ff, 0 0 20px #0ff, 0 0 30px #0aa;
    transition: 0.3s;
    animation: pulseGlow 3s infinite ease-in-out;
}
button:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 20px #0ff, 0 0 40px #0ff, 0 0 60px #0aa;
}

/* Neon Pulse Keyframes */
@keyframes pulseGlow {
    0% { box-shadow: 0 0 10px #0ff, 0 0 20px #0ff; }
    50% { box-shadow: 0 0 20px #0ff, 0 0 40px #0ff; }
    100% { box-shadow: 0 0 10px #0ff, 0 0 20px #0ff; }
}

/* Back Button */
.back-btn {
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:6px 10px;
    border-radius:10px;
    color: #00ffff;
    background: rgba(255,255,255,0.08);
    text-decoration: none;
    font-weight:600;
    font-size:14px;
    border: none;
    cursor: pointer;
    transition: transform .18s ease;
    margin-bottom: 20px;
}
.back-btn i { transform: translateY(1px); }
.back-btn:hover { transform: translateY(-4px); }
</style>
</head>
<body>
<div id="particles-js"></div>

<div class="container">
    <a href="<?= site_url('View'); ?>" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>

    <h1><i class="fas fa-user-plus"></i> Create User</h1>

    <form action="<?= site_url('/crud/create'); ?>" method="POST" autocomplete="off" novalidate>
        <i class="fas fa-user"></i>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Full name" required>
        </div>

        <i class="fas fa-envelope"></i>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
        </div>

        <br>
        <br>

        <button type="submit"><i class="fas fa-paper-plane"></i> Create</button>
    </form>
</div>

<script>
// 🌌 Particles.js
particlesJS("particles-js", {
    particles: { 
      number: { value: 80, density: { enable: true, value_area: 800 }},
      color: { value: "#00ffff" },
      shape: { type: "circle" },
      opacity: { value: 0.5 },
      size: { value: 3, random: true },
      move: { enable: true, speed: 2 }
    }
});

// GSAP Animation
gsap.from("h1", { y: -50, opacity: 0, duration: 1 });
gsap.from(".container", { y: 30, opacity: 0, duration: 1, delay: 0.3 });
</script>
</body>
</html>
