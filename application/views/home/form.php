<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
            <form action="<?php echo $action; ?>" method="post">
                <table class='table'>
                    <tr>
                        <td>Provinsi <?php echo form_error('id_provinsi') ?></td>
                        <td>
                            <input type="text" class="form-control" id="provinsi" placeholder="Pilih Provinsi" value="<?php echo $id_provinsi; ?>" />
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Kabupaten <?php echo form_error('id_kabupaten') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="kabupaten" placeholder="Pilih Kabupaten" value="<?php echo $id_kabupaten; ?>" />

                        </td>
                    </tr>
                    <tr>
                        <td>Kecamatan <?php echo form_error('id_kecamatan') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="kecamatan" placeholder="Pilih Kecamatan" value="<?php echo $id_kecamatan; ?>" />
    
                        </td>
                    </tr>
                   
                    <input type="hidden" name="id_posko" value="<?php echo $id_posko; ?>" />
                    <tr>
                        <td colspan='2' class='text-right'>
                            <a href="<?php echo site_url('posko') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->