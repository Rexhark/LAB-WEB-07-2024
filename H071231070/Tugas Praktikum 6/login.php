<?php
session_start(); //memulai sesi

//disini dicek nilai user sdh diinisialisasikan atau tidak, intinya disini cek user sudah login atau belum
if (isset($_SESSION['user'])) { 
    header('Location: dashboard.php');
    exit();
} 

$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'nanda@gmail.com',
        'username' => 'nanda_aja',
        'name' => 'Wd. Ananda Lesmono',
        'password' => password_hash('nanda123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
    ],
    [
        'email' => 'arif@gmail.com',
        'username' => 'arif_nich',
        'name' => 'Muhammad Arief',
        'password' => password_hash('arief123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2021',
    ],
    [
        'email' => 'eka@gmail.com',
        'username' => 'eka59',
        'name' => 'Eka Hanny',
        'password' => password_hash('eka123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021',
    ],
    [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'name' => 'Adnan',
        'password' => password_hash('adnan123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
    ], 
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    //diambil data email/username dan passwordnya untuk dijadikan variabel
    $input_email_or_username = $_POST['email_or_username'];
    $input_password = $_POST['password'];

    //dipakekan foreach untuk cek datanya satu per satu
    foreach ($users as $user) {
        if (
            ($user['email'] === $input_email_or_username || $user['username'] === $input_email_or_username) &&
            password_verify($input_password, $user['password']) //dicek kalau misalnya email dan username dan passwordnya ada di dalam data
        ) {
            //  variabel $user diinisialisasikan menjadi session['user'], supaya data user bisa dipake di dashboard
            $_SESSION['user'] = $user;
            header('Location: dashboard.php');//kalau sudah, user diarahkan ke dashboard
            exit();
        }
    }
    $error = 'Invalid login credentials';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: url('pink.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .login-container {
            position: relative;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #218838;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        .login-container a {
            color: #007bff;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-container" style="background-color: pink;">
        <h1>Login</h1>
        <!-- dicek, ada pesan error atau tidak, kalau ada akan ditampilkan pesab erornya -->
        <?php if ($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST" style="background-color: pink;">
            <label>Email or Username</label>
            <input type="text" name="email_or_username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit" style="background-color: #52acba;">Login</button>

            <p>don't have an account? regist <a href="">here</a>.</p>
        </form>
    </div>
</body>
</html>