<?php
session_start();

$users = [
    [
       'email' => 'admin@gmail.com',
       'username' => 'adminxxx',
       'name' => 'Admin',
       'password' => password_hash('admin123', PASSWORD_DEFAULT),
       'gender' => 'N/A', 
       'faculty' => 'N/A', 
       'batch' => 'N/A', 
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

// Cek session pengguna
if (!isset($_SESSION['user'])) {
    header('Location: index.php'); 
    exit;
}

$currentUser = $_SESSION['user'];
$isAdmin = ($currentUser['username'] === 'adminxxx'); 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4 class='mb-4'>Dashboard <?php if($isAdmin):?> Admin <?php endif;?> <?php if(!$isAdmin):?> User <?php endif;?></h4>
        <h2 class="text-center">Welcome, <?php echo htmlspecialchars($currentUser['name']); ?>!</h2>
 
        <?php if ($isAdmin): ?>
            <p>Email: <?php echo htmlspecialchars($currentUser['email']); ?></p>
            <p>Username: <?php echo htmlspecialchars($currentUser['username']); ?></p>
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <br>
            <h4 class='mt-5'>All Users : </h4>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Faculty</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                        if ($user['username'] !== 'adminxxx') {
                            echo "<tr>
                                    <td>" . htmlspecialchars($user['name']) . "</td>
                                    <td>" . htmlspecialchars($user['username']) . "</td>
                                    <td>" . htmlspecialchars($user['email']) . "</td>
                                    <td>" . htmlspecialchars($user['gender'] ?? 'N/A') . "</td>
                                    <td>" . htmlspecialchars($user['faculty'] ?? 'N/A') . "</td>
                                    <td>" . htmlspecialchars($user['batch'] ?? 'N/A') . "</td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <!-- tambah user -->
            <a href="add_user.php" class="btn btn-primary">Add User</a>
        <?php else: ?>
            <div class='mt-4'>
                <p><strong>Email: </strong> <?php echo htmlspecialchars($currentUser['email']); ?></p>
                <p><strong>Username: </strong> <?php echo htmlspecialchars($currentUser['username']); ?></p>
                <p><strong>Name: </strong> <?php echo htmlspecialchars($currentUser['name']); ?></p>
                <p><strong>Gender: </strong> <?php echo htmlspecialchars($currentUser['gender'] ?? 'N/A')?></p>
                <p><strong>Faculty: </strong> <?php echo htmlspecialchars($currentUser['faculty'] ?? 'N/A')?></p>
                <p><strong>Batch: </strong> <?php echo htmlspecialchars($currentUser['batch'] ?? 'N/A')?></p>
            </div>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php endif; ?>
    </div>
</body>
</html>
