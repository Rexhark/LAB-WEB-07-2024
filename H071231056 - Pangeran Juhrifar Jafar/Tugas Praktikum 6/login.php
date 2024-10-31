<?php
session_start();
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
   ] ];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi login
    foreach ($users as $user) {
        if (($user['email'] === $email or $user['username'] === $email) && password_verify($password, $user['password'])) {
            
            $_SESSION['user'] = $user;
            header('Location: dashboard.php'); 
            exit;
        }
    }

    $error = "Email atau password salah.";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Error</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Login Error</h1>
        <p class="text-danger text-center"><?php if (isset($error)) echo $error; ?></p>
        <a href="index.php" class="btn btn-primary d-block mx-auto">Kembali ke Login</a>
    </div>
</body>
</html>