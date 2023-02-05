<?php 

include 'header.php'; 



if (isset($_POST['arama'])) {

	$aranan=$_POST['aranan'];
	$habersor=$db->prepare("SELECT * FROM haber where haber_ad LIKE ?");
	$habersor->execute(array("%$aranan%"));

	$say=$habersor->rowCount();

} else {

	Header("Location:index.php?durum=bos");

}




?>



<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-sm-12"><!--Main content-->
			
			<h2>Bulunan Sonuçlar!</h2>
			
			<div class="row prdct"><!--Products-->


				<?php
				
				if ($say==0) {
					echo "Bu kategoride Haber bulunamadı";
				}


				while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) {
					?>
    <div class="col-sm-4">
         <div align="center">
				<a href="haber-<?=seo($habercek["haber_ad"]).'-'.$habercek["haber_id"]?>" class="list-group-item">
      <h4 class="list-group-item-heading"><?php echo $habercek['haber_ad'] ?></h4>
      <p class="list-group-item-text" style="display: inline-block;border-radius: 4px;background-color: #f8cb1c;font-weight: bold;color: #333; padding: 5px 12px;"><span><?php echo $habercek['haber_fiyat'] ?> AZN</span></p>
    </a>
<br> <br>
    </div>
    </div>

					<?php } ?>

				</div><!--Products-->
			</div>

		</div>
	</div>
	
	<?php include 'footer.php'; ?>