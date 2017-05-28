<br/>

<div class="ui menu square">
    <a href="?d=banner" class="item header">Banner</a>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Banner</div> 
    <table class="ui stackable structured compact table">
        <thead>
          <tr>
            <th>ID Banner</th>
            <th>Tampilan Banner</th>
            <th>Nama Banner</th>
            <th>Deskripsi Banner</th>
            <th>URL Banner</th>
            <th>Status</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include 'config/dbconfig.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM banner ORDER BY id_banner ASC';
            foreach ($pdo->query($sql) as $row){
                echo '<tr>';
                echo '<td>'.$row['id_banner'].'</td>';
                echo '<td>'.'<img class="ui medium image" src="'.$row['banner_url'].'">'.'</td>';
                echo '<td>'.$row['banner_name'].'</td>';
                echo '<td>'.$row['banner_description'].'</td>';
                echo '<td>'.$row['banner_url'].'</td>';
                echo '<td><a class="ui yellow button">Set Default</a></td>';
                echo '<td>'.'<a class="ui green button" onclick="update(\''.$row['id_banner'].'\', \''.$row['banner_name'].'\', \''.$row['banner_description'].'\')">Update</a>';
                echo '<a class="ui red button" onclick="del(\''.$row['id_banner'].'\', \''.$row['banner_name'].'\', \''.$row['banner_url'].'\')">Delete</a></td>';
                echo '</tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah Banner</div>
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
        <div class="field">
            <label>Nama Banner</label>
            <input type="text" name="banner-name" placeholder="Nama Banner">
        </div>
        <div class="field">
            <label>Deskripsi Banner</label>
            <textarea type="text" name="banner-description"></textarea>
        </div>
        <div class="field">
            <label>Upload Banner</label>
            <input type="file" name="banner-img" accept="image/*">
        </div>
        <input class="ui primary button" name="add-banner" type="submit" value="Tambah Banner">
    </form>
</div>
</br>

<div class="ui modal update">
  <i class="close icon"></i>
  <div class="header">
    Update Banner
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id" type="hidden" name="id" value="">
        <div class="field">
            <label>Nama Banner</label>
            <input id="nama" type="text" name="name" placeholder="Nama Banner" value="">
        </div>
        <div class="field">
            <label>Deskripsi Banner</label>
            <textarea id="deskripsi" type="text" name="description"></textarea>
        </div>
        <!--<div class="field">
          <label>Tampilan Banner</label>
          <img id="url" class="ui medium image" src="">
          <input id="url" type="hidden" name="url" value="">
        </div>
        <div class="field">
            <label>Upload Banner</label>
            <input type="file" name="banner-update" accept="image/*">
        </div>-->
        <input class="ui primary button" name="update-banner" type="submit" value="Update Banner">
    </form>
  </div>
</div>

<div class="ui modal delete">
  <i class="close icon"></i>
  <div class="header">
    Hapus Banner
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id_del" type="hidden" name="id_del" value="">
      <input id="url_del" type="hidden" name="url_del" value="">
      <div class="field">
        <p>Yakin ingin menghapus Banner <span id="nama-del"></span> ?</p>
      </div>
      </br>
      <input class="ui green button" name="delete-banner" type="submit" value="Ya">
      <button class="ui negative button">Tidak</button>
    </form>
  </div>
</div>

<?php
  if (isset($_POST['add-banner'])){
    $banner_name = $_POST['banner-name'];
    $banner_description = $_POST['banner-description'];
    $banner_status = false;

    $imgFile = $_FILES['banner-img']['name'];
    $tmp_dir = $_FILES['banner-img']['tmp_name'];
    $imgSize = $_FILES['banner-img']['size'];

    if ($imgFile){
      $upload_dir = 'public/images/banner/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png');
      $bannerpic = $banner_name.".".$imgExt;

      if (in_array($imgExt, $valid_extensions)){
        if ($imgSize < 5000000){
          move_uploaded_file($tmp_dir,$upload_dir.$bannerpic);
          $banner_url = $upload_dir.$bannerpic;
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
      $sql = 'INSERT INTO banner (banner_name, banner_description, banner_url, status) values (?, ?, ?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($banner_name, $banner_description, $banner_url, $banner_status));
      Database::disconnect();
    }
  }
?>

<?php
  if (isset($_POST['update-banner'])){
    $id_banner = $_POST['id'];
    $banner_name = $_POST['name'];
    $banner_description = $_POST['description'];
    //$banner_url = $_POST['url'];

    // $imgFileUp = $_FILES['banner-update']['name'];
    // $tmp_dirUp = $_FILES['banner-update']['tmp_name'];
    // $imgSizeUp = $_FILES['banner-update']['size'];

    // if ($imgFileUp){
    //   $upload_dir = 'public/images/banner/';
    //   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
    //   $valid_extensions = array('jpeg', 'jpg', 'png');
    //   $bannerpic = $banner_name.".".$imgExt;

    //   if (in_array($imgExt, $valid_extensions)){
    //     if ($imgSizeUp < 5000000){
    //       unlink($upload_dir.$banner_url);
    //       move_uploaded_file($tmp_dirUp,$upload_dir.$bannerpic);
    //       $banner_url = $upload_dir.$bannerpic;
    //     }
    //     else {
    //       $errMsg = "Image too large";
    //     }
    //   }
    //   else {
    //     $errMsg = "File type unsupported";
    //   }
    // }

    // if (!isset($errMsg)){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'UPDATE banner  set banner_name = ?, banner_description = ? WHERE id_banner = ?';
      $q = $pdo->prepare($sql);
      $q->execute(array($banner_name, $banner_description, $id_banner));
      Database::disconnect();
    //}
  }
?>

<?php
  if (isset($_POST['delete-banner'])){
    $id_banner = $_POST['id_del'];
    $banner_url = $_POST['url_del'];
    unlink($upload_dir.$banner_url);

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'DELETE FROM banner WHERE id_banner = ?';
    $q = $pdo->prepare($sql);
    $q->execute(array($id_banner));
    Database::disconnect();
  }
?>

<script>
  function update(id,nama,deskripsi){    
    $('#id').empty();
    $('#id').append(id);
    $('#id').attr('value',id);
    $('#nama').empty();
    $('#nama').append(nama);
    $('#nama').attr('value',nama);
    $('#deskripsi').empty();
    $('#deskripsi').append(deskripsi);
    $('#deskripsi').attr('value',deskripsi);
    // $('#url').empty();
    // $('#url').append(url);
    // $('#url').attr('src',url);
    $('.ui.modal.update').modal('show');
  }

  function del(id, nama, url){
    $('#id_del').empty();
    $('#id_del').append(id);
    $('#id_del').attr('value',id);
    $('#nama-del').empty();
    $('#nama-del').append(nama);
    $('#nama-del').attr('value',nama);
    $('#url_del').empty();
    $('#url_del').append(url);
    $('#url_del').attr('value',url);
    $('.ui.modal.delete').modal('show');
  }

</script>