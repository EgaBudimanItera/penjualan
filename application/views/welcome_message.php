<?php $this->load->view("partials/front/head"); ?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Produk Kami</h2>
                    <?php echo $this->session->flashdata("status");  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
<?php
if(!empty($produk)){
  foreach($produk as $data){

?>
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img style="width:350px;height:200px;" src="<?php echo base_url() ?>upload/<?php echo str_replace("e","",$data->gambar); ?>" alt="">
                    </div>
                    <h2><?php echo $data->nmsparepart; ?></h2>
                    <div class="product-carousel-price">
                        <ins><?php echo 'Rp. '.number_format($data->hargajual,2); ?></ins> || <ins> <?php echo $data->spesifikasi; ?></ins>
                    </div>

                    <div class="product-option-shop">                     
                    
                    </div>
                </div>
            </div>
<?php }} ?>
        </div>
       
    </div>
</div>

<?php $this->load->view("partials/front/foot"); ?>
