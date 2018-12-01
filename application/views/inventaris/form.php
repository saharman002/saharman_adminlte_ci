<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Inventaris <?php echo form_error('inventaris') ?></td>
                        <td>
                            <input type="text" class="form-control" id="inventaris" name="inventaris" placeholder="Inventaris" value="<?php echo $inventaris; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_inventaris') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_inventaris" name="ket_inventaris" placeholder="Keterangan Inventaris" value="<?php echo $ket_inventaris; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_inventaris" value="<?php echo $id_inventaris; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('inventaris') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->