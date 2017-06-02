<header class="header">
            <!-- Following Header -->
            <div class="ui fixed hidden borderless menu square" id="nav-header">
                <div class="ui container">
                    <div class="item">
                        <a href="?=home">
                            <img class="ui small image" src="public/images/logo.png">
                        </a>
                    </div>
                    <div class="right item">
                        <div class="ui simple dropdown item" id="kategori-header">
                            <strong>Kategori</strong>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                               <?php
                                    $pdo = Database::connect();
                                    $sql = 'SELECT category_name FROM product_category ORDER BY id_category ASC';
                                    foreach ($pdo->query($sql) as $row){
                                        echo '<a class="item" href="?p='.strtolower($row['category_name']).'">'.$row['category_name'].'</a>';
                                    }
                                    Database::disconnect();
                                ?>
                            </div>
                        </div>

                        <div class="item">
                            <div class="ui action input">
                                <input type="text" placeholder="Apa yang anda cari ?">
                                <button class="ui icon primary button">
                                    <i class="search icon"></i>
                                </button>
                            </div>
                        </div>
                        <a href="?p=cart" class="item">
                            <div class="ui header cart">
                                <i class="big blue add to cart icon"></i>
                            </div>
                        </a>
                        <div class="item">
                            <a href="?p=login" class="ui primary button masuk" id="square-button">Masuk</a>
                        </div>
                        <div class="item">
                            <a href="?p=register" class="ui inverted blue button daftar" id="square-button">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <div class="ui borderless menu square" id="nav-header">
                <div class="ui container">
                    <div class="item">
                        <a href="?=home">
                            <img class="ui small image" src="public/images/logo.png">
                        </a>
                    </div>
                    <div class="right item">
                        <div class="ui simple dropdown item" id="kategori-header">
                            <strong>Kategori</strong>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <?php
                                    $pdo = Database::connect();
                                    $sql = 'SELECT category_name FROM product_category ORDER BY id_category ASC';
                                    foreach ($pdo->query($sql) as $row){
                                        echo '<a class="item" href="?p='.strtolower($row['category_name']).'">'.$row['category_name'].'</a>';
                                    }
                                    Database::disconnect();
                                ?>
                            </div>
                        </div>

                        <div class="item">
                            <div class="ui action input">
                                <input type="text" placeholder="Apa yang anda cari ?">
                                <button class="ui icon primary button">
                                    <i class="search icon"></i>
                                </button>
                            </div>
                        </div>
                        <a href="?p=cart" class="item">
                            <div class="ui header cart">
                                <i class="big blue add to cart icon"></i>
                            </div>
                        </a>
                        <div class="item">
                            <a href="?p=login" class="ui primary button masuk" id="square-button">Masuk</a>
                        </div>
                        <div class="item">
                            <a href="?p=register" class="ui inverted blue button daftar" id="square-button">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>