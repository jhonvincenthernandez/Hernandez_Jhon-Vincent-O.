<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard (Read-Only)</title>
  <link rel="icon" href="<?=base_url().'public/icon.png';?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url().'public/style.css';?>"/>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(270deg, #0f0c29, #302b63, #24243e);
      background-size: 400% 400%;
      animation: aurora 25s ease infinite;
      color: #fff;
      overflow-x: hidden;
    }
    @keyframes aurora {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    #particles-js { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
    .card-glass {
      background: rgba(255,255,255,0.08);
      border-radius: 16px;
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255,255,255,0.2);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-glass:hover {
      transform: translateY(-5px);
      box-shadow: 0 0 25px rgba(0,255,255,0.6);
    }
    @keyframes pulseGlow {
      0% { box-shadow: 0 0 10px rgba(0,255,255,0.6), 0 0 20px rgba(0,255,255,0.3); }
      50% { box-shadow: 0 0 30px rgba(0,255,255,1), 0 0 60px rgba(0,128,255,0.7); }
      100% { box-shadow: 0 0 10px rgba(0,255,255,0.6), 0 0 20px rgba(0,255,255,0.3); }
    }
    .pulse-card { animation: pulseGlow 3s infinite ease-in-out;}
    .pulse-btn { animation: pulseGlow 3s infinite ease-in-out; border-radius: 30px; font-weight: bold; transition: transform 0.3s; }
    .pulse-btn:hover { transform: scale(1.08); }
    .summary-card { text-align: center; border-radius: 16px; font-size: 1.3rem; font-weight: bold; max-width: 320px; margin: 0 auto; }
    .summary-card i { font-size: 3rem; margin-bottom: 10px; }
    .table-card { border-radius: 16px; overflow: hidden; }
    .table thead { background: rgba(0,255,255,0.2); }
    .table tbody tr:hover { background: rgba(0,255,255,0.1); }
    footer { margin-top: 40px; padding: 15px; text-align: center; font-size: 14px; color: #aaa; }
    footer a { color: cyan; text-decoration: none; }
    .search-input { border-radius: 12px; border: 1px solid cyan; padding-left: 10px; }
    .container { text-align:center; }
    .a:hover { color: cyan; }
    .btn-danger.pulse-btn {
      animation: pulseGlow 3s infinite ease-in-out;
      border-radius: 30px;
      font-weight: bold;
      transition: transform 0.3s;
    }
    .btn-danger.pulse-btn:hover {
      transform: scale(1.08);
      box-shadow: 0 0 20px rgba(255,0,0,0.8), 0 0 40px rgba(255,0,0,0.6);
    }
  </style>
</head>
<body>
<div id="particles-js"></div>

<div class="container py-4">

  <!-- 🔹 Logout Button -->
  <div class="d-flex justify-content-end mb-3">
    <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger pulse-btn">
      <i class="fas fa-sign-out-alt"></i> Logout
    </a>
  </div>

  <!-- 🔹 Total Users Card -->
  <div id="totaluser_padding" class="pulse-card card-glass summary-card mb-5">
    <i class="fas fa-users"></i>
    <div>Total Users</div>
    <div class="fs-2"><?= count($all); ?></div>
  </div>

  <!-- 🔹 Search -->
  <div class="mb-4 d-flex justify-content-center">
    <form action="<?=site_url('View');?>" method="get" class="d-flex w-50">
      <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
      <input class="form-control me-2 search-input" name="q" type="text" placeholder="Search user..." value="<?=html_escape($q);?>">
      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <!-- 🔹 User Table (Read-Only) -->
  <div class="card-glass table-card p-3">
    <table class="table table-dark table-hover mb-0">
      <thead>
        <tr>
          <th><i class="fas fa-user"></i> Name</th>
          <th><i class="fas fa-envelope"></i> Email</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all as $row): ?>
        <tr>
          <td><?=($row['name']); ?></td>
          <td><?=($row['email']); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?= $page; ?>

  <a class="a" href="https://github.com/jhonvincenthernandez/Hernandez_Jhon-Vincent-O." target="_blank">
    © Hernandez — View only version 😊
  </a>
</div>

<script>
  alert("👋 Welcome to your User Dashboard — Read-Only Mode!");

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

  // 🎥 GSAP Animations
  gsap.from(".summary-card", { y: 30, opacity: 0, duration: 1 });
  gsap.from(".table-card", { scale: 0.95, opacity: 0, duration: 1, delay: 0.8 });
</script>
</body>
</html>
