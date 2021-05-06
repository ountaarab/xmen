
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
                    Meng-klik "View Detail" akan membawamu ke halaman detail di bawah ini.
                    Ini jika kamu mengklik data milik <?= $detail['nama'] ?>.
                </div>
                <hr/>
            </div>
        </div>


        <form action="<?= base_url('Superhero/edit') ?>" method="POST" enctype="multipart/form-data" id="form_edit_superhero">
            <div class="row">            
                <div class="col-md-8">
                    <h3>Detail Superhero: <?= $detail['nama'] ?></h3>
                </div>
                <div class="col-md-4  text-right">
                    <button class="btn btn-primary" type="submit">Edit</button>
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
                                <input type="hidden" class="form-control" value="<?= $detail['id'] ?>" name="id"/>
                                <input type="text" class="form-control" value="<?= $detail['nama'] ?>" name="nama"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <select class="form-control" name="jk">
                                    <option value="L" <?php if($jk == 'l' || $jk == 'L'): echo " selected"; endif; ?>>Laki-laki</option>
                                    <option value="P" <?php if($jk == 'p' || $jk == 'P'): echo " selected"; endif; ?>>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Skill</th>
                        <th>
                            <button class="btn btn-primary btn-small" onclick="form_tambah_skill(<?= $detail['id'] ?>)">Tambah Skill</button>
                        </th>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        if(!empty($skill)):
                            foreach ($skill->result() as $baris):
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $baris->nama_skill ?></td>
                                <td>
                                    <button class="btn btn-danger btn-small" type="button" onclick="hapus_skill(<?= $baris->id ?>)">Hapus</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<!-- Detail SuperHero End-->

<script type="text/javascript">
    $('#form_edit_superhero').submit(function(e) {
        if (confirm('yakin ingin edit data?')) {
            $.ajax({
                type: 'POST',
                datatype: 'json',
                url: $(this).attr('action'),
                data: new FormData($(this)[0]),
                success: function(data) {
                    data = JSON.parse(data);
                    alert(data.message);
                    if(data.status == 0){
                        detail_superhero(data.id);                        
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function(data) {

                }
            });
        } else {
            alert('batal edit');
            return false;
        }
        e.preventDefault();
    });

    function hapus_skill(id)
    {
        if (confirm('yakin ingin hapus skill ini?')) {
            $.get("<?= base_url('Superhero/delete_skill/') ?>"+id, function (result) {
                result = JSON.parse(result);
                alert(result.message);
                if(result.status == 20){
                    detail_superhero(<?= $detail['id'] ?>);
                }
                else{
                    alert(result.message);                  
                }
            });
        } else {
            alert('batal hapus skill');
        }
    }
</script>