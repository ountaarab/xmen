<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                Di bawah ini adalah Daftar orang-orang yang super hebat itu.<br />
                Kamu bisa mencari nama mereka melalui fasilitas pencarian di sebelah kanan.<br />
                Kita beruntung memiliki data-data mereka. Jangan sampai jatuh ke tangan musuh, ini akan mengubah dunia..
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Superhero</h3>
        </div>
        <div class="col-md-4">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="Pencarian" id="search" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" onclick="cari_superhero()">Cari</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($superhero->num_rows()) :
                        $no = 1;
                        foreach ($superhero->result() as $baris) :
                            $jenkel = '';
                            if ($baris->jk == 'l' || $baris->jk == 'L') :
                                $jenkel = 'Laki-laki';
                            else :
                                $jenkel = 'Perempuan';
                            endif;
                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $baris->nama ?></td>
                                <td><?= $jenkel ?></td>
                                <td>
                                    <a href="#" class="btn btn-primary" onclick="detail_superhero(<?= $baris->id ?>)">View Detail</a>
                                    <button class="btn btn-danger" onclick="hapus_superhero(<?= $baris->id ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <tr>
                            <td colspan="4">
                                <center>Pencarian tidak Ditemukan</center>
                            </td>
                        </tr>
                    <?php
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-2"></div>

<script>
    function cari_superhero() {
        let cari = $('#search').val();

        $('#superhero').html('');
        $.get("<?= base_url('Superhero/search/') ?>" + cari, function(result) {
            $('#superhero').html(result);
        });
    }
</script>