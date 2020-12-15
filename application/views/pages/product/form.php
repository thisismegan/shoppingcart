<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Formulir Produk</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST'])  ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group">
                        <label for="">Produk</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true])  ?>
                        <?= form_error('title')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4, 'class' => 'form-control'])  ?>
                        <?= form_error('description')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true])  ?>
                        <?= form_error('price') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control'])  ?>
                        <?= form_error('id_category')  ?>
                    </div>
                    <div class="form-group">
                        <label for="">Stock</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'form-check-input'])  ?>
                            <label for="" class="form-check-label"> Kosong</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Image Produk</label>
                        <br>
                        <?php if (isset($input->image)) :  ?>
                            <img class="img-thumbnail" style="height: 150px;" src="<?= base_url("images/product/$input->image"); ?>" alt="">
                        <?php endif; ?>
                        <?= form_upload('image', ['class' => 'form-control'])  ?>
                        <?php if ($this->session->flashdata('image_error')) :  ?>
                            <small class="text-danger form-text"></small>
                            <?= $this->session->flashdata('image_error') ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true])  ?>
                        <?= form_error('slug')  ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

</main>