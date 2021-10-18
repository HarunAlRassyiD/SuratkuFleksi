<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_admin'])) {

	$id = $_GET['id_admin'];
    	

	$sql2  		= "SELECT * FROM tb_admin where id_admin='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_admin WHERE id_admin='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../../admin/images/".$data2['gambar']);
                echo "<script>alert('Data Admin Berhasil Dihapus');history.go(-1);</script>";
            }		else{
                echo "<script>alert('GAGAL MENGHAPUS Silahkan Ulangi');history.go(-1);</script>";
	}	
}	
}						
?>   