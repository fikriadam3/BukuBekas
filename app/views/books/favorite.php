<div class="container">
<h1 class="mx-4">Buku Favoritemu : <?= $data['user']['nama']; ?></h1><br><hr>
<div class="card d-flex flex-row flex-wrap justify-content-center" style="margin-bottom: 100px; width: 70vw;" >
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
					<a href="<?= BASEURL; ?>/books/author/<?= $b['id_author']; ?>" style="text-decoration: none;">
						<?php $author = $this->model('Buku')->getBukuByAuthor($b['id_author']); ?>
						<?= $author[0]['nama']?>	
					</a>	 
			</p> 
			<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modal-detail" id="detail"
			data-idbuku="<?= $b['id_buku']; ?>" data-iduser="<?= $b['id_user']; ?>" 
			data-judul="<?= $b['judul']; ?>" data-harga="<?= $b['harga']; ?>" 
			data-no="<?= $b['no_telp']; ?>" data-deskripsi="<?= $b['deskripsi']; ?>"
			data-cover="<?= $b['cover']; ?>">
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
	    <button class="btn btn-outline-danger" id="hapus-fav">
			<a href="" style="text-decoration: none; color:black;text-shadow: 1px 1px 1px 1px;">Hapus Dari Favorite</a>
	    </button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).on("click", "#detail", function(){
		const idB = $(this).data('idbuku');
		const idU = $(this).data('iduser');
		const judul = $(this).data('judul');
		const harga = $(this).data('harga');
		const no = $(this).data('no').slice(1);
		const deskripsi = $(this).data('deskripsi');
		const cover = $(this).data('cover');
		const nama = $(this).data('nama');
		const favorite = $(this).data('favorite');

		console.log(idB);
		
		$('.modal-body #id-buku').val(idB);
		$('.modal-body #id-user').val(idU);
		$('.modal-body #penjual a h4').text(nama);
		$('.modal-body #penjual a').attr("href", '/books/author/'+idU);
		$('.modal-body #judul').val(judul);
		$('.modal-body #harga').val('Rp.'+harga);
		$('.modal-body #judul').val(judul);
		$('.modal-body #deskripsi').val(deskripsi);
		$('.modal-body #cover').attr("src", '<?= BASEURL;  ?>/img/'+cover);
		$('.modal-footer #no a').attr("href", 'https://api.whatsapp.com/send?phone=62'+no);
		$('.modal-footer #favorite a').attr('href', '<?= BASEURL; ?>/Books/favorite/'+idB);
		$('.modal-footer #hapus-fav a').attr('href', '<?= BASEURL; ?>/Books/hapusFavorite/'+idB);
	});

	
</script>