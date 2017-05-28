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
                        $list_kategory = ['Kaos', 'Kemeja', 'Jaket', 'Polo', 'Sweater', 'Tas', 'Celana'];
                        for($i = 0; $i < sizeof($list_kategory); $i++){ 
                            if (strtolower($list_kategory[$i]) == $cat_selected){
                                $category = $list_kategory[$i];
                                echo '<a class="item active kategori" href="?p='.$cat_selected.'">'.$list_kategory[$i].'</a>';
                            }
                            else {
                                echo '<a class="item kategori" href="?p='.strtolower($list_kategory[$i]).'">'.$list_kategory[$i].'</a>';
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

                                <?php for($x = 0; $x < 8; $x++) {
                                    echo '<div class="card">';
                                    echo '<a class="image" href="?p=content-detail">
                                        <img src="public/images/gravicloth-logo.png">
                                    </a>';
                                    echo '<div class="content">
                                            <a class="header" href="?p=content-detail">'.
                                                $category.' '.($x + 1).
                                            '</a>
                                            <div class="meta">
                                                <a href="?p=content-detail">'.'Rp '.((10000 * $x) + 10000).'</a>
                                            </div>
                                        </div>';
                                    echo '</div>';
                                }
                                ?>

                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>
</section>