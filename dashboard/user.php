<br/>

<div class="ui menu square">
	<a href="?d=user" class="item header">User</a>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List User</div>
    <table class="ui stackable structured table" id="myTable">
        <thead>
          <tr>
            <th>ID User</th>
            <th>Role</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Created at</th>
			<th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'config/dbconfig.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM user u, role r, user_detail ud WHERE u.id_role = r.id_role AND u.id_user = ud.id_user ORDER BY u.id_user ASC';
            foreach ($pdo->query($sql) as $row){
              echo '<tr>';
              echo '<td>'. $row['id_user'] . '</td>';
              echo '<td>'. $row['role'] . '</td>';
              echo '<td>'. $row['name'] . '</td>';
              echo '<td>'. $row['username'] . '</td>';
              echo '<td>'. $row['email'] . '</td>';
              echo '<td>'. $row['created_at'] . '</td>';
              echo '<td>'.'<a class="ui yellow button" onclick="update(\''.$row['id_user'].'\', \''.$row['email'].'\', \''.$row['profile_pict'].'\', \''.$row['date_of_birth'].'\', \''.$row['gender'].'\', \''.$row['address'].'\', \''.$row['phone_number'].'\', \''.$row['id_province'].'\', \''.$row['id_city'].'\', \''.$row['postal_code'].'\')">View</a>';
              echo '<a class="ui red button" onclick="del(\''.$row['id_user'].'\', \''.$row['name'].'\')">Delete</a>';
              echo '</td></tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah User</div>
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
        <div class="field">
            <label>Nama</label>
            <input type="text" name="user-name" placeholder="Nama User">
        </div>
        <div class="field">
          <label>Role User</label>
          <select class="ui search dropdown" name="user-role">
            <option value="">Pilih Role User</option>
            <?php
              $pdo = Database::connect();
              $sql = 'SELECT id_role, role FROM role ORDER BY id_role ASC';
              foreach ($pdo->query($sql) as $row){  
                echo '<option value="'.$row['id_role'].'">'.$row['role'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>
        </div>  
        <div class="field">
            <label>Email</label>
            <input type="email" name="user-email" placeholder="Email User">
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="user-pass" placeholder="Password User">
        </div>
        <div class="field">
            <label>Tanggal Lahir</label>
            <input type="date" name="user-date" placeholder="Tanggal Lahir">
        </div>
        <div class="field">
          <label>Jenis Kelamin</label>
          <select class="ui search dropdown" name="user-gender">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki - Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>  
        <div class="field">
            <label>Alamat</label>
            <textarea type="text" name="user-address"></textarea>
        </div>
        <div class="field">
          <label>Provinsi</label>
          <select class="ui search dropdown" name="user-province" id="id_prov">
            <option value="">Pilih Provinsi</option>
            <?php
        $province_selected;
              $pdo = Database::connect();
              $sql = 'SELECT id_province, province_name FROM province ORDER BY id_province ASC';
              foreach ($pdo->query($sql) as $row){  
                echo '<option value="'.$row['id_province'].'">'.$row['province_name'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>
        </div>  
        <div class="field">
          <label>Kota / Kabupaten</label>
          <select class="ui search dropdown" name="user-city" id="kota">
            <option value="">Pilih Kota / Kabupaten</option>
            <?php
              $pdo = Database::connect();
        $prov_id = $_POST['prov_id'];
              $sql = 'SELECT id_city, id_province, city_name FROM city WHERE id_province = ? ORDER BY id_city ASC';
        $q = $pdo->prepare($sql);
        $q->execute(array($prov_id));
              foreach ($q as $row){  
                echo '<option value="'.$row['id_city'].'">'.$row['city_name'].'</option>';
              }
              Database::disconnect();
            ?>
          </select>		  
        </div>  
        <div class="field">
            <label>Kode Pos</label>
            <input type="number" name="user-postal" placeholder="Kode Pos">
        </div>
        <div class="field">
            <label>Nomor Telefon</label>
            <input type="number" name="user-phone" placeholder="Nomor Telefon">
        </div>
        <div class="field">
            <label>Upload Foto</label>
            <input type="file" name="user-img" accept="image/*">
        </div>
        <input class="ui primary button" name="add-user" type="submit" value="Tambah User">
    </form>
</div>
</br>

<div class="ui modal delete">
  <i class="close icon"></i>
  <div class="header">
    Hapus User
  </div>
  <div class="content">
    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post">
      <input id="id_del" type="hidden" name="id" value="">
      <div class="field">
        <p>Yakin ingin menghapus User <span id="nama-del"></span> ?</p>
      </div>
      </br>
      <input class="ui green button" name="delete-user" type="submit" value="Ya">
      <button class="ui negative button">Tidak</button>
    </form>
  </div>
</div>

<div class="ui modal view">
  <i class="close icon"></i>
  <div class="header">
    Detail User
  </div>
  <div class="content">
    <form class="ui form">
      <input type="hidden" id="id_update" name="id_update" value="">
      <div class="field">
        <label>Email</label>
        <input id="email_update" type="text" name="email_update" value="">
      </div>
      <div class="field">
        <label>Profil Picture</label>
        <img class="ui tiny image" id="pp_update" type="text" name="pp_update">
      </div>
      <div class="field">
        <label>Tanggal Lahir</label>
        <input id="dateb_update" type="text" name="dateb_update" value="">
      </div>
      <div class="field">
        <label>Jenis Kelamin</label>
        <input id="gender_update" type="text" name="gender_update" value="">
      </div>
      <div class="field">
        <label>Alamat</label>
        <input id="address_update" type="text" name="address_update" value="">
      </div>
      <div class="field">
        <label>Nomor Telefon</label>
        <input id="pn_update" type="text" name="pn_update" value="">
      </div>
      <div class="field">
        <label>Provinsi</label>
        <input id="prov_update" type="text" name="prov_update" value="">
      </div>
      <div class="field">
        <label>Kota / Kabupaten</label>
        <input id="city_update" type="text" name="city_update" value="">
      </div>
      <div class="field">
        <label>Kode Pos</label>
        <input id="postal_update" type="text" name="postal_update" value="">
      </div>
    </form>
  </div>
</div>

<?php 
  if (isset($_POST['add-user'])){
    $user_name = $_POST['user-name'];
    $user_role = $_POST['user-role'];
    $user_email = $_POST['user-email'];
    $user_pass = $_POST['user-pass'];
    $user_date = $_POST['user-date'];
    $user_gender = $_POST['user-gender'];
    $user_address = $_POST['user-address'];
    $user_province = $_POST['user-province'];
    $user_city = $_POST['user-city'];
    $user_postal = $_POST['user-postal'];
    $user_phone = $_POST['user-phone'];

    $imgFile = $_FILES['user-img']['name'];
    $tmp_dir = $_FILES['user-img']['tmp_name'];
    $imgSize = $_FILES['user-img']['size'];

    if ($imgFile){
      $upload_dir = 'public/images/profile/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png');
      $userpic = $user_name.".".$imgExt;

      if (in_array($imgExt, $valid_extensions)){
        if ($imgSize < 5000000000){
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
          $user_url = $upload_dir.$userpic;
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
      $sql = 'INSERT INTO user (id_role, name, email, password) values (:role, :name, :email, :pass)';
      $q = $pdo->prepare($sql);
      $q->execute(array(':role'=>$user_role, ':name'=>$user_name, ':email'=>$user_email, ':pass'=>$user_pass));
      Database::disconnect();

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'SELECT id_user FROM user WHERE email=:email';
      $q = $pdo->prepare($sql);
      $q->execute(array(':email'=>$user_email));
      $row = $q->fetch(PDO::FETCH_ASSOC);
      $id = $row['id_user'];
      Database::disconnect();

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = 'INSERT INTO user_detail (id_user, profile_pict, date_of_birth, gender, address, phone_number, id_province, id_city, postal_code) values (:id_user, :pp, :dateb, :gender, :address, :phone, :province, :city, :postal)';
      $q = $pdo->prepare($sql);
      $q->execute(array(':id_user'=>$id, ':pp'=>$user_url, ':dateb'=>$user_date, ':gender'=>$user_gender, ':address'=>$user_address, ':phone'=>$user_phone, ':province'=>$user_province, ':city'=>$user_city, ':postal'=>$user_postal));
      Database::disconnect();  
      ?>
          <script type="text/javascript">
          window.location.href = 'http://localhost/gravicloth/dashboard.php?d=user';
          </script>
      <?php
    }
  }
?>

<?php
  if (isset($_POST['delete-user'])){
    $id_product = $_POST['id'];

    $valid = true;
    if($valid){
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM user WHERE id_user = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id_product));
      Database::disconnect();

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM user_detail WHERE id_user = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id_product));
      Database::disconnect();
      ?>
        <script type="text/javascript">
        window.location.href = 'http://localhost/gravicloth/dashboard.php?d=user';
        </script>
      <?php
    }
  }
?>

<script>
  function update(id, email, pp, dateb, gender, address, pn, prov, city, postal){
    $('#id_update').empty(); $('#id_update').append(id); $('#id_update').attr('value',id);
    $('#email_update').empty(); $('#email_update').append(email); $('#email_update').attr('value',email); 
    $('#pp_update').empty(); $('#pp_update').append(pp); $('#pp_update').attr('src',pp);
    $('#dateb_update').empty(); $('#dateb_update').append(dateb); $('#dateb_update').attr('value',dateb);
    $('#gender_update').empty(); $('#gender_update').append(gender); $('#gender_update').attr('value',gender);
    $('#address_update').empty(); $('#address_update').append(address); $('#address_update').attr('value',address);
    $('#pn_update').empty(); $('#pn_update').append(pn); $('#pn_update').attr('value',pn);
    $('#prov_update').empty(); $('#prov_update').append(prov); $('#prov_update').attr('value',prov);
    $('#city_update').empty(); $('#city_update').append(city); $('#city_update').attr('value',city);
    $('#postal_update').empty(); $('#postal_update').append(postal); $('#postal_update').attr('value',postal);
    $('.ui.modal.view').modal('show');
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
    
		$('#id_prov').change(function(){
			var provinsi_id = $('#id_prov').val();
			console.log(provinsi_id);
			$.ajax({
				type: 'POST',
				url: 'dashboard.php?d=user&',
				data: 'prov_id=' + provinsi_id ,
				success: function(response){
					$('#kota').html(response);
				}
			});
		})
	});
</script>