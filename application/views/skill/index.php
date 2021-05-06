
<!doctype html>
<html lang="en">
<head><meta charset="us-ascii">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

<hr class="hr100"/>
<div class="row mb-3">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <a href="<?= base_url() ?>" class="btn btn-info">Superhero</a>
        <a href="<?= base_url('Skill') ?>" class="btn btn-warning">Skill</a>
        <a href="<?= base_url('Simulasi') ?>" class="btn btn-primary">Simulasi</a>
    </div>
    <div class="col-md-2"></div>

</div>

<!-- Daftar Skill Start -->

<div id="content_load">

</div>

<div class="row" id="skill">

</div>
<!-- Daftar Skill End -->

<hr class="hr100"/>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
        get_skill();
    });

    function get_skill()
    {
        $('#skill').html('');
        $.get("<?= base_url('Skill/get/all') ?>", function (result) {
          $('#skill').html(result);
        });        
    }

	function detail_skill(id)
	{
        $('#content_load').html('');
		$('#skill').hide();
        $.get("<?= base_url('Skill/get/') ?>"+id, function (result) {
          $('#content_load').html(result);
        });
	}

	function back()
	{
        $('#content_load').html('');
		$('#skill').show();
        get_skill();
	}

	function hapus_skill(id){
		if (confirm('yakin ingin hapus data?')) {
	        $.get("<?= base_url('Skill/delete/') ?>"+id, function (result) {
	        	result = JSON.parse(result);
                alert(result.message);
	        	if(result.status == 20){
                    $('#content_load').html('');
                    back();
	        	}
	        	else{
	        		alert(result.message);	        		
	        	}
	        });
		} else {
			alert('batal hapus');
		}
	}

    function form_tambah_hero(id)
    {
        $('#content_load').html('');
        $.get("<?= base_url('Skill/add_hero/') ?>"+id, function (result) {
          $('#content_load').html(result);
        });

    }
</script>
</body>
</html>