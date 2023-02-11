<?php 

class AdminController extends Controller
{
	public function index()
	{
		$data['title'] = 'Admin';
		$this->view('templates/header',$data);
		if (!empty($_SESSION)) {
			$data['user'] = $this->model('User')->cariById($_SESSION['id_user']); // di kirim ke topbar
		}
		$this->view('templates/topbar', $data);
		$this->view('templates/sidebar');
		$this->view('admin/index');
	}

	public function users()
	{
		$data['title'] = 'User';
		$data['users'] = $this->model('User')->getAllUsers();
		$this->view('templates/header', $data);
		if (!empty($_SESSION)) {
			$data['user'] = $this->model('User')->cariById($_SESSION['id_user']); // di kirim ke topbar
		}
		$this->view('templates/topbar', $data);
		$this->view('admin/users', $data);
		$this->view('templates/footer');
	}

	public function hapusUser()
	{
		if (isset($_POST['hapus'])) {
			if ($this->model('Admin')->hapusUser() > 0) {
				echo "<script>alert('Berhasil Hapu Data User');
				window.location.href = '".BASEURL."/admin/users';</script>";
				exit;
			}else{
				echo "<script>alert('Gagal Hapus Data User');
				window.location.href = '".BASEURL."/admin/users';</script>";
			}
		}
		
	}

	public function ubahUser()
	{

		if ($this->model('IntegratedUser')->ubah($_POST) > 0) {
			echo "<script>alert('Berhasil Ubah Data User');
			window.location.href = '".BASEURL."/admin/users';</script>";
			exit;
		}else{
			echo "<script>alert('Gagal Ubah Data /Tidak Ada Perubahan Data');
			window.location.href = '".BASEURL."/admin/users';</script>";
		}
	}

}