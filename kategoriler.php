<?php 

include 'header.php'; 



?>


<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">

	<div class="row">
		<div class="col-sm-12"><!--Main content-->

			<div class="row prdct"><!--ilanlar-->


				<?php

                     $sayfada = 24; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from kategori");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                  	// eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
          			// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
        				// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;



                     //aşağısı bir önceki default kodumuz...
                     if (isset($_GET['sef'])) {


                     	$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
                     	$kategorisor->execute(array(
                     		'seourl' => $_GET['sef']
                     		));

                     	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

						 if (isset($_GET['kategori_id'])) {
                     	$kategori_id=$kategoricek['kategori_id'];
						 }

                     	$habersor=$db->prepare("SELECT * FROM haber where kategori_id=:kategori_id order by haber_id DESC limit $limit,$sayfada");
                     	
						 if (isset($_GET['kategori_id'])) {
						$habersor->execute(array(
                     		'kategori_id' => $kategori_id
                     		));
						}
                     	$say=$habersor->rowCount();

                     } else {

                     	$habersor=$db->prepare("SELECT * FROM haber order by haber_id DESC limit $limit,$sayfada");
                     	$habersor->execute();

                     }






                     if ($toplam_icerik==0) {
                     	echo "Bu kategoride ürün bulunamadı";
                     }


                     while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) {
                     	?>

                     	<div class="col-sm-4">
                     		<div align="center">
                     		
                     		 <a href="haber-<?=seo($habercek["haber_ad"]).'-'.$habercek["haber_id"]?>" class="list-group-item">
      <h4 class="list-group-item-heading"><?php echo $habercek['haber_ad'] ?></h4>
      <p class="list-group-item-text" style="display: inline-block;border-radius: 4px;background-color: #f8cb1c;font-weight: bold;color: #333; padding: 5px 12px;"><span><?php echo $habercek['haber_fiyat'] ?> AZN</span></p>
    </a>	<br>
                     		
                     		
                     		</div>
                     	</div>


                     	<?php } ?>

                    

                     </div><!--ilanlar-->


			</div>

		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'; ?>