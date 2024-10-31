<?php
    // Koneksi ke database
    include 'users.php';

    // Ambil data dari form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $faculty = $_POST['faculty'];
    $batch = $_POST['batch'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Query untuk memasukkan data ke tabel `users`
    $sql = "INSERT INTO users (name, username, email, jenis_kelamin, faculty, batch, password) 
            VALUES ('$name', '$username', '$email', '$jenis_kelamin', '$faculty', '$batch', '$password')";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
?>
