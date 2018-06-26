<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("partials/back/head");
?>



    <!-- BEGIN PAGE -->
    <div id="main-content">
      <!-- BEGIN PAGE CONTAINER-->
      <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
          <div class="span12">
                        
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class="page-title">
              Transaksi
              <small>Order</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Order</a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div id="page" class="dashboard">                                    
                                               
          <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Data Order</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th class="hidden-phone">Tanggal Order</th>
                                    <th class="hidden-phone">Nama Pelanggan</th>
                                    <th class="hidden-phone">Keterangan Kerusakan</th>
                                    <th class="hidden-phone">Status Order</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($ord>0){
  foreach($ord as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idorder; ?></td>
                                    <td class="hidden-phone"><?php echo $r->tglorder; ?></td>
                                    <td class="hidden-phone"><?php echo $r->nmpelanggan; ?></td>
                                    <td class="hidden-phone"><?php echo $r->ketkerusakan; ?></td>
                                    <td class="center hidden-phone"><?php echo $r->statusorder; ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <a target="_blank" href="<?php echo base_url() ?>Adm_ord/Ctk_srt/<?php echo $r->idorder; ?>" onclick="return confirm('Order akan Di Proses ?')" class="btn btn-warning">cetak</a>
                                        <?php if($r->statusorder=='ORDER'){ ?>
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_ord/del/<?php echo $r->idorder; ?>">hapus</a>
                                        <?php } ?>
                                      </div>
                                    </td>
                                </tr>
<?php }}?>                                
                                </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
          </div>

          
                            
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
      </div>
  <!-- END CONTAINER -->


<?php $this->load->view("partials/back/foot"); ?>