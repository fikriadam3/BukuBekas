<div class="container">
<h1 class="mx-4">Buku Milik Anda : 
	<?= $data['buku'][0]['nama']; ?>	
</h1>
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
		<?php $id_bf =0; ?>
		<?php foreach ($data['buku'] as $b) : ?>
		<div class="card mb-4 mt-4 shadow p-2 bg-body-tertiary rounded" 
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
				<?php for ($i=0; $i < count($data['favorit']); $i++) { 
						if ($data['favorit'][$i]['id_buku'] === $b['id_buku'] ) {echo '*favoritmu';} 
				}?>
			</div>
			<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modal-detail" id="detail"
			data-idbuku="<?= $b['id_buku']; ?>" data-iduser="<?= $b['id_user']; ?>" 
			data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" 
			data-no="<?= $b['no_telp']; ?>" data-deskripsi="<?= $b['deskripsi']; ?>"
			data-cover="<?= $b['cover']; ?>">
				Lihat Detail.. 
		    </button>
		    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modal-hapus" id="detail"
			data-idbuku="<?= $b['id_buku']; ?>" data-iduser="<?= $b['id_user']; ?>" 
			data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" 
			data-no="<?= $b['no_telp']; ?>" data-deskripsi="<?= $b['deskripsi']; ?>"
			data-cover="<?= $b['cover']; ?>">
				Hapus 
		    </button>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<!-- Modal Box Detail & ubah buku-->
<div class="modal modal-xl" tabindex="-1" id="modal-detail">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/books/ubah" method="post" enctype="multipart/form-data">
      	<p>Cover :</p>
      	<img src="" alt="" id="cover" style="width: 30vw;"><br><br><br>
		<input type="hidden" class="form-control" id="id-buku" name="id-buku">
		<input type="hidden" class="form-control" id="id-user" name="id-user">
		<input type="hidden" class="form-control" id="gambarlama" name="gambarlama">
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Judul : </span>
		  	<input type="text" class="form-control" id="judul" name="judul" required>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">harga : </span>
		  	<input type="number" class="form-control" id="harga" name="harga" required>
		</div>
		<div>
			<label for="deskripsi">Deskripsi :</label>
		    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px" required></textarea>	
       	</div>
       
       	<div class="mb-3">
          <h5>Ingin Ubah Cover ? </h5>
		  <label for="cover" class="form-label">Pilih Cover Baru</label>
		  <input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" id="ubah">Ubah</button>
        <!-- onclick="return confirm('yakin');" -->
      </div>
      </form>
    </div>
    
  </div>
</div>

<!-- Modal Box Hapus buku-->
<div class="modal modal-xl" tabindex="-1" id="modal-hapus">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/books/hapus" method="post" enctype="multipart/form-data">
      	<p>Cover :</p>
      	<img src="" alt="" id="cover" style="width: 30vw;"><br><br><br>
		<input type="hidden" class="form-control" id="id-buku" name="id-buku-hapus">
		<input type="hidden" class="form-control" id="id-user" name="id-user">
		<input type="hidden" class="form-control" id="gambarlama" name="gambarlama">
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Judul : </span>
		  	<input type="text" class="form-control" id="judul" name="judul" readonly>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">harga : </span>
		  	<input type="number" class="form-control" id="harga" name="harga" readonly>
		</div>
		<div>
			<label for="deskripsi">Deskripsi :</label>
		    <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px" readonly></textarea>	
       	</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="ubah">Hapus</button>
        <!-- onclick="return confirm('yakin');" -->
      </div>
      </form>
    </div>
    
  </div>
</div>

<script>
	$(document).on("click", "#detail", function(){
		$('.modal-footer #favorite').show();
		const idb = $(this).data('idbuku');
		const idu = $(this).data('iduser');
		const judul = $(this).data('judul');
		const harga = $(this).data('harga');
		const no = $(this).data('no').slice(1);
		const deskripsi = $(this).data('deskripsi');
		const cover = $(this).data('cover');
		const nama = $(this).data('nama');
		const favorite = $(this).data('favorite');

		const idBF = $(this).data('bukufav');

		console.log(idb);
		if (idBF === idb) {
			$('.modal-footer #favorite').hide();
		}
		$('.modal-body #id-buku').val(idb);
		$('.modal-body #id-user').val(idu);
		$('.modal-footer #favorite a').attr('href', '<?= BASEURL; ?>/Books/favorite/'+idb);
		$('.modal-body #judul').val(judul);
		$('.modal-body #harga').val(harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #gambarlama').val(cover);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL; ?>/img/'+cover);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62'+no);
	});

	
</script>