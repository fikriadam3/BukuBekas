<!-- profil -->

<!-- navbar  -->
<!-- <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary">
	  <div class="container">
		<a class="navbar-brand" href="#">Buku Bekas</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
		  <ul class="navbar-nav">
			<li class="nav-item">
			  <a class="nav-link <?=($data['title'] === "Home") ? "active" : "" ?>" href="<?= BASEURL; ?>">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link <?=($data['title'] === "Buku") ? "active" : "" ?>" href="<?= BASEURL; ?>/Books">Books</a>
			</li>
		  </ul>
		</div>
		
	  </div>
	  <div class="profil d-flex" style="justify-content: center; 
	  <?php if (empty($_SESSION)) {
		  echo 'display:none;';
	  } ?>">
	  <button class="btn d-flex" data-bs-toggle="modal" data-bs-target="#modal-profil" id="profil">
		  <?php if (!empty($_SESSION)) { ?>
			  <p style="color: white; margin-top: 0.6vh; margin-right: 1vw;"><?= $_SESSION['nama']; ?></p>

			<a href="#">
			  <img src="<?= BASEURL; ?>/img/profile.png" alt=""
			  style="width: 2vw; margin-right: 6vw;">
			  </a>
			<?php } ?>
	  </button>
	  </div>
  </nav> -->

<!-- navbar baru -->
<nav class="navbar navbar-light bg-light static-top">
	<div class="container">
		<a class="navbar-brand <?=($data['title'] === "Home") ? "active" : "" ?>" href="<?= BASEURL; ?>">BukuBekas</a>
		<form action="" class="form-inline">
			<a href="$" class="btn-primary mx-2 " style="text-decoration: none;">About</a>
			<a href="<?= BASEURL; ?>/Books" class="btn-primary mx-2 <?=($data['title'] === "Buku") ? "active" : "" ?>" style="text-decoration: none;">Books</a>
			<a href="$" class="btn-primary mx-2" style="text-decoration: none;">Catalog</a>
		</form>

		<form action="" class="form-inline">
			<a class="btn btn-light border-primary rounded-pill">Sign Up</a>
			<a class="btn btn-primary rounded-pill" href="<?= BASEURL; ?>/user/login"
				style="text-decoration: none;">Sign In</a>
		</form>
	</div>
</nav>

<!-- Modal Box profil -->
<div class="modal modal-xl" tabindex="-1" id="modal-profil">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Profil
					<?= $_SESSION['level']; ?>
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<!-- Logout -->
			<div align="right" <?php if (empty($_SESSION)) {
				echo "style='display: none;'";
			} ?>>
				<button type="button" class="btn btn-outline-danger mb-4">
					<a href="<?= BASEURL; ?>/user/logout" style="color: black; text-decoration: none;">
						Logout
					</a>
				</button>
			</div>
			<div class="modal-body">
				<!-- button untuk menuju ke halaman buku favorite user -->
				<div align="left" <?php if (isset($_SESSION['login'])) { ?> 	<?=($_SESSION["level"] === 'admin' && empty($_SESSION)) ? "style='display: none;'" : "" ?> 	<?php
				} else if (empty($_SESSION)) {
					echo "style='display: none;'";
				} ?>>
					<a href="<?= BASEURL; ?>/Books/favoritemu/<?= $_SESSION['id_user']; ?>">
						<button type="button" class="btn btn-primary mb-4">
							Buku FavoriteMu
						</button>
					</a>
					<!-- Button Untuk menuju halaman yang berisi buku yang diupload user -->

					<a href="<?= BASEURL; ?>/user/books" style="color: black; text-decoration: none;">
						<button type="button" class="btn btn-primary mb-4">
							Bukumu
						</button>
					</a>
				</div>
				<div class="modal-header d-flex justify-content-center">
					<img src="<?= BASEURL; ?>/img/profile.png" alt="" id="cover" align="center" style="width: 10vw;">
				</div>
				<br><br><br>
				<form action="<?= BASEURL; ?>/user/ubah" method="post">
					<input type="hidden" name="id_user" value="<?= $data['user']['id_user']; ?>">
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Nama : </span>
						<input type="text" class="form-control" id="nama" name="nama"
							value="<?= $data['user']['nama'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Username : </span>
						<input type="text" class="form-control" id="username" name="username"
							value="<?= $data['user']['username'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">Password : </span>
						<input type="password" class="form-control" id="password" name="password"
							value="<?= $data['user']['password'] ?>">
					</div>
					<div class="input-group flex-nowrap mt-2 mb-2">
						<span class="input-group-text" id="addon-wrapping">No - Telp : </span>
						<input type="text" class="form-control" id="no" name="no"
							value="<?= $data['user']['no_telp'] ?>">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-warning" id="ubah" name="ubah">Ubah</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script>
	$(document).on("click", "#profil", function () {
		$('.modal-footer #favorite').show();
		const idB = $(this).data('idbuku');
		const idU = $(this).data('iduser');
		const judul = $(this).data('judul');
		const harga = $(this).data('harga');
		const no = $(this).data('no').slice(1);
		const deskripsi = $(this).data('deskripsi');
		const cover = $(this).data('cover');
		const nama = $(this).data('nama');
		const favorite = $(this).data('favorite');

		const idBF = $(this).data('bukufav');

		console.log(idBF);
		if (idBF === idB) {
			$('.modal-footer #favorite').hide();
		}
		$('.modal-footer #favorite a').attr('href', '<?= BASEURL; ?>/Books/favorite/'+i     d B);
		$('.modal-body #id-buku').val(idB);
		$('.modal-body #id-user').val(idU);
		$('.modal-body #penjual a h4').text(nama);
		$('.modal-body #penjual a').attr("href", '<?= BASEURL; ?>/Books/author/'+i     d U);
		$('.modal-body #judul').val(judul);
		$('.modal-body #harga').val('Rp.' + harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL; ?>/img/'+c     o ver);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62' + no);
	});
</script>