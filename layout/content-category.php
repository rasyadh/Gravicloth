<!-- Kategori & List barang -->
<section class="category-top-section">
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="three wide column">
                <div class="category-section">
                    <div class="ui vertical borderless menu square" id="category">
                        <div class="item">
                            <div class="ui header">
                                Kategori Barang
                            </div>
                        </div>
                        <?php 
                            $pdo = Database::connect();
                            $sql = 'SELECT id_category, category_name FROM product_category ORDER BY id_category ASC';
                            foreach ($pdo->query($sql) as $row){
                                if (strtolower($row['category_name']) == $cat_selected){
                                    $id_category = $row['id_category'];
                                    $category = $row['category_name'];
                                    echo '<a class="item active kategori" href="?p='.$cat_selected.'">'.$row['category_name'].'</a>';
                                }
                                else {
                                    echo '<a class="item kategori" href="?p='.strtolower($row['category_name']).'">'.$row['category_name'].'</a>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="thirteen wide column">
                <div class="title-product-section">
                    <section class="ui padded segment square">
                        <div class="ui container">
                            <div class="ui header" id="title-kategori">
                                <?php
                                    echo 'Kategori "'.$category.'"';
                                ?>
                            </div>
                        </div>
                    </section>

                    <section class="ui very padded segment square" id="list-item">
                        <div class="ui container">
                            <div class="ui four stackable cards">

                                <?php 
                                    $pdo = Database::connect();
                                    $sql = 'SELECT p.id_product, p.product_image, p.product_name, p.price FROM product p WHERE p.id_category = ? ORDER BY id_product ASC';
                                    $q = $pdo->prepare($sql);
                                    
                                    if ($q->execute(array($id_category))){
                                        foreach ($q as $row){
                                            echo '<div class="card">';
                                            echo '<a class="image" href="?p=content-detail">
                                                <img src="'.$row['product_image'].'">
                                            </a>';
                                            echo '<div class="content">
                                                    <a class="header" href="?p=content-detail">'.$row['product_name'].'</a>
                                                    <div class="meta">
                                                        <a href="?p=content-detail">'.'Rp '.$row['price'].'</a>
                                                    </div>
                                                </div>';
                                            echo '</div>';
                                        }
                                    }
                                    Database::disconnect();
                                ?>

                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>
</section>