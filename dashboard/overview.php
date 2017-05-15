<br/>
	
<div class="ui menu square">  
	  <div class="item header">
		Reporting Overview
	  </div>
	  
	  <div class="right menu">
		<a class="active teal item">
			Updates
			<div class="ui teal label">14</div>
		</a>
	 </div>
</div>

<div class="ui blue padded segment square">
	
	<div class="ui two stackable cards">
	  <div class="card">
		<div class="content">
			<h2 class="header center aligned">Jumlah Transaksi</h2>
			<div class="ui divider"></div>
			<table>
				<tr>
				<td><canvas id="transaksiChart"></canvas></td>
				<td class="chartData"></td>
				</tr>
			</table>
		</div>			
	  </div>	  
	  <div class="card">
		<div class="content">
			<h2 class="header center aligned">Jumlah User</h2>
			<div class="ui divider"></div>
			<table>
				<tr>
				<td><canvas id="userChart"></canvas></td>
				<td class="chartData"></td>
				</tr>
			</table>
		</div>
	  </div>  
	  <div class="card">
		<div class="content">
			<h2 class="header center aligned">Barang per Kategori</h2>
			<div class="ui divider"></div>
			<table>
				<tr>
				<td><canvas id="barangChart"></canvas></td>
				<td class="chartData"></td>
				</tr>
			</table>
		</div>
	  </div>
	</div>
	
</div>

<script>
    var barangPerKategori = document.getElementById("barangChart").getContext("2d");
    var barang_chart = new Chart(barangPerKategori, {
        type: 'pie',
        data: {
            labels: [
                "CPU Usage",
                "CPU Usage"
            ],
            datasets: [
                {
                    label: "%",
                    data: [2, 6],
                    backgroundColor: [
                        "#00B5AD",
                        "#A0A0A0"
                    ]
                }
            ]
        },
        options: {
            animation: {
                animateScale: true
            },
            responsive: true
        }
    });
</script>