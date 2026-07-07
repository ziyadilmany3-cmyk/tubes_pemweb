<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi</title>

    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="login-container">

        <section class="login-box">

            <h2>Login Aplikasi</h2>

            <form action="ceklogin.php" method="post">

                <!-- Username -->
                <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"
                    required
                >

                <!-- Password -->
                <div class="password-box">

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"
                        required
                    >

                    <span
                        class="eye-icon"
                        onclick="togglePassword()"
                    >
                        👁️
                    </span>

                </div>

                <!-- Remember Me -->
                <div class="remember-box">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        <?php if(isset($_COOKIE['username'])) echo "checked"; ?>
                    >

                    <label for="remember">
                        Ingat Username & Password
                    </label>

                </div>

                <!-- Tombol Login -->
                <input
                    type="submit"
                    value="Login"
                >

            </form>

        </section>

    </div>

    <script>

        function togglePassword(){

            const password = document.getElementById("password");

            if(password.type === "password"){
                password.type = "text";
            }else{
                password.type = "password";
            }

        }

    </script>

</body>
</html>