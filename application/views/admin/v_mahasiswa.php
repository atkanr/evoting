<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabulasi</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
			<h1>Mahasiswa</h1>
		</div>
		<div class="span3">
	</div>		
    <br/>		

    <div class="row">
    	<div class="col-md-12">
    	<table class="table table-hover" id="example">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">NPM</th>
		      <th scope="col">Status</th>
		    </tr>
		  </thead>
		  <tbody>

		  	<?php $i=0; foreach ($mahasiswa as $data): ?>
		  			
			<tr>
		      <th><?php echo ++$i; ?></th>
		      <td><?php echo $data->npm; ?></td>
		      <td><?php if ($data->status == 1) {
		      	echo "Sudah";
		      } else {
		      	echo "Belum";
		      } ?></td>
		      </td>
		    </tr>

		  	<?php endforeach ?>	
		  		
		    
		  </tbody>
		</table>
    	</div>
    </div>
</div>
</div>


	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

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

		<script>
			$(document).ready(function() {
			    $('#example').DataTable();
			} );
		</script>

       <div class="copy" style="margin-top:0px;">
		   <p>&copy; </p>
	   </div>
</body>

</html>
