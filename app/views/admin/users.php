<?php 
if (!empty($_SESSION)) {
  if ($_SESSION['level'] !== 'admin') {
    echo "<script>history.back();</script>";
  }
}else{
  echo "<script>window.location.href = '".BASEURL."/user/login';</script>";
}

 ?>
<div class="container">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/table.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <div class="main-content">
    <div class="container mt-7">
      <!-- Table -->
      <h2 class="mb-5">Tables User</h2>
      <div class="row">
      <!-- Dark table -->
      <div class="row mt-5" >
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">User</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID USER</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Username</th>
                    <th scope="col">No Telp</th>
                    <th scope="col" style="width: 5vw; padding-left: 80px;">Action</th>
                  </tr>
                </thead>
                
                <tbody>
                	<?php $tabel = 'users'; ?>
                <?php for ($i=0; $i < count($data['users']); $i++) { ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <p><?= $data['users'][$i]['id_user']; ?></p>
                      </div>
                    </th>
                    <td>
                     <div class="media align-items-center">
                        <p><?= $data['users'][$i]['nama']; ?></p>
                      </div>
                    </td>
                    <td>
                      <div class="media align-items-center">
                        <p><?= $data['users'][$i]['username']; ?></p>
                      </div>
                    </td>
                    <td>
                      <div class="media align-items-center">
                        <p><?= $data['users'][$i]['no_telp']; ?></p>
                      </div>
                    </td>
        			
                    <td class="text-right">
                      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-ubah" id="ubah"
                      data-iduser="<?= $data['users'][$i]['id_user']; ?>"
                      data-nama="<?= $data['users'][$i]['nama']; ?>"
                      data-username="<?= $data['users'][$i]['username']; ?>"
                      data-no="<?= $data['users'][$i]['no_telp']; ?>"
                      data-pass="<?= $data['users'][$i]['password']; ?>">Ubah</button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus" id="hapus"
                      data-iduser="<?= $data['users'][$i]['id_user']; ?>"
                      data-nama="<?= $data['users'][$i]['nama']; ?>"
                      data-username="<?= $data['users'][$i]['username']; ?>"
                      data-no="<?= $data['users'][$i]['no_telp']; ?>"
                      data-pass="<?= $data['users'][$i]['password']; ?>"
                      data-tabel="<?= $tabel ?>">Hapus</button>
                    </td>
                    
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Box ubah -->
<div class="modal modal" tabindex="-1" id="modal-ubah">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/admin/ubahUser" method="post">
      	<input type="hidden" name="password">
      	<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">ID USER </span>
		  	<input type="text" class="form-control" id="id-user" name="id_user" readonly>
		</div>
		<hr>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Nama Lengkap </span>
		  	<input type="text" class="form-control" id="nama" name="nama" required>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Username </span>
		  	<input type="text" class="form-control" id="username" name="username" required>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">No Telepon </span>
		  	<input type="text" class="form-control" id="no" name="no" required>
		</div> 	
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-light" id="no" style="background-color: rgb(37,211,102); ">Ubah
	    </button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Box Hapus -->
<div class="modal modal" tabindex="-1" id="modal-hapus">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Yakin Hapus Data Berikut ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form action="<?= BASEURL; ?>/admin/hapusUser" method="post">
      	<input type="hidden" name="table" id="table"> <!-- nama tabel yang akan dihapus -->
      	<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">ID USER </span>
		  	<input type="text" class="form-control" id="id-user" name="id_user" readonly>
		</div>
		<hr>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Nama Lengkap </span>
		  	<input type="text" class="form-control" id="nama" name="nama" readonly>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">Username </span>
		  	<input type="text" class="form-control" id="username" name="username" readonly>
		</div>
		<div class="input-group flex-nowrap mt-2 mb-2">
		  	<span class="input-group-text" id="addon-wrapping">No Telepon </span>
		  	<input type="text" class="form-control" id="no" name="no" readonly>
		</div> 	
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" id="no" name="hapus">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
	$(document).on("click", "#ubah", function(){
		const iduser = $(this).data('iduser');
		const nama = $(this).data('nama');
		const username = $(this).data('username');
		const pass = $(this).data('pass');
		const no = $(this).data('no');
	
		
		$('.modal-body #id-user').val(iduser);
		$('.modal-body #nama').val(nama);
		$('.modal-body #username').val(username);
		$('.modal-body #password').val(pass);
		$('.modal-body #no').val(no);
		
	});

	$(document).on("click", "#hapus", function(){
		const iduser = $(this).data('iduser');
		const nama = $(this).data('nama');
		const username = $(this).data('username');
		const pass = $(this).data('pass');
		const no = $(this).data('no');
		const tabel = $(this).data('tabel');

		console.log(tabel);
		$('#modal-hapus .modal-body #table').val(tabel);
		$('#modal-hapus .modal-body #id-user').val(iduser);
		$('#modal-hapus .modal-body #nama').val(nama);
		$('#modal-hapus .modal-body #username').val(username);
		$('#modal-hapus .modal-body #password').val(pass);
		$('#modal-hapus .modal-body #no').val(no);
		
	});

	
</script>

