<br/>
	
<div class="ui menu square">
	<a href="?d=overview" class="item header">Overview</a>
</div>

<?php
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = 'SELECT YEAR(created_at), MONTH(created_at), COUNT(id_user) 
			FROM `user` 
			WHERE created_at >= CURRENT_DATE() - INTERVAL 1 YEAR 
			GROUP BY YEAR(created_at), MONTH(created_at)';
	$userPerMonth = array(12);
	$q = $pdo->prepare($sql);
    $q->execute();
    $rows = $q->fetchAll();    

	for ($i = 1; $i <= 12; $i++){
		for ($j = 0; $j < 3; $j++){
			if ($rows[$j][1] == $i){
				$userPerMonth[$i] = $rows[$j][2];
				break;
			}
			else {
				$userPerMonth[$i] = 0;
			}
		}
	}
?>

<div class="ui blue padded segment square">
	<div class="ui center aligned header">Jumlah Transaksi</div>
	<div class="ui divider"></div>
	<div>
		<canvas id="transaksiChart"></canvas>
	</div>
</div>

<div class="ui blue padded segment square">
	<div class="ui center aligned header">Jumlah User</div>
	<div class="ui divider"></div>
	<div>
		<canvas id="userChart"></canvas>
	</div>
</div>

<div class="ui blue padded segment square">
	<div class="ui center aligned header">Barang per Kategori</div>
	<div class="ui divider"></div>
	<div>
		<canvas id="barangChart"></canvas>
	</div>
</div>

<script>

	$(document).ready(function(){

		var jumlahTransaksi = document.getElementById("transaksiChart").getContext("2d");
		var transaksi_chart = new Chart(jumlahTransaksi, {
			type: 'line',
			data: {
				labels: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
				datasets: [
					{
						label: "Transaksi per Bulan",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(75,192,192,0.4)",
						borderColor: "rgba(75,192,192,1)",
						borderCapStyle: 'butt',
						borderDash: [],
						borderDashOffset: 0.0,
						borderJoinStyle: 'miter',
						pointBorderColor: "rgba(75,192,192,1)",
						pointBorderWidth: 10,
						pointHoverRadius: 10,
						pointHoverBackgroundColor: "rgba(75,192,192,1)",
						pointHoverBorderColor: "rgba(220,220,220,1)",
						pointHoverBorderWidth: 2,
						pointRadius: 1,
						pointHitRadius: 10,
						data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
						spanGaps: false,
					}
				]
			},
			options: {
				animation: {
					animateScale: true
				},
				responsive: true,		
			}
		});

		var jumlahUser = document.getElementById("userChart").getContext("2d");
		var user_chart = new Chart(jumlahUser, {
			type: 'line',
			data: {
				labels: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
				datasets: [
					{
						label: "Transaksi per Bulan",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(75,192,192,0.4)",
						borderColor: "rgba(75,192,192,1)",
						borderCapStyle: 'butt',
						borderDash: [],
						borderDashOffset: 0.0,
						borderJoinStyle: 'miter',
						pointBorderColor: "rgba(75,192,192,1)",
						pointBorderWidth: 10,
						pointHoverRadius: 10,
						pointHoverBackgroundColor: "rgba(75,192,192,1)",
						pointHoverBorderColor: "rgba(220,220,220,1)",
						pointHoverBorderWidth: 2,
						pointRadius: 1,
						pointHitRadius: 10,
						data: [0, 0, 0, 1, 2, 2, 0, 0, 0, 0, 0, 0],
						spanGaps: false,
					}
				]
			},
			options: {
				animation: {
					animateScale: true
				},
				responsive: true,		
			}
		});

		var barangPerKategori = document.getElementById("barangChart").getContext("2d");
		var barang_chart = new Chart(barangPerKategori, {
			type: 'bar',
			data: {
				labels: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],
				datasets: [
					{
						label: "Bulan",
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)',
							'rgba(200, 160, 2, 0.2)', 'rgba(60, 100, 35, 0.2)',
							'rgba(200, 20, 230, 0.2)', 'rgba(80, 200, 92, 0.2)',
							'rgba(153, 10, 55, 0.2)', 'rgba(55, 59, 64, 0.2)'
						],
						borderColor: [
							'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
							'rgba(200, 160, 2, 1)', 'rgba(60, 100, 35, 1)',
							'rgba(200, 20, 230, 1)', 'rgba(80, 200, 92, 1)',
							'rgba(153, 10, 55, 1)', 'rgba(55, 59, 64, 1)'
						],
						borderWidth: 1,
						data: [0, 0, 0, 0, 0, 72, 0, 0, 0, 0, 0, 0],
					}
				]
			},
			options: {
				animation: {
					animateScale: true
				},
				responsive: true,
				scales: {
					yAxes: [{
						display: true,
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});

	});
</script>