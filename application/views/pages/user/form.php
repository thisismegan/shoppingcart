<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Tambah Pengguna</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST'])  ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true, 'placeholder' => 'Masukkan Nama Pengguna'])  ?>
                        <?= form_error('name')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <?= form_input('email', $input->email, ['class' => 'form-control', 'id' => 'email', 'required' => true, 'autofocus' => true])  ?>
                        <?= form_error('email')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password'])  ?>
                        <?= form_error('password')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Member</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => '1', 'checked' => $input->is_active == 1 ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => '0', 'checked' => $input->is_active == 0 ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <br>
                        <?php if (isset($input->image)) :  ?>
                            <img class="img-thumbnail" style="height: 150px;" src="<?= base_url("images/user/$input->image"); ?>" alt="">
                        <?php endif; ?>
                        <?= form_upload('image', ['class' => 'form-control'])  ?>
                        <?php if ($this->session->flashdata('image_error')) :  ?>
                            <small class="text-danger form-text"></small>
                            <?= $this->session->flashdata('image_error') ?>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

</main>