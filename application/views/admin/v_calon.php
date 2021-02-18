<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Creator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="KPUM, Pemilu Mahasiswa, Sekolah Tinggi Sandi Negara" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />	
<link href="<?php echo base_url(); ?>assets/css/registrasi.css" rel='stylesheet' type='text/css' />	
<!--<link href="css/custom.css" rel='stylesheet' type='text/css' />-->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
<!--/script-->
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.97074.js"></script>

</head>

<body>
<div id="about">
		     <div class="container">
			 	<h3 class="tittle ab" id="title_ab">Page Creator</h3>
				<!--<div id="line"></div> -->
                <div id="back">
               	 	<div id="left"></div>
                	<div id="form">
                    <form action="<?php echo base_url(); ?>index.php/admin/insert_calon" method="post" enctype="multipart/form-data">
                    <a href="<?php echo base_url(); ?>index.php/admin"><button type="button" id="close_button"> X </button></a><br><br>
                    <?php if ($this->session->flashdata('fail') != ''): ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                          <span><b> Failed - </b> <?php echo $this->session->flashdata('fail'); ?></span>
                      </div>
                    </div>
                    <?php endif ?>

                    <?php   
                    $n=$pemilu->jumlah;

                    for($i=0;$i<$n;$i++){
                        echo '
                                <p style="float:left;color:#30b0bb;font-size:50px;padding-right:10px;">'.($i+1).'</i><hr>
                                    <h5 style="float:left;" id="atribut_input">Nomor Calon</h5>
                                    <input type="text" name="urut'.$i.'" id="input" autofocus required/>
                                    <h5 style="float:left;" id="atribut_input">Nama Calon</h5>
                                    <input type="text" name="calon'.$i.'" id="input" required/>
                                    <h5 style="float:left;" id="atribut_input">Foto Calon</h5><br>
                                    <input type="file" name="foto'.$i.'" id="input" title="Upload">
                                ';
                            }
                            echo '<hr><input type="hidden" name="upload" value="'.$n.'">';
                    ?>
                        <ul class="actions">
							<li><input type="submit" class="style1" value="Set Up" /></li>
                            <li><input type="reset" class="style2" value="Reset" /></li><br>
						</ul>
                    </form>
                    <h5 style="float:left;" id="atribut_input"></h5>
                    </div>
                </div> 
                			
			 </div>
	</div>
             <svg id="curveDownColor1" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				<path  d="M0 0 C 50 100 80 100 100 0 Z"></path>
			</svg>
 <div class="copy" style="margin-top:0px;">
		   <p>&copy; </p>
	   </div>
</body>
</html>