<?php
session_start(); //ini untuk memulai sesi

//disini dicek nilai user sdh diinisialisasikan atau tidak, intinya disini cek user sudah login atau belum
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); //kalau belum login user nanti diarahkan ke halaman login
    exit(); // sesi yang dimulai tadi dihentikan
}

$user = $_SESSION['user']; //kalau user sudah login nilai user yang diambil dari session dijadikan variabel $user


//ini data data usernya 
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

//disini dicek user yang login itu admin atau user biasa, kalau user biasa akan mengembalikan false, kalau admin akan mengembalikan true
$isAdmin = ($user['username'] === 'adminxxx');

//disini dicek kalau false(yg login user)
if (!$isAdmin) {
    $users = array_filter($users, function($u) use ($user) { //ini array filter, untuk memfilter ketika ingin mengambil data user yg login saja 
        return $u['username'] === $user['username']; //mengembalikan data user 
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            background-color: pink;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .dashboard-container {
            position: relative;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #52acba;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .logout {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #FFC0CB;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .logout:hover {
            background: #D9ABAB;
        }
    </style>
</head>
<body>
    <!-- <div class="overlay"></div> -->
    <div class="dashboard-container">
        <!-- disini diambil name user dari data mengamankan output teks dari kemungkinan serangan XSS  -->
        <h1>Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
    

<!-- disini di cek kalau user yang login itu usernamenya bukan admin, maka akan dimunculkan dashboard untuk tampilan user biasa -->
<?php if ($user['username']!= 'adminxxx'):?>

        <table>
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
                <tr>
                    <!-- Menampilkan data2 user dalam bentuk tabel -->
                    <td><?= htmlspecialchars($user['name']) ?></td> 
                    <td><?= htmlspecialchars($user['email']) ?></td>                        
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td><?= htmlspecialchars($user['gender']) ?></td>
                    <td><?= htmlspecialchars($user['faculty'])  ?></td>
                    <td><?= htmlspecialchars($user['batch']) ?></td>
                </tr>
            </tbody>
        </table>
        <!-- else if untuk dicek user yang login itu username nya adminxxx atau bukan,kalau iyaa ditampilkan tampilan admin -->
        <?php elseif ($user['username'] == 'adminxxx'): ?>
            <h5>Email: <?= htmlspecialchars($user['email'])?></h5> 
            <h5>Username: <?= htmlspecialchars($user['username'])?></h5>
            <table>
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
                    <?php foreach ($users as $u): ?>
                        <?php if ($u['username'] != 'adminxxx'): ?> 
                            <tr>
                                <td><?= htmlspecialchars($u['name']) ?></td>
                                <td><?= htmlspecialchars($u['email']) ?></td>
                                <td><?= htmlspecialchars($u['username']) ?></td>
                                <td><?= htmlspecialchars($u['gender']) ?></td>
                                <td><?= htmlspecialchars($u['faculty']) ?></td>
                                <td><?= htmlspecialchars($u['batch']) ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif;?>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>