<?php
ob_start();
session_start();
include 'baku/setting/baglan.php';
include 'baku/admin/fonksiyon.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id' => 0
	));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");

if (isset($_GET['userkullanici_mail'])) {
$kullanicisor->execute(array('mail' => $_SESSION['userkullanici_mail']));
}
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
// if ($_SESSION['is_condition'] ?? false)
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $ayarcek['ayar_title'] ?></title>
	<meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
	<meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
	<meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="https://i.hizliresim.com/nb8GGl.jpg" />
  
</head>
<body>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo  $ayarcek['google_analytics'] ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo  $ayarcek['google_analytics'] ?>');
</script>

    
<style>

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #ffffff;
    }
    
    /* Set black background color, white text and some padding */
    footer {
        background-color: #f8cb1c;
        color: black;
        font-weight: 500;
        font-size: 17px;
        padding: 15px;
    }
    
    .h2, h2 {
    font-size: 26px;
    color: #f8cb1c;
    font-weight: 600;
    }
    
    a.list-group-item .list-group-item-heading, button.list-group-item .list-group-item-heading {
    color: #999;
    font-weight: bold;
    text-decoration: underline;
    padding-bottom: 3px;
    }
    .row {
        margin-right: 0px;
        margin-left: 0px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
      
      .mob-sec {
        height:20px;   
    }
    }
    .ilkteref{
        float: left;
        width: 130px;
        font-size: 16px;
        padding-right: 10px;
        font-weight: bold;
    }
   
   .navbar-inverse {
    background-color: #f8cb1c;
    border-color: #f8cb1c;
}

    @media (min-width: 768px)
    .navbar {
        border-radius: 2px;
    }
    
    .navbar-inverse  .navbar-nav>li>a {
    color: #333;
    font-weight: bold;
    font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
    font-size: 15px;
    }
    
    .navbar-inverse .navbar-brand {
    color: #333;
    font-weight: bold;
    font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
    font-size: 15px;
}
    .btn-danger {
    color: #fff;
    background-color: #b79510;
    border-color: #ffffff;
}

    .btn-danger:hover {
    color: #fff;
    background-color: #ffcb00;
    border-color: #ffcb00;
    border: 1px solid #ddd;
}
    .btn-danger:focus {
    color: #fff;
    background-color: #e2a24c;
    border-color: #fdf9f9;
}
   
   .fa {
    padding: 10px;
    font-size: 30px;
    width: 50px;
    height: 50px;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}
   
   
   
  </style>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">  
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a href="/"><img src="<?php echo $ayarcek['ayar_logo'] ?>" alt="Site Logosu" class="logo img-responsive"></a>
    </div>
	
  <div class="collapse navbar-collapse" id="myNavbar">  
    <ul class="nav navbar-nav">
      <li><a href="/">Home</a></li>
      
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kateqoriler
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
       
       
            	
					<?php 

//bir arraya aktarmaq üçün çekirik hamısını

			$query = "SELECT * FROM kategori order by kategori_id";
			$goster = $db->prepare($query);
$goster->execute(); //queriyi tetikliyor

 $toplamSatirSayisi = $goster->rowCount(); //malumunuz üzere sorgudan dönen satır sayısını öğreniyoruz
 
$tumSonuclar = $goster->fetchAll(); //sqlde bütün satır ve sutunları $tumSonuclar dəyişkəninə array şəklində atayırıq


//alt kategorisi olmayan kategori sayını öyren:
$altKategoriSayisi = 0;
for ($i = 0; $i < $toplamSatirSayisi; $i++) {
	if ($tumSonuclar[$i]['kategori_ust'] == "0") {
		$altKategoriSayisi++;
	}
}



for ($i = 0; $i < $toplamSatirSayisi; $i++) {
	if ($tumSonuclar[$i]['kategori_ust'] == "0") {
		kategori($tumSonuclar[$i]['kategori_id'], $tumSonuclar[$i]['kategori_ad'], $tumSonuclar[$i]['kategori_ust']);
	}
}



function kategori($kategori_id, $kategori_ad, $kategori_ust) {

	global $tumSonuclar;
	global $toplamSatirSayisi;

    //kategorinin, alt kategori sayısını öğreniyoruz:
	$altKategoriSayisi = 0;
	for ($i = 0; $i < $toplamSatirSayisi; $i++) {
		if ($tumSonuclar[$i]['kategori_ust'] == $kategori_id) {
			$altKategoriSayisi++;
		}
	}
   

	?>

	<!-- start ana gövdə -->

	<li>

		<a href="kategori-<?=seo($kategori_ad) ?>"><?php echo $kategori_ad ?></a>
		<?php 
		if ($altKategoriSayisi > 0) {
			echo "( $altKategoriSayisi )";
		}
		?>
	</a>

	<?php

    if ($altKategoriSayisi > 0) { //alt kategorisi varsa onları da listele
    	echo "<li>";

    	for ($i = 0; $i < $toplamSatirSayisi; $i++) {

    		if ($tumSonuclar[$i]['kategori_ust'] == $kategori_id) {
    			
    			kategori($tumSonuclar[$i]['kategori_id'], $tumSonuclar[$i]['kategori_ad'], $tumSonuclar[$i]['kategori_ust']);
    		}
    	}

    	echo "</li>";
    }
    ?>



</li> 
<!-- Burda Başlıyoruz ana gövde -->

<?php 
}
?>
       
        
        </ul>
      </li>
      
      
      
      <?php

     $menusor=$db->prepare("SELECT * FROM menu where menu_durum=:durum order by menu_sira ASC limit 5");
     $menusor->execute(array(
      'durum' => 1
      ));

     while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
       ?>


       <li><a href="

        <?php

        if (!empty($menucek['menu_url'])) {

          echo $menucek['menu_url'];

        } else {


          echo "sayfa-".seo($menucek['menu_ad']);

        }
        ?>


        "><?php echo $menucek['menu_ad'] ?></a></li>

        <?php } ?>
        
    </ul>
   <ul class="nav navbar-nav navbar-right">  
     
     <form class="navbar-form navbar-left"action="arama" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="aranan" minlength="3" >
        <div class="input-group-btn">
          <button name="arama" class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    
     <?php 

             if (!isset($_SESSION['userkullanici_mail'])) {?>
    
    <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#myModal">Login</button>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
     
             
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login Form</h4>
        </div>


<div class="modal-body">
  <form class="form-horizontal" action="baku/setting/islem.php" method="POST" role="form" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="username" placeholder="Enter email" name="kullanici_mail">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="kullanici_password">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="kullanicigiris" class="btn btn-default">Login</button>
      </div>
    </div>
  </form>
</div>
     <div class="modal-footer">
          <button type="button" class="btn btn-default"><a href="kayit" class="myacc">Kayıt ol!</a></button>
        </div>
      </div>
    </div>
  </div>
  
  
   <?php } else { ?>
 
 <button type="button" class="btn btn-danger navbar-btn" data-toggle="modal" data-target="#myModal">Hoşgeldin <?php if (isset($_GET['userkullanici_mail'])) { echo $kullanicicek['userkullanici_mail']; } else{ echo "İstifadəçi";} ?></button>
 
 
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
     
             
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Profilim</h4>
        </div>


<div class="modal-body">
    <ul class="small-menu">
      <li><a href="hesabim" class="myacc">Hesap Bilgilerim</a></li>
      <br>
      <li><a href="haber-ekle" class="mycheck">İlan Ekle</a></li>
      <br>
      <li><a href="logout" class="mycheck">Güvenli Çıkış</a></li>
    </ul>
</div>

     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
     <?php } ?>

  
  </ul>
  </div>
   </div> 
   
 

   
</nav>


    
  