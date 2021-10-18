<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nama_admin	        = mysqli_real_escape_string($db,$_POST['nama_admin']);
	$username_admin		= mysqli_real_escape_string($db,$_POST['username_admin']);
	$password_admin	    = mysqli_real_escape_string($db,sha1($_POST['password']));
	
	$nama_file_lengkap 		= $_FILES['gambar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['gambar']['type'];
	$ukuran_file 	= $_FILES['gambar']['size'];
	$tmp_file 		= $_FILES['gambar']['tmp_name'];

	
	if (!($nama_admin=='') and !($username_admin=='') and !($password_admin =='') and
		($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") and ($ukuran_file <= 2100000)){		
		
		$nama_baru = $username_admin. $ext_file;
		$path = "../../admin/images/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_admin(nama_admin, username_admin, password, gambar)
				values ('$nama_admin', '$username_admin', '$password_admin', '$nama_baru')";
		$execute = mysqli_query($db, $sql);
		
        echo "<script>alert('Terima kasih Admin Telah Didaftarkan ke Sistem ');history.go(-2);</script>";
	}
	else{
		echo "<script>alert('Silahkan isi semua kolom lalu tekan submit, Terima Kasih');history.go(-1);</script>";
	}
	
?>
	