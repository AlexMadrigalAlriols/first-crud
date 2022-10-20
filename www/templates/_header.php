<!DOCTYPE html>
<html lang="en">
  <?php 
    if(!isset($_SESSION["id_user"])) {
      header("Location: /first-crud/www/templates/login.php");
    }

    $sql = "SELECT * FROM users WHERE id_user = " . $_SESSION["id_user"];

    $result = mysqli_query($conn, $sql);
    while( $row = mysqli_fetch_assoc($result)){
      $user = $row;
    }
    
    $user["carrito_vist"] = array();
    $user["price_carrito"] = 0;
    foreach (json_decode($user["carrito"], true) as $idx => $id_product) {
      $sql = "SELECT * FROM products WHERE id_product = ".$id_product;

      $result = mysqli_query($conn, $sql);
      while( $row = mysqli_fetch_assoc( $result)){
          $user["price_carrito"] += $row["product_price"];
          $user["carrito_vist"][] = $row;
      }
    }

    if(isset($_POST["commandRemoveProduct"])) {
      $carrito = json_decode($user["carrito"], true);
      unset($carrito[$_POST["commandRemoveProduct"]]);

      $carrito = json_encode($carrito);

      $sql_update = "UPDATE users SET carrito = '" . $carrito . "' WHERE id_user = " . $_SESSION["id_user"];

      if($result = mysqli_query($conn, $sql_update)) {
          header("Location: /first-crud/index.php?success=1");
      } else {
          header("Location: /first-crud/index.php?error=1");
      }
    }

  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-black">CRUD_Madrigal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"><u>Almacen</u></a>
        </li>
        <?php if($user["admin"]){ ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><u>Add Products</u></a>
          </li>
        <?php } ?>
      </ul>

      <span class="mr-2">@<?=$user["username"];?></span>
      <div class="dropdown">
        <button class="btn btn-secondary mr-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='bx bx-cart'></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-lg-right dropdown-end p-2" style="width: 15rem;">
          <h6>Carrito</h6>
          <?php foreach ($user["carrito_vist"] as $idx => $product) { ?>
            <div class="p-1">
              <form method="POST">
                <button class="btn btn-close right-0" style="float: right;" name="commandRemoveProduct" value="<?=$idx;?>">X</button>
              </form>
              
              <img src="<?=$product["product_image"];?>" alt="" width="50" height="50" class="d-inline-block">
              <div class="d-inline-block align-center mr-2">
                <span><b><?=$product["product_name"];?></b></span>
                <p><?=$product["product_price"];?>€</p>
              </div>
              <hr>
            </div>
          <?php } ?>
          
          <div class="total-price">
            <span>Total price: <b><?=$user["price_carrito"];?>€</b></span>
          </div>
        </ul>
      </div>
      <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class='bx bx-log-out'></i> Log out</button>
    </div>
  </div>
</nav>


<div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal">Close</button>
        <form method="POST">
          <button type="submit" class="btn btn-success" name="commandLogOut" value="1">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
