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
            <th>Email</th>
            <th>Password</th>
            <th>Created at</th>
			<th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'config/dbconfig.php';
            $pdo = Database::connect();
            $sql = 'SELECT u.id_user, 
			r.role, u.name, u.email, u.password, u.created_at FROM user u, role r WHERE u.id_role = r.id_role ORDER BY id_user ASC';
            foreach ($pdo->query($sql) as $row){
              echo '<tr>';
              echo '<td>'. $row['id_user'] . '</td>';
              echo '<td>'. $row['role'] . '</td>';
              echo '<td>'. $row['name'] . '</td>';
              echo '<td>'. $row['email'] . '</td>';
              echo '<td>'. $row['password'] .'</td>';
              echo '<td>'. $row['created_at'] . '</td>';
              echo '<td>'.'<a class="ui yellow button" onclick="view()">View</a>';
			  echo '<a class="ui green button" onclick="update()">Update</a>';
              echo '<a class="ui red button" onclick="del()">Delete</a>';
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
        if ($imgSize < 5000000){
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
      $sql = 'INSERT INTO user (id_role, name, email, password) values (?, ?, ?, ?)';
      $q = $pdo->prepare($sql);
      $q->execute(array($user_role, $user_name, $user_email, $user_pass));
	  $sql2 = 'SELECT id_user FROM user WHERE email = ?';
	  $q2 = $pdo->prepare($sql2);
	  $id = $q2->execute(array($user_email));
	  $sql3 = 'INSERT INTO user_detail (id_user, profile_pict, date_of_birth, gender, address, phone_number, id_province, id_city, postal_code) values (?, ?, ?, ?, ?, ?, ?, ?, ?)';
	  $q3 = $pdo->prepare($sql3);
	  $q3->execute(array($id, $user_url, $user_date, $user_gender, $user_address, $user_phone, $user_province, $user_city, $user_postal));
      Database::disconnect();
    }
  }
?>

<script>
	$('.ui.search.dropdown').dropdown();

	$(document).ready(function(){
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