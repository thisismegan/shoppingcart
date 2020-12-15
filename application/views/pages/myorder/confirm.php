<main role="main" class="container">
    <div class="row">
        <?php $this->load->view('layouts/_menu'); ?>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Konfirmasi Orders <strong><?= $order->invoice  ?></strong>
                    <div class="float-right">
                        <?php $this->load->view('layouts/_status', ['status' => $order->status])  ?>
                    </div>
                </div>
                <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                <?= form_hidden('id_order', $order->id) ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Transaksi</label>
                        <input type="text" value="<?= $order->invoice; ?>" class="form-control" value="0123456789" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Dari rekening a.n</label>
                        <input type="text" name="account_name" class="form-control" value="<?= $input->account_name ?>">
                        <?= form_error('account_name') ?>
                    </div>
                    <div class="form-group">
                        <label for="">No Rekening</label>
                        <input type="number" name="account_number" class="form-control" value="<?= $input->account_number ?>">
                        <?= form_error('account_number') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Sebesar</label>
                        <input type="number" name="nominal" class="form-control" value="<?= $input->nominal ?>">
                        <?= form_error('nominal') ?>
                    </div>
                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="note" cols="30" rows="5" class="form-control">-</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Bukti Transfer</label>
                        <br>
                        <?php if (isset($input->image)) :  ?>
                            <img class="img-thumbnail" style="height: 150px;" src="<?= base_url("images/confirm/$input->image"); ?>" alt="">
                        <?php endif; ?>
                        <input type="file" name="image" id="" class="form-control">
                        <?php if ($this->session->flashdata('image_error')) :  ?>
                            <small class="text-danger form-text"> <?= $this->session->flashdata('image_error') ?></small>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Konfirmasi Pembayaran</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>

</main>