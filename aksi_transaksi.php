<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_transaksi=$_GET['ID_TRANSAKSI'];
	$sql="DELETE FROM TRANSAKSI WHERE ID_TRANSAKSI = '$id_transaksi'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:laporan.php');
}

elseif ($act=='input'){
    $id_transaksi = $_POST["ID_TRANSAKSI"];
	$kode_barang = $_POST["KODE_BARANG"];
	$tanggal = $_POST ["TANGGAL_TRANSAKSI"];
 	$nama_pembeli = $_POST["NAMA_PEMBELI"];

   $sql="insert into TRANSAKSI values ('$id_transaksi','$kode_barang','$tanggal','$nama_pembeli') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
    $id_transaksi = $_POST["ID_TRANSAKSI"];
	$kode_barang = $_POST["KODE_BARANG"];
	$tanggal = $_POST ["TANGGAL_TRANSAKSI"];
 	$nama_pembeli = $_POST["NAMA_PEMBELI"];
	

	$sql = "UPDATE TRANSAKSI SET KODE_BARANG='$kode_barang', TANGGAL_TRANSAKSI='$tanggal', NAMA_PEMBELI='$nama_pembeli' WHERE ID_TRANSAKSI='$id_transaksi'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:laporan.php');
	}
	else {echo "gagal";}
   



}
?>