<style>
    .product {
        color: black;
    }

    .product:hover {
        color: black;
    }
</style>

<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori'  ?></strong>
                            <span class="float-right">
                                Urutan Harga: <a href="<?= base_url("shop/sortby/asc") ?>" class="badge <?= $this->uri->segment(3) == 'asc' ? 'badge-info' : 'badge-primary';  ?>">Termurah</a> | <a href="<?= base_url("shop/sortby/desc") ?>" class="badge <?= $this->uri->segment(3) == 'desc' ? 'badge-info' : 'badge-primary';  ?>">Termahal</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if ($content) : ?>
                    <?php foreach ($content as $row) : ?>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <a href="<?= base_url("product/detail/$row->id"); ?>" target="_blank">
                                    <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url('images/product/default.png') ?>" class="card-img-top mt-3" style="height: 230px;" alt="">
                                </a>
                                <div class="card-body">
                                    <a class="product" href="<?= base_url("product/detail/$row->id"); ?>">
                                        <p class="card-title"><?= $row->product_title  ?></p>
                                    </a>
                                    <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.')   ?>-</strong></p>
                                    <!-- <p class="card-text"><?= (str_word_count($row->description) > 20 ? substr($row->description, 0, 130) . "" : $row->description); ?></p> -->
                                    <a href="#" class="badge badge-info"><i class="fas fa-tags"></i> <?= $row->category_title  ?></a>
                                </div>
                                <div class="card-footer">
                                    <form action="<?= base_url('cart/add'); ?>" method="POST">
                                        <input type="hidden" name="id_product" value="<?= $row->id; ?>">
                                        <div class="input-group">
                                            <input type="number" name="qty" value="1" min="1" class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-info">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center" role="alert">
                            Data tidak ditemukan
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <nav aria-label="Page navigation example">
                <?= $pagination  ?>
            </nav>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Pencarian
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('shop/search') ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" value="<?= $this->session->userdata('keyword'); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-info">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Kategori
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url(); ?>">Semua Kategori</a></li>
                            <?php foreach (getCategories() as $category) :  ?>
                                <li class="list-group-item"><a href="<?= base_url("shop/category/$category->slug"); ?>"><?= $category->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>