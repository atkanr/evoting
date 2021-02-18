<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Fitur</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="KPUM, Sekolah Tinggi Sandi Negara" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />	
<link href="<?php echo base_url(); ?>assets/css/registrasi.css" rel='stylesheet' type='text/css' />	
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
<!--/script-->
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.97074.js"></script>

</head>
<body>
	<div id="about" style="background-color:#eee;">
		     <div class="container">
			 	<h3 class="tittle ab" id="title_ab" style="color:#30b0bb;">Admin Page</h3>
				<!--<div id="line"></div> -->
                <div id="back">
               	 	
                	<div id="form" style="background-color:#30b0bb;width:100%;">
                        <a href="<?php echo base_url(); ?>index.php/admin/logout"><button type="button" id="close_button" style="margin-top:-40px;margin-right:-40px;"> X </button></a>
                         <?php if ($this->session->flashdata('fail') != ''): ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                          <span><b> Failed - </b> <?php echo $this->session->flashdata('fail'); ?></span>
                      </div>
                    </div>
                    <?php endif ?>

                     <?php if ($this->session->flashdata('success') != ''): ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                          <span><b> Success - </b> <?php echo $this->session->flashdata('success'); ?></span>
                      </div>
                    </div>
                    <?php endif ?>

                    <table width="100%" height="200px" border="0" bordercolor="#FFFFFF">
                    	<tr align="center">
                        	<td width="20%" id="admin_hover"><a href="<?php echo base_url(); ?>index.php/admin/mahasiswa"><h4 style="color: white">List Pemilih</h4></a></td>
                          <td width="20%" id="admin_hover"><a href="<?php echo base_url(); ?>index.php/admin/tabulasi"><h4 style="color: white">Hitung suara</h4></td>
                          <td width="20%" id="admin_hover"><a href="<?php echo base_url(); ?>index.php/admin/create"><h4 style="color: white">Buat Pemilihan</h4></td>  
                      </tr>
                    </table>
                  </div>
                </div> 
                			
			 </div>
	</div>
             <svg id="curveDownColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				<path d="M0 0 C 50 100 80 100 100 0 Z"></path>
			</svg>
 <div class="copy" style="margin-top:0px;">
		   <p>&copy; </p>
	   </div>
</body>
</html>