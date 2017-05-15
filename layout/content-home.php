<!-- Banner -->
        <section class="home-top-section">
            <div class="banner-section">
                <section class="ui segment banner slider square" id="banner">
                    <div><img class="center-cropped" src="public/images/banner/banner-1.jpg"></div>
                    <div><img class="center-cropped" src="public/images/banner/banner-2.jpg"></div>
                    <div><img class="center-cropped" src="public/images/banner/banner-3.jpg"></div>
                    <div><img class="center-cropped" src="public/images/banner/banner-4.jpg"></div>
                </section>
            </div>
        </section>

        <!-- Kelebihan Custom -->
        <section class="custom-section">
            <div class="ui container">
                <div class="ui segment square" id="custom">
                    <div class="ui text container">
                        <div class="ui center aligned header">
                            Kelebihan Custom
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui stackable equal width padded grid">
                        <div class="column">
                            <h4 class="ui header">
                                <i class="blue diamond icon"></i>
                                <div class="content">
                                    Desain
                                    <div class="sub header">Desain yang beragam.</div>
                                </div>
                            </h4>
                        </div>
                        <div class="column">
                            <h4 class="ui header">
                                <i class="blue theme icon"></i>
                                <div class="content">
                                    Warna
                                    <div class="sub header">Warna sesuai keinginan.</div>
                                </div>
                            </h4>
                        </div>
                        <div class="column">
                            <h4 class="ui header">
                                <i class="blue sort icon"></i>
                                <div class="content">
                                    Ukuran
                                    <div class="sub header">Ukuran sesuai kebutuhan</div>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Icon Kategori -->
        <section class="ico-category-section">
            <div class="ui very padded container">
                <div class="ui stackable equal width grid">
                    <?php 
                        $list_ico_kategory = ['ico_kaos.svg', 'ico_kemeja.svg', 'ico_polo.svg', 'ico_hoodie.svg', 'ico_sweater.svg', 'ico_tas.svg', 'ico_celana.svg'];
                        for($i = 0; $i < 7; $i++){
                    ?>

                    <div class="column">
                        <div class="ui very padded segment square">
                            <a class="ui tiny image" href="?p=content-category">
                                <?php 
                                    echo '<img src="public/images/'.$list_ico_kategory[$i].'">';
                                ?>
                            </a>
                        </div>
                    </div>

                    <?php } ?>

                </div>
            </div>
        </section>

        <!-- Show Barang per Kategori -->
        <section class="showroom-section">
            <div class="ui container">

                <?php 
                $list_kategory = ['Kaos', 'Kemeja', 'Jaket', 'Polo', 'Sweater', 'Tas', 'Celana'];
                for($i = 0; $i < sizeof($list_kategory); $i++){ ?>
                    <div class="barang-section">
                        <div class="ui blue very padded segment" id="show-barang">
                            <div class="ui stackable grid">
                                <div class="eight wide column">
                                    <div class="ui left aligned header">
                                        <?= $list_kategory[$i] ?>
                                    </div>
                                </div>
                                <div class="eight wide column">
                                    <a href="?p=content-category" class="ui right floated inverted blue button">Lihat Selengkapnya</a>
                                </div>
                            </div>

                            <div class="ui divider"></div>

                            <div class="ui container">
                                <div class="ui five stackable cards">

                                    <?php for($x = 0; $x < 5; $x++) {
                                        echo '<div class="card">';
                                        echo '<a class="image" href="?p=content-detail">
                                            <img src="public/images/gravicloth-logo.png">
                                        </a>';
                                        echo '<div class="content">
                                                <a class="header" href="#">'.
                                                    'Kaos '.($x + 1).
                                                '</a>
                                                <div class="meta">
                                                    <a>'.'Rp '.((10000 * $x) + 10000).'</a>
                                                </div>
                                            </div>';
                                        echo '</div>';
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>            

            </div>
        </section>