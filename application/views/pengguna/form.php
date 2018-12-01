<!-- Main content -->
<section class='content'>
    <div class='box'>
        <div class='box-body'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <td>Nama Depan <?php echo form_error('nm_pengguna') ?></td>
                        <td>
                            <input type="text" class="form-control" id="nm_depan" name="nm_depan" placeholder="Nama Depan" value="<?php echo $nm_depan; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Belakang <?php echo form_error('nm_belakang') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="nm_belakang" name="nm_belakang" placeholder="Nama Belakang" value="<?php echo $nm_belakang; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Email <?php echo form_error('email') ?></td>
                        <td>
                            <input type="email" class="form-control"  id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Username <?php echo form_error('username') ?></td>
                        <td>
                            <input type="text" class="form-control"  id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password <?php echo form_error('password') ?></td>
                        <td>
                            <input type="password" class="form-control"  id="password" name="password" placeholder="Password" value="<?php echo $password; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Level <?php echo form_error('level') ?></td>
                        <td>
                            <select name="level" id="level" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Photo <?php echo form_error('photo') ?></td>
                        <td>
                            <input type="file" id="photo" name="photo" size="20" required value="<?php echo $photo; ?>" />
                        </td>
                    </tr>

                    <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>" />
                    <tr>
                        <td colspan='2' class='text-center'>
                            <button type="submit" class="btn btn-primary btn-sm"><i class='fa fa-check'></i> <?php echo $button ?></button>
                            <a href="<?php echo site_url('pengguna') ?>" class="btn btn-sm btn-default"><i class='fa fa-remove'></i> Kembali</a>
                        </td>
                    </tr>
                </table>
           </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</section><!-- /.content -->