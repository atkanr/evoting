<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Halaman Verifikasi</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/gambar/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" />
    
</head>
<body> 
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <center><img style="width: 60%" src="<?php echo base_url(); ?>assets/images/kpum-white.png" alt=""></center><br>
                    <center> <h2> PEMILIHAN RAYA MAHASISWA POLTEKSSN 2020</h2></center><br>
                    <?php if ($this->session->flashdata('fail') != ''): ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                          <span><b> Failed - </b> <?php echo $this->session->flashdata('fail'); ?></span>
                      </div>
                    </div>
                    <?php endif ?>
                  <form class="form-signin" method="post" action="<?php echo base_url(); ?>index.php/pilih/verif">
                    <input type="text" name="nomor_induk" class="form-control" autocomplete="off" placeholder="Masukkan NIM" required autofocus><br>
                    <input type="text" name="random_number" class="form-control" autocomplete="off" placeholder="Masukkan Token" required autofocus><br>

                    <input type="submit" name="masuk" class="btn btn-lg btn-primary btn-block" value="Verifikasi">
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
