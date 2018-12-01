<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Tahun <?php echo form_error('tahun') ?></td>
                        <td>
                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_tahun') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_tahun" name="ket_tahun" placeholder="Keterangan Tahun" value="<?php echo $ket_tahun; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_tahun" value="<?php echo $id_tahun; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('tahun') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->