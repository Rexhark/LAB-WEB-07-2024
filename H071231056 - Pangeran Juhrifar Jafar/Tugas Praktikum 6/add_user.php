<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tambah user!</title>
    <style>
        body, html {
            /* height: 100%; */
            margin: 0;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color:  white;  
            
        }
        h1 {
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .form-container {
            
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: transparent;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
  </head>
  <body>
    <h1>Tambah User Baru!</h1>
    <div class="form-container">

        <form action="proses_add_user.php" method="post" >
            <div class="d-flex flex-direction-column gap-3">
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="faculty" class="form-label">Faculty</label>
                        <input type="text" class="form-control" id="faculty" name="faculty" placeholder="Masukkan Fakultas">
                    </div>
                    <div class="mb-3">
                        <label for="batch" class="form-label">Batch</label>
                        <input type="text" class="form-control" id="batch" name="batch" placeholder="Masukkan Batch">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                        <label for="showPassword" class="d-flex justify-content-end mt-2">
                            <input type="checkbox" id="showPasswordlogin">Tampilkan Password
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3 gap-3">
                <button type="submit" class="btn btn-danger" onclick="batal()">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // cript untuk menekan tombol batal dan kembali ke halaman dashboard.php sebagai admin
        function batal() {
            window.location.href = "dashboard.php";
        }

        // script show password
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPasswordlogin');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    
  </body>
</html>