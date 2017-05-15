<br/>

<div class="ui menu square">
  <div class="item header">
    Kategori Barang
  </div>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Kategori</div>
  <?php      
    $dbhost = 'localhost';   
    $dbuser = 'root';   
    $dbpass = '';   
    $rec_limit = 5;
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);      
    if(! $conn ) {      
        die('Could not connect: ' . mysql_error());   
    } 
    $sql = "SELECT id_product_category, category_name, category_detail FROM `dbcloth`.`product_category`";
    mysql_select_db('dbcloth');
    $retval = mysql_query( $sql, $conn );      
    if(! $retval ) {      
        die('Could not get data: ' . mysql_error());
    }      
  ?>
    <table class="ui stackable structured table">
        <thead>
          <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Detail Kategori</th>
            <th colspan="2">Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while($row = mysql_fetch_array($retval, MYSQL_ASSOC)){
          echo '<tr>'.
                  "<td>{$row['id_product_category']}</td>".
                  "<td>{$row['category_name']}</td>".
                  "<td>{$row['category_detail']}</td>".
                  '<td><input type="submit" class="ui basic button" name="edit-category" id="edit-category" value="Edit"></td>'.
                  '<td><input type="submit" name="delete-category" class="ui basic red button" value="Delete"></td>'.
                '</tr>';
          }
          ?>
        </tbody>
    </table>
  <?php
    mysql_free_result($retval);
    mysql_close($conn); 
  ?>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">Tambah Kategori</div>
  <?php 
     if(isset($_POST['add-category'])) {            
        $dbhost = 'localhost';            
        $dbuser = 'root';            
        $dbpass = '';            
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);                        
        if(! $conn ) {               
          die('Could not connect: ' . mysql_error());            
        }                        
        if(! get_magic_quotes_gpc() ) {               
          $category_name = addslashes ($_POST['category-name']);               
          $category_detail = addslashes ($_POST['category-detail']);            
        }else {               
          $category_name = $_POST['category-name'];               
          $category_detail = $_POST['category-detail'];            
        }                                              
        $sql = "INSERT INTO `dbcloth`.`product_category` 
                (`id_product_category`, `category_name`, `category_detail`) 
                VALUES (NULL, '$category_name', '$category_detail')";
        mysql_select_db('dbcloth');            
        $retval = mysql_query( $sql, $conn );                        
        if(! $retval ) {               
          die('Could not enter data: ' . mysql_error());            
        }                        
        echo "Entered data successfully\n";                        
        mysql_close($conn);         
        }else { 
  ?>
  <form class="ui form" method="POST"  action="<?php $_PHP_SELF ?>">
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
  <?php
    }
  ?>
</div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Edit Kategori Barang
  </div>
  <div class="content">
    <?php 
     if(isset($_POST['update-category'])) {            
        $dbhost = 'localhost';            
        $dbuser = 'root';            
        $dbpass = '';            
        $conn = mysql_connect($dbhost, $dbuser, $dbpass);                        
        if(! $conn ) {               
          die('Could not connect: ' . mysql_error());            
        }                        
        $cat_id = $_POST['category-id-edit'];
        $cat_name = $_POST['category-name-edit'];
        $cat_detail = $_POST['category-detail-edit'];
        $sql = "UPDATE `dbcloth`.`product_category` ".
                "SET category_name = $cat_name, category_detail = $cat_detail ".
                "WHERE id_product_category = $cat_id";
        mysql_select_db('dbcloth');            
        $retval = mysql_query( $sql, $conn );                        
        if(! $retval ) {               
          die('Could not enter data: ' . mysql_error());            
        }                        
        echo "Updated data successfully\n";                        
        mysql_close($conn);         
        }else { 
    ?>
    
    <form class="ui form" method="POST"  action="<?php $_PHP_SELF ?>">
    <div class="field">
        <label>ID Kategori</label>
        <input type="number" name="category-id-edit" placeholder="ID Kategori">
      </div>
      <div class="field">
        <label>Nama Kategori</label>
        <input type="text" name="category-name-edit" placeholder="Nama Kategori">
      </div>
      <div class="field">
        <label>Detail Kategori</label>
        <textarea type="text" name="category-detail-edit"></textarea>
      </div>
      <input class="ui primary button" name="update-category" type="submit" value="Update">
    </form>
    <?php
        }
    ?>
  </div>
</div>

<?php
if(isset($_POST['delete-category'])) {            
    $dbhost = 'localhost';            
    $dbuser = 'root';            
    $dbpass = '';            
    $conn = mysql_connect($dbhost, $dbuser, $dbpass);                        
    if(! $conn ) {               
      die('Could not connect: ' . mysql_error());            
    }
    $cate_id = $_POST['id_product_category'];                        
    $sql = "DELETE FROM `dbcloth`.`product_category` WHERE id_product_category = $cate_id";
    mysql_select_db('dbcloth');           
    $retval = mysql_query( $sql, $conn );                        
    if(! $retval ) {               
      die('Could not delete data: ' . mysql_error());            
    }                        
    echo "Deleted data successfully\n";                        
    mysql_close($conn);
}
?>

<script>
  $('.ui.modal').modal('attach events', '#edit-category', 'show');
</script>