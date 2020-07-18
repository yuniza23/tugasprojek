<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <h2 style="margin-top:0px">Tufoksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="jabatan">Jabatan <?php echo form_error('jabatan') ?></label>
            <textarea class="form-control" rows="3" name="jabatan" id="jabatan" placeholder="Jabatan"><?php echo $jabatan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tugas_pokok">Tugas Pokok <?php echo form_error('tugas_pokok') ?></label>
            <textarea class="form-control" rows="3" name="tugas_pokok" id="tugas_pokok" placeholder="Tugas Pokok"><?php echo $tugas_pokok; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tufoksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->