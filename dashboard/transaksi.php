<br/>

<div class="ui menu square">
	<a href="?d=transaksi" class="item header">Transaksi</a>
</div>

<div class="ui blue padded segment square">
  <div class="ui header">List Barang</div>
    <table class="ui stackable structured table" id="myTable">
        <thead>
          <tr>
            <th>ID Transaksi</th>
            <th>User</th>
            <th>Total Pembayaran</th>
            <th>Tanggal Transaksi</th>
            <th>Status Pembayaran</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $pdo = Database::connect();
            $sql = 'SELECT t.id_transaction, u.name, t.total_payment, t.transaction_date FROM transaction t, user u WHERE t.id_user = u.id_user ORDER BY id_transaction ASC';
            foreach ($pdo->query($sql) as $row){
              echo '<tr>';
              echo '<td>'. $row['id_transaction'] . '</td>';
              echo '<td>'. $row['name'] . '</td>';
              echo '<td>'. $row['total_payment'] . '</td>';
              echo '<td>'. $row['transaction_date'] . '</td>';
              echo '<td>'.'<a class="ui green button" onclick="detail()">Detail</a>';
              echo '<a class="ui red button" onclick="del()">Delete</a>';
              echo '</td></tr>';
            }
            Database::disconnect();
          ?>
        </tbody>
    </table>
</div>

<script>
	$(document).ready(function(){
    	$('#myTable').DataTable();
	});
</script>