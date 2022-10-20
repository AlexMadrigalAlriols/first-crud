<?php include_once( __DIR__ . "/../../framework/Global_controller.php"); ?>
<?php include_once( __DIR__ . "/../../www/controllers/login-register.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="https://tutiendafacil.com/wp-content/uploads/2018/07/tienda-facil-logo.png" width="250">
                    </div>
                    
                    <form method="POST">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>  

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
                        </div>  

                        <p>Ya tienes cuenta? <a href="./login.php">Entra aqui</a></p>

                        <button class="w-100 btn btn-primary" type="submit" name="command_register" value="1">Registrarse</button>
                    
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>