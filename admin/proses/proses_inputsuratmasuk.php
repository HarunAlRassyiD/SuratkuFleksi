<?php
	session_start();
	include '../../koneksi/koneksi.php';
	
	$nomorurut_suratmasuk               = mysqli_real_escape_string($db,$_POST['nomorurut_suratmasuk']);
	$kode_suratmasuk	                = mysqli_real_escape_string($db,$_POST['kode_suratmasuk']);
	$nomor_suratmasuk	                = mysqli_real_escape_string($db,$_POST['nomor_suratmasuk']);
	$tanggalsurat_suratmasuk            = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratmasuk']);
	$perihal_suratmasuk   	            = mysqli_real_escape_string($db,$_POST['perihal_suratmasuk']);
	$operator	                        = mysqli_real_escape_string($db,$_POST['operator']);
	$nomor_suratbalasan	                = mysqli_real_escape_string($db,$_POST['nomor_suratbalasan']);
	$tanggalsurat_suratbalasan          = mysqli_real_escape_string($db,$_POST['tanggalsurat_suratbalasan']);
	$perihal_suratbalasan   	        = mysqli_real_escape_string($db,$_POST['perihal_suratbalasan']);
	$disposisi1	                        = mysqli_real_escape_string($db,$_POST['disposisi1']); 
	$tanggal_disposisi1                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi1']);
	$disposisi2	                        = mysqli_real_escape_string($db,$_POST['disposisi2']);
	$tanggal_disposisi2                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi2']);
    $disposisi3	                        = mysqli_real_escape_string($db,$_POST['disposisi3']);
	$tanggal_disposisi3                 = mysqli_real_escape_string($db,$_POST['tanggal_disposisi3']);
	$disp_lanjut                        = mysqli_real_escape_string($db,$_POST['disp_lanjut']);
	$status_suratmasuk	                = mysqli_real_escape_string($db,$_POST['status_suratmasuk']);
	$pengiriman_suratbalasan            = mysqli_real_escape_string($db,$_POST['pengiriman_suratbalasan']);
	$nama_penerima_suratbalasan         = mysqli_real_escape_string($db,$_POST['nama_penerima_suratbalasan']);
	
        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
	$nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
	$nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
	$ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
	$tipe_file 		= $_FILES['file_suratmasuk']['type'];
	$ukuran_file 	= $_FILES['file_suratmasuk']['size'];
	$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
	
    $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
	$tgl_suratbalasan  			= date('Y-m-d', strtotime($tanggalsurat_suratbalasan));
    $tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
    $tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
    $tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));
	
    if ( !($kode_suratmasuk =='') and !($nomorurut_suratmasuk  =='') and !($nomor_suratmasuk =='') and !($tgl_surat =='')   and !($perihal_suratmasuk =='') and !($operator =='') and   
		($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
		
		$nama_baru = $thnNow.' '.$perihal_suratmasuk.$ext_file;
		$path = "../surat_masuk/".$nama_baru;
		move_uploaded_file($tmp_file, $path);
		
		$sql = "INSERT INTO tb_suratmasuk(nomorurut_suratmasuk, kode_suratmasuk,nomor_suratmasuk, tanggalsurat_suratmasuk, perihal_suratmasuk, operator, nomor_suratbalasan, tanggalsurat_suratbalasan, perihal_suratbalasan,  disposisi1, tanggal_disposisi1 , disposisi2 , tanggal_disposisi2 , disposisi3 , tanggal_disposisi3, disp_lanjut , status_suratmasuk,  pengiriman_suratbalasan, nama_penerima_suratbalasan, file_suratmasuk,tanggal_entry )
								  values ('$nomorurut_suratmasuk ', '$kode_suratmasuk','$nomor_suratmasuk', '$tgl_surat', '$perihal_suratmasuk', '$operator', '$nomor_suratbalasan', '$tgl_suratbalasan', '$perihal_suratbalasan',  '$disposisi1 ', '$tgl_disp1', '$disposisi2', '$tgl_disp2 ', '$disposisi3 ', '$tgl_disp3 ', '$disp_lanjut', '$status_suratmasuk',  '$pengiriman_suratbalasan', '$nama_penerima_suratbalasan','$nama_baru','$tanggal_entry')";
		$execute = mysqli_query($db, $sql);
		
		echo "<Center><h2><br>Terima Kasih<br>Surat masuk Telah Dimasukkan</h2></center>
			<meta http-equiv='refresh' content='2;url=../datasuratmasuk.php'>";
	}
	else{
		echo "<script>alert('Silahkan isi semua kolom lalu tekan submit, Terima Kasih');history.go(-1);</script>";
	}
	
?>
	