<br/>

<div class="ui menu square">
  <a href="?d=barang" class="item header">Barang</a>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Barang</div>
    <table class="ui stackable structured table" id="myTable">
        <thead>
          <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Image</th>
            <th>Kategori Barang</th>
            <th>Deskripsi Barang</th>
            <th>Warna</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Created at</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'config/dbconfig.php';
            $pdo = Database::connect();
            $sql = 'SELECT p.id_product, p.product_name, p.product_image, pc.category_name, p.product_description, c.color_name, p.stock, p.price, p.created_at FROM product p, product_category pc, color c WHERE p.id_category = pc.id_category and p.id_color = c.id_color ORDER BY id_product ASC';
            foreach ($pdo->query($sql) as $row){
              echo '<tr>';
              echo '<td>'. $row['id_product'] . '</td>';
              echo '<td>'. $row['product_name'] . '</td>';
              echo '<td><img class="ui tiny image" src="'. $row['product_image'] .'"></td>';
              echo '<td>'. $row['category_name'] . '</td>';
              echo '<td>'. $row['product_description'] . '</td>';
              echo '<td>'. $row['color_name'] .'</td>';
              echo '<td>'. $row['stock'] . '</td>';
              echo '<td>'.'Rp '. $row['price'] . '</td>';
              echo '<td>'. $row['created_at'] . '</td>';
              echo '<td>'.'<a class="ui green button" onclick="update(\''.$row['id_product'].'\',\''.$row['product_name'].'\',\''.$row['product_description'].'\',\''.$row['stock'].'\',\''.$row['price'].'\')">Update</a>';
              echo '<a class="ui red button" onclick="del(\''.$row['id_product'].'\', \''.$row['product_name'].'\')">Delete</a>';
              echo '</td></tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah Barang</div>
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
        <div class="field">
            <label>Nama Barang</label>
            <input type="text" name="product-name" placeholder="Nama Barang">
        </div>
        <div class="field">
          <label>Kategori Barang</label>
          <select class="ui search dropdown" name="category-name">
            <option value="">Pilih Kategori Barang</option>
            <?php
              $pdo = Database::connect();
              $sql = 'SELECT id_category, category_name FROM product_category ORDER BY id_category ASC';
              foreach ($pdo->query($sql) as $row){  
                echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>
        </div>  
        <div class="field">
            <label>Deskripsi Barang</label>
            <textarea type="text" name="product-description"></textarea>
        </div>
        <div class="field">
          <label>Warna Barang</label>
          <select class="ui search dropdown" name="color-name">
            <option value="">Pilih Warna Barang</option>
            <div class="item">
            <?php
              $pdo = Database::connect();
              $sql = 'SELECT id_color, color_name FROM color ORDER BY id_color ASC';
              foreach ($pdo->query($sql) as $row){  
                echo '<option value="'.$row['id_color'].'">'.$row['color_name'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>
        </div>  
        <div class="field">
            <label>Stok Barang</label>
            <input type="number" name="product-stock" placeholder="Stok Barang">
        </div>
        <div class="field">
            <label>Harga Barang</label>
            <div class="ui labeled input">
                <div class="ui label">Rp</div>
                <input type="number" name="product-price" placeholder="Harga Barang">
            </div>
        </div>
        <div class="field">
            <label>Upload Barang</label>
            <input type="file" name="product-img" accept="image/*">
        </div>
        <input class="ui primary button" name="add-product" type="submit" value="Tambah Barang">
    </form>
</div>
</br>

<div class="ui modal update">
  <i class="close icon"></i>
  <div class="header">
    Update Barang
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id" type="hidden" name="id" value="">
        <div class="field">
            <label>Nama Barang</label>
            <input id="nama" type="text" name="name" placeholder="Nama Barang" value="">
        </div>
        <div class="field">
          <label>Kategori Barang</label>
          <select class="ui search dropdown" name="category">
            <option value="">Pilih Kategori Barang</option>
            <?php
              $pdo = Database::connect();
              $sql = 'SELECT id_category, category_name FROM product_category ORDER BY id_category ASC';
              foreach ($pdo->query($sql) as $row){
                echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>
        </div>  
        <div class="field">
            <label>Deskripsi Barang</label>
            <textarea id="deskripsi" type="text" name="description"></textarea>
        </div>
        <div class="field">
            <label>Stok Barang</label>
            <input id="stok" type="number" name="stock" placeholder="Stok Barang" value="">
        </div>
        <div class="field">
            <label>Harga Barang</label>
            <div class="ui labeled input">
                <div class="ui label">Rp</div>
                <input id="harga" type="number" name="price" placeholder="Harga Barang" value="">
            </div>
        </div>
        <input class="ui primary button" name="update-product" type="submit" value="Update Barang">
    </form>
  </div>
</div>

<div class="ui modal delete">
  <i class="close icon"></i>
  <div class="header">
    Hapus Barang
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id_del" type="hidden" name="id" value="">
      <div class="field">
        <p>Yakin ingin menghapus Barang <span id="nama-del"></span> ?</p>
      </div>
      </br>
      <input class="ui green button" name="delete-product" type="submit" value="Ya">
      <button class="ui negative button">Tidak</button>
    </form>
  </div>
</div>

<?php 
  if (isset($_POST['add-product'])){
    $product_name = $_POST['product-name'];
    $category_name = $_POST['category-name'];
    $product_description = $_POST['product-description'];
    $product_color = $_POST['color-name'];
    $product_stock = $_POST['product-stock'];
    $product_price = $_POST['product-price'];

    $imgFile = $_FILES['product-img']['name'];
    $tmp_dir = $_FILES['product-img']['tmp_name'];
    $imgSize = $_FILES['product-img']['size'];

    if ($imgFile){
      $upload_dir = 'public/images/product/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'webp');
      $productpic = $product_name.".".$imgExt;

      if (in_array($imgExt, $valid_extensions)){
        if ($imgSize < 5000000){
          move_uploaded_file($tmp_dir,$upload_dir.$productpic);
          $product_url = $upload_dir.$productpic;
        }
        else {
          $errMsg = "Image too large";
        }
      }
      else {
        $errMsg = "File type unsupported";
      }
    }

    if (!isset($errMsg)){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO product (id_category, product_image, product_name, product_description, id_color, stock, price) values (?, ?, ?, ?, ?, ?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($category_name, $product_url, $product_name, $product_description, $product_color, $product_stock, $product_price));
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard.php?d=barang';
        </script>
      <?php
      Database::disconnect();
    }
  }
?>

<?php
  if (isset($_POST['update-product'])){
    $id_product = $_POST['id'];
    $product_name = $_POST['name'];
    $category_name = $_POST['category'];
    $product_description = $_POST['description'];
    $product_stock = $_POST['stock'];
    $product_price = $_POST['price'];

    $valid = true;
    if ($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "UPDATE product  set id_category = ?, product_name = ?, product_description = ?, stock = ?, price = ? WHERE id_product = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($category_name, $product_name, $product_description, $product_stock, $product_price, $id_product));
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard.php?d=barang';
        </script>
      <?php
      Database::disconnect();
    }
  }
?>

<?php
  if (isset($_POST['delete-product'])){
    $id_product = $_POST['id'];

    $valid = true;
    if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM product WHERE id_product = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id_product));
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard.php?d=barang';
        </script>
      <?php
      Database::disconnect();
    }
  }
?>

<script>
  function update(id,nama,deskripsi,stok,harga){    
    $('#id').empty();
    $('#id').append(id);
    $('#id').attr('value',id);
    $('#nama').empty();
    $('#nama').append(nama);
    $('#nama').attr('value',nama);
    $('#deskripsi').empty();
    $('#deskripsi').append(deskripsi);
    $('#deskripsi').attr('value',deskripsi);
    $('#stok').empty();
    $('#stok').append(stok);
    $('#stok').attr('value',stok);
    $('#harga').empty();
    $('#harga').append(harga);
    $('#harga').attr('value',harga);
    $('.ui.modal.update').modal('show');
  }

  function del(id, nama){
    $('#id_del').empty();
    $('#id_del').append(id);
    $('#id_del').attr('value',id);
    $('#nama-del').empty();
    $('#nama-del').append(nama);
    $('#nama-del').attr('value',nama);
    $('.ui.modal.delete').modal('show');
  }

  $('.ui.search.dropdown').dropdown();

  $(document).ready(function(){
    $('#myTable').DataTable();
});
</script>