<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: #f4f6f8;
        color: #333;
        transition: background 0.3s, color 0.3s;
    }

    body.dark {
        background: #1e1e2f;
        color: #f4f6f8;
    }

    .container {
        max-width: 400px;
        margin: 60px auto;
        padding: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        transition: background 0.3s, color 0.3s;
    }

    body.dark .container {
        background: #2b2b3c;
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        transition: border 0.3s, background 0.3s;
    }

    body.dark input {
        background: #3a3a4d;
        border: 1px solid #555;
        color: #f4f4f4;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        border: none;
        border-radius: 8px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    .extra-links {
        text-align: center;
        margin-top: 15px;
        font-size: 14px;
    }

    .extra-links a {
        color: #007bff;
        text-decoration: none;
        margin: 0 5px;
    }

    .extra-links a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<div class="container">

    <h1>Login</h1>


    <form method="POST" action="<?= site_url('auth/login'); ?>" id="loginForm">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required placeholder="Enter password">
        </div>
        <button type="submit">Login</button>
    </form>

    <div class="extra-links">
        <p>Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a></p>
    </div>
</div>

<script>

</script>
</body>
</html>
