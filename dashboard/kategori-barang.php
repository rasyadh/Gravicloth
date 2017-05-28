<br/>

<div class="ui menu borderless square">
  <div class="item header">
    Kategori Barang
  </div>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Kategori</div> 
    <table class="ui stackable structured table">
        <thead>
          <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Detail Kategori</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include 'config/dbconfig.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM product_category ORDER BY id_product_category ASC';
            foreach ($pdo->query($sql) as $row){
                echo '<tr>';
                echo '<td>'.$row['id_product_category'].'</td>';
                echo '<td>'.$row['category_name'].'</td>';
                echo '<td>'.$row['category_detail'].'</td>';
                echo '<td>'.'<a class="ui green button" onclick="update(\''.$row['id_product_category'].'\', \''.$row['category_name'].'\', \''.$row['category_detail'].'\')">Update</a>';
                echo '<a class="ui red button" onclick="del(\''.$row['id_product_category'].'\', \''.$row['category_name'].'\')">Delete</a></td>';
                echo '</tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah Kategori</div>
  <form class="ui form" method="POST" action="<?php $_PHP_SELF ?>">
    <div class="field">
      <label>Nama Kategori</label>
      <input type="text" name="category-name" placeholder="Nama Kategori">
    </div>
    <div class="field">
      <label>Detail Kategori</label>
      <textarea type="text" name="category-detail"></textarea>
    </div>
    <input class="ui primary button" name="add-category" type="submit" value="Tambah Kategori">
  </form>
</div>

<div class="ui modal update">
  <i class="close icon"></i>
  <div class="header">
    Update Kategori Barang
  </div>
  <div class="content">
    <form class="ui form" method="POST" action="<?php $_PHP_SELF ?>">
      <input type="hidden" id="id_update" name="id_update" value="">
      <div class="field">
        <label>Nama Kategori</label>
        <input id="cat-name-update" type="text" name="cat-name-update" placeholder="Nama Kategori" value="">
      </div>
      <div class="field">
        <label>Detail Kategori</label>
        <textarea id="cat-detail-update" type="text" name="cat-detail-update"></textarea>
      </div>
      <input class="ui primary button" name="update-category" type="submit" value="Update">
    </form>
  </div>
</div>

<div class="ui modal delete">
  <i class="close icon"></i>
  <div class="header">
    Hapus Kategori Barang
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id_del" type="hidden" name="id_del" value="">
      <div class="field">
        <p>Yakin ingin menghapus Kategori <span id="cat-name-del"></span> ?</p>
      </div>
      </br>
      <input class="ui green button" name="delete-category" type="submit" value="Ya">
      <button class="ui negative button">Tidak</button>
    </form>
  </div>
</div>

<?php
  if (isset($_POST['add-category'])){
    $category_name = $_POST['category-name'];
    $category_detail = $_POST['category-detail'];
    $valid = true;

    if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO product_category (category_name, category_detail) values (?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($category_name, $category_detail));
      Database::disconnect();
    }
  }
?>

<?php
  if (isset($_POST['update-category'])){
    $id_product_category = $_POST['id_update'];
    $category_name = $_POST['cat-name-update'];
    $category_detail = $_POST['cat-detail-update'];
    $valid = true;

    if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'UPDATE product_category SET category_name = ? , category_detail = ? WHERE id_product_category = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($category_name, $category_detail, $id_product_category));
      Database::disconnect();
    }
  }
?>

<?php
  if (isset($_POST['delete-category'])){
    $id_product_category = $_POST['id_del'];
    $valid = true;

    if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM product_category WHERE id_product_category = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id_product_category));
      Database::disconnect();
    }
  }
?>

<script>
  function update(id, nama, detail){
    $('#id_update').empty();
    $('#id_update').append(id);
    $('#id_update').attr('value',id);
    $('#cat-name-update').empty();
    $('#cat-name-update').append(nama);
    $('#cat-name-update').attr('value',nama);
    $('#cat-detail-update').empty();
    $('#cat-detail-update').append(detail);
    $('#cat-detail-update').attr('value',detail);
    $('.ui.modal.update').modal('show');
  }

  function del(id, nama){
    $('#id_del').empty();
    $('#id_del').append(id);
    $('#id_del').attr('value',id);
    $('#cat-name-del').empty();
    $('#cat-name-del').append(nama);
    $('#cat-name-del').attr('value',nama);
    $('.ui.modal.delete').modal('show');
  }
</script>