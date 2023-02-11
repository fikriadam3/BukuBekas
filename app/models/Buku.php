<?php 

include_once 'Model.php';

class Buku extends Model
{
	private $db;

	public function __construct()
	{
		$this->db = new Database; // dipanggil di int sehingga tidak usah include_once di file ini
	}

	public function getAllBuku()
	{
		$this->db->query('SELECT * FROM buku JOIN users using(id_user);');	
		return $this->db->resultSet();
	}

	public function getBukuByAuthor($id)
	{
		$this->db->query('SELECT * FROM buku JOIN users using(id_user) WHERE id_user =:id');
		$this->db->bind('id', $id);
		return $this->db->resultSet(); // di eksekusi querynya lalu di tampilkan
	}

	public function tambahBuku($data)
	{	
		// var_dump($data);
		// die();
		$query = "INSERT INTO buku 
				  VALUES 
				  ('', :id_user, :cover, :judul, :deskripsi, :harga);";

		// var_dump($data);
		$cover = $this->uploadGambar();
		$this->db->query($query);
		$this->db->bind('id_user', $data['id']);
		$this->db->bind('cover', $cover);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('deskripsi', $data['deskripsi']);	
		$this->db->bind('harga', $data['harga']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function ubah($data)
	{
		$query = "UPDATE buku SET
		cover =:cover,
		judul =:judul,
		deskripsi =:deskripsi,
		harga =:harga
		WHERE id_buku =:idb AND id_user =:idu";

		// var_dump($_FILES['gambar']['error']);
		// die();
		var_dump($_POST);
		$gambarlama = $_POST['gambarlama'];
		if ($_FILES['gambar']['error'] === 4) 
		{
			$gambar = $gambarlama; 
		}else{
			$gambar = $this->uploadGambar();
		}
		$this->db->query($query);
		$this->db->bind('idu', $data['id-user']);
		$this->db->bind('idb', $data['id-buku']);
		$this->db->bind('cover', $gambar);
		$this->db->bind('judul', $data['judul']);
		$this->db->bind('deskripsi', $data['deskripsi']);	
		$this->db->bind('harga', $data['harga']);

		$this->db->execute();

		echo $this->db->rowCount();
		
		return $this->db->rowCount();

	}

	public function tambahFavorite($data)
	{	
		// var_dump($data);
		// die();
		$query = "INSERT INTO favorit 
				  VALUES 
				  ('', :id_user, :id_buku);";

		$this->db->query($query);
		$this->db->bind('id_user', $data['id-user']);
		$this->db->bind('id_buku', $data['id-buku']);

		$this->db->execute();

		return $this->db->rowCount();

	}

	public function getFavorite($idUser)
	{
		$query = "SELECT cover,judul,harga,deskripsi,
		buku.id_user as id_author,
		nama, buku.id_buku, favorit.id_user as id_user,
		no_telp
		FROM favorit 
		INNER JOIN users
		on favorit.id_user = users.id_user
		INNER JOIN buku
		on favorit.id_buku = buku.id_buku
		WHERE favorit.id_user =:id";
		$this->db->query($query);
		$this->db->bind('id', $idUser);

		return $this->db->resultSet();
	}

	public function hapusFavorite($data)
	{
		$query = "DELETE FROM favorit WHERE id_buku =:idB AND id_user=:idU";
		$this->db->query($query);
		$this->db->bind('idB', $data['id-buku']);
		$this->db->bind('idU', $data['id-user']);

		$this->db->execute();
		// echo $this->db->rowCount();
		// die();
		return $this->db->rowCount();

	}

	public function hapusBuku($idbuku)
	{
		$query = "DELETE FROM buku WHERE id_buku =:idB";
		$this->db->query($query);
		$this->db->bind('idB', $idbuku);

		$this->db->execute();
		// echo $this->db->rowCount();
		// die();
		return $this->db->rowCount();
	}

	public function cariBuku($keyword)
	{
		$search_q = '%'.$keyword.'%';
		$query = "SELECT * FROM buku 
		join users using(id_user)
		WHERE 
		judul like :keyword
		OR harga like :keyword
		OR deskripsi like :keyword";

		$this->db->query($query);
		$this->db->bind('keyword', $search_q);
		return $this->db->resultSet();
	}



	// public function cariBuku($keyword)
	// {
	// 	$this->db->query('SELECT * FROM buku JOIN users using(id_user) 
	// 		WHERE judul LIKE :%keyword%
	// 		OR nama LIKE :%keyword%
	// 		OR deskripsi LIKE :%keyword%');
	// 	$this->db->bind('keyword', $keyword);
	// 	$this->db->resultSet();
	// }
}