<?php
    require_once("model/Conexion.php");

    $conn = $obj->conexion();
    $products = array();
    $sql = "SELECT * FROM products ";

    if(isset($_POST["commandBorrar"])) {
        $id_product = $_POST["commandBorrar"];
        $sql = "DELETE FROM products WHERE id_product = $id_product";

        if($result = mysqli_query($conn, $sql)) {
            header("Location: /first-project-php/index.php?success=1");
        } else {
            header("Location: /first-project-php/index.php?error=1");
        }
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