
<!-- Detail Skill Start -->

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
                    Ini adalah skill <?= $detail['nama_skill'] ?>. Skill yang berbahaya. Musuh akan terkejut melihat skill ini
                </div>
                <hr/>
            </div>
        </div>


        <form action="<?= base_url('Skill/edit') ?>" method="POST" enctype="multipart/form-data" id="form_edit_superhero">
            <div class="row">            
                <div class="col-md-8">
                    <h3>Detail Skill: <?= $detail['nama_skill'] ?></h3>
                </div>
                <div class="col-md-4  text-right">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    <button class="btn btn-danger" type="button" onclick="hapus_skill(<?= $detail['id'] ?>)">Hapus</button>
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
                                <input type="text" class="form-control" value="<?= $detail['nama_skill'] ?>" name="nama_skill"/>
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                        <th>No</th>
                        <th>Heroes</th>
                        <th>
                            <button class="btn btn-primary btn-small" onclick="form_tambah_hero(<?= $detail['id'] ?>)">Tambah Hero</button>
                        </th>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        if(!empty($heroes)):
                            foreach ($heroes->result() as $baris):
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $baris->nama ?></td>
                                <td>
                                    <button class="btn btn-danger btn-small" type="button" onclick="hapus_hero(<?= $baris->id ?>)">Hapus</button>
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
<!-- Detail Skill End-->

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

    function hapus_hero(id)
    {
        if (confirm('yakin ingin hapus skill ini?')) {
            $.get("<?= base_url('Skill/delete_hero/') ?>"+id, function (result) {
                result = JSON.parse(result);
                alert(result.message);
                if(result.status == 20){
                    detail_skill(<?= $detail['id'] ?>);
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