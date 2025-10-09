<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | Access Required</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- GSAP & Particles.js -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<style>
/* 🌌 Aurora Background Animation */
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: linear-gradient(270deg, #0f0c29, #302b63, #24243e);
    background-size: 400% 400%;
    animation: aurora 20s ease infinite;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    color: #fff;
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

/* 🌟 Glassmorphism Card */
.container {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 20px;
    box-shadow: 0 0 30px rgba(0,255,255,0.25);
    padding: 40px 30px;
    width: 100%;
    max-width: 420px;
    text-align: center;
    color: #fff;
    position: relative;
}

/* ✨ Neon Title */
h1 {
    font-size: 28px;
    margin-bottom: 25px;
    color: #00ffff;
    text-shadow: 0 0 10px #00ffff, 0 0 30px #00ffff;
    letter-spacing: 1px;
    animation: pulseText 3s infinite ease-in-out;
}
@keyframes pulseText {
    0%, 100% { text-shadow: 0 0 15px #00ffff, 0 0 25px #00ffff; }
    50% { text-shadow: 0 0 30px #00ffff, 0 0 60px #00ffff; }
}

/* 📋 Form */
.form-group {
    text-align: left;
    margin-bottom: 20px;
    position: relative;
}
label {
    font-size: 14px;
    font-weight: bold;
    color: #00ffff;
    display: block;
    margin-bottom: 6px;
}
input, select {
    width: 100%;
    padding: 12px 15px;
    border: none;
    border-radius: 12px;
    background: rgba(255,255,255,0.1);
    color: #fff;
    outline: none;
    transition: 0.3s;
}
input:focus, select:focus {
    border: 2px solid #00ffff;
    box-shadow: 0 0 15px #00ffff;
}

/* 💫 Register Button */
button {
    width: 100%;
    padding: 12px;
    margin-top: 10px;
    background: linear-gradient(135deg, #00ffff, #0088ff);
    border: none;
    border-radius: 30px;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
    animation: pulseGlow 3s infinite ease-in-out;
}
button:hover {
    transform: translateY(-3px);
    box-shadow: 0 0 20px #00ffff, 0 0 50px #00ffff;
}
@keyframes pulseGlow {
    0% { box-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff; }
    50% { box-shadow: 0 0 30px #00ffff, 0 0 60px #00ffff; }
    100% { box-shadow: 0 0 10px #00ffff, 0 0 20px #00ffff; }
}

/* ⚠️ Access Message */
.warning {
    background: rgba(255, 0, 0, 0.2);
    border: 1px solid rgba(255,0,0,0.4);
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 20px;
    color: #ff6666;
    font-weight: bold;
    font-size: 14px;
}

/* 🔗 Footer */
.extra-links {
    margin-top: 15px;
    font-size: 14px;
}
.extra-links a {
    color: #00ffff;
    text-decoration: none;
    font-weight: bold;
}
.extra-links a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<div id="particles-js"></div>

<div class="container">
    <div class="warning">
        ⚠️ Sorry, you are not an admin.<br>
        Register as an <b>Admin</b> to access the full dashboard.
    </div>

    <h1><i class="fas fa-user-plus"></i> Register Account</h1>

    <form action="<?= site_url('auth/register'); ?>" method="post">
        <div class="form-group">
            <label><i class="fas fa-user"></i> Username</label>
            <input type="text" name="username" placeholder="Enter username" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <div class="form-group">
            <label><i class="fas fa-users-cog"></i> Role</label>
            <select name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button type="submit"><i class="fas fa-paper-plane"></i> Register</button>
    </form>

    <div class="extra-links">
        Already have an account? <a href="<?= site_url('auth/login'); ?>">Login here</a>
    </div>
</div>

<script>
// 🌌 Particles Effect
particlesJS("particles-js", {
    particles: { 
        number: { value: 70, density: { enable: true, value_area: 800 }},
        color: { value: "#00ffff" },
        shape: { type: "circle" },
        opacity: { value: 0.4 },
        size: { value: 3, random: true },
        move: { enable: true, speed: 2 }
    }
});

// 🎬 GSAP Entry Animations
gsap.from(".container", { y: 40, opacity: 0, duration: 1 });
gsap.from(".warning", { opacity: 0, scale: 0.9, duration: 1, delay: 0.3 });
gsap.from("h1", { opacity: 0, y: -30, duration: 1, delay: 0.5 });
gsap.from("form", { opacity: 0, y: 20, duration: 1, delay: 0.8 });
</script>
</body>
</html>
