<!-- <div align="center" class="container mt-4">
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

</div> -->
<header class="masthead"
	style="background-image: url(https://images.theconversation.com/files/45159/original/rptgtpxd-1396254731.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1356&h=668&fit=crop);">
	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="text-center text-white">
					<!-- Page heading-->
					<h1 class="mb-5">
						Cari buku yang kamu mau disini!
					</h1>
					<a href="<?= BASEURL; ?>/Books" class="btn btn-outline-light <?=($data['title'] === "Buku") ? "active" : "" ?>"
						style="text-decoration: none;">Browse Catalog <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</header>
<section class="features-icons bg-light text-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
					<h3>Cari</h3>
					<p class="lead mb-0">
						Cari buku yang kamu mau.
					</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
					<h3>Dapatkan Uang</h3>
					<p class="lead mb-0">
						Dapatkan uang dengan menjual buku bekas mu.
					</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="features-icons-item mx-auto mb-0 mb-lg-3">
					<h3>Cash on Delivery</h3>
					<p class="lead mb-0">
						COD-kan dengan pemilik buku secara langsung.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>