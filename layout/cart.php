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
                $total_harga = 0;
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
                    $total_harga += ($row[$i]['price'] * $row[$i]['quantity']);
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
                        <?php 
                        if (isset($_SESSION['user_session'])){
                          ?>
                          <strong>Total Belanja</strong> : Rp <?= $total_harga ?>
                          <?php
                        }
                        else {
                          ?>
                          <strong>Total Belanja</strong> : Rp 0
                          <?php
                        }
                        ?>
                    </div>
                  </th>
                </tr>
              </tfoot>
        </table>

        <div class="ui container">
          <form method="POST">
            <a href="?=home" class="ui inverted blue button">Belanja Lagi</a>
            <input type="hidden" name="id-user" value="<?= $row[0]['id_user'] ?>">
            <input type="hidden" name="total-payment" value="<?= $total_harga ?>">
            <input type="submit" class="ui right floated primary button" id="bayar" name="transaction" value="Selesaikan Pembayaran">
          </form>
        </div>
      </div>
    </div>
  </section>
</section>

<div class="ui modal bayar">
  <i class="close icon"></i>
  <div class="header">
    Detail Pembayaran
  </div>
  <div class="content">
    <div class="ui header">
      <?php
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_transaction FROM transaction WHERE id_user=:user ORDER BY transaction_date ASC";
        $q = $pdo->prepare($sql);
        $q->execute(array(':user'=>$user_id));
        $transaction = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT u.name, t.total_payment, t.transaction_date FROM user u, transaction t WHERE u.id_user=t.id_user AND t.id_transaction=:transaction";
        $q = $pdo->prepare($sql);
        $q->execute(array(':transaction'=>$transaction['id_transaction']));
        $detail = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
        echo $detail['name'];
      ?>
    </div>
    <p>Total Pembayaran : <?= $detail['total_payment'] ?></p>
    <p>Tanggal Pembayaran : <?= $detail['transaction_date'] ?></p>
  </div>
  <div class="actions">
    <a class="ui primary ok button" onclick="toHome()">Selesai</a>
  </div>
</div>

<?php
  if (isset($_POST['transaction'])){
        $id_user = $_POST['id-user'];
        $total_payment = $_POST['total-payment'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO transaction (id_user, total_payment) VALUES (:id, :payment)";
        $q = $pdo->prepare($sql);
        $q->execute(array(':id'=>$id_user, ':payment'=>$total_payment));
        Database::disconnect();

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id_transaction FROM transaction WHERE id_user=:user ORDER BY transaction_date ASC";
        $q = $pdo->prepare($sql);
        $q->execute(array(':user'=>$id_user));
        $transaction = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        for ($i = 0; $i < COUNT($row); $i++){
          $pdo = Database::connect();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO transaction_detail (id_transaction, id_product, id_design, id_size, quantity) VALUES (:transaction, :product, :design, :size, :quantity)";
          $q = $pdo->prepare($sql);
          $q->execute(array(':transaction'=>$transaction['id_transaction'], ':product'=>$row[$i]['id_product'], ':design'=>$row[$i]['id_design'], ':size'=>$row[$i]['id_size'], ':quantity'=>$row[$i]['quantity']));
          Database::disconnect();
        }

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM cart WHERE id_user=:user";
        $q = $pdo->prepare($sql);
        $q->execute(array(':user'=>$id_user));
        Database::disconnect();
?>
    <script>
      $('.ui.modal.bayar').modal('show');
    </script>
<?php
  }
?>

<script>
    function toHome(){
      window.location.href = 'http://localhost/gravicloth/?p=cart';
    }
</script>