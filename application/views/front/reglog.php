<?php $this->load->view("partials/front/head"); ?>

<div class="product-big-title-area">
		<div class="container">
				<div class="row">
						<div class="col-md-12">
								<div class="product-bit-title text-center">
										<h2>Login &amp; Register</h2>
								</div>
						</div>
				</div>
		</div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
					<div class="col-md-4">
						<p>
							<?php echo $this->session->flashdata("status"); ?>
						</p>
						<form id="login-form-wrap" action="<?php echo base_url(); ?>Clt_reglog/log" class="login" method="post">
								<p>Sudah punya akun ? Login dibawah.</p>
								<p class="form-row form-row-first">
										<label for="username">Email <span class="required">*</span>
										</label>
										<input type="text" name="username" class="input-text" required="">
								</p>
								<p class="form-row form-row-last">
										<label for="password">Password <span class="required">*</span></label>
										<input type="password" name="password" class="input-text" required="">
								</p>
								<div class="clear"></div>
								<p class="form-row">
										<input type="submit" value="Login" name="login" class="button">
								</p>
						</form>
					</div>

					<div class="col-md-5 col-md-offset-1">
						<h2 class="sidebar-title">Register Disini</h2>
						<form action="<?php echo base_url(); ?>Clt_reglog/reg" method="POST">
							<p class="form-row form-row-first">
									<input readonly type="text" name="idpelanggan" class="form-control" placeholder="ID Pelanggan" required="" value="<?php print_r($id) ?>">
							</p>
							<p class="form-row form-row-last">
									<input type="text" name="nmpelanggan" class="form-control" placeholder="Nama" required="">
							</p>
							<p class="form-row form-row-last">
									<input type="text" name="noktp" class="form-control" placeholder="No KTP" required="">
							</p>
							<p class="form-row form-row-first">
									<textarea class="form-control" placeholder="Alamat" name="alamat" required=""></textarea>
							</p>
							<p class="form-row form-row-last">
									<input type="text" name="telp" class="form-control" placeholder="No Telpon" required="">
							</p>
							<p class="form-row form-row-last">
									<input type="email" name="email" class="form-control" placeholder="Email Valid" required="">
							</p>
							<p class="form-row form-row-last">
									<input type="password" name="password" class="form-control" placeholder="Password" required="">
							</p>
							<div class="clear"></div>
							<p class="form-row">
									<input type="submit" value="Register" class="button">
							</p>
						</form>
					</div>

				</div>
		</div>
</div>


<?php $this->load->view("partials/front/foot"); ?>
