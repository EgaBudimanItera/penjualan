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
              Report
              <small>Service</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Service</a><span class="divider-last">&nbsp;</span></li>
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
                            <h4><i class="icon-reorder"></i>Data Service</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                          <?php echo $this->session->flashdata("status"); ?>
                            <div class="form">
                                <!-- BEGIN FORM-->
                                <form id="form" method="POST" action="<?php echo base_url(); ?>Adm_rser/src" class="form-horizontal form-row-seperated">
                                    <div class="control-group">
                                        <label class="control-label">Dari Tanggal </label>
                                        <div class="controls">
                                            <div class="input-append" id="ui_date_picker_trigger">
                                                <input name="tglawal" type="text" class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Sampai Tanggal </label>
                                        <div class="controls">
                                            <div class="input-append" id="ui_date_picker_trigger">
                                                <input name="tglakhir" type="text" class="m-wrap medium" /><span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" value="cari" class="btn btn-success">CARI</button>
                                    <button onclick="NewTab();" type="submit" name="submit" value="cetak" class="btn btn-info">CETAK</button>
                                    <a href="<?php echo base_url() ?>Adm_rser" class="btn btn-primary">REFRESH</a>
                                </form>
                                <!-- END FORM-->
                            </div>
                            <script type="text/javascript">
                                function NewTab(){
                                    document.getElementById("form").target = "_blank";
                                }
                            </script>
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID Service</th>
                                    <th class="hidden-phone">Tanggal Mulai Service</th>
                                    <th class="hidden-phone">Tanggal Selesai Service</th>
                                    <th class="hidden-phone">ID Order</th>
                                    <th class="hidden-phone">Teknisi</th>
                                    <th class="hidden-phone">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($ser>0){
  foreach($ser as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->tglmulaiservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->tglselesaiservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->idorder; ?></td>
                                    <td class="center hidden-phone"><?php echo $r->nmteknisi; ?></td>
                                    <td class="center hidden-phone"><?php echo $r->biaya; ?></td>
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