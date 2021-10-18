<?php
	session_start();
	include '../../koneksi/koneksi.php';

if (isset($_GET['id_bagian'])) {

	$id = $_GET['id_bagian'];
    	

	$sql2  		= "SELECT * FROM tb_bagian where id_bagian='".$id."'";                        
	$query2  	= mysqli_query($db, $sql2);
	$data2 		= mysqli_fetch_array($query2);
    $total		= mysqli_num_rows($query2);

	// cek hasil query
	if ($total == 0) {
    echo '<script>window.history.back()</script>';
	    } else 
            {
             $sql  		= "DELETE FROM tb_bagian WHERE id_bagian='".$id."'";                        
	         $query  	= mysqli_query($db, $sql);


            if ($query){
                unlink("../../bagian/images/".$data2['gambar']);
                echo "<script>alert('Data karyawan Berhasil Dihapus');history.go(-1);</script>";
            }		else{
				echo "<script>alert('GAGAL MENGHAPUS Silahkan Ulangi');history.go(-1);</script>";
	}	
}	
}						
?>   