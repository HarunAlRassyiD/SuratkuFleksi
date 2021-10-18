<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nomorurut_suratkeluar	        	= mysqli_real_escape_string($db,$_POST['nomorurut_suratkeluar']);
	$tanggalkeluar_suratkeluar	    	= mysqli_real_escape_string($db,$_POST['tanggalkeluar_suratkeluar']);
	$kode_suratkeluar	            	= mysqli_real_escape_string($db,$_POST['kode_suratkeluar']);
    $nomor_suratkeluar	            	= mysqli_real_escape_string($db,$_POST['nomor_suratkeluar']);
	$tanggalsurat_suratkeluar           = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratkeluar']);
	$operator	                        = mysqli_real_escape_string($db,$_POST['operator']);
	$kepada_suratkeluar		            = mysqli_real_escape_string($db,$_POST['kepada_suratkeluar']);
	$perihal_suratkeluar   	            = mysqli_real_escape_string($db,$_POST['perihal_suratkeluar']);

	
        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
	$nama_file_lengkap 		= $_FILES['file_suratkeluar']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['file_suratkeluar']['type'];
	$ukuran_file 	= $_FILES['file_suratkeluar']['size'];
	$tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
	
    $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
    $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
	$ambilnomor                 = substr("$nomorurut_suratkeluar",0,4);
	
    if (!($tgl_keluar=='') and !($kode_suratkeluar =='') and !($nomor_suratkeluar =='') and !($tgl_surat =='') and !($kepada_suratkeluar =='') and !($perihal_suratkeluar =='') and !($operator =='') and   
		($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
		
		$nama_baru = $thnNow.'-'.$perihal_suratkeluar. $ext_file;
		$path = "../surat_keluar/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_suratkeluar(nomorurut_suratkeluar,tanggalkeluar_suratkeluar, kode_suratkeluar, nomor_suratkeluar, tanggalsurat_suratkeluar,  operator, kepada_suratkeluar, perihal_suratkeluar, file_suratkeluar)
				values ('$nomorurut_suratkeluar','$tgl_keluar', '$kode_suratkeluar', '$nomor_suratkeluar', '$tgl_surat',  '$operator','$kepada_suratkeluar', '$perihal_suratkeluar', '$nama_baru')";
		$execute = mysqli_query($db, $sql);
		

		echo "<script>alert('Surat Keluar Berhasil Dimasukkan');history.go(-2);</script>";
	}
	else{
		echo "<script>alert('Silahkan isi semua kolom lalu tekan submit, Terima Kasih');history.go(-1);</script>";
	}	
?>
	