<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PEMILIHAN RAYA TRIPLEK</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dewan Kerajaan III RPLK" />
<script type="application/x-javascript"> 
	id = "";
	nomor ="";
	count = 10;
	counter = setInterval(timer,100);
	 
	addEventListener("load", function(e) { 
		setTimeout(hideURLbar, 0);
		jumlah = "<?php echo($jumlah); ?>";
		switch (jumlah){
		case '1' : $(".team-left").css("width","49%"); break;
		case '2' : $(".team-left").css("width","32%"); break;
		case '3' : $(".team-left").css("width","24%"); break;
		case '4' : $(".team-left").css("width","19%"); break;
		case '5' : $(".team-left").css("width","15%"); break;
		}
		$("#id").text("ID . -");
		$.post("<?php echo base_url(); ?>index.php/pilih/get_id", {operation: 1}, function(r) {
			$("#id").text("ID . "+r);
			id = r;
		});
	}, false); 
	function hideURLbar(e){ window.scrollTo(0,1); } 
	function popup(i, e){ 
		$("#popup").css("visibility","visible");
		$("#content").css("top","150px");
		$("#content").css("opacity","1");
		nomor = i;
		if(i==0){
			$("#nomor").text("Abstain");}
		else{
			$("#nomor").text(i);}	
	}

	function close_popup(e){
		$("#popup").css("visibility","hidden");
		$("#content").css("top","0px");
		$("#content").css("opacity","0");
		$("#cek_button1").css("display","block");
	}

	function end(e){
		$("#popup").css("visibility","hidden");
		$("#content").css("top","0px");
		$("#content").css("opacity","0");
		$("#content").css("display","block");
		$("#error").css("display","none");
		$("#done").css("display","none");
		$("#lock").css("height","100%");
		$("#bar").css("width","0%");
		$("#id").text("ID . -");
		$.post("<?php echo base_url(); ?>index.php/pilih/get_id", {operation: 1}, function(r) {
			$("#id").text("ID . "+r);
			id = r;
		});
		counter = setInterval(timer,1000);
	}
	function balik(e){
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url(); ?>index.php/pilih/logout",
		  data: null
		});
		window.location="/index.php/pilih"; 
	}
	function send(e){
		$("#content").css("display","none");
		$("#loading").css("display","block");
		var req = $.ajax({
		  method: "POST",
		  url: "<?php echo base_url(); ?>index.php/pilih/pilih_suara",
		  data: { operation: 3, ident: id, suara: nomor }
		});
		req.done(function( msg ) {
			$("#loading").css("display","none");
			if(msg=="done"){
				$("#done").css("display","block");
				$("#konfirmasi").html("<p>ID . "+id+"<br><b style=\"font-size:20px;\"> telah memilih calon nomor</b><br>"+nomor+"</p>");
				id = "-";
			}else{
				$("#error").css("display","block");
			}	
			});
		req.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		});
	}
	function opens(e){
		$("#lock").css("height","0%");
	}
	function timer(e){
		count-=1;
		if(count<=0){
			clearInterval(counter);
			opens();
			count = 10;
			$("#bar").css("width","100%");
			return;
		}else
			$("#bar").css("width",((10-count+1)/10)*100+"%");
	}
</script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />	
<link href="<?php echo base_url(); ?>assets/css/registrasi.css" rel='stylesheet' type='text/css' />	
<!--<link href="css/custom.css" rel='stylesheet' type='text/css' />-->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'> -->
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.97074.js"></script>

</head>

<body style="background-color:#30b0bb;">
	<div id="lock">
    	<div id="count"></div>
        <div id="bar"></div>
    </div>
	<div id="popup">
    <img src='<?php echo base_url(); ?>assets/images/loading.gif' alt='Loading...' id="loading" style="display:none;"/>
    	<!--Task pop up ----------------------------->
    	<div id="content" class="content" style="margin: auto; top: 0;bottom: 0;left: 0;right: 0;height: 90%; position: unset;">
        	<div id="id" class="id"></div>
            <table width="100%" align="center" border="0" >
            <tr><td colspan="2" style="text-align:center;padding-top:20px;">Anda memilih pilihan</td></tr>
            <tr><td colspan="2" style="text-align:center;" id="nomor"></td></tr>
            <tr>
                <td width="50%" valign="middle"><button type="button" id="cek_button1" onClick="send();">CONFIRM</button></td>
                <td><button type="button" id="cek_button" onClick="close_popup();">BATAL</button></td>
            </tr>
            </table>
        </div>
        <!--------------------------------------------->
        <!-- task suara telah terkirim ---------------->
        <div id="done" class="content" style="display: none;margin: auto; top: 0;bottom: 0;left: 0;right: 0;height: 90%; position: unset;">
       		<div id="tnx" class="id">Terimakasih</div>
            <table width="100%" align="center" border="0">
            <tr><td style="text-align:center;font-size:40px;" id="konfirmasi"></td></tr>
            <tr height="20%">
                <td><a type="button" id="cek_button" style="margin-left:225px;" href="<?php echo base_url('index.php/pilih/logout')?>">OK</a></td>
            </tr>
            </table>
        </div>
        <!--------------------------------------------->
        <!-- task ketika koneksi error ---------------->
        <div id="error" class="content" style="display: none;margin: auto; top: 0;bottom: 0;left: 0;right: 0;height: 90%; position: unset;">
       		<div id="err" class="id" style="background-color:#F30;">Ups... Maaf</div>
            <table width="100%" align="center" border="0">
            <tr height="40%"></tr>
            <tr height="40%"><td valign="middle" style="text-align:center;font-size:50px;">Koneksi Terputus</td></tr>
            <tr height="20%">
                <td valign="middle"><button type="button" id="cek_button" style="margin-left:225px;" onClick="end();">OK</button></td>
            </tr>
            </table>
        </div>
        <!--------------------------------------------->
    </div>
	<div class="team" id="about" style="background-image:url(<?php echo base_url(); ?>assets/images/background1.png);">
		<div class="container">
        	
        	<h3 class="tittle ab" id="title_reg">HOKAGE</h3>
            
               		<?php foreach ($calon as $data): ?>
               			<?php if ($data->no_urut == '0'): ?>
                        <?php else: ?>
                        <div class="col-md-3 team-left" onClick="popup(<?php echo $data->no_urut;?>);">
                            <h3 class="tittle ab" id="title_reg" style="color:#000;"><?php echo $data->no_urut;?></h3>
                            <a>
                                <img src="<?php echo base_url(); ?>uploads/<?php echo $data->foto;?>" alt="">
                                <div class="captn">
                                    <p><?php echo $data->nama;?></p>
                                    <h4>Nomor <?php echo $data->no_urut;?></h4>
                                </div>
                                <div class="team-text">
                                    <h5><?php echo $data->nama;?></h5>
                                    <p></p>
                                </div>
                            </a>					
                        </div>
               			<?php endif ?>
               			
               		<?php endforeach ?>	
                   
        </div>
    </div>
    <div class="copy" style="margin-top:0px;">
		   <p>&copy;</p>
	</div>
</body>
</html>
