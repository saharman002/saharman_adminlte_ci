<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Jenis <?php echo form_error('jenis') ?></td>
                        <td>
                            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_jenis') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_jenis" name="ket_jenis" placeholder="Keterangan Jenis" value="<?php echo $ket_jenis; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('jenis') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->