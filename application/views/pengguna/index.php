<section class="content-header">
      <h1>
        Pengguna
        <small>Barang Inventaris</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-th"></i>
              <h3 class="box-title">Data </h3>
              <?php echo $this->session->flashdata('message') ? '<br/>'.$this->session->flashdata('message') : ''?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div style="padding-bottom: 15px;">
            	<a href='<?=site_url('pengguna/create')?>' class='btn btn-primary btn-sm'><i class='fa fa-plus'></i> Tambah Data</a>
            	</div>
            <div class='table-responsive'> 
                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Photo</th>
                        </tr>
                    </thead>
					<tbody>
                        <?php $start = 0; foreach ($pengguna_data as $pengguna) { ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $pengguna->nm_depan ?></td>
                            <td><?php echo $pengguna->nm_belakang ?></td>
                            <td><?php echo $pengguna->email ?></td>
                            <td><?php echo $pengguna->username ?></td>
                            <td><?php echo $pengguna->password ?></td>
                            <td><?php echo $pengguna->level ?></td>
                            <td><img src="<?php echo base_url().'assets/img/'.$pengguna->photo ?>" width="50px" height="50px" ></td>
                            <td>
                                <a href='<?=site_url('pengguna/read/'.$pengguna->id_pengguna)?>' class='btn btn-xs btn-default'><i class='fa fa-eye'></i></a>
                                <a href='<?=site_url('pengguna/update/'.$pengguna->id_pengguna)?>' class='btn btn-xs btn-primary'><i class='fa fa-pencil-square-o'></i></a>
                                <a href='<?=site_url('pengguna/delete/'.$pengguna->id_pengguna)?>' class='btn btn-xs btn-danger' onclick="javasciprt: return confirm('Are You Sure ?');"><i class='fa fa-trash-o'></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                   
                    </table>
                </div><!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>  