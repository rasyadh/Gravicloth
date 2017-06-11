<!-- Detail Barang -->
<section class="detail-top-section">

    <!-- Breadcrumb -->
    <!--<section class="breadcrumb-section">
        <div class="ui container">
            <div class="ui breadcrumb">
                <a class="section" href="?=home">Home</a>
                <div class="divider"> / </div>
                <a class="section">Category</a>
                <div class="divider"> / </div>
                <div class="active section">Kemeja</div>
            </div>
        </div>
    </section>-->

    <?php
        $id = $_GET['id'];
        $pdo = Database::connect();
        $sql = 'SELECT * FROM product p, product_category pc, color c WHERE p.id_category=pc.id_category AND p.id_color=c.id_color AND id_product=:id';
        $q = $pdo->prepare($sql);
        $q->execute(array(':id'=>$id));
        $row = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        $jumlah = 1;
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
                                        Rp <?php echo $row['price'] * $jumlah; ?>
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
                                <div class="three wide column"><img id="select-design" class="ui small bordered image" src="public/images/design/blank.png"></div>
                                <?php
                                    $pdo = Database::connect();
                                    $sql = 'SELECT * FROM design WHERE design_code=:design_code';
                                    $q = $pdo->prepare($sql);
                                    $q->execute(array(':design_code'=>$row['design_code']));
                                    foreach($q as $designcode){
                                        echo '<div class="three wide column">
                                    <img id="select-design" class="ui small bordered image" src="'.$designcode['image_url'].'" alt="'.$designcode['design_name'].'"></div>';
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
                                        $sql = 'SELECT size_code FROM size';
                                        foreach ($pdo->query($sql) as $size){
                                    ?>
                                        <a class="column">
                                            <div class="ui inverted blue button">
                                                <?php echo $size['size_code']; ?>
                                            </div>
                                        </a>
                                    <?php
                                        }
                                        Database::disconnect();
                                    ?>
                                </div>
                                </br>
                                <div class="ui center aligned container">
                                    <a class="ui primary button" id="size-chart">Size Chart</a>
                                </div>
                            </div>
                        </div>

                        <div class="ui stackable equal width grid">
                            <div class="column">
                                <button class="ui fluid primary button">BELI SEKARANG</button>
                            </div>
                            <div class="column">
                                <button class="ui fluid primary button">TAMBAH KE CART</button>
                            </div>
                        </div>
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

<script>
    $('.menu .item').tab();

    $('.ui.modal.size').modal('attach events', '#size-chart', 'show');

    $(document).ready(function(){
        $('#thumbnails div').click(function(){
            var path = $(this).find('img').attr("src");
            $('#show #design-top').attr("src", path);
        });
    });
</script>