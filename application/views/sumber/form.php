<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Sumber <?php echo form_error('sumber') ?></td>
                        <td>
                            <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Sumber" value="<?php echo $sumber; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_sumber') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_sumber" name="ket_sumber" placeholder="Keterangan Sumber" value="<?php echo $ket_sumber; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_sumber" value="<?php echo $id_sumber; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('sumber') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->