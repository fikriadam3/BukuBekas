<?php
include 'User.php'; 
class Admin extends User{
	public function __construct()
	{
		$this->db = new Database;
	}


	public function hapusUser()
	{
		$data['id'] = $_POST['id_user'];
		$query = "DELETE FROM users WHERE id_user = :id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->execute();
		return $this->db->rowCount();
	}


	public function ubahUser()
	{

	}

	public function ubahBuku()
	{

	}


}