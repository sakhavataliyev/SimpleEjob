<?php 

include 'header.php'; 


$habersor=$db->prepare("SELECT * FROM haber where haber_id=:haber_id");
$habersor->execute(array(
	'haber_id' => $_GET['haber_id']
	));

$habercek=$habersor->fetch(PDO::FETCH_ASSOC);

$say=$habersor->rowCount();

if ($say==0) {
	
	header("Location:index.php?durum=oynasma");
	exit;
}
?>

<div class="container-fluid text-center">    
  <div class="row content">
    
	<div class="col-sm-2 sidenav">
	 <!--div class="well">
		 <p>ADS</p>
	 </div>
	 <div class="well">
		 <p>ADS</p>
	 </div-->
 </div>
    
    <div class="col-sm-8 text-left" style="border-radius: 6px;padding:20px 30px 20px 30px;background-color: #fff;box-shadow: inset 0px 0px 12px 1px #e2e2e2;"> 
     <div class="row">
      <div class="col-sm-12" style="background-color:#ffffff;">
        
            
            <div class="col-sm-2" style="background-color:#ffffff;">
            </div>
            <div class="col-sm-8" style="background-color:#ffffff; ">
                <div class="row">
                  <div class="col-sm-12 text-center" style="background-color:#ffffff;">
                    <h2 style="color: #eab121;line-height: 40px;font-size: 30px;font-weight: bold;font-family: "PT Sans Narrow", sans-serif;margin-bottom: 5px;"><?php echo $habercek['haber_ad']; ?><h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-center" style="background-color:#ffffff; margin-bottom: 20px;">
                    <h3 style="display: inline-block;border-radius: 4px;background-color: #f8cb1c;font-weight: bold;color: #333; padding: 5px 12px;"><?php echo $habercek['haber_fiyat']; ?> Azn<div class="ilkteref">
                  </div>
                </div>
            </div>
            <div class="col-sm-2" style="background-color:#ffffff;">
            </div>
      

      </div>
     </div>
<style>
@media screen and (max-width: 767px) {
    .mob-sec {
        height:20px;   
    }
}
</style>

     <div class="row d-flex flex-column-reverse flex-sm-row">
      <div class="col-sm-12 sec-2" style="background-color:#fffae9;">
        
            <div class="col-sm-1" style="background-color:#fffae9;">
            </div>            
            <div class="col-sm-5" style="background-color:#fffae9; font-size:15px;">
               <div class="row" style="margin-top:20px; margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                       <p style="float: left;width: 130px;font-size: 16px;padding-right: 10px;font-weight: bold;">Şehir</p>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                        <p><?php echo $habercek['haber_city']; ?></p>
                   </div> 
               </div>
                <div class="row" style="margin-bottom:10px";>
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                  <div class="ilkteref">Yaş</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                    <p><?php echo $habercek['haber_age']; ?></p>
                   </div> 
               </div>
                <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                   <div class="ilkteref">Eğitim</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                     <p><?php echo $habercek['haber_egitim']; ?></p>
                   </div> 
               </div>
                <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                   <div class="ilkteref">İş Tecrübesi</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                       <p><?php echo $habercek['haber_tecrube']; ?></p>
                   </div> 
               </div>
               <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                   <div class="ilkteref">İş Türü</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                       <p><?php echo $habercek['haber_turu']; ?></p>
                   </div> 
               </div>
            </div>

        
            <div class="col-sm-5" style="background-color:#fffae9; font-size:15px;">
               <div class="row" style="margin-top:20px; margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                       <div class="ilkteref">İlgili Şahıs</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                        <p><?php echo $habercek['haber_person']; ?></p>
                   </div> 
               </div>
                <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                  <div class="ilkteref">Telefon</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                    <p><?php echo $habercek['haber_tel']; ?></p>
                   </div> 
               </div>
                <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                   <div class="ilkteref">E-mail</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                     <p><?php echo $habercek['haber_email']; ?></p>
                   </div> 
               </div>
               
               <div class="row" style="margin-bottom:10px;">
                   <div class="col-sm-5 mob-sec" style="background-color:#fffae9;">
                  <div class="ilkteref">Tarih</div>
                   </div>    
                   <div class="col-sm-7" style="background-color:#fffae9;">
                    <p><?php echo $habercek['haber_time']; ?></p>
                   </div> 
               </div>
            </div>
            
            <div class="col-sm-1" style="background-color:#fffae9;">
            </div>      

      </div>
     </div>

     <div class="row">
      <div class="col-sm-12">
        
            <div class="col-sm-1">
            </div>            
            <div class="col-sm-5">
                 <h1>İş barədə məlumat</h1>
      <p><?php echo $habercek['haber_detay']; ?></p>
    
            </div>

        
            <div class="col-sm-5" >
                                 <h1>Namizədə tələblər</h1>
      <p><?php echo $habercek['haber_requir']; ?></p>
   
            </div>
            <div class="col-sm-1">
            </div>      

      </div>
     </div>
    </div>

  </div>  
  
  
  
  
  
  
  
    <div class="col-sm-2 sidenav">
      <!--div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div-->
    </div>
    
  </div>
</div>

				<?php include 'footer.php' ?>