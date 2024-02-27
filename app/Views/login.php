<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='s'>
</head>
<body>
<?php
	$session = session();
	$login = $session->getFlashdata('login');
	$username = $session->getFlashdata('username');
	$password = $session->getFlashdata('password');
	?>

    <div class="wrapper">
        <form action="/valid_login" method="post">
        <?php if ($password) { ?>
						<p style="color:red"><?php echo $password ?></p>
					<?php } ?>

					<?php if ($login) { ?>
						<p style="color:green"><?php echo $login ?></p>
					<?php } ?>

					<?php if ($username) { ?>
						<p style="color:red"><?php echo $username ?></p>
                    <?php } ?>
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username"placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box">
                <input type="password" name="password"placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="/register">Register</a></p>
            </div>
        </form>
    </div>

</body>
</html>