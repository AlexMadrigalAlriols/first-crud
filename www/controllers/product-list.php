<?php

    if(isset($_SESSION) && !isset($_SESSION["id_user"])) {
        header("Location: /first-crud/www/templates/login.php");
    }

    $products = array();
    $sql = "SELECT * FROM products ";

    if(isset($_POST["commandAddProduct"])) {
        $carrito = array_merge(json_decode($user["carrito"], true), array($_POST["commandAddProduct"]));

        $carrito = json_encode($carrito);

        $sql_update = "UPDATE users SET carrito = '" . $carrito . "' WHERE id_user = " . $_SESSION["id_user"];

        if($result = mysqli_query($conn, $sql_update)) {
            header("Location: /first-crud/index.php?success=1");
        } else {
            header("Location: /first-crud/index.php?error=1");
        }
    }

    if(isset($_POST["commandBorrar"])) {
        $id_product = $_POST["commandBorrar"];
        $sql = "DELETE FROM products WHERE id_product = $id_product";

        if($result = mysqli_query($conn, $sql)) {
            header("Location: /first-crud/index.php?success=1");
        } else {
            header("Location: /first-crud/index.php?error=1");
        }
    }

    if(isset($_POST["commandLogOut"])) {
        session_destroy();
        header("Location: /first-crud/www/templates/login.php");
    }

    if(isset($_POST["commandFilter"])) {
        $sql .= "WHERE 1=1";

        if(trim($_POST["filter"]["name"])) {
            $sql .= " AND product_name LIKE '%" . $_POST["filter"]["name"] . "%'";
        }

        if(trim($_POST["filter"]["code"]) != "") {
            $sql .= " AND product_code LIKE '%" . $_POST["filter"]["code"] . "%'";
        }

        if(trim($_POST["filter"]["category"]) != "") {
            $sql .= " AND product_category LIKE '%" . $_POST["filter"]["category"] . "%'";
        }
    }

    $sql .= " ORDER BY id_product ASC";

    $result = mysqli_query($conn, $sql);
    while( $row = mysqli_fetch_assoc( $result)){
        $products[] = $row;
    }
?>