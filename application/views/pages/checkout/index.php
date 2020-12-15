<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?php foreach ($kec as $row) : ?>

                        <?= $row['nama'] ?>

                    <?php endforeach ?>
                    Formulir alamat pengiriman
                </div>
                <div class="card-body">
                    <form action="<?= base_url('checkout/create') ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="name" required placeholder="masukkan nama penerima" value="<?= $input->name  ?>">
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telepon</label>
                            <input type="number" required class="form-control" name="phone" placeholder="masukkan nomor telepon" value="<?= $input->phone  ?>">
                            <?= form_error('phone') ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <select name="kecamatan" class="form-control form-control-sm mb-1">
                                <option value="">--Pilih Provinsi--</option>
                                <?php foreach ($kec as $row) :  ?>
                                    <option value=" <?= $row['kode'] ?>"><?= $row['nama']  ?></option>
                                <?php endforeach ?>
                            </select>
                            <select name="kecamatan" class="form-control form-control-sm mb-1">
                                <option value="">--Pilih Kabupaten/Kota--</option>
                                <?php foreach ($kec as $row) :  ?>
                                    <option value=" <?= $row['kode'] ?>"><?= $row['nama']  ?></option>
                                <?php endforeach ?>
                            </select>
                            <select name="kecamatan" class="form-control form-control-sm">
                                <option value="">--Pilih Kecamatan--</option>
                                <?php foreach ($kec as $row) :  ?>
                                    <option value=" <?= $row['kode'] ?>"><?= $row['nama']  ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class=" form-group">
                            <textarea id="address" placeholder="Tulis alamat lengkap: Kelurahan, RT/RW, Jalan/No rumah" cols="30" required rows="5" class="form-control" name="address"><?= $input->address  ?></textarea>
                            <?= form_error('address') ?>
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cart
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td><?= $row->title ?></td>
                                            <td><?= $row->qty ?></td>
                                            <td>Rp<?= number_format($row->price, 0, ',', '.')  ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Sub total</td>
                                            <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</main>