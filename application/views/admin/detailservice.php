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
              <small>Service - Detail</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Detail Service - <?php echo $this->uri->segment(3) ?></a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
          </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div id="page" class="dashboard">                                    
          <div class="row-fluid">
            <div class="span12">
              <!-- BEGIN SITE VISITS PORTLET-->
              <div class="widget">
                <div class="widget-title">
                  <h4><i class="icon-folder-close"></i> Pengguna</h4>
                  <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                  </span>
                </div>
                <div class="widget-body">
                  <form id="simpan" method="POST" action="<?php echo base_url() ?>Adm_ser/add_det" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Service</label>
                        <div class="controls">
                           <input type="text" class="span6" readonly value="<?php echo $this->uri->segment(3); ?>" id="inputWarning" name="idservice" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Sparepart</label>
                        <div class="controls">
                           <select id="spare" onchange="brought()" class="span6" name="idsparepart" required>
                             <option value="">Pilih Sparepart</option>
                             <?php foreach($spare as $ro){ ?>
                             <option value="<?php echo $ro->idsparepart."|".$ro->hargajual; ?>"><?php echo $ro->nmsparepart; ?></option>
                             <?php } ?>
                           </select>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <script type="text/javascript">
                       function brought(){
                        var x = document.getElementById("spare").value;
                        var y = x.split("|");
                        document.getElementById('hargajual').value = y[1];
                       }
                     </script>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Jumlah Item</label>
                        <div class="controls">
                           <input type="text" class="span6" onkeyup="document.getElementById('harga').value=document.getElementById('jumlahitem').value*document.getElementById('hargajual').value;" id="jumlahitem" name="jumlahitem" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Harga Jual</label>
                        <div class="controls">
                           <input type="text" class="span6" readonly id="hargajual" name="hargajual" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Harga Total</label>
                        <div class="controls">
                           <input type="text" class="span6" id="harga" readonly name="harga" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                     </div>
                  </form>
                </div>
              </div>
              <!-- END SITE VISITS PORTLET-->
            </div>
          </div>                                         
          <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Detail Service</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                          <?php echo $this->session->flashdata("status"); ?>
                          <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Service</th>
                                    <th class="hidden-phone">Sparepart</th>
                                    <th class="hidden-phone">Jumlah Item</th>
                                    <th class="hidden-phone">Harga</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
$no=1;
if($detser){
  foreach($detser as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $r->idservice; ?></td>
                                    <td class="hidden-phone"><?php echo $r->nmsparepart; ?></td>
                                    <td class="hidden-phone"><?php echo $r->jumlahitem; ?></td>
                                    <td class="hidden-phone"><?php echo number_format($r->harga); ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_ser/del_det/<?php echo $r->iddetailservice; ?>/<?php echo $r->idservice; ?>">hapus</a>
                                      </div>
                                    </td>
                                </tr>
<?php }}?>                                
                                </tbody>
                            </table>
                        </div>
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