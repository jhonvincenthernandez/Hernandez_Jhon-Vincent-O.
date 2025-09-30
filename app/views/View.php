<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="icon"  href="<?=base_url().'public/icon.png';?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url().'public/style.css';?>"/>
	  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
  <div class="container mt-3 ">
    
   <!-- 🔹 Header with Username + Logout -->
    <div class="d-flex justify-content-between align-items-center mb-3 p-3 border rounded bg-light">
        <div>
            <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger btn-sm">Logout</a>
        </div>
         
        <div class="toggle-btn">
                <button onclick="toggleTheme()">🌙 Toggle Dark Mode</button>
            </div>
    </div>
    <!-- 🔹 End Header -->
     
    
        <div class="container">

          <form action="<?=site_url('View');?>" method="get" class="col-sm-4 float-end d-flex">
            <?php
            $q = '';
            if(isset($_GET['q'])) {
              $q = $_GET['q'];
            }
            ?>
            <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
            <button type="submit" class="btn btn-primary" type="button">Search</button>
          </form>
            <h1>User List</h1>
           
            <a href="<?=site_url('crud/create'); ?>">+ Add User</a>
          
            <table id="userTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach (html_escape($all) as $row): ?>
                      <tr>
                        <td><?=($row['name']); ?></td>
                        <td><?=($row['email']); ?></td>
                        <td>
                          <a href="<?=site_url('crud/update/'.$row['id']); ?>" onclick="return confirm('Are you sure you want to update this user?')">Edit</a>
                          <a href="<?=site_url('crud/delete/'.$row['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                <?php
                echo $page;
                ?>
        </div>
    </div>
    <!-- 🔹 FOOTER  -->
    <footer>

       <a href="https://github.com/jhonvincenthernandez/Hernandez_JhonVincent" target="_blank">@copyright_Hernandez => You can download this in my Repository 😊</a>
    </footer>
    <!-- 🔹 End FOOTER -->

        <script src="<?=base_url().'public/script.js';?>"></script>
</body>
</html>
