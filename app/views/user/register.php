<?php 
  if (!empty($_SESSION)) {
    echo "<script>window.location.href = '".BASEURL."/Books';</script>";
  }
 ?>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

            <form class="px-md-2" method="post" action="">

              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Nama Lengkap</label>
                <input type="text" id="form3Example1q" class="form-control" name="nama" />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Username </label>
                <input type="text" id="form3Example1q" class="form-control" name="username" />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Password</label>
                <input type="password" id="form3Example1q" class="form-control" name="pass" />
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Nomor WA</label>
                <input type="number" id="form3Example1q" class="form-control" name="no" />
              </div>

              <button type="submit" class="btn btn-primary btn-primary mb-1" name="register">Register</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>