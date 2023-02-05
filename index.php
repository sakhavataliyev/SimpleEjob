<?php 
include 'header.php'; 
?>

<div class="container-fluid text-center" style="max-width:1800px;">
  <div class="row content">
      
 	<div class="col-sm-2 sidenav">
	 <div class="well">
		 <p>ADS</p>
	 </div>
 </div>
    
      
    <div class="col-sm-8">
     <div class="row">
   <div class="col-sm-6" style="background-color:#fff;">
        
       <h2>SON İŞ ELANLARI</h2>

    <div class="list-group">
   
   
   
   	<?php 
			$habersor=$db->prepare("SELECT * FROM haber where haber_durum=:haber_durum order by haber_id DESC limit 15");
			$habersor->execute(array(
				'haber_durum' => 1
				));

			
			while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) {


					$haber_id=$habercek['haber_id'];

					
				?>
   
   
   
    <a href="haber-<?=seo($habercek["haber_ad"]).'-'.$habercek["haber_id"]?>" class="list-group-item">
      <h4 class="list-group-item-heading"><?php echo $habercek['haber_ad'] ?></h4>
      <p class="list-group-item-text" style="display: inline-block;border-radius: 4px;background-color: #f8cb1c;font-weight: bold;color: #333; padding: 5px 12px;"><span><?php echo $habercek['haber_fiyat'] ?> AZN</span></p>
    </a>

			<?php } ?>



    </div>
     
        
        </div>
   
   
   
    <div class="col-sm-6" style="background-color:#fff;">
        
       <h2>PREMİUM İŞ ELANLARI</h2>

    <div class="list-group">
   
   
   
   	<?php 
				$habersor=$db->prepare("SELECT * FROM haber where haber_durum=:haber_durum and haber_onecikar=:haber_onecikar order by haber_id DESC limit 15");
			$habersor->execute(array(
				'haber_durum' => 1,
				'haber_onecikar' => 1
				));

			
			while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) {


					$haber_id=$habercek['haber_id'];

				?>
   
    <a href="haber-<?=seo($habercek["haber_ad"]).'-'.$habercek["haber_id"]?>" class="list-group-item">
      <h4 class="list-group-item-heading"><?php echo $habercek['haber_ad'] ?></h4>
      <p class="list-group-item-text" style="display: inline-block;border-radius: 4px;background-color: #f8cb1c;font-weight: bold;color: #333; padding: 5px 12px;"><span><?php echo $habercek['haber_fiyat'] ?> AZN</span></p>
    </a>

			<?php } ?>
			
    </div>
        </div>
  
    </div>
  
  </div>


	<div class="col-sm-2 sidenav">
	 <div class="well">
		 <p>ADS</p>
	 </div>
 </div>
</div>
</div>

	<?php include 'footer.php'; ?>