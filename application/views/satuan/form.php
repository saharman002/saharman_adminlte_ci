<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Satuan <?php echo form_error('satuan') ?></td>
                        <td>
                            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_satuan') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_satuan" name="ket_satuan" placeholder="Keterangan Satuan" value="<?php echo $ket_satuan; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('satuan') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->