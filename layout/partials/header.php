<header class="header">
            <!-- Sidebar Menu -->
            <div class="ui top vertical borderless sidebar menu">
                <div class="item">
                    <a href="?=home">
                        <img class="ui centered tiny image" src="public/images/logo.png">
                    </a>
                </div>
                <a href="?p=cart" class="item">Cart</a>
                <a href="?p=login" class="item">Masuk</a>
                <a href="?p=register" class="item">Daftar</a>
                <a href="?p=kaos" class="item">Kaos</a>
                <a href="?p=kemeja" class="item">Kemeja</a>
                <a href="?p=polo" class="item">Polo</a>
                <a href="?p=jaket" class="item">Jaket</a>
                <a href="?p=sweatshirt" class="item">Sweatshirt</a>
                <a href="?p=tas" class="item">Tas</a>
                <a href="?p=celana" class="item">Celana</a>
            </div>

            <!-- Header Menu -->
            <div class="ui borderless menu square masthead" id="nav-header">
                <div class="ui container">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="item" id="logo-side" style="width:80%;">
                        <img class="ui centered small image" src="public/images/logo.png">
                    </a>
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
                                    $list_cat = [];
                                    $pdo = Database::connect();
                                    $sql = 'SELECT category_name FROM product_category ORDER BY id_category ASC';
                                    foreach ($pdo->query($sql) as $row){
                                        echo '<a class="item" href="?p='.strtolower($row['category_name']).'">'.$row['category_name'].'</a>';
                                        array_push($list_cat, $row['category_name']);
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

                        <?php 
                            if (isset($_SESSION['user_session'])){
                        ?>
                                <div class="item">
                                <?php
                                    if ($userInfoRow['profile_pict']){
                                        echo '<a href="?p=profile"><img class="ui avatar image" src="'.$userInfoRow['profile_pict'].'"><span>'.$userInfoRow['name'].'</span></a>';
                                    }
                                    else {
                                        echo '<a href="?p=profile"><img class="ui avatar image" src="public\images\profile\default.jpg"><span>'.$userInfoRow['name'].'</span></a>';
                                    }
                                ?>
                                </div>

                                <div class="item">
                                    <a href="?p=logout" class="ui primary button masuk" id="square-button">Keluar</a>
                                </div>

                                <a href="#" onclick="signOut();">Sign out</a>
                                <script>
                                    function signOut() {
                                        var auth2 = gapi.auth2.getAuthInstance();
                                        auth2.signOut().then(function () {
                                        console.log('User signed out.');
                                        });
                                    }
                                </script>
                        <?php
                            }
                            else {
                        ?>
                                <div class="item">
                                    <a href="?p=login" class="ui primary button masuk" id="square-button">Masuk</a>
                                </div>
                                <div class="item">
                                    <a href="?p=register" class="ui inverted blue button daftar" id="square-button">Daftar</a>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

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
                                    foreach ($list_cat as $row){
                                        echo '<a class="item" href="?p='.strtolower($row).'">'.$row.'</a>';
                                    }
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
                        <?php 
                            if (isset($_SESSION['user_session'])){
                        ?>
                                <div class="item">
                                <?php
                                    if ($userInfoRow['profile_pict'] == NULL || $userInfoRow['profile_pict'] == ""){
                                        echo '<a href="?p=profile"><img class="ui avatar image" src="public\images\profile\default.jpg">
                                    <span>'.$userInfoRow['name'].'</span></a>';
                                    }
                                    else {
                                        echo '<a href="?p=profile"><img class="ui avatar image" src="'.$userInfoRow['profile_pict'].'">
                                    <span>'.$userInfoRow['name'].'</span></a>';
                                    }
                                ?>
                                </div>

                                <div class="item">
                                    <a href="?p=logout" class="ui primary button masuk" id="square-button">Keluar</a>
                                </div>
                        <?php
                            }
                            else {
                        ?>
                                <div class="item">
                                    <a href="?p=login" class="ui primary button masuk" id="square-button">Masuk</a>
                                </div>
                                <div class="item">
                                    <a href="?p=register" class="ui inverted blue button daftar" id="square-button">Daftar</a>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>