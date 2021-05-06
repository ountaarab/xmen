
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">       
            <div class="col-md-12  text-left">
                <button class="btn btn-info" onclick="detail_superhero(<?= $detail['id'] ?>)">back</button>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    Meng-klik "Tambah Skill" akan membawamu ke halaman form di bawah ini.
                    Ini jika kamu mengklik data milik <?= $detail['nama'] ?>.
                </div>
                <hr/>
            </div>
        </div>


        <form action="<?= base_url('Superhero/add_skill_proses') ?>" method="POST" enctype="multipart/form-data" id="form_add_skill_superhero">
            <div class="row">            
                <div class="col-md-8">
                    <h3>Tambah Skill Superhero: <?= $detail['nama'] ?></h3>
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
                                <input type="hidden" class="form-control" value="<?= $detail['id'] ?>" name="id_superhero"/>
                                <input type="text" class="form-control" value="<?= $detail['nama'] ?>" name="nama"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Skill</td>
                            <td>
                                <select class="form-control" name="id_skill">
                                    <?php 
                                    if(!empty($skill)):
                                        foreach ($skill->result() as $baris):
                                        ?>
                                        <option value="<?= $baris->id ?>" ><?= $baris->nama_skill ?></option>
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
    
    $('#form_add_skill_superhero').submit(function(e) {
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
                        detail_superhero(<?= $detail['id'] ?>);                        
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