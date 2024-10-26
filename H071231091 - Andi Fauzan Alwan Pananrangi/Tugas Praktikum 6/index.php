<?php
session_start();

$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => 'admin123',
    ],
    [
        'email' => 'nanda@gmail.com',
        'username' => 'nanda_aja',
        'name' => 'Wd. Ananda Lesmono',
        'password' => 'nanda123',
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
    ],
    [
        'email' => 'arif@gmail.com',
        'username' => 'arif_nich',
        'name' => 'Muhammad Arief',
        'password' => 'arief123',
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2021',
    ],
    [
        'email' => 'eka@gmail.com',
        'username' => 'eka59',
        'name' => 'Eka Hanny',
        'password' => 'eka123',
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021',
    ],
    [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'name' => 'Adnan',
        'password' => 'adnan123',
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
    ],
    [
        'email' => 'alwan@gmail.com',
        'username' => 'alwan72',
        'name' => 'Alwan',
        'password' => 'alwan123',
        'gender' => 'Male',
        'faculty' => 'farmasi',
        'batch' => '2019',
    ],
];

if (isset($_POST['login'])) {
    $input = $_POST['username_email'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if (($user['email'] === $input || $user['username'] === $input) && $password === $user['password']) {
            $_SESSION['user'] = $user;
            $_SESSION['all_users'] = $users;
            header('Location: index.php');
            exit;
        }
    }
    $error = "Username/email or password is incorrect.";
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['user'])):
?>


<!-- Halaman Login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <form action="index.php" method="POST"> 
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="input-box">
            <input type="text" name="username_email" placeholder="Username or Email" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required> 
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> Remember Me</label>
            <a href="#">Forgot Password</a>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <div class="register-link">
            <p>Don't have an account? <a href="#">Register</a></p>
        </div>
    </form>
</div>
</body>
</html>

<?php else: ?>

<!-- Dashboard -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Dashboard Admin -->
<?php if ($_SESSION['user']['username'] === 'adminxxx'): ?>
<div class="admin-wrapper">
    <h1>selamat datang , <?php echo $_SESSION['user']['name']; ?></h1>
    <p><strong>Email:</strong> <?php echo $_SESSION['user']['email']; ?></p>
    <p><strong>Username:</strong> <?php echo $_SESSION['user']['username']; ?></p>

    <h2>All Users</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Faculty</th>
            <th>Batch</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($_SESSION['all_users'] as $u): ?>
            <?php if ($u['username'] !== 'adminxxx'): ?>
            <tr>
                <td><?php echo $u['name']; ?></td>
                <td><?php echo $u['email']; ?></td>
                <td><?php echo $u['username']; ?></td>
                <td><?php echo $u['gender'] ?? '-'; ?></td>
                <td><?php echo $u['faculty'] ?? '-'; ?></td>
                <td><?php echo $u['batch'] ?? '-'; ?></td>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form action="index.php" method="POST">
        <button type="submit" name="logout" class="btn">Logout</button>
    </form>
</div>

<!-- Dashboard User -->
<?php else: ?>
<div class="user-wrapper">

    <div class="right-side">
        <h1>Hello & Welcome</h1>
        <p class="highlight">I'm <?php echo $_SESSION['user']['name']; ?></p>
        <br>
        <div class="user-info">
            <div class="user-info-label">Gender</div>
            <div class="user-info-colon">:</div>
            <div class="user-info-value"><?php echo $_SESSION['user']['gender']; ?></div>
        </div>

        <div class="user-info">
            <div class="user-info-label">Faculty</div>
            <div class="user-info-colon">:</div>
            <div class="user-info-value"><?php echo $_SESSION['user']['faculty']; ?></div>
        </div>

        <div class="user-info">
            <div class="user-info-label">Batch</div>
            <div class="user-info-colon">:</div>
            <div class="user-info-value"><?php echo $_SESSION['user']['batch']; ?></div>
        </div>

        <div class="user-info">
            <div class="user-info-label">Email</div>
            <div class="user-info-colon">:</div>
            <div class="user-info-value"><?php echo $_SESSION['user']['email']; ?></div>
        </div>

        <form action="index.php" method="POST" class="logout-form">
            <button type="submit" name="logout" class="btn">Logout</button>
        </form>
    </div>
</div>

<?php endif; ?>

<?php endif; ?>

</body>
</html>