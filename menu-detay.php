<?php 

include 'header.php';



//Belirli veriyi seçme işlemi
$menusor=$db->prepare("SELECT * FROM menu where menu_seourl=:sef");
$menusor->execute(array(
	'sef' => $_GET['sef']
	));
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);


?>



<div class="container">
	
	<div class="row">
		<div class="col-md-12"><!--Main content-->

			<div class="title-bg">
				<div class="title"><?php echo $menucek['menu_ad'] ?? "Yoxdur." ?></div>
			</div>

			
			<div class="page-content">
				<p>
				<!-- return $Row['Data'] ?? 'default value'; -->

					<?php echo $menucek['menu_detay'] ?? "Yoxdur.."; ?>
				</p>

			</div>




		</div>




	

	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>