<?php 

include 'header.php';

//Belirli veriyi seçme işlemi
$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
	'id' => 0
	));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);


?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<h3>Hakkımızda Sayfası</h3>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"><!--Main content-->

        	<div class="title-bg">
				<div class="title"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></div>
			</div>
			<div class="page-content">
				<p>
					<?php echo $hakkimizdacek['hakkimizda_icerik']; ?>
				</p>

			</div>

            <div class="title-bg">
				<h4>Tanıtım Videosu</h4>
			</div>
          <div align="center">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video'] ?>" frameborder="0" allowfullscreen></iframe>
           </div>

			<div class="title-bg">
				<h4>Elanın Yerləşdirilməsi</h4>
			</div>

			<blockquote><?php echo $hakkimizdacek['hakkimizda_elan']; ?></blockquote>
		

        	<div class="title-bg">
				<h4>Bizimlə Əlaqə</h4>
			
			<blockquote><?php echo $hakkimizdacek['hakkimizda_elaqe']; ?></blockquote>
            </div>
            
	

	</div>
	<div class="spacer"></div>
</div>

</div>

<?php include 'footer.php'; ?>