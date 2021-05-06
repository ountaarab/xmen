<!doctype html>
<html lang="en">

<head>
    <meta charset="us-ascii">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <title>X-MEN</title>
    <style>
        body {
            margin: 20px;
            padding: 20px;
        }

        .hr100 {
            margin-bottom: 100px;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>X-MEN</h1>
            <p>
                Ini adalah Skill X-MEN, ini adalah kemampuan para pahlawan pembela bumi.
            </p>
        </div>
        <div class="col-md-2"></div>

    </div>

    <hr class="hr100" />
    <div class="row mb-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <a href="<?= base_url() ?>" class="btn btn-info">Superhero</a>
            <a href="<?= base_url('Skill') ?>" class="btn btn-warning">Skill</a>
            <a href="<?= base_url('Simulasi') ?>" class="btn btn-primary">Simulasi</a>
        </div>
        <div class="col-md-2"></div>

    </div>
    <!-- Simulasi Start -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <p>
                            Nah, ini adalah simulasi jika <stromg>Wolverine & Storm</stromg> menikah.
                            Maka anak-anak mereka kemungkinan akan mewarisi Skill dari Ayah dan Ibunya.
                            Kamu bisa mengganti-ganti Suami / Istri untuk melihat Skill yang akan dimiliki oleh anak-anaknya.
                        </p>

                        <p>
                            <i>Tentunya Laki-laki hanya bisa menikah dengan Perempuan ya, awas jangan sampai jenis kelaminnya sama! Jeruk makan jeruk dong :D</i>
                        </p>
                    </div>
                    <hr />
                </div>
            </div>

            <form action="<?= base_url('Simulasi/get_skill_simulasi') ?>" method="POST" enctype="multipart/form-data" id="skill_simulasi">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Simulasi Jika Superhero Menikah</h3>
                    </div>
                    <div class="col-md-4  text-right">
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td>Suami</td>
                                <td>
                                    <select class="form-control" id="id_papa" name="id_papa">
                                        <?php
                                        if (!empty($laki)) :
                                            foreach ($laki->result() as $baris) :
                                        ?>
                                                <option value="<?= $baris->id ?>"><?= $baris->nama ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Istri</td>
                                <td>
                                    <select class="form-control" id="id_mama" name="id_mama">
                                        <?php
                                        if (!empty($perempuan)) :
                                            foreach ($perempuan->result() as $baris) :
                                        ?>
                                                <option value="<?= $baris->id ?>"><?= $baris->nama ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        <h3>Maka Anaknya Kemungkinan Akan Memiliki Skill Berikut:</h3>
                        <div id="get_skill">

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>

    <hr class="hr100" />

    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <button class="btn btn-primary" onclick="export_excel()">Export To Excel</button>
            <button class="btn btn-primary" onclick="export_pdf()">Export To PDF</button>

            <hr />

            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <p>
                            Kamu juga bisa meng-export data hasil simulasi ini ke EXCEL / PDF. Ingat, data ini rahasia. Jangan sampai jatuh ke tangan musuh ya! Berbahaya!
                        </p>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
    <!-- Simulasi End-->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('#skill_simulasi').submit(function(e) {
            if (confirm('lihat data?')) {
                $('#get_skill').html('');
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: new FormData($(this)[0]),
                    success: function(data) {
                        $('#get_skill').html(data);
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(data) {

                    }
                });
            } else {
                alert('batal');
                return false;
            }
            e.preventDefault();
        });

        function export_excel() {
            let id_papa = $('#id_papa').val();
            let id_mama = $('#id_mama').val();

            document.location.href = "<?= base_url('Export_excel/export') ?>/" + id_papa + "/" + id_mama;
        }

        function export_pdf() {
            let id_papa = $('#id_papa').val();
            let id_mama = $('#id_mama').val();

            document.location.href = "<?= base_url('Export_pdf/export') ?>/" + id_papa + "/" + id_mama;
        }
    </script>