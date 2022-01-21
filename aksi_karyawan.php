<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$no_karyawan=$_GET['NO_KARYAWAN'];
	$sql="DELETE FROM KARYAWAN WHERE NO_KARYAWAN = '$no_karyawan'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:karyawan.php');
}

elseif ($act=='input'){
    $no_karyawan = $_POST["NO_KARYAWAN"];
	$nama_karyawan = $_POST["NAMA_KARYAWAN"];

   $sql="insert into KARYAWAN values ('$no_karyawan','$nama_karyawan') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:karyawan.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$no_karyawan = $_POST["NO_KARYWAN"];
	$nama_karyawan = $_POST["NAMA_KARYAWAN"];
	

	$sql = "UPDATE KARYAWAN SET NAMA_KARYAWAN='$nama_karyawan' WHERE No_KARYAWAN='$no_karyawan'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:karyawan.php');
	}
	else {echo "gagal";}
   



}
?>