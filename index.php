<?php include_once("./framework/Global_controller.php"); ?>
<?php include_once("./_header.php"); ?>
<?php include_once("./framework/product-list.php") ?>

<div class="container mt-4">
  <div class="mt-5">
    <form action="" method="POST">
      <div class="card">
        <div class="card-header">
          <i class="fa-solid fa-filter"></i> Filters
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="filter[name]" value="<?= (isset($_POST["filter"]["name"]) ? $_POST["filter"]["name"]  : "")?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Code</label>
                <input type="text" class="form-control" placeholder="Code" name="filter[code]" value="<?= (isset($_POST["filter"]["code"]) ? $_POST["filter"]["code"]  : "")?>">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Category</label>
               
                <select name="filter[category]" class="form-control">
                  <option value="">Choose one...</option>
                  <?php foreach ($categories as $idx => $value) { ?>
                    <option value="<?=$value;?>" <?= (isset($_POST["filter"]["category"]) && $_POST["filter"]["category"] == $value ? "selected"  : "")?>><?=$value;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <a class="btn btn-success mb-2" href="./product-add.php">Add Products</a>
          <button class="btn btn-primary mb-2" style="float:right;" type="submit" name="commandFilter" value="1">Search</button>
        </div>
      </div>

      
    </form>
    
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Preview</th>
          <th scope="col">Name</th>
          <th scope="col">Code</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th>-</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $idx => $product) { ?>
        <tr>
          <th scope="row"><?=$product["id_product"];?></th>
          <td><img src="<?=$product["product_image"];?>" alt="" width="50" height="50"></td>
          <td><?=$product["product_name"];?></td>
          <td><?=$product["product_code"];?></td>
          <td><?=$product["product_price"];?> €</td>
          <td><?=$product["product_category"];?></td>
          <td><?=$product["product_description"];?></td>
          <td><a class="btn btn-primary mr-2" href="./product-add.php?id=<?=$product["id_product"];?>"><i class='bx bx-edit-alt'></i></a>
          <form method="POST" class="d-inline-block">
            <button class="btn btn-danger" type="submit" name="commandBorrar" value="<?=$product["id_product"];?>"><i class='bx bx-trash' ></i></button></td>
          </form>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>