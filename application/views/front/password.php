<?php $this->load->view("partials/front/head"); ?>

<div class="product-big-title-area">
		<div class="container">
				<div class="row">
						<div class="col-md-12">
								<div class="product-bit-title text-center">
										<h2>Ubah &amp; Password</h2>
								</div>
						</div>
				</div>
		</div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
					<div class="col-md-5 col-md-offset-1">
						<h2 class="sidebar-title">Ubah Disini</h2>
						<?php echo $this->session->flashdata("status"); ?>
						<form action="<?php echo base_url(); ?>Clt_pass/edt" method="POST">
							<p class="form-row form-row-first">
									<input type="password" name="passlama" class="form-control" placeholder="Password Lama" required="" >
							</p>
							<p class="form-row form-row-last">
									<input type="password" name="passbaru" class="form-control" placeholder="Password Baru" required="">
							</p>
							<p class="form-row form-row-last">
									<input type="password" name="konfpass" class="form-control" placeholder="Konfirmasi Password" required="">
							</p>
							<div class="clear"></div>
							<p class="form-row">
									<input type="submit" value="Simpan" class="button">
							</p>
						</form>
					</div>

				</div>
		</div>
</div>


<?php $this->load->view("partials/front/foot"); ?>
