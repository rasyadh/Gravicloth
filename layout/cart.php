<!-- Cart -->
<section class="nav-cart">

  <section class="list-cart">
    <div class="ui container">
      <div class="ui very padded segment square">
        <section class="title-cart">
          <div class="ui center aligned container">
            <div class="ui header">Cart
              <i class="big add to cart icon"></i>
            </div>
          </div>
        </section>

        <table class="ui compact unstackable table">
          <thead>
            <tr>
              <th>Produk</th>
              <th>Harga</th>
              <th>Ukuran</th>
              <th class="right aligned">Jumlah</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($_SESSION['user_session'])){
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT * FROM cart c, product p, design d, size s WHERE c.id_user=:id_user AND c.id_product=p.id_product AND c.id_design=d.id_design AND c.id_size=s.id_size';
                $q = $pdo->prepare($sql);
                $q->execute(array(':id_user'=>$userInfoRow['id_user']));
                $row = $q->fetchAll();
                Database::disconnect();

                if (COUNT($row) > 0){
                  for ($i = 0; $i < COUNT($row); $i++){
            ?>
                    <tr>
                        <td>
                            <img class="ui tiny middle aligned image" src="<?= $row[$i]['image_url'] ?>" style="z-index: 999; position: absolute;">
                            <img class="ui tiny middle aligned image" src="<?= $row[$i]['product_image'] ?>">
                            <span><?= $row[$i]['product_name'] ?></span>
                        </td>
                        <td>Rp <?php echo $row[$i]['price']; ?></td>
                        <td><?php echo $row[$i]['size_code']; ?></td>
                        <td class="right aligned">
                          <input type="number" value="<?= $row[$i]['quantity'] ?>">
                          <a><i class="delete link icon"></i></a>
                        </td>
                    </tr>
            <?php
                  }
                }
                else {
            ?>
                  <tr>
                    <td colspan="4">
                      <p class="ui center aligned header" style="padding:2em;">Cart Masih Kosong !</p></td>
                  </tr>
            <?php
                }
            ?>
            <?php
              }
              else {
                echo '<tr>';
                echo '<td colspan="4"><p class="ui center aligned header" style="padding:2em;">Masuk Terlebih Dahulu !</p></td>';
                echo '</tr>';
              }
            ?>
            </tbody>
            <tfoot>
                <tr>
                  <th colspan="4">
                    <div class="ui right aligned">
                        Total Belanja : Rp 
                    </div>
                  </th>
                </tr>
                <tr>
                  <th colspan="4">
                    <a href="?=home" class="ui inverted blue button">Belanja Lagi</a>
                    <a class="ui right floated primary button">
                      Selesaikan Pembayaran
                    </a>
                  </th>
                </tr>
              </tfoot>
        </table>
      </div>
    </div>
  </section>
</section>