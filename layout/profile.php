<section class="profile-top-section">
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="four wide column">
                <div class="ui padded segment square">
                    <?php
                        if ($userInfoRow['profile_pict'] != NULL){
                            echo '<img class="ui centered small circular image" src="'.$userInfoRow['profile_pict'].'">';
                        }
                        else {
                            echo '<img class="ui centered small circular image" src="public/images/profile/default.jpg">';
                        }
                    ?>
                
                    <div class="ui header">
                        <?php echo $userInfoRow['name']; ?>
                    </div>
                    <div class="ui vertical borderless menu square" id="category">
                        <a class="item" href="#">Profil</a>
                        <a class="item" href="#">Pesanan</a>
                        <a class="item" href="#">Ganti Kata Sandi</a>
                        <a class="item" href="#">Hapus Akun</a>
                    </div>
                </div>
            </div>

            <div class="twelve wide column">
                <div class="ui very padded segment square">
                    <h2 class="ui blue header">Profil</h2>
                    <form class="ui form" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">                
                        <input type="hidden" name="user-id" value="<?php echo $userInfoRow['id_user'];?>">
                        <input type="hidden" name="user-pass" value="<?php echo $userInfoRow['password'];?>">
                        <input type="hidden" name="user-pp" value="<?php echo $userInfoRow['profile_pict'];?>">
                        <h4 class="ui dividing header">Informasi Pribadi</h4>
                        <div class="field">
                            <label>Nama</label>
                            <input type="text" name="user-name" placeholder="Nama User" value="<?php echo $userInfoRow['name']; ?>">
                        </div>
                        <div class="field">
                            <label>Email</label>
                            <input type="email" name="user-email" placeholder="Email User" value="<?php echo $userInfoRow['email']; ?>">
                        </div>
                        <div class="field">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="user-date" placeholder="Tanggal Lahir" value="<?php echo $userInfoRow['date_of_birth']; ?>">
                        </div>
                        <div class="field">
                        <label>Jenis Kelamin</label>
                        <select class="ui search dropdown" name="user-gender">
                            <option value="<?php echo $userInfoRow['gender']; ?>">
                                <?php 
                                    $gender = $userInfoRow['gender'];
                                    if ($gender == "L") echo 'Laki - Laki';
                                    else echo 'Perempuan';
                                ?>
                            </option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        </div> 
                        <div class="field">
                            <label>Nomor Telefon</label>
                            <input type="number" name="user-phone" placeholder="Nomor Telefon" value="<?php echo $userInfoRow['phone_number']; ?>">
                        </div>
                        <div class="field">
                            <label>Upload Foto</label>
                            <input type="file" name="user-img" accept="image/*">
                        </div>
                        <h4 class="ui dividing header">Informasi Alamat</h4>
                        <div class="field">
                            <label>Alamat</label>
                            <textarea type="text" name="user-address"><?php echo $userInfoRow['address']; ?></textarea>
                        </div>
                        <div class="field">
                            <label>Provinsi</label>
                            <select class="ui search dropdown" name="user-province" id="id_prov">
                                <?php
                                    if ($userInfoRow['id_province'] != ""){
                                        echo '<option value="'.$userInfoRow['id_province'].'">'.$userInfoRow['id_province'].'</option>';
                                    }
                                    else {
                                        $pdo = Database::connect();
                                        $sql = 'SELECT id_province, province_name FROM province ORDER BY id_province ASC';
                                        foreach ($pdo->query($sql) as $row){  
                                            echo '<option value="'.$row['id_province'].'">'.$row['province_name'].'</option>';
                                        }
                                        Database::disconnect();
                                    }
                                ?>
                            </select>
                        </div>  
                        <div class="field">
                            <label>Kota / Kabupaten</label>
                            <select class="ui search dropdown" name="user-city" id="kota">
                                <?php
                                    if ($userInfoRow['id_city'] != ""){
                                        echo '<option value="'.$userInfoRow['id_city'].'">'.$userInfoRow['id_city'].'</option>';
                                    }
                                    else {    
                                        $pdo = Database::connect();
                                        $sql = 'SELECT id_city, id_province, city_name FROM city WHERE id_province = ? ORDER BY id_city ASC';
                                        $q = $pdo->prepare($sql);
                                        $q->execute(array($userInfoRow['id_province']));
                                        foreach ($q as $row){  
                                            echo '<option value="'.$row['id_city'].'">'.$row['city_name'].'</option>';
                                        }
                                        Database::disconnect();
                                    }
                                ?>
                            </select>		  
                        </div>  
                        <div class="field">
                            <label>Kode Pos</label>
                            <input type="number" name="user-postal" placeholder="Kode Pos" value="<?php echo $userInfoRow['postal_code']; ?>">
                        </div>
                        <input class="ui primary button" name="save-profile" type="submit" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
  if (isset($_POST['save-profile'])){
    $user_id = $_POST['user-id'];
    $user_name = $_POST['user-name'];
    $user_email = $_POST['user-email'];
    $user_pass = $_POST['user-pass'];
    $user_date = $_POST['user-date'];
    $user_gender = $_POST['user-gender'];
    $user_address = $_POST['user-address'];
    $user_province = $_POST['user-province'];
    $user_city = $_POST['user-city'];
    $user_postal = $_POST['user-postal'];
    $user_phone = $_POST['user-phone'];
    $user_url = $_POST['user-pp'];

    $imgFile = $_FILES['user-img']['name'];
    $tmp_dir = $_FILES['user-img']['tmp_name'];
    $imgSize = $_FILES['user-img']['size'];

    if ($imgFile){
        $user_url = "";
      $upload_dir = 'public/images/profile/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png');
      $userpic = $user_name.".".$imgExt;

      if (in_array($imgExt, $valid_extensions)){
        if ($imgSize < 5000000000000){
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
      $sql = 'UPDATE user SET id_role=2, name=:name, email=:email, password=:pass WHERE id_user=:id_user';
      $q = $pdo->prepare($sql);
      $q->execute(array(':name'=>$user_name, ':email'=>$user_email, ':pass'=>$user_pass, ':id_user'=>$user_id));
      Database::disconnect();

      if ($user_url != ""){
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE user_detail SET profile_pict=:pp, date_of_birth=:dateb, gender=:gender, address=:address, phone_number=:pn, id_province=:prov, id_city=:city, postal_code=:postal WHERE id_user_detail=:id_user_detail';
        $q = $pdo->prepare($sql);
        $q->execute(array(':pp'=>$user_url, ':dateb'=>$user_date, ':gender'=>$user_gender, ':address'=>$user_address, ':pn'=>$user_phone, ':prov'=>$user_province, ':city'=>$user_city, ':postal'=>$user_postal, ':id_user_detail'=>$user_id));
        Database::disconnect();  
        ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/gravicloth/?p=profile';
            </script>
        <?php
      }
      else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE user_detail SET date_of_birth=:dateb, gender=:gender, address=:address, phone_number=:pn, id_province=:prov, id_city=:city, postal_code=:postal WHERE id_user_detail=:id_user_detail';
        $q = $pdo->prepare($sql);
        $q->execute(array(':dateb'=>$user_date, ':gender'=>$user_gender, ':address'=>$user_address, ':pn'=>$user_phone, ':prov'=>$user_province, ':city'=>$user_city, ':postal'=>$user_postal, ':id_user_detail'=>$user_id));
        Database::disconnect();  
        ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/gravicloth/?p=profile';
            </script>
        <?php
      }
    }
  }
?>

<script>
    $('.ui.search.dropdown').dropdown();
</script>