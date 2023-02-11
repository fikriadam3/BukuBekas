<?php 
class BooksController extends Controller
{
	protected $author = '';

	public function index()
	{
		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$data['buku'] = $this->model('Buku')->getAllBuku();
		$data['favorit'] = $this->model('Buku')->getFavorite(0);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);
		$this->view('templates/search-bar');
		// var_dump($data['user']);
		$this->view('books/index', $data);
		$this->view('templates/footer');
	}


	public function author($id) // berdasarkan params yang dikirimkan di app.php kemudian di urutkan = $nama parameter ke 1 dst
	{
		$data['id'] = $id;
		$data['title'] = 'Buku';
		$data['buku'] = $this->model('Buku')->getBukuByAuthor($id);
		$this->view('templates/header', $data);
		// ambil data buku favorit user
		$data['favorit'] = $this->model('Buku')->getFavorite(0);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);
		$this->view('books/author', $data);
		$this->view('templates/footer');
	}

	public function cari() // berdasarkan params yang dikirimkan di app.php kemudian di urutkan = $nama parameter ke 1 dst
	{
		// var_dump($_POST);
		$data['title'] = 'Buku';

		$this->view('templates/header', $data);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);
		$this->view('templates/search-bar');
		if (!empty($_POST['keyword'])) {
			$data['buku'] = $this->model('Buku')->cariBuku($_POST['keyword']);
		}else{
			$data['buku'] = $this->model('Buku')->getAllBuku();
		}
		$this->view('books/index', $data);
		$this->view('templates/footer');
	}

	public function favorite($idBuku){ // fungsi tambah buku ke favorit

		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$data['id-buku'] = $idBuku;
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['favorit'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);

		if ($this->model('Buku')->tambahFavorite($data) > 0) {
			echo "<script>alert('Berhasil Menambahkan Buku Ke Favorit');
			window.location.href = '".BASEURL."/Books/favoritemu';</script>";
			exit;		
		} else{
			echo "<script>alert('Gagal Menambahkan Buku Ke Favorit');
			window.location.href = '".BASEURL."/Books/favoritemu';</script>";
		}
	}

	public function favoritemu(){ // fungsi untuk menampilkan buku buk yang dimasukkan ke favorit

		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['buku'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);
		$this->view('books/favorite', $data);
		// header('Location: '.BASEURL.'/Books');
	}

	public function hapusFavorite($idBuku)
	{
		$data['title'] = 'Buku';
		$this->view('templates/header', $data);
		$this->view('templates/topbar', $data);
		$data['id-user'] = $_SESSION['id_user'];
		$data['id-buku'] = $idBuku;
		if ($this->model('Buku')->hapusFavorite($data) > 0) {
			echo "<script>alert('Berhasil Hapus Buku Dari Favorit');
			window.location.href = '".BASEURL."/Books/favoritemu';</script>";
			exit;		
		} else{
			echo "<script>alert('Gagal Hapus Buku Dari Favorit');
			window.location.href = '".BASEURL."/Books/favoritemu';</script>";
		}
	}

	public function hapus()
	{
		$data['title'] = "Hapus Buku";
		$this->view('templates/header', $data);
		if (!empty($_SESSION)) { // disimpan disini karna sessio_start ada di header 
			$data['id-user'] = $_SESSION['id_user'];
			$data['buku'] = $this->model('Buku')->getFavorite($data['id-user']);
			$data['user'] = $this->model('User')->cariById($data['id-user']);
		}
		$this->view('templates/topbar', $data);
		$idBuku = $_POST['id-buku-hapus'];
		// var_dump($idBuku);
		if ($this->model('Buku')->hapusBuku($idBuku) > 0) {
			echo "<script>alert('Berhasil Hapus Data Bukumu');
			window.location.href = '".BASEURL."/user/Books';</script>";
			exit;		
		} else{
			echo "<script>alert('Gagal Hapus Data Bukumu');
			window.location.href = '".BASEURL."/user/Books';</script>";
		}

	}

	public function ubah()
	{

		if ($this->model('Buku')->ubah($_POST) > 0) {
			echo "<script>alert('Berhasil Ubah Data Buku');
			window.location.href = '".BASEURL."/user/Books';</script>";
			exit;
		}else{
			echo "<script>alert('Tidak Ada Perubahan Data');
			window.location.href = '".BASEURL."/user/Books';</script>";
		}
		
		// header('Location: '.BASEURL.'/user/Books');
	}


	public function tambah(){
		if ($this->model('Buku')->tambahBuku($_POST) > 0) {
			echo "<script>alert('Berhasil Tambah Data Buku');
			window.location.href = '".BASEURL."/Books';</script>";
			exit;
		}else{
			echo "<script>alert('Gagal Tambah Data Buku');
			window.location.href = '".BASEURL."/Books';</script>";
		}
    }
}