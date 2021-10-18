<?php
	session_start();
	include '../../koneksi/koneksi.php';
    $id				                    = mysqli_real_escape_string($db,$_POST['id_suratmasuk']);
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
	$file_suratmasuk			        = $_FILES['file_suratmasuk']['name'];
     date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
		$tgl_suratbalasan  			= date('Y-m-d', strtotime($tanggalsurat_suratbalasan));
		$tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
		$tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
		$tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));
	
	$sql  		= "SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'";                        
	$query  	= mysqli_query($db, $sql);
	$data 		= mysqli_fetch_array($query);
	
    //jika gambar tidak ada
	if ($file_suratmasuk == ''){
		$ext			= substr($data['file_suratmasuk'], strripos($data['file_suratmasuk'], '.'));	
		$nama_b  		= $thnNow.' '.$perihal_suratmasuk. $ext;
		rename("../surat_masuk/".$data['file_suratmasuk'], "../surat_masuk/".$nama_b);
		$sql = "UPDATE tb_suratmasuk set 
						nomorurut_suratmasuk     	= '$nomorurut_suratmasuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomor_suratmasuk        	= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk 	= '$tgl_surat',
						perihal_suratmasuk 			= '$perihal_suratmasuk',
						operator	    			= '$operator',
                        nomor_suratbalasan          = '$nomor_suratbalasan',
						tanggalsurat_suratbalasan   = '$tgl_suratbalasan',
						perihal_suratbalasan		= '$perihal_suratbalasan',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						disp_lanjut          		= '$disp_lanjut'
						where id_suratmasuk = $id";
				
		$execute = mysqli_query($db, $sql);			
						
		echo "<script>alert('Data berhasil di Edit');history.go(-1);</script>";
	}	
	else{
		
        $tipe_file 		= $_FILES['file_suratmasuk']['type'];
        $ukuran_file 	= $_FILES['file_suratmasuk']['size'];
		if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){	
			unlink("../surat_masuk/".$data['file_suratmasuk']);
			$ext_file		= substr($file_suratmasuk, strripos($file_suratmasuk, '.'));			
			$tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
			
			$nama_baru = $thnNow.' '.$perihal_suratmasuk. $ext_file;
			$path = "../surat_masuk/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$sql = "UPDATE tb_suratmasuk set 
						nomorurut_suratmasuk     	= '$nomorurut_suratmasuk',
						kode_suratmasuk    		    = '$kode_suratmasuk',
                        nomor_suratmasuk        	= '$nomor_suratmasuk',
						tanggalsurat_suratmasuk 	= '$tgl_surat',
						perihal_suratmasuk 			= '$perihal_suratmasuk',
						operator	    			= '$operator',
                        nomor_suratbalasan          = '$nomor_suratbalasan',
						tanggalsurat_suratbalasan   = '$tgl_suratbalasan',
						perihal_suratbalasan		= '$perihal_suratbalasan',
                        disposisi1                  = '$disposisi1',
                        tanggal_disposisi1          = '$tgl_disp1',
                        disposisi2                  = '$disposisi2',
                        tanggal_disposisi2          = '$tgl_disp2',
                        disposisi3                  = '$disposisi3',
                        tanggal_disposisi3          = '$tgl_disp3',
						disp_lanjut          		= '$disp_lanjut',
						status_suratmasuk          	= '$status_suratmasuk',
						pengiriman_suratbalasan     = '$pengiriman_suratbalasan',
						nama_penerima_suratbalasan  = '$nama_penerima_suratbalasan',
						file_suratmasuk          	= '$nama_baru',
						tanggal_entry          		= '$tanggal_entry'
				where id_suratmasuk = $id";
				
			$execute = mysqli_query($db, $sql);			
		
			echo "<script>alert('Data berhasil di Edit');history.go(-1);</script>";			
			}
			else{
			echo "<script>alert('File yang anda masukkan tidak sesuai ketentuan Silahkan Ulangi');history.go(-1);</script>";
				
			}
	
	}
	?>
	