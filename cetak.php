<!DOCTYPE html>
<?php
include 'koneksi.php';
include'fungsi/fungsi_rupiah.php';
include'fungsi/fungsi_indotgl.php';

?>
<html>
<?php include'header.php' ?>
<head>
	<title>CETAK Data</title>
</head>
<body>
<h3><center>Laporan Penjualan Sepatu</center></h3>
			 <br>
			  
			  <br><br>
          <!-- Row -->
          <div class="row">
		  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12">
              <div class="card mb-4">
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" ">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
						<th>kode barang</th>
						<th>Nama Pembeli </th>
						<th>jumalh beli </th>
						<th>Nama pembeli</th>
                        <th>harga </th>
                        <th>Total</th>                        										
                      </tr>
                    </thead>
                    
                    <tbody>
					<?php 
					$no = 1;
					$total_semua = 0;
					$stid = oci_parse($koneksi, 'SELECT KARYAWAN.*, BARANG.*, TRANSAKSI.* FROM TRANSAKSI 
TRANSAKSI INNER JOIN KARYAWAN KARYAWAN ON TRANSAKSI.ID_TRANSAKSI = KARYAWAN.NO_KARYAWAN 
INNER JOIN BARANG BARANG ON TRANSAKSI.NAMA_PEMBELI = BARANG.KODE_BARANG ORDER BY TRANSAKSI.NAMA_PEMBELI ASC');

					oci_execute($stid);

					while (($row = oci_fetch_array ($stid, OCI_BOTH)) != false) {
					$total = $row["HARGA_BARANG"] * $row["TANGGAL_TRANSAKSI"];
					$total_semua += $total;	
						
						?>
                      <tr>
                        <td>
						 <?php echo $no; ?>
						</td>
                          <td>
						 <?php echo $row["KODE_BARANG"];?>
						</td>
						<td>
						 <?php echo $row["TANGGAL_TRANSAKSI"];?>
						</td>
						<td>
						 <?php echo $row["NAMA_PEMBELI"];?>
						</td>
												
						  <td> 
						 <?php echo rupiah($row['HARGA_BARANG']); ?>
						</td>
						
						<td>
						 <?php echo rupiah($total); ?>
						</td>
                                             
                      </tr>                                         
                    </tbody>
					 <?php
						$no++;
						}
						
					?>
                  </table>
                </div>
              </div>
            </div>
          </div>
 <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <!-- Popover basic -->
              <div class="card mb-4">
               
                <div class="card-body">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Dismiss on next click -->
              <div class="card mb-4">
                
                <div class="card-body">
                 <center>Bekasi, <?php echo tgl_indo($hari_ini); ?></center>
							<b><center>Manager Perusahaan</center></b>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<b><center>Sugiyantoro</center></b>
                </div>
              </div>
            </div>
	
 
	<script>
		window.print();
	</script>
 
</body>
</html>