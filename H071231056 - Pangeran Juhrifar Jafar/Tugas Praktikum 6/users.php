<?php
// Koneksi ke database
$host = "localhost";    
$user = "root";         
$pass = "";             
$dbname = "users";  

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Array data users
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
   ]
];

// Masukkan data ke database
foreach ($users as $user) {
    $email = $user['email'];
    $username = $user['username'];
    $name = $user['name'];
    $password = $user['password'];
    $gender = isset($user['gender']) ? $user['gender'] : null;
    $faculty = isset($user['faculty']) ? $user['faculty'] : null;
    $batch = isset($user['batch']) ? $user['batch'] : null;

    $sql = "INSERT INTO users (email, username, name, password, gender, faculty, batch) 
            VALUES ('$email', '$username', '$name', '$password', '$gender', '$faculty', '$batch')";

    if ($conn->query($sql) === TRUE) {
        echo "User $username berhasil disimpan.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
