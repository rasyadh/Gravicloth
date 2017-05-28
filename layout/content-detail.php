<!-- Detail Barang -->
<section class="detail-top-section">

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="ui container">
            <div class="ui breadcrumb">
                <a class="section" href="?=home">Home</a>
                <div class="divider"> / </div>
                <a class="section">Category</a>
                <div class="divider"> / </div>
                <div class="active section">Kemeja</div>
            </div>
        </div>
    </section>

    <div class="ui container" id="detail-item">
        <section class="title-detail-section">
            <div class="ui container square" id="title-product">
                <div class="ui header">
                    Custom Kemeja
                    <div class="sub header">
                        Kategori Kemeja
                    </div>
                </div>
            </div>
        </section>

        <section class="detail-product-section">
            <div class="ui stackable grid">
                <div class="seven wide column">
                    <div class="ui padded segment square">
                        <div class="ui stackable grid">
                            <div class="four wide column" id="thumbnail">

                                <?php for($x = 0; $x < 3; $x++) {
                                    echo '<a><img class="ui tiny image thumbnail" src="public/images/gravicloth-logo.png"></a>';
                                }
                                ?>
                                
                            </div>
                            <div class="twelve wide column" id="image-product">
                                <img class="ui fluid bordered image full-image" src="public/images/gravicloth-logo.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nine wide column">
                    <div class="ui padded segment square" id="custom-product">
                        <div class="ui middle aligned list">
                            <div class="item">
                                <div class="right floated content">
                                    Stok
                                </div>
                                <div class="content">
                                    Harga
                                    <span>
                                                Rp ###
                                            </span>
                                </div>
                            </div>
                        </div>
                        <div class="ui top attached tabular three item menu">
                            <a class="item active" data-tab="desain">Desain</a>
                            <a class="item" data-tab="warna">Warna</a>
                            <a class="item" data-tab="ukuran">Ukuran</a>
                        </div>
                        <div class="ui bottom attached tab segment active" id="height-custom" data-tab="desain">
                            Desain
                        </div>
                        <div class="ui bottom attached tab segment" id="height-custom" data-tab="warna">
                            Warna
                        </div>
                        <div class="ui bottom attached tab segment" id="height-custom" data-tab="ukuran">
                            Ukuran
                        </div>

                        <div class="ui stackable equal width grid">
                            <div class="column">
                                Jumlah
                            </div>
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
</section>

<script>
    $('.menu .item').tab();
</script>