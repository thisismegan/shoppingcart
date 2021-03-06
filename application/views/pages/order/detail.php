<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Detail Orders <strong><?= $order->invoice  ?></strong>
                            <div class="float-right">
                                <?php $this->load->view('layouts/_status', ['status' => $order->status])  ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tanggal Pembelian</p>
                                    <p>Nama</p>
                                    <p>Telepon</p>
                                    <p>Alamat Pengiriman</p>
                                </div>
                                <div class="col-md-1">
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                    <p>:</p>
                                </div>
                                <div class="col-md-7 text-left">
                                    <p><b> <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date)))  ?></b></p>
                                    <p><b> <?= $order->name ?></b></p>
                                    <p><b> <?= $order->phone ?></b></p>
                                    <p><b> <?= $order->address ?></b></p>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_detail as $row) : ?>
                                        <tr>
                                            <td>
                                                <p><img src="<?= base_url("images/product/$row->image") ?>" alt="" class="img-thumbnail" style="width: 120px;"><strong> <?= $row->title  ?></strong></p>
                                            </td>
                                            <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.')   ?></td>
                                            <td class="text-center"><?= $row->qty  ?></td>
                                            <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.')  ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="3"><strong>Total:</strong></td>
                                        <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.')  ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url("order/update/$order->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $order->id ?>">
                                <div class="input-group">
                                    <select name="status" id="" class="form-control">
                                        <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : ''  ?>>Menunggu Pembayaran</option>
                                        <option value="paid" <?= $order->status == 'paid' ? 'selected' : ''  ?>>Dibayar</option>
                                        <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : ''  ?>>Dikirim</option>
                                        <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : ''  ?>>Batal</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($orders_confirm)) : ?>
                <div class="row mb-3 mt-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Bukti Transfer
                            </div>
                            <div class="card-body">
                                <p>Dari rekening: <?= $orders_confirm->account_number;  ?></p>
                                <p>Atas nama: <?= $orders_confirm->account_name;  ?></p>
                                <p>Nominal: Rp<?= number_format($orders_confirm->nominal, 0, ',', '.');  ?></p>
                                <p>Catatan: -</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="img-thumbnail" style="height: 230px;" src=" <?= base_url("images/confirm/$orders_confirm->image") ?> " alt="">
                    </div>
                </div>

            <?php endif ?>
        </div>
    </div>

</main>