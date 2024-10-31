<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color:  rgb(209, 245, 229);
            
            
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: rgb(124, 225, 178);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <br>
    <div class="form-container">
        <form action="login.php" method="POST">
            <div class="mb-3 row email">
                <label for="staticEmail" class="col-sm-2 col-form-label mr-5">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="staticEmail" name="email" placeholder='Masukan email anda' required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label mr-5">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder='Masukan password anda' required>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Masuk</button>
            </div>
        </form>
    </div>
</body>
</html>
