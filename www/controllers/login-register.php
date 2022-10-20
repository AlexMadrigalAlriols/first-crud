<?php
    if(isset($_SESSION["id_user"])) {
        header("Location: /first-crud/index.php");
    }

    if(isset($_POST["command_login"])) {
        $password = sha1($_POST["password"]);
        $sql = "SELECT id_user FROM users WHERE users.email = '" . $_POST["email"]  . "' AND users.password = '" . $password . "'";

        if($result = mysqli_query($conn, $sql)) {
            while( $row = mysqli_fetch_assoc($result)){
                $_SESSION["id_user"] = $row["id_user"];
                
                header("Location: first-crud/index.php");
            }
        }

        header("Location: /first-crud/www/templates/login.php?error=1");
    }

    if(isset($_POST["command_register"])) {
        $password = sha1($_POST["password"]);
        $cpassword = sha1($_POST["cpassword"]);

        if($password === $cpassword) {
            $sql = "INSERT INTO users (username, email, nombre, apellidos, password) VALUES('" . $_POST['username']  . "','" . $_POST['email'] . "','" . $_POST['name'] . "','" . $_POST['apellidos'] . "','". $password ."')";

            if($result = mysqli_query($conn, $sql)) {
                
                $_SESSION["id_user"] = mysqli_insert_id($conn);

                header("Location: /first-crud");
            } else {
                header("Location: /first-crud/www/templates/register.php?error=email");
            }
        } else {
            header("Location: /first-crud/www/templates/register.php?error=pass");
        }
        
    }
?>