<?php 
// var_dump($_SESSION);
 ?>
 

<div align="center" class="container" style=" border-radius: 5px;">
	<h1>Buku Buku mu Dong!</h1>
	
	<!-- Button trigger modal Tambah -->
	<div class="tombol-tambah" align="left" 
	<?php if (isset($_SESSION['login'])) { ?>
		<?= (empty($_SESSION))? "style='display: none;'" : ""  ?>
		
    <?php 
    }else if (empty($_SESSION)) {
			echo "style='display: none;'";
	} ?> >
		<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modal-tambah">
		  Upload Buku
		</button>
	</div>

	<!-- button untuk menuju ke halaman buku favorite user -->
	<div align="right" 
	<?php if (isset($_SESSION['login'])) { ?>
		<?= ($_SESSION["level"] === 'admin' && empty($_SESSION))? "style='display: none;'" : ""  ?>
		
    <?php 
    }else if (empty($_SESSION)) {
			echo "style='display: none;'";
	} ?> >
		<a href="<?= BASEURL; ?>/Books/favoritemu/<?= $_SESSION['id_user']; ?>">
			<button type="button" class="btn btn-outline-primary mb-4">
				Buku FavoriteMu
			</button>
		</a>
	</div>

	
	<div class="card d-flex flex-row flex-wrap justify-content-center" style="margin-bottom: 100px; width: 70vw;" >
		<?php $id_bf = 0; ?>
		<?php foreach ($data['buku'] as $b) : ?>
		<div class="card mb-4 mt-4 shadow p-2 bg-body-tertiary rounded" align="left" 
		style="width: 15vw; margin-left: 1vw;">
			<ul class="list-group">
				<img src="<?= BASEURL; ?>/img/<?= $b['cover']; ?>" alt="">
				<p class="list-group"><b>Judul : </b><?= $b['judul']; ?></p>
				<p class="list-group"><b>Harga : </b>Rp.<?= $b['harga']; ?></p>
				<p class="list-group" style=""><b> Deskripsi : </b><?= substr($b['deskripsi'], 0,8); ?> ...</p>
				<br>
			</ul>

			<p class="list-group small mb-1" align="left">
					<a href="<?= BASEURL; ?>/books/author/<?= $b['id_user']; ?>" style="text-decoration: none;">
						<?= $b['nama'];  ?>	
					</a>	 
			</p> 
			<div align="right" class="mb-1">
				<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-detail" id="detail"
					style="width: 2.5vw; height: 3.5vh; background-image: url('<?= BASEURL ?>/img/fav.png');
					background-size: 1.5vw; background-repeat: no-repeat; background-position: center;
					<?php if (!isset($_SESSION['login']) ) {echo 'display: none;';} ?>
					<?php for ($i=0; $i < count($data['favorit']); $i++) { 
						if ($data['favorit'][$i]['id_buku'] === $b['id_buku'] ) 
							{	
								$id_bf = $data['favorit'][$i]['id_buku'];
								echo 'display: none;';
							} 
					}?>" 
				data-idbuku="<?= $b['id_buku']; ?>" data-iduser="<?= $b['id_user']; ?>" 
				data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" 
				data-no="<?= $b['no_telp']; ?>" data-deskripsi="<?= $b['deskripsi']; ?>"
				data-cover="<?= $b['cover']; ?>" data-nama="<?= $b['nama']; ?>"
				data-bukuFav="<?= $id_bf; ?>">
				</button>
				<?php for ($i=0; $i < count($data['favorit']); $i++) { 
						if ($data['favorit'][$i]['id_buku'] === $b['id_buku'] ) {echo '*favoritmu';} 
				}?>
			</div>
			<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modal-detail" id="detail"
			data-idbuku="<?= $b['id_buku']; ?>" data-iduser="<?= $b['id_user']; ?>" 
			data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" 
			data-no="<?= $b['no_telp']; ?>" data-deskripsi="<?= $b['deskripsi']; ?>"
			data-cover="<?= $b['cover']; ?>" data-nama="<?= $b['nama']; ?>"
			data-bukufav="<?= $id_bf; ?>" >
				Lihat Detail.. 
		    </button>
			<button class="btn btn-light" style="background-color: rgb(37,211,102); ">
				<a href="https://api.whatsapp.com/send?phone=62<?= $b['no_telp']; ?>" style="color: white; text-decoration: none;" target="blank">Chat Ke WA</a>
			</button>
		</div>

		<?php endforeach; ?>
	</div>
</div>

<!-- Modal Box Detail -->
<div class="modal modal-xl" tabindex="-1" id="modal-detail">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<img src="" alt="" id="cover"><br><br><br>
      	<div class="penjual" id="penjual">
      		<a href="" style="text-decoration: none;">
      			<h4></h4>
      		</a>
      	</div><br>
		<input type="hidden" class="form-control" id="id-buku" name="id-buku">
		<input type="hidden" class="form-control" id="id-user" name="id-user">
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Judul : </span>
		  	<input type="text" class="form-control" id="judul" name="judul" readonly>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">harga : </span>
		  	<input type="text" class="form-control" id="harga" name="harga" readonly>
		</div>
		<div>
			<label for="deskripsi">Deskripsi :</label>
		    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px" readonly></textarea>
			
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-light" id="no" style="background-color: rgb(37,211,102); ">
			<a href="" style="color: white; text-decoration: none;" target="blank">Chat Ke WA</a>
	    </button>
	    <button class="btn btn-outline-primary" id="favorite" 
	    style="<?php if (!isset($_SESSION['login']) ) {echo "display: none;";} ?>">
			<a href="" 
			style="color:black; text-decoration: none; text-shadow: 1px 1px 1px 1px;">
				Tambah Ke Favorite
			</a>
	    </button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Box Tambah -->
<div class="modal modal-lg" tabindex="-1" id="modal-tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Upload Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL; ?>/books/tambah" method="post" enctype="multipart/form-data">
       <div class="modal-body">
        <h3>Buku Aldi</h3> <!-- ganti dengan nama usernya -->
        <input type="hidden" class="form-control" id="id-user" value="<?= $_SESSION['id_user']; ?>" name="id">
        <div class="col-md-6">
	    	<label for="judul" class="form-label">Judul</label>
	    	<input type="text" class="form-control" id="judul" name="judul" required>
	    </div>
	    <div class="col-md-6">
	    	<label for="harga" class="form-label">Harga</label>
	    	<input type="number" class="form-control" id="harga" name="harga" required>
	    </div>
	    <div class="mb-3">
		  <label for="cover" class="form-label">Pilih Cover</label>
		  <input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar" required>
		</div>
	    <div class="form-floating">
		  <textarea class="form-control" id="deskripsi" style="height: 100px" name="deskripsi" required></textarea>
		  <label for="deskripsi">Deskripsi</label>
		</div>

       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
       </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Box Favorite (TIDAK TERPAKAI) -->
<div class="modal modal-xl" tabindex="-1" id="modal-favorite">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Buku Ke Favorite</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<img src="" alt="" id="cover"><br><br><br>
      	<div class="penjual" id="penjual">
      		<a href="" style="text-decoration: none;">
      			<h4></h4>
      		</a>
      	</div><br>
		<input type="hidden" class="form-control" id="id-buku" name="id-buku">
		<input type="hidden" class="form-control" id="id-user" name="id-user">
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Judul : </span>
		  	<input type="text" class="form-control" id="judul" name="judul" readonly>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">harga : </span>
		  	<input type="text" class="form-control" id="harga" name="harga" readonly>
		</div>
		<div>
			<label for="deskripsi">Deskripsi :</label>
		    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px" readonly></textarea>
			
       	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-light" id="no" style="background-color: rgb(37,211,102); ">
			<a href="" style="color: white; text-decoration: none;" target="blank">Chat Ke WA</a>
	    </button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).on("click", "#detail", function(){
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
		$('.modal-footer #favorite a').attr('href', '<?= BASEURL; ?>/Books/favorite/'+idB);
		$('.modal-body #id-buku').val(idB);
		$('.modal-body #id-user').val(idU);
		$('.modal-body #penjual a h4').text(nama);
		$('.modal-body #penjual a').attr("href", '<?= BASEURL; ?>/Books/author/'+idU);
		$('.modal-body #judul').val(judul);
		$('.modal-body #harga').val('Rp.'+harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL; ?>/img/'+cover);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62'+no);
	});

	
</script>