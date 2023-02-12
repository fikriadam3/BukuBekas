<div align="center" class="container mt-4">
	<div class="lmt-4 p-5 bg-primary text-white rounded">
		<h1>Selamat Datang
			<?= $data['nama']; ?> Di WEB Penjualan Buku Bekas Mahasiswa
		</h1>
		<hr>
		<h3>
			Bingung Cari Atau Jual Buku Bekas Pedoman Mata Kuliah Kalian, Disini Aja !!
		</h3>
		<br><br><br>
		<a href="<?= BASEURL; ?>/user/login" style="text-decoration: none;">
			<button type="button" class="btn btn-dark btn-lg">
				Login
			</button>
		</a>
		<a href="<?= BASEURL; ?>/Books" style="text-decoration: none;">
			<button type="button" class="btn btn-dark btn-lg">Lihat Buku Yang Dijual</button>
		</a>
	</div>

</div>