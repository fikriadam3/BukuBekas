<?php 


class Model
{
	static function uploadGambar(){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang diupload
		if($error == 4){
			echo "<script>
				alert('Pilih Gambar Terlebih Dahulu');
			</script>";
			return false;
		}

		// cek yang diupload gambar atau bukan
		$ekstensiValid = ['jpg', 'jpeg', 'png', 'gif'];
		$ekstensigambar = explode('.', $namaFile); 
		$ekstensigambar = strtolower(end($ekstensigambar));
		if( ! in_array($ekstensigambar, $ekstensiValid)){
			echo "<script>
				alert('Yang Anda Upload Bukan Gambar!');
			</script>";
			return false;
		}

		// gambar siap diupload?
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .='.';
		$namaFileBaru  .= $ekstensigambar;
		move_uploaded_file($tmpName, 'img/' .$namaFileBaru);
		return $namaFileBaru;
	}
	
}