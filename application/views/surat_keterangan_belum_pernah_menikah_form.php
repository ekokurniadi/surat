
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Surat Keterangan Belum Pernah Menikah </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Surat Keterangan Belum Pernah Menikah </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Surat Keterangan Belum Pernah Menikah </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Surat <?php echo form_error('nomor_surat') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Nomor Surat" value="<?php echo $nomor_surat; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nik <?php echo form_error('nik') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Agama <?php echo form_error('agama') ?></label>
                <div class="col-sm-12">
                <select name="agama" id="agama" class="form-control">
                    <option value="<?=$agama?>"><?=$agama == "" ? "Choose" : $agama ?></option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
              </div>
	   
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                <div class="col-sm-12">
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="<?=$jenis_kelamin?>"><?=$jenis_kelamin == "" ? "Choose" : $jenis_kelamin ?></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>	  
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Status Perkawinan <?php echo form_error('status_perkawinan') ?></label>
                <div class="col-sm-12">
                <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                    <option value="<?=$status_perkawinan?>"><?=$status_perkawinan == "" ? "Choose" : $status_perkawinan ?></option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Cerai">Cerai</option>
                    
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kewarganegaraan <?php echo form_error('kewarganegaraan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Kewarganegaraan" value="<?php echo $kewarganegaraan; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
                </div>
              </div>
	   
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Golongan Darah" value="<?php echo $golongan_darah; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Rt Pengantar <?php echo form_error('rt_pengantar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="rt_pengantar" id="rt_pengantar" placeholder="Rt Pengantar" value="<?php echo $rt_pengantar; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nomor Surat Pengantar <?php echo form_error('nomor_surat_pengantar') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nomor_surat_pengantar" id="nomor_surat_pengantar" placeholder="Nomor Surat Pengantar" value="<?php echo $nomor_surat_pengantar; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Surat Pengantar <?php echo form_error('tanggal_surat_pengantar') ?></label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="tanggal_surat_pengantar" id="tanggal_surat_pengantar" placeholder="Tanggal Surat Pengantar" value="<?php echo $tanggal_surat_pengantar; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="keperluan">Keperluan <?php echo form_error('keperluan') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="keperluan" id="keperluan" placeholder="Keperluan"><?php echo $keperluan; ?></textarea>
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat_keterangan_belum_pernah_menikah') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
