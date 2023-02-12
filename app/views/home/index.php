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
<header class="masthead">
	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-xl-6">
				<div class="text-center text-white">
					<!-- Page heading-->
					<h1 class="mb-5">
						Generate more leads with a professional landing page!
					</h1>
					<!-- Signup form-->
					<!-- * * * * * * * * * * * * * * *-->
					<!-- * * SB Forms Contact Form * *-->
					<!-- * * * * * * * * * * * * * * *-->
					<!-- This form is pre-integrated with SB Forms.-->
					<!-- To make this form functional, sign up at-->
					<!-- https://startbootstrap.com/solution/contact-forms-->
					<!-- to get an API token!-->
					<form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
						<!-- Email address input-->
						<div class="row">
							<div class="col">
								<input class="form-control form-control-lg" id="emailAddress" type="email"
									placeholder="Email Address" data-sb-validations="required,email" />
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:required">
									Email Address is required.
								</div>
								<div class="invalid-feedback text-white" data-sb-feedback="emailAddress:email">
									Email Address Email is not valid.
								</div>
							</div>
							<div class="col-auto">
								<button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">
									Submit
								</button>
							</div>
						</div>
						<!-- Submit success message-->
						<!---->
						<!-- This is what your users will see when the form-->
						<!-- has successfully submitted-->
						<div class="d-none" id="submitSuccessMessage">
							<div class="text-center mb-3">
								<div class="fw-bolder">Form submission successful!</div>
								<p>To activate this form, sign up at</p>
								<a class="text-white"
									href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
							</div>
						</div>
						<!-- Submit error message-->
						<!---->
						<!-- This is what your users will see when there is-->
						<!-- an error submitting the form-->
						<div class="d-none" id="submitErrorMessage">
							<div class="text-center text-danger mb-3">
								Error sending message!
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</header>