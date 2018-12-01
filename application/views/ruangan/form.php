<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Kondisi <?php echo form_error('ruangan') ?></td>
                        <td>
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Kondisi" value="<?php echo $nama_ruangan; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('fungsi_ruangan') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="fungsi_ruangan" name="fungsi_ruangan" placeholder="Keterangan Kondisi" value="<?php echo $fungsi_ruangan; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_ruangan" value="<?php echo $id_ruangan; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('ruangan') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->