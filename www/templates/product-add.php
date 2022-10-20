<?php include_once( __DIR__ . "/../../framework/Global_controller.php"); ?>
<?php include_once("./_header.php"); ?>

<?php 
  if(!$user["admin"]) {
    header("Location: /first-crud");
  }
?>
    <a href="./index.php"><button class="btn btn-primary mt-4 ml-4"><- Volver atras</button></a>
    <div class="container mt-4">
        
        <div class="card mt-4">
          <div class="card-header">
            <h4 title="Practica 4" class="text-center"><?=($editar ? "Edit" : "Add");?> Product</h4>
          </div>
          <div class="card-body">
                <form id="frm" method="POST">
                    <div class="form-row">
                        <input type="hidden" name="product[id]" value="<?=$product_info["id_product"]; ?>">
                        <div class="form-group col-md-4">
                          <label for="inputName">Product Name</label>
                          <input type="text" class="form-control" name="product[name]" placeholder="Nombre" required value="<?=$product_info["product_name"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputSName">Product Code</label>
                          <input type="text" class="form-control" name="product[code]" placeholder="VCON_REF" required value="<?=$product_info["product_code"]; ?>">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputSName">Product Price</label>
                          <input type="number" class="form-control" name="product[price]" placeholder="5" required value="<?=$product_info["product_price"]; ?>">
                        </div>
                      </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">URL imagen</label>
                        <input type="text" class="form-control" name="product[image]" placeholder="https://picsum.photos/" value="<?=$product_info["product_image"]; ?>" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputUrl">Category</label>
                        <select name="product[category]" id="" class="form-control">
                          <option selected>Choose...</option>
                          <?php foreach ($categories as $idx => $value) { ?>
                            <option value="<?=$value;?>" <?=($product_info["product_category"] == $value ? "selected" : "") ?>><?=$value;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Descripcion</label>
                        <textarea name="product[description]" rows="2" class="form-control" placeholder="Product Description"><?=$product_info["product_description"]; ?></textarea>
                      </div>
                    </div>
                    <?php if($editar) { ?>
                      <button type="submit" class="btn btn-primary mb-2" value="1" name="command_edit">Edit product</button>
                    <?php } else { ?>
                      <button type="submit" class="btn btn-primary mb-2" value="1" name="command_save">Save product</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>