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
<div style="color: red;">
        <?php
        $session = session();
        $error = $session->getFlashdata('error');
        $password = $session->getFlashdata('password');
     ?>
</div>

    <div class="wrapper">
    <div>
                    <?php if ($password) { ?>
                        <p style="color:red"><?php echo $password ?></p>
                    <?php } ?>
                </div>

                <div>
                    <?php if ($error) { ?>
                        <p style="color:red">Terjadi Kesalahan:
                            <?php foreach ($error as $e) { ?>
                                <br>
                        <p style="color:red"><?php echo $e ?></p>
                    <?php } ?>
                    </p>
                <?php } ?>
                </div>
        <form action="/valid_register" method="post">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>
            
            <div class="input-box">
                <input type="password" name="password"placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="input-box">
                <input type="password" name="confirm_password"placeholder="Confirm Password" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" name="email"placeholder="Email" required>
                <i class='bx bxs-user'></i>
            </div>


            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>Already have an account? <a href="/login">Login</a></p>
            </div>
        </form>
    </div>

</body>
</html>