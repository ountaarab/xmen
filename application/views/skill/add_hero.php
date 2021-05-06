
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">       
            <div class="col-md-12  text-left">
                <button class="btn btn-info" onclick="detail_skill(<?= $detail['id'] ?>)">back</button>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Meng-klik "Tambah Hero" akan membawamu ke halaman form di bawah ini.
                    Ini jika kamu mengklik skill <?= $detail['nama_skill'] ?>.
                </div>
                <hr/>
            </div>
        </div>


        <form action="<?= base_url('Skill/add_hero_proses') ?>" method="POST" enctype="multipart/form-data" id="form_add_superhero_skill">
            <div class="row">            
                <div class="col-md-8">
                    <h3>Tambah Superhero untuk Skill : <?= $detail['nama_skill'] ?></h3>
                </div>
                <div class="col-md-4  text-right">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <input type="hidden" class="form-control" value="<?= $detail['id'] ?>" name="id_skill"/>
                                <input type="text" class="form-control" value="<?= $detail['nama_skill'] ?>" name="nama_skill"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Hero</td>
                            <td>
                                <select class="form-control" name="id_superhero">
                                    <?php 
                                    if(!empty($hero)):
                                        foreach ($hero->result() as $baris):
                                        ?>
                                        <option value="<?= $baris->id ?>" ><?= $baris->nama ?></option>
                                        <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<script type="text/javascript">
    
    $('#form_add_superhero_skill').submit(function(e) {
        if (confirm('yakin ingin tambah skill pada Superhero ini?')) {
            $.ajax({
                type: 'POST',
                datatype: 'json',
                url: $(this).attr('action'),
                data: new FormData($(this)[0]),
                success: function(data) {
                    data = JSON.parse(data);
                    alert(data.message);
                    if(data.status == 20){
                        detail_skill(<?= $detail['id'] ?>);                        
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function(data) {

                }
            });
        } else {
            alert('batal hapus');
            return false;
        }
        e.preventDefault();
    });
</script>