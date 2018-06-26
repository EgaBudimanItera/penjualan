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
              Master
              <small>Sparepart</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Sparepart</a><span class="divider-last">&nbsp;</span></li>
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
                  <h4><i class="icon-folder-close"></i> Sparepart</h4>
                  <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
                  </span>
                </div>
                <div class="widget-body">
                  <form id="simpan" action="<?php echo base_url() ?>Adm_spare/add" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Sparepart</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" value="<?php print_r($id); ?>" readonly required name="idsparepart" value="" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Sparepart</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" required name="nmsparepart" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Harga Jual</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" required name="hargajual" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Gambar</label>
                        <div class="controls">
                           <input type="file" class="span6" id="gambar" required name="gambar" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Spesifikasi</label>
                        <div class="controls">
                           <textarea class="span6" required name="spesifikasi"></textarea>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                     </div>
                  </form>
                  <form id="ubah" style="display: none;" action="<?php echo base_url() ?>Adm_spare/edt" method="POST" class="form-horizontal" enctype="multipart/form-data">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Sparepart</label>
                        <div class="controls">
                           <input type="text" class="span6" id="idsparepart" readonly required name="idsparepart" value="" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Sparepart</label>
                        <div class="controls">
                           <input type="text" class="span6" id="nmsparepart" required name="nmsparepart" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Harga Jual</label>
                        <div class="controls">
                           <input type="text" class="span6" id="hargajual" required name="hargajual" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Gambar</label>
                        <div class="controls">
                           <input type="file" class="span6" id="gambar" name="gambar" />
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Spesifikasi</label>
                        <div class="controls">
                           <textarea class="span6" id="spesifikasi" required name="spesifikasi"></textarea>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn" onclick="batal()">Cancel</button>
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
                            <h4><i class="icon-reorder"></i>Data</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                               <?php echo $this->session->flashdata("status"); ?>
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>ID Sparepart</th>
                                    <th class="hidden-phone">Nama Sparepart</th>
                                    <th class="hidden-phone">Harga Jual</th>
                                    <th class="hidden-phone">Gambar</th>
                                    <th class="hidden-phone">Spesifikasi</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($spare>0){
  foreach($spare as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idsparepart; ?></td>
                                    <td class="hidden-phone"><?php echo $r->nmsparepart; ?></td>
                                    <td class="hidden-phone"><?php echo "Rp. ".number_format($r->hargajual); ?></td>
                                    <td class="center hidden-phone">
                                      <?php if(!empty($r->gambar)){?>
                                        <img style="width: 100px;height: 100px" src="<?php echo base_url()?>upload/<?php echo str_replace("e", "", $r->gambar); ?>">
                                        <?php } ?>
                                    </td>
                                    <td class="center hidden-phone"><?php echo $r->spesifikasi; ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <button class="btn btn-warning" onclick="edit('<?php echo $r->idsparepart; ?>','<?php echo $r->nmsparepart; ?>','<?php echo $r->hargajual ?>','<?php echo $r->spesifikasi; ?>')">ubah</button>
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_spare/del/<?php echo $r->idsparepart; ?>">hapus</a>
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

<script type="text/javascript">
  function edit(id,nm,hrg,spf){

    document.getElementById('simpan').style.display='none';
    document.getElementById('ubah').style.display='';
    document.getElementById('idsparepart').value=id;
    document.getElementById('nmsparepart').value=nm;
    document.getElementById('hargajual').value=hrg;
    document.getElementById('spesifikasi').value=spf;

  }

  function batal(){
    document.getElementById('simpan').style.display='';
    document.getElementById('ubah').style.display='none';
  }
</script>          
                            
        </div>
        <!-- END PAGE CONTENT-->
      </div>
      <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
      </div>
  <!-- END CONTAINER -->


<?php $this->load->view("partials/back/foot"); ?>