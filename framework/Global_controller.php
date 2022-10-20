<?php
    require_once("model/Conexion.php");
    session_start();
    $conn = $obj->conexion();
    $categories = array("Food", "Materials", "Items", "Clothes");
    $editar = false;

    $product_info = array(
        "id_product"   => 0,
        "product_name" => "",
        "product_code" => "",
        "product_price" => "",
        "product_image" => "",
        "product_category" => "",
        "product_description" => ""
    );

    if(isset($_POST["command_save"])) {
        $datos = array(
            $_POST["product"]["name"],
            $_POST["product"]["code"],
            $_POST["product"]["price"],
            $_POST["product"]["image"],
            $_POST["product"]["category"],
            $_POST["product"]["description"]
        );

        $sql = "INSERT INTO products (product_name, product_code, product_price, product_image, product_category, product_description)
            VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]')";

        if (mysqli_query($conn, $sql)) {
            header("Location: /first-project-php/index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if(isset($_POST["command_edit"])) {
        $id_product = $_POST["product"]["id"];

        $datos = array(
            $_POST["product"]["name"],
            $_POST["product"]["code"],
            $_POST["product"]["price"],
            $_POST["product"]["image"],
            $_POST["product"]["category"],
            $_POST["product"]["description"]
        );

        $sql = "UPDATE products
        SET product_name = '$datos[0]', product_code = '$datos[1]', product_price = '$datos[2]', product_image = '$datos[3]', product_category = '$datos[4]', product_description = '$datos[5]'
        WHERE id_product = $id_product";

        if (mysqli_query($conn, $sql)) {
            header("Location: /first-project-php/index.php?success=1");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if(isset($_GET["id"])) {
        $editar = true;

        $id_product = $_GET["id"];
        $sql = "SELECT * FROM products WHERE id_product = $id_product";

        if($result = mysqli_query($conn, $sql)) {
            $product_info = false;
            while($row = mysqli_fetch_assoc( $result)){
                $product_info = $row;
            }

            if(!$product_info) {
                header("Location: /first-project-php/index.php");
            }
        } else {
            header("Location: /first-project-php/index.php");
        }

    }

    
?>