<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>MyPDP</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            padding: 16px;
            background-color: #DADBDD;
            width: 800px;
            margin: auto;
            margin-top: 5%;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 5px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        .loginbtn {
            background: #009dff;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            font-size: 15px;
        }

        .loginbtn:hover {
            opacity: 1;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }

        label {
            text-transform: uppercase;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            opacity: 0.6;
        }

        .text-danger {
            color: #dc3545 !important;
        }

    </style>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'db.php'; ?>
<?php
$errors = []; // Array to store errors
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['pwd']);

    // Check if email and password are empty
    if (empty($email)) {
        $errors['email'] = "Please enter your email.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter your password.";
    }

    // If no errors, check in the database
    if (empty($errors)) {
        $sqlCheck = "SELECT * FROM user WHERE email = ?";
        $stmt = $conn->prepare($sqlCheck);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                setcookie("id", $user["id"], time() + 86400);
                setcookie("username", $user["username"], time() + 86400);

                if ($user['role'] == 1) {
                    header("Location: selday.php");
                    exit;
                } else if ($user['role'] == 2) {
                    header("Location: admin/user.php");
                    exit;
                }
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['email'] = "Email does not exist.";
        }
        $stmt->close();
    }
}
?>
<form action="" method="POST">
    <div class="container" id="field">
        <h1 style="text-align:center">MyPDP</h1>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
        <?php if (isset($errors['email'])): ?>
            <p class="text-danger"><?php echo $errors['email']; ?></p>
        <?php endif; ?>
        <br>
        <br>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>
        <?php if (isset($errors['password'])): ?>
            <p class="text-danger"><?php echo $errors['password']; ?></p>
        <?php endif; ?>
        <hr>

        <button type="submit" class="loginbtn" name="login">LOGIN</button>
        <p style="text-align: center"><a href="forgotpwd.php">FORGOT PASSWORD</a></p>
    </div>
</form>

</body>
</html>
