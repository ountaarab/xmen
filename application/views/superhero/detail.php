
<!-- Detail SuperHero Start -->
<?php 
$jk = $detail['jk'];
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">       
            <div class="col-md-12  text-left">
                <button class="btn btn-info" onclick="back()">Back</button>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Meng-klik "View Detail" di atas akan membawamu ke halaman detail di bawah ini.
                    Ini jika kamu mengklik data milik <?= $detail['nama'] ?>.
                </div>
                <hr/>
            </div>
        </div>


        <div class="row">            
            <div class="col-md-8">
                <h3>Detail Superhero: <?= $detail['nama'] ?></h3>
            </div>
            <div class="col-md-4  text-right">
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td><?= $detail['id'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" class="form-control" value="<?= $detail['nama'] ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <select class="form-control">
                                <option value="l" <?php if($jk == 'l' || $jk == 'L'): echo " selected"; endif; ?>>Laki-laki</option>
                                <option value="p" <?php if($jk == 'p' || $jk == 'P'): echo " selected"; endif; ?>>Perempuan</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <table class="table table-bordered">
                    <thead>
                    <th>No</th>
                    <th>Skill</th>
                    <th>
                        <button class="btn btn-primary btn-small">Tambah Skill</button>
                    </th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Bisa Sembuh Dengan Cepat</td>
                        <td>
                            <button class="btn btn-danger btn-small">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mempunyai Cakar Yang Lebih Kuat Dari Baja</td>
                        <td>
                            <button class="btn btn-danger btn-small">Hapus</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<!-- Detail SuperHero End-->