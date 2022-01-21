<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$kode_barang=$_GET['KODE_BARANG'];
	$sql="DELETE FROM BARANG WHERE KODE_BARANG = '$kode_barang'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:barang.php');
}

elseif ($act=='input'){
    $kode_barang = $_POST["KODE_BARANG"];
	$no_karyawan = $_POST["NO_KARYAWAN"];
	$nama_barang = $_POST ["NAMA_BARANG"];
 	$harga = $_POST["HARGA_BARANG"];
    $stok = $_POST["STOK_BARANG"];

   $sql="insert into BARANG values ('$kode_barang','$no_karyawan','$nama_barang','$harga','$stok') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:barang.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$kode_barang = $_POST["KODE_BARANG"];
	$no_karyawan = $_POST["NO_KARYAWAN"];
	$nama_barang = $_POST ["NAMA_BARANG"];
 	$harga = $_POST["HARGA_BARANG"];
    $stok = $_POST["STOK_BARANG"];
	

	$sql = "UPDATE BARANG SET NO_KARYAWAN='$no_karyawan', NAMA_BARANG='$nama_barang', HARGA_BARANG='$harga', STOK_BARANG'$stok' WHERE KODE_BARANG='$kode_barang'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:barang.php');
	}
	else {echo "gagal";}
   



}
?>