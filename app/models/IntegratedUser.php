<?php 

include 'User.php';

class IntegratedUser extends User
{
	public function __construct()
	{
		$this->db = new Database; // dipanggil di int sehingga tidak usah include_once di file ini
	}
	
	public function ubah($data){
		// var_dump($data);
		$this->db->query('UPDATE users SET
			nama =:nama,
			username =:username,
			password =:pass,
			no_telp =:no
			WHERE id_user =:id');
		$this->db->bind('nama', $_POST['nama']);
		$this->db->bind('username', $_POST['username']);
		$this->db->bind('pass', $_POST['password']);
		$this->db->bind('no', $_POST['no']);
		$this->db->bind('id', $_POST['id_user']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	
}