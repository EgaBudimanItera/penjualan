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
              <small>Pengguna</small>
            </h3>
            <ul class="breadcrumb">
              <li>
                  <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
              </li>
              <li><a href="#">Pengguna</a><span class="divider-last">&nbsp;</span></li>
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
                  <form id="simpan" method="POST" action="<?php echo base_url() ?>Adm_usr/add" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Pengguna</label>
                        <div class="controls">
                           <input type="text" class="span6" readonly value="<?php print_r($id); ?>" id="inputWarning" name="idpengguna" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Pengguna</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" name="nmpengguna" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Alamat</label>
                        <div class="controls">
                           <textarea class="span6" id="inputWarning" name="alamat" required></textarea>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">No Telpon</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" name="telp" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Email</label>
                        <div class="controls">
                           <input type="text" class="span6" id="inputWarning" name="email" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                     </div>
                  </form>
                  <form style="display: none;" id="ubah" action="<?php echo base_url() ?>Adm_usr/edt" method="POST" class="form-horizontal">
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">ID Pengguna</label>
                        <div class="controls">
                           <input type="text" class="span6" readonly id="idpengguna" name="idpengguna" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Nama Pengguna</label>
                        <div class="controls">
                           <input type="text" class="span6" id="nmpengguna" name="nmpengguna" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Alamat</label>
                        <div class="controls">
                           <textarea class="span6" id="alamat" name="alamat" required></textarea>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">No Telpon</label>
                        <div class="controls">
                           <input type="text" class="span6" id="telp" name="telp" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="control-group primary">
                        <label class="control-label" for="inputWarning">Email</label>
                        <div class="controls">
                           <input type="text" class="span6" id="email" name="email" required/>
                           <span class="help-inline"></span>
                        </div>
                     </div>
                     <div class="form-actions">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" onclick="batal()" class="btn">Cancel</button>
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
                                    <th>ID Pengguna</th>
                                    <th class="hidden-phone">Nama Pengguna</th>
                                    <th class="hidden-phone">Alamat</th>
                                    <th class="hidden-phone">No Telpon</th>
                                    <th class="hidden-phone">Email</th>
                                    <th class="hidden-phone"></th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
if($usr>0){
  foreach($usr as $r){
?>                            
                                <tr class="odd gradeX">
                                    <td><?php echo $r->idpengguna; ?></td>
                                    <td class="hidden-phone"><?php echo $r->nmpengguna; ?></td>
                                    <td class="hidden-phone"><?php echo $r->alamat; ?></td>
                                    <td class="hidden-phone"><?php echo $r->telp; ?></td>
                                    <td class="center hidden-phone"><?php echo $r->email; ?></td>
                                    <td class="center hidden-phone">
                                      <div class="btn-group">
                                        <button class="btn btn-warning" onclick="edit('<?php echo $r->idpengguna; ?>','<?php echo $r->nmpengguna; ?>','<?php echo $r->alamat; ?>','<?php echo $r->telp; ?>','<?php echo $r->email; ?>')">ubah</button>
                                        <a onclick="return confirm('Hapus Data Ini?')" class="btn btn-danger" href="<?php echo base_url() ?>Adm_usr/del/<?php echo $r->idpengguna; ?>">hapus</a>
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
  function edit(id,nm,almt,tlp,eml){

    document.getElementById('simpan').style.display='none';
    document.getElementById('ubah').style.display='';
    document.getElementById('idpengguna').value=id;
    document.getElementById('nmpengguna').value=nm;
    document.getElementById('alamat').value=almt;
    document.getElementById('telp').value=tlp;
    document.getElementById('email').value=eml;

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