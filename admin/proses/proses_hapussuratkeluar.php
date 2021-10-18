<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_suratkeluar'])) {

	$id = $_GET['id_suratkeluar'];
    	

	$sql2  		= "SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_suratkeluar WHERE id_suratkeluar='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../surat_keluar/".$data2['file_suratkeluar']);
				echo "<script>alert('Data Surat keluar telah Dihapus');history.go(-1);</script>";
            }		else{
			 echo "<script>alert('GAGAL MENGHAPUS Silahkan Ulangi');history.go(-1);</script>";
		
	}	
}	
}						
?>   