
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Surat keterangan belum pernah menikah </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Surat keterangan belum pernah menikah </a></div>
    </div>
  </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  
                    <!-- 0 -->
                    <div class="col-md-4">
                      <?php echo anchor(site_url('surat_keterangan_belum_pernah_menikah/create'),'<i class="fa fa-plus"></i> Add New', 'class="btn btn-icon icon-left btn-primary"'); ?>
                    </div>

                  <div class="col-md-4 text-center">
                      <div style="margin-top: 8px" id="message">
                       <h5> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h5>
                      </div>
                  </div>

                  <div class="col-md-1 text-right">
                  </div>

                  <div class="col-md-3 text-right">
                     <form action="<?php echo site_url('surat_keterangan_belum_pernah_menikah/index'); ?>" class="form-inline" method="get">
                          <div class="input-group">
                          <input type="text" class="form-control" name="q" value="<?php echo $q; ?>" placeholder="Enter Keyword">
                          <span class="input-group-btn">
                              <?php 
                                  if ($q <> '')
                                  {
                                      ?>
                                      <a href="<?php echo site_url('surat_keterangan_belum_pernah_menikah'); ?>" class="btn btn-warning"><span class="fa fa-close"> </span> Reset</a>
                                      <?php
                                  }
                              ?>
                            <button class="btn btn-primary" type="submit"><span class="fa fa-search"> </span> Search</button>
                          </span>
                          </div>
                      </form>
                  </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md" id="table-1">
                      <thead>
                      <tr>
                          <th>No</th>
		<th>Nomor Surat</th>
		<th>Tanggal Surat</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Nik</th>
		<th>Agama</th>
		<th>Jenis Kelamin</th>
		<th>Kewarganegaraan</th>
		<th>Pekerjaan</th>
		<th>Status Perkawinan</th>
		<th>Golongan Darah</th>
		<th>Alamat</th>
		<th>Rt Pengantar</th>
		<th>Nomor Surat Pengantar</th>
		<th>Tanggal Surat Pengantar</th>
		<th>Keperluan</th>
		<th>Action</th>
                    </tr>
                    </thead><?php
                    foreach ($surat_keterangan_belum_pernah_menikah_data as $surat_keterangan_belum_pernah_menikah)
                    {
                        ?>
                          <tbody>
                          <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->nomor_surat ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->tanggal_surat ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->nama ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->tempat_lahir ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->tanggal_lahir ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->nik ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->agama ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->jenis_kelamin ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->kewarganegaraan ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->pekerjaan ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->status_perkawinan ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->golongan_darah ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->alamat ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->rt_pengantar ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->nomor_surat_pengantar ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->tanggal_surat_pengantar ?></td>
			<td><?php echo $surat_keterangan_belum_pernah_menikah->keperluan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('surat_keterangan_belum_pernah_menikah/cetak/'.$surat_keterangan_belum_pernah_menikah->id),'<i class="fa fa-print"></i>',array('title'=>'detail','class'=>'btn btn-icon icon-left btn-success'));
				echo '  '; 
				echo anchor(site_url('surat_keterangan_belum_pernah_menikah/update/'.$surat_keterangan_belum_pernah_menikah->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-icon icon-left btn-warning')); 
				echo '  '; 
				echo anchor(site_url('surat_keterangan_belum_pernah_menikah/delete/'.$surat_keterangan_belum_pernah_menikah->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-icon icon-left btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr></tbody>
                          <?php
                      }
                      ?>
                    
                    </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                  <?php echo $pagination ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="row">
        <div class="col-md-6">
            <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
            
	    </div>
       
    </div>
      </div>
      