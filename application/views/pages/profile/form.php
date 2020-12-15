<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <?php $this->load->view('layouts/_menu'); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Formulir Edit Profile
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
                    <button class="btn btn-info" type="submit">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</main>