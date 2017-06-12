<!-- Detail Barang -->
<section class="detail-top-section">

    <?php
        $id_prod = $_GET['id'];
        $pdo = Database::connect();
        $sql = 'SELECT * FROM product p, product_category pc, color c WHERE p.id_category=pc.id_category AND p.id_color=c.id_color AND id_product=:id';
        $q = $pdo->prepare($sql);
        $q->execute(array(':id'=>$id_prod));
        $row = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    ?>

    <div class="ui container" id="detail-item">
        <section class="title-detail-section">
            <div class="ui container square" id="title-product">
                <div class="ui header">
                    Custom <?php echo $row['product_name']; ?>
                    <div class="sub header">
                        Kategori <?php echo $row['category_name']; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="detail-product-section">
            <div class="ui stackable grid">
                <div class="six wide column">
                    <div class="ui padded segment square" id="show" style="width:400px; height:400px;">
                        <img id="design-top" class="ui fluid centered bordered image full-image" src="public/images/design/blank.png" style="z-index: 999; position: absolute; left:50; top:50; width:350px; height:350px;">
                        <img class="ui fluid centered bordered image full-image" src="<?php echo $row['product_image']; ?>" style="z-index: 2; position: absolute; left:50; top:50; width:350px; height:350px;">
                    </div>
                </div>
                <div class="ten wide column">
                    <div class="ui  segment square" id="custom-product">
                        <a class="ui blue ribbon label"><?php echo $row['product_name']; ?></a>
                        <div class="ui middle aligned list">
                            <div class="item">
                                <div class="left floated content">
                                    <div class="ui blue label">
                                        <i class="shopping bag icon"></i>
                                        Stok Tersedia <?php echo $row['stock']; ?> Barang
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="ui blue tag label">
                                        Rp <?= $row['price'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                        <div class="ui top attached tabular two item menu">
                            <a class="item active" data-tab="desain">Desain</a>
                            <a class="item" data-tab="ukuran">Ukuran</a>
                        </div>
                        <div class="ui bottom attached tab segment active" id="height-custom" data-tab="desain">
                            <div class="ui grid wrapper-design" id="thumbnails">
                                <div class="three wide column"><img id="select-design" class="ui small bordered image" src="public/images/design/blank.png" alt="61"></div>
                                <?php
                                    $pdo = Database::connect();
                                    $sql = 'SELECT * FROM design WHERE design_code=:design_code';
                                    $q = $pdo->prepare($sql);
                                    $q->execute(array(':design_code'=>$row['design_code']));
                                    foreach($q as $designcode){
                                        echo '<div class="three wide column">
                                    <img id="select-design" class="ui small bordered image" src="'.$designcode['image_url'].'" alt="'.$designcode['id_design'].'"></div>';
                                    }
                                    Database::disconnect();
                                ?>
                            </div>
                        </div>
                        <div class="ui bottom attached tab segment" id="height-custom" data-tab="ukuran">
                            <div class="ui container" style="padding: 1em;">
                                <div class="ui container">
                                    <div class="ui small header">
                                        Ukuran :
                                    </div>
                                    <?php
                                        $pdo = Database::connect();
                                        $sql = 'SELECT id_size, size_code FROM size';
                                        $sizes = 1;
                                        foreach ($pdo->query($sql) as $size){
                                    ?>
                                        <a id="size<?= $sizes ?>" class="ui inverted blue button" onclick="chooseSize(<?= $size['id_size'] ?>, 'size<?= $sizes ?>')">
                                            <?php echo $size['size_code']; ?>
                                        </a>
                                    <?php
                                            $sizes++;
                                        }
                                        Database::disconnect();
                                    ?>
                                </div>
                                </br>
                                <div class="ui center aligned container">
                                    <a class="ui right labeled icon primary button" id="size-chart">
                                        <i class="info icon"></i>
                                        Size Chart</a>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="<?php $_PHP_SELF ?>">
                            <input type="hidden" id="id-user" required name="id-user" value="<?= $user_id ?>">
                            <input type="hidden" id="id-product" required name="id-product" value="<?= $id_prod ?>">
                            <input type="hidden" id="product-name" required name="product-name" value="<?= $row['product_name'] ?>">
                            <input type="hidden" id="price" required name="price" value="<?= $row['price'] ?>">
                            <input type="hidden" id="id-design" required name="id-design" value="0">
                            <input type="hidden" id="id-size" required name="id-size">
                            <div class="field">
                                <input class="ui fluid primary button" type="submit" name="add-to-cart" value="SELESAI CUSTOM">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="ui container" id="detail-item">
        <div class="ui padded segment">
            <div class="ui center aligned header">
                Review
            </div>
            <div class="ui divider"></div>

            <form class="ui form">
                <div class="field">
                    <label>Tulis review untuk produk ini</label>
                    <textarea type="text" name="review"></textarea>
                </div>
                <input class="ui fluid primary button" name="add-review" type="submit">
            </form>
        </div>
    </div>
</section>

<div class="ui modal size">
  <i class="close icon"></i>
  <div class="header">
    Size Chart
  </div>
  <div class="content">
    <table class="ui stackable celled table">
        <thead>
            <tr>
                <th>Size</th>
                <th>Bahu</th>
                <th>Dada</th>
                <th>Leher</th>
                <th>Ketiak</th>
                <th>Perut</th>
                <th>Pinggul</th>
                <th>Lingkar Lengan</th>
                <th>Panjang Lengan</th>
                <th>Panjang</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $pdo = Database::connect();
            $sql = 'SELECT * FROM size ORDER BY id_size ASC';
            foreach ($pdo->query($sql) as $row){
                echo '<tr>';
                echo '<td>'.$row['size_code'].'</td>';
                echo '<td>'.$row['bahu'].'</td>';
                echo '<td>'.$row['dada'].'</td>';
                echo '<td>'.$row['leher'].'</td>';
                echo '<td>'.$row['ketiak'].'</td>';
                echo '<td>'.$row['perut'].'</td>';
                echo '<td>'.$row['pinggul'].'</td>';
                echo '<td>'.$row['lingkar_lengan'].'</td>';
                echo '<td>'.$row['panjang_lengan'].'</td>';
                echo '<td>'.$row['panjang'].'</td>';
                echo '</tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
  </div>
</div>

<?php
    if (isset($_POST['add-to-cart'])){
        $id_user = $_POST['id-user'];
        $id_product = $_POST['id-product'];
        $product_name = $_POST['product-name'];
        $price = $_POST['price'];
        $id_design = $_POST['id-design'];
        $id_size = $_POST['id-size'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_product FROM cart WHERE id_product=:prod AND id_user=:user AND id_design=:design AND id_size=:size";
        $q = $pdo->prepare($sql);
        $q->execute(array(':prod'=>$id_product, ':user'=>$id_user, ':design'=>$id_design, ':size'=>$id_size));
        $jumlah = $q->fetchColumn();
        Database::disconnect();

        if ($jumlah == 0){
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO cart (id_user, id_product, product_name, price, id_design, id_size, quantity) VALUES (:user, :prod, :name, :price, :design, :size, 1)";
            $q = $pdo->prepare($sql);
            $q->execute(array(':user'=>$id_user, ':prod'=>$id_product, ':name'=>$product_name, ':price'=>$price, ':design'=>$id_design, ':size'=>$id_size));
            Database::disconnect();
        }
        else {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE cart SET quantity = quantity + 1 WHERE id_user=:user AND id_product=:prod AND id_design=:design AND id_size=:size";
            $q = $pdo->prepare($sql);
            $q->execute(array(':user'=>$id_user, ':prod'=>$id_product, ':design'=>$id_design, ':size'=>$id_size));
            Database::disconnect();
        }

        if (empty($user_id)){
            ?>
            <script type="text/javascript">
                var r = confirm("Masuk terlebih dahulu untuk bisa menambahkan ke cart");
                if (r == true){ 
                    window.location.href = 'http://localhost/gravicloth/?p=login'; 
                }
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
            window.location.href = 'http://localhost/gravicloth/?p=cart';
            </script>
            <?php
        }
    Database::disconnect();
  }
?>

<script>
    var last_active_class = null;
    function chooseSize(id, id_class){
        $('#id-size').empty();
        $('#id-size').append(id);
        $('#id-size').attr('value',id);
        if(last_active_class == null){
            $('#'+id_class).addClass('active');
            last_active_class = "#"+id_class;
        }else{
            $(last_active_class).removeClass('active');
            $('#'+id_class).addClass('active');
            last_active_class = "#"+id_class;
        }
        console.log("id_size : "+id);
    }

    $('.menu .item').tab();

    $('.ui.modal.size').modal('attach events', '#size-chart', 'show');

    $(document).ready(function(){
        $('#thumbnails div').click(function(){
            var path = $(this).find('img').attr("src");
            var design = $(this).find('img').attr("alt");
            $('#show #design-top').attr("src", path);
            $('#id-design').empty();
            $('#id-design').append(design);
            $('#id-design').attr('value', design);
            console.log("id_design : "+design);
        });
    });

</script>