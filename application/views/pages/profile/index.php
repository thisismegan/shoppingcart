<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <?php $this->load->view('layouts/_menu') ?>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <img style="height: 200px;" src="<?= $content->image ? base_url("images/user/$content->image") : base_url('images/user/default.png'); ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <p>Nama: <strong><?= $content->name ?></strong></p>
                            <p>Email: <strong><?= $content->email ?></strong></p>
                            <a href="<?= base_url("profile/update/$content->id"); ?>" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>