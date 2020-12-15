<main role="main" class="container">
    <?php $this->load->view('layouts/_alert')  ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <span>Kategori</span>
                    <a href="<?= base_url('category/create'); ?>" class="btn btn-sm btn-secondary">Tambah</a>
                    <div class="float-right">
                        <?= form_open(base_url('category/search'), ['method' => 'POST'])  ?>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari..." value="<?= $this->session->userdata('keyword') ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url('category/reset'); ?>" class="btn btn-info btn-sm"><i class="fas fa-eraser"></i></a>
                            </div>
                        </div>
                        <?= form_close()  ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 30px;" scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($content) : ?>
                                <?php $no = 0;
                                foreach ($content as $row) : $no++;     ?>
                                    <tr>
                                        <td><?= $no;  ?></td>
                                        <td><?= $row->title  ?></td>
                                        <td><?= $row->slug  ?></td>
                                        <td>
                                            <?= form_open("category/delete/$row->id", ['method' => 'POST'])  ?>
                                            <?= form_hidden('id', $row->id) ?>
                                            <a class="btn btn-sm" href="<?= base_url("category/edit/$row->id"); ?>">
                                                <i class="fas fa-edit text-info"></i>
                                            </a>
                                            <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                            <?= form_close()  ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-warning text-center" role="alert">
                                            Data tidak ditemukan
                                        </div>
                                    </td>

                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</main>