    <section class="content-header">
      <h1>
        Kondisi
        <small>Barang Inventaris</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kondisi</li>
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
            	<a href='<?=site_url('kondisi/create')?>' class='btn btn-primary btn-sm'><i class='fa fa-plus'></i> Tambah Data</a>
            	</div>
            <div class='table-responsive'> 
                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kondisi</th>
                            <th>Keterangan Konsdisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
					<tbody>
                        <?php $start = 0; foreach ($kondisi_data as $kondisi) { ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $kondisi->kondisi ?></td>
                            <td><?php echo $kondisi->ket_kondisi ?></td>
                            <td>
                                <a href='<?=site_url('kondisi/read/'.$kondisi->id_kondisi)?>' class='btn btn-xs btn-default'><i class='fa fa-eye'></i></a>
                                <a href='<?=site_url('kondisi/update/'.$kondisi->id_kondisi)?>' class='btn btn-xs btn-primary'><i class='fa fa-pencil-square-o'></i></a>
                                <a href='<?=site_url('kondisi/delete/'.$kondisi->id_kondisi)?>' class='btn btn-xs btn-danger' onclick="javasciprt: return confirm('Are You Sure ?');"><i class='fa fa-trash-o'></i></a>
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