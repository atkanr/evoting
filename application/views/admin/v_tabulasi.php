<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabulasi SEMA</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.6.2.js"></script>
    <style type="text/css">
      body {
        padding-top: 0px;
        padding-bottom: 0px;
		background-color:#0e90d2;
      }
	  #style_vote{
		font-size:200px;
		color:#0e90d2;
	  }
    </style>
</head>
<body>
	<div class="container">
    <div class="hero-unit">
    
	<div class="row">
		<div class="span6">
			<h1>Perhitungan Suara SEMA</h1>
		</div>
		<div class="span3">
			
			<h3>Jumlah total suara : <?php echo $surat_suara_num_rows; ?></h3>
		</div>
	</div>		
    <br/>		
	<div class="row">
    	<div class="span6">
			<button id="mulai" class="btn btn-success btn-large"  autofocus>Hitung suara</button>
		</div>
		<div class="span4">
			<div class="row-fluid">
            	<table>
	                <td><div class="span3" align="center">Suara terhitung<h1><span id="nomer">0</span></h1></div></td>
                    <td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</td>
                    <td><div class="span3" align="center">Suara tersisa<h1><span id="nomersisa">0</span></h1></div></td>
					<td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</td>
                    <td><div class="span3" align="center">Persentase Suara terhitung<h1><span id="persentase">0</span>%</h1></div></td>
                </table>
			</div>
		</div>
	</div>
    <hr style="border-color:#000;"/>
    <div class="row">
    	<div class="span6"> 
			<?php foreach ($data_calon as $data): ?>
				<td>
					<div class="span3" align="center">Persentase Suara terhitung<h1><span id="persentase-<?php echo $data->no_urut; ?>">0</span>%</h1>
					</div>
				</td>
				<h3><?php echo $data->nama;?></h3>
				<div class="progress progress-striped active">
					<div id="bar-<?php echo $data->no_urut; ?>" class="bar" style="width: 0%;" ></div>
				  	<input type="hidden" id="store-<?php echo $data->no_urut; ?>" value="0" />
				</div>
			<?php endforeach ?>
		</div>
        <div class="span4">
    		<table border="0">
            <tr><div class="span3" style="font-size:50px;padding-top:40px;color:#0e90d2;">ID . <span id="id" style="margin-left: 90px;font-size:100px;">-</span></div></tr>
				<td><div class="span3" align="right" style="font-size:50px; padding-top:50px;">Suara<h1><span id="vote" style="color:#0e90d2;font-size:200px;"> - </span></h1></div></td>
    		</table>
    	</div>
    </div> 
    <hr style="border-color:#000;">
    
<!-- /container -->
	<script>
		 //setTimeout(function(){
		var total= <?php echo $surat_suara_num_rows; ?>;	 
		var ii = 0;
		var inc = 0;
		var hitung =1;
		
		function getSuara(id) {
			$.post("<?php echo base_url(); ?>index.php/admin/a", {operation: 4, limit: id}, function(q) {
				$("#id").html(q);
				$("#nomer").text(ii);
				$("#persentase").text((ii*100/total).toFixed(2));
				$("#nomersisa").text(total-ii);
			});
		}

		function getSuara2(id) {
			$.post("<?php echo base_url(); ?>index.php/admin/b", {operation: 4, limit: id}, function(q) {
				$("#spoil").html('<h1>' + q + '</h1>');
				$("#vote").html('<h1 id="style_vote">' + q + '</h1>');
				$("#persentase-" + q).text(Number((Number($("#store-" + q).val())+Number(hitung))*100/total).toFixed(2));
				$("#store-" + q).val(Number($("#store-" + q).val()) + 1);
				$("#bar-" + q).css('width', String(Number($("#store-" + q).val())*inc) + '%');
				$("#bar-" + q).text($("#store-" + q).val() + ' suara');
			});
		}

        inc = 100/total;

         $("#mulai").click(function() {
         	if (ii<total) {
				getSuara(ii);
				getSuara2(ii);
				ii++;
					if (ii>=total) {
						$("#spoil").html('<h1> - </h1>');
						$("#nomer").text(1);
					};
				};
         	setInterval(function(){ 
			   if (ii<total) {
				getSuara(ii);
				getSuara2(ii);
				ii++;
					if (ii>=total) {
						$("#spoil").html('<h1> - </h1>');
						$("#nomer").text(1);
					};
				};
			},1000);
         });

		</script>
       <div class="copy" style="margin-top:0px;">
		   <p>&copy; </p>
	   </div>
</body>

</html>
