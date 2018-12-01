    <section class="content-header">
      <h1>
        Sumber
        <small>Barang Inventaris</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sumber</li>
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
            	<a href='<?=site_url('sumber/create')?>' class='btn btn-primary btn-sm'><i class='fa fa-plus'></i> Tambah Data</a>
            	</div>
            <div class='table-responsive'> 
                <table class="table table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Sumber</th>
                            <th>Keterangan Konsdisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
					<tbody>
                        <?php $start = 0; foreach ($sumber_data as $sumber) { ?>
                        <tr>
                            <td><?php echo ++$start ?></td>
                            <td><?php echo $sumber->sumber ?></td>
                            <td><?php echo $sumber->ket_sumber ?></td>
                            <td>
                                <a href='<?=site_url('sumber/read/'.$sumber->id_sumber)?>' class='btn btn-xs btn-default'><i class='fa fa-eye'></i></a>
                                <a href='<?=site_url('sumber/update/'.$sumber->id_sumber)?>' class='btn btn-xs btn-primary'><i class='fa fa-pencil-square-o'></i></a>
                                <a href='<?=site_url('sumber/delete/'.$sumber->id_sumber)?>' class='btn btn-xs btn-danger' onclick="javasciprt: return confirm('Are You Sure ?');"><i class='fa fa-trash-o'></i></a>
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