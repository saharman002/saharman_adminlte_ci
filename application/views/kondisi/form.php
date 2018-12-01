<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Kondisi <?php echo form_error('kondisi') ?></td>
                        <td>
                            <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Keterangan <?php echo form_error('ket_kondisi') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="ket_kondisi" name="ket_kondisi" placeholder="Keterangan Kondisi" value="<?php echo $ket_kondisi; ?>" />
                        </td>
                    </tr>
                    <input type="hidden" name="id_kondisi" value="<?php echo $id_kondisi; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('kondisi') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->