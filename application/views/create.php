<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <!-- Tambahkan CSS yang dibutuhkan seperti Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="<?= base_url('karyawan/store') ?>" method="post">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Karyawan</h4>
                        </div>
                        <div class="card-body border-top py-0 my-3">
                            <h4 class="text-muted my-3">Profil</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="nik">NIK:</label>
                                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK Karyawan" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap:</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap Karyawan" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="telp">No. Telp:</label>
                                        <input type="tel" name="telp" id="telp" class="form-control" placeholder="Masukan No. Telp" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="divisi">Divisi:</label>
                                        <select name="divisi" id="divisi" class="form-control">
                                            <option value="" disabled selected>-- Pilih Divisi --</option>
                                            <?php foreach($divisi as $d): ?>
                                                <option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top py-0 my-3">
                            <h4 class="text-muted my-3">Akun</h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="********" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan JS yang dibutuhkan seperti jQuery dan Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
