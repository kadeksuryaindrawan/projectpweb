
<?php
    $page = 'grafik';
    $pages = 'report';
    include "./partials/atas.php";
?> 
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Grafik</h5>
                                          <p class="m-b-0">Selamat datang di dashboard admin ProdiKU</p>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body row">
                                    <div class="col-4 mb-5">
                                        <h3 class="text-center mb-3">Dosen Tetap</h3>
                                        <canvas id="myChart"></canvas>
                                    </div>

                                    <div class="col-4 mb-5">
                                        <h3 class="text-center mb-3">Pendidikan DTPS</h3>
                                        <canvas id="myChart2"></canvas>
                                    </div>

                                    <div class="col-4 mb-5">
                                        <h3 class="text-center mb-3">Jabatan Akademik DTPS</h3>
                                        <canvas id="myChart3"></canvas>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <h3 class="text-center mb-3">Penelitian DTPS</h3>
                                        <canvas id="myChart4"></canvas>
                                    </div>

                                    <div class="col-6 mb-5">
                                        <h3 class="text-center mb-3">Pengabdian DTPS</h3>
                                        <canvas id="myChart5"></canvas>
                                    </div> 

                                    <div class="col-6 mb-5">
                                        <h3 class="text-center mb-3">Publikasi DTPS</h3>
                                        <canvas id="myChart6"></canvas>
                                    </div> 

                                    <div class="col-6 mb-5">
                                        <h3 class="text-center mb-3">Luaran Penelitian/PKM Lainnya</h3>
                                        <canvas id="myChart7"></canvas>
                                    </div>

                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    <?php
                            $dtps = mysqli_query($connection,"SELECT COUNT(*) AS total, SUM(IF(DTPS='y',1,0)) AS totaldtps, SUM(IF(DTPS='n',1,0)) AS totalnodtps FROM dosen WHERE status_dosen = 'tetap'");   
                            $data = mysqli_fetch_assoc($dtps);
                            $hasildtps = ($data['totaldtps']/$data['total']*100);
                            $hasilnodtps = ($data['totalnodtps']/$data['total']*100);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["DTPS : <?= number_format($hasildtps,0,",",".")."% " ?>","DT Lain : <?= number_format($hasilnodtps,0,",",".")."% " ?>"],
				datasets: [{
					label: 'Data Dosen',
					data: [
                        <?php
                            echo $data['totaldtps']; 
                        ?>,
                        <?php
                            echo $data['totalnodtps']; 
                        ?>,
                    ],
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart2").getContext('2d');
        <?php
                            $dtps = mysqli_query($connection,"SELECT SUM(IF(DTPS='y',1,0)) AS total, SUM(IF(pendidikan_terakhir='Doktor',1,0)) AS doktor, SUM(IF(pendidikan_terakhir='Sedang S3',1,0)) AS sedangs3, SUM(IF(pendidikan_terakhir='S2',1,0)) AS s2 FROM dosen WHERE status_dosen = 'tetap' AND DTPS = 'y'");   
                            $data = mysqli_fetch_assoc($dtps);
                            $hasildoktor = ($data['doktor']/$data['total']*100);
                            $hasilsedang = ($data['sedangs3']/$data['total']*100);
                            $hasils2 = ($data['s2']/$data['total']*100);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Doktor : <?= number_format($hasildoktor,0,",",".")."% " ?>","Sedang S3 : <?= number_format($hasilsedang,0,",",".")."% " ?>","S2 : <?= number_format($hasils2,0,",",".")."% " ?>"],
				datasets: [{
					label: 'Pendidikan DTPS',
					data: [
                        <?php
                            echo $data['doktor']; 
                        ?>,
                        <?php
                            echo $data['sedangs3']; 
                        ?>,
                        <?php
                            echo $data['s2']; 
                        ?>,
                    ],
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>


<script>
		var ctx = document.getElementById("myChart3").getContext('2d');
        <?php
                            $dtps = mysqli_query($connection,"SELECT SUM(IF(dosen.DTPS='y',1,0)) AS total, SUM(IF(nama_jabatan='Lektor Kepala',1,0)) AS lektorkep, SUM(IF(nama_jabatan='Lektor',1,0)) AS lektor, SUM(IF(nama_jabatan='Asisten Ahli',1,0)) AS asistenahli, jabatan.*,dosen.* FROM dosen INNER JOIN jabatan ON dosen.jabatan_akademik=jabatan.id WHERE dosen.status_dosen = 'tetap' AND dosen.DTPS = 'y'");   
                            $data = mysqli_fetch_assoc($dtps);
                            $hasillektorkep = ($data['lektorkep']/$data['total']*100);
                            $hasillektor = ($data['lektor']/$data['total']*100);
                            $hasilasistenahli = ($data['asistenahli']/$data['total']*100);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Lektor Kepala : <?= number_format($hasillektorkep,0,",",".")."% " ?>","Lektor : <?= number_format($hasillektor,0,",",".")."% " ?>","Asisten Ahli : <?= number_format($hasilasistenahli,0,",",".")."% " ?>"],
				datasets: [{
					label: 'Jabatan Akademik DTPS',
					data: [
                        <?php
                            echo $data['lektorkep']; 
                        ?>,
                        <?php
                            echo $data['lektor']; 
                        ?>,
                        <?php
                            echo $data['asistenahli']; 
                        ?>,
                    ],
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(255,99,132,1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart4").getContext('2d');
        <?php
                            $pt = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(tahun_penelitian=2022,1,0)) as ts, SUM(IF(tahun_penelitian=2021,1,0)) as ts1, SUM(IF(tahun_penelitian=2020,1,0)) as ts2, penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.status='terverifikasi' AND dosen.DTPS = 'y' AND penelitian.sumber_dana = 'PT/Mandiri'");   
                            $datapt = mysqli_fetch_assoc($pt);

                            $dlm = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(tahun_penelitian=2022,1,0)) as ts, SUM(IF(tahun_penelitian=2021,1,0)) as ts1, SUM(IF(tahun_penelitian=2020,1,0)) as ts2, penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.status='terverifikasi' AND dosen.DTPS = 'y' AND penelitian.sumber_dana = 'Dalam Negeri'");   
                            $datadlm = mysqli_fetch_assoc($dlm);

                            $luar = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(tahun_penelitian=2022,1,0)) as ts, SUM(IF(tahun_penelitian=2021,1,0)) as ts1, SUM(IF(tahun_penelitian=2020,1,0)) as ts2, penelitian.*, dosen.* FROM penelitian INNER JOIN dosen USING(nip) WHERE penelitian.status='terverifikasi' AND dosen.DTPS = 'y' AND penelitian.sumber_dana = 'Luar Negeri'");   
                            $dataluar = mysqli_fetch_assoc($luar);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2020","2021","2022"],
				datasets: [{
					label: 'PT/Mandiri',
					data: [
                        <?php
                            echo $datapt['ts2']; 
                        ?>,
                        <?php
                            echo $datapt['ts1']; 
                        ?>,
                        <?php
                            echo $datapt['ts']; 
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Dalam Negeri',
					data: [
                        <?php
                            echo $datadlm['ts2']; 
                        ?>,
                        
                        <?php
                            echo $datadlm['ts1']; 
                        ?>,
                        <?php
                            echo $datadlm['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Luar Negeri',
					data: [
                        <?php
                            echo $dataluar['ts2'];
                        ?>,
                        
                        <?php
                            echo $dataluar['ts1']; 
                        ?>,
                        <?php
                            echo $dataluar['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1,
                    
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart5").getContext('2d');
        <?php
                            $pt = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'PT/Mandiri'");   
                            $datapt = mysqli_fetch_assoc($pt);

                            $dlm = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'Dalam Negeri'");   
                            $datadlm = mysqli_fetch_assoc($dlm);

                            $luar = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'Luar Negeri'");   
                            $dataluar = mysqli_fetch_assoc($luar);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2020","2021","2022"],
				datasets: [{
					label: 'PT/Mandiri',
					data: [
                        <?php
                            echo $datapt['ts2']; 
                        ?>,
                        <?php
                            echo $datapt['ts1']; 
                        ?>,
                        <?php
                            echo $datapt['ts']; 
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Dalam Negeri',
					data: [
                        <?php
                            echo $datadlm['ts2']; 
                        ?>,
                        
                        <?php
                            echo $datadlm['ts1']; 
                        ?>,
                        <?php
                            echo $datadlm['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Luar Negeri',
					data: [
                        <?php
                            echo $dataluar['ts2'];
                        ?>,
                        
                        <?php
                            echo $dataluar['ts1']; 
                        ?>,
                        <?php
                            echo $dataluar['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1,
                    
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart6").getContext('2d');
        <?php
                            $pt = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'PT/Mandiri'");   
                            $datapt = mysqli_fetch_assoc($pt);

                            $dlm = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'Dalam Negeri'");   
                            $datadlm = mysqli_fetch_assoc($dlm);

                            $luar = mysqli_query($connection,"SELECT COUNT(*) AS jumlah, SUM(IF(YEAR(tgl_pengabdian)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_pengabdian)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_pengabdian)=2020,1,0)) as ts2, pengabdian.*,dosen.* FROM pengabdian INNER JOIN dosen USING(nip) WHERE pengabdian.status='terverifikasi' AND dosen.DTPS='y' AND pengabdian.sumber_dana = 'Luar Negeri'");   
                            $dataluar = mysqli_fetch_assoc($luar);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2020","2021","2022"],
				datasets: [{
					label: 'PT/Mandiri',
					data: [
                        <?php
                            echo $datapt['ts2']; 
                        ?>,
                        <?php
                            echo $datapt['ts1']; 
                        ?>,
                        <?php
                            echo $datapt['ts']; 
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Dalam Negeri',
					data: [
                        <?php
                            echo $datadlm['ts2']; 
                        ?>,
                        
                        <?php
                            echo $datadlm['ts1']; 
                        ?>,
                        <?php
                            echo $datadlm['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Luar Negeri',
					data: [
                        <?php
                            echo $dataluar['ts2'];
                        ?>,
                        
                        <?php
                            echo $dataluar['ts1']; 
                        ?>,
                        <?php
                            echo $dataluar['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1,
                    
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>

<script>
		var ctx = document.getElementById("myChart7").getContext('2d');
        <?php
                            $pt = mysqli_query($connection,"SELECT COUNT(*) as jumlah, SUM(IF(YEAR(tgl_terdaftar)=2022,1,0)) as ts, SUM(IF(YEAR(tgl_terdaftar)=2021,1,0)) as ts1, SUM(IF(YEAR(tgl_terdaftar)=2020,1,0)) as ts2, haki_dosen.*, dosen.* FROM haki_dosen INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y'");   
                            $datapt = mysqli_fetch_assoc($pt);

                            $dlm = mysqli_query($connection,"SELECT COUNT(*) as jumlah, SUM(IF(tahun=2022,1,0)) as ts, SUM(IF(tahun=2021,1,0)) as ts1, SUM(IF(tahun=2020,1,0)) as ts2, teknologi_tepat_guna.*, dosen.* FROM teknologi_tepat_guna INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y'");   
                            $datadlm = mysqli_fetch_assoc($dlm);

                            $luar = mysqli_query($connection,"SELECT COUNT(*) as jumlah,SUM(IF(tahun_terbit=2022,1,0)) as ts, SUM(IF(tahun_terbit=2021,1,0)) as ts1, SUM(IF(tahun_terbit=2020,1,0)) as ts2, publikasi_buku.*, dosen.* FROM publikasi_buku INNER JOIN dosen USING(nip) WHERE dosen.DTPS = 'y'");   
                            $dataluar = mysqli_fetch_assoc($luar);
                        ?>
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["2020","2021","2022"],
				datasets: [{
					label: 'HKI',
					data: [
                        <?php
                            echo $datapt['ts2']; 
                        ?>,
                        <?php
                            echo $datapt['ts1']; 
                        ?>,
                        <?php
                            echo $datapt['ts']; 
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					],
					borderColor: [
                    'rgba(54, 162, 235, 1)',
					'rgba(54, 162, 235, 1)',
                    'rgba(54, 162, 235, 1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Teknologi Tepat Guna',
					data: [
                        <?php
                            echo $datadlm['ts2']; 
                        ?>,
                        
                        <?php
                            echo $datadlm['ts1']; 
                        ?>,
                        <?php
                            echo $datadlm['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					],
					borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
                    'rgba(255,99,132,1)',
					],
					borderWidth: 1,
                    
				},
                {
					label: 'Buku',
					data: [
                        <?php
                            echo $dataluar['ts2'];
                        ?>,
                        
                        <?php
                            echo $dataluar['ts1']; 
                        ?>,
                        <?php
                            echo $dataluar['ts'];
                        ?>,
                    ],
                    
					backgroundColor: [
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					],
					borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 206, 86, 1)',
					],
					borderWidth: 1,
                    
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
<?php
    include "./partials/bawah.php";
?> 