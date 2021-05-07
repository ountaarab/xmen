<div class="col-md-2"></div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                Di bawah ini adalah Daftar Skill yang ada.<br />
                Kamu bisa mencari nama mereka melalui fasilitas pencarian di sebelah kanan.<br />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Skill</h3>
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
                    <button class="btn btn-outline-secondary" onclick="cari_skill()" type="button">Cari</button>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($skill->num_rows()) :
                        $no = 1;
                        foreach ($skill->result() as $baris) :
                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $baris->nama_skill ?></td>
                                <td>
                                    <a href="#" class="btn btn-primary" onclick="detail_skill(<?= $baris->id ?>)">View Detail</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                    else :
                        ?>
                        <tr>
                            <td colspan="3">
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
    function cari_skill() {
        let cari = $('#search').val();

        $('#skill').html('');
        $.get("<?= base_url('Skill/search/') ?>" + cari, function(result) {
            $('#skill').html(result);
        });
    }
</script>