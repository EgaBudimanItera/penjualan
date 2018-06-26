<?php $this->load->view("partials/front/head"); ?>

<div class="product-big-title-area">
		<div class="container">
				<div class="row">
						<div class="col-md-12">
								<div class="product-bit-title text-center">
										<h2>Order Service</h2>
										<?php echo $this->session->flashdata("status") ?>
								</div>
						</div>
				</div>
		</div>
</div>

<div class="single-product-area">
		<div class="zigzag-bottom"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="product-content-right">
						<div class="woocommerce">

						<form id="login-form-wrap" action="<?php echo base_url(); ?>Clt_ordser/add" method="post">
							<p class="form-row form-row-first">
								<label for="username">Keterangan Kerusakan <span class="required">*</span></label>
								<textarea rows="5" class="form-control" required="" name="ket"></textarea>
							</p>											
								<div class="clear"></div>
								<p class="form-row">
									<input type="submit" value="Order" class="button">
								</p>
						</form>

								
						<h3 id="order_review_heading">Pesanan Anda</h3>

						<div id="order_review" style="position: relative;">
								<table class="shop_table">
									<thead>
										<tr>
											<th class="product-name">ID ORDER</th>
											<th class="product-total">Tanggal Order</th>
											<th class="product-total">KERUSAKAN</th>
											<th class="product-total">STATUS</th>
										</tr>
									</thead>
									<tbody>
<?php if($ord>0){foreach($ord as $r){ ?>							
										<tr class="cart_item">
											<td class="product-name"> <strong class="product-quantity"> <?php echo $r->idorder; ?></strong> </td>
											<td class="product-total"><strong class="product-quantity"> <?php echo $r->tglorder; ?></strong></td>
											<td class="product-total"><strong class="product-quantity"> <?php echo $r->ketkerusakan; ?></strong></td>
											<td class="product-total"><strong class="product-quantity"> <?php echo $r->statusorder; ?></strong></td>
										</tr>
<?php }} ?>										
									</tbody>
								</table>
															

								<div class="clear"></div>

								</div>
							</div>
						</div>
					</div>
			</div>
		</div>
</div>

<?php $this->load->view("partials/front/foot"); ?>
