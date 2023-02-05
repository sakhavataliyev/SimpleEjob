<?php
ob_start();
session_start();

include 'baglan.php';
include '../admin/fonksiyon.php';

if (isset($_POST['kullanicikaydet'])) {

	
	echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";



	if ($kullanici_passwordone==$kullanici_passwordtwo) {


		if (strlen($kullanici_passwordone)>=6) {


// Başlangıç

			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();

			if ($say==0) {

				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../index.php?durum=loginbasarili");


				} else {


					header("Location:../../kayit.php?durum=basarisiz");
				}

			} else {

				header("Location:../../kayit.php?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../kayit.php?durum=eksiksifre");


		}



	} else {



		header("Location:../../kayit.php?durum=farklisifre");
	}
	


}



if (isset($_POST['logoduzenle'])) {

	

	$uploads_dir = '../../img';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../admin/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../admin/genel-ayar.php?durum=no");
	}

}


if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../admin/index.php");
		exit;



	} else {

		header("Location:../admin/login.php?durum=no");
		exit;
	}
	

}




if (isset($_POST['kullanicigiris'])) {

	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 

	$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();

	if ($say==1) {

		echo $_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		
	} else {


		header("Location:../../?durum=basarisizgiris");

	}

}



if (isset($_POST['genelayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		google_analytics=:google_analytics,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'google_analytics' => $_POST['google_analytics'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
		));


	if ($update) {

		header("Location:../admin/genel-ayar.php?durum=ok");

	} else {

		header("Location:../admin/genel-ayar.php?durum=no");
	}
	
}



if (isset($_POST['sosyalayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:ayar_facebook,
		ayar_twitter=:ayar_twitter,
		ayar_google=:ayar_google,
		ayar_youtube=:ayar_youtube
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube']
		));


	if ($update) {

		header("Location:../admin/sosyal-ayar.php?durum=ok");

	} else {

		header("Location:../admin/sosyal-ayar.php?durum=no");
	}
	
}





if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_mail=:ayar_mail,
		ayar_adres=:ayar_adres
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_adres' => $_POST['ayar_adres']
		));


	if ($update) {

		header("Location:../admin/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../admin/iletisim-ayarlar.php?durum=no");
	}
	
}



if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_elaqe=:hakkimizda_elaqe,
		hakkimizda_elan=:hakkimizda_elan
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_elaqe' => $_POST['hakkimizda_elaqe'],
		'hakkimizda_elan' => $_POST['hakkimizda_elan']
		));


	if ($update) {

		header("Location:../admin/hakkimizda.php?durum=ok");

	} else {

		header("Location:../admin/hakkimizda.php?durum=no");
	}
	
}



if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../admin/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../admin/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if (isset($_POST['kullanicibilgiguncelle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce']
		));


	if ($update) {

		Header("Location:../../hesabim?durum=ok");

	} else {

		Header("Location:../../hesabim?durum=no");
	}

} 

if (isset($_GET['kullanicisil'])) {
if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
		));


	if ($kontrol) {


		header("location:../admin/kullanici.php?sil=ok");


	} else {

		header("location:../admin/kullanici.php?sil=no");

	}

}
}


if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		Header("Location:../admin/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../admin/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}


if (isset($_GET['menusil'])) {
if ($_GET['menusil']=="ok") {

	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['menu_id']
		));


	if ($kontrol) {


		header("location:../admin/menu.php?sil=ok");


	} else {

		header("location:../admin/menu.php?sil=no");

	}

}
}


if (isset($_POST['menukaydet'])) {


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => seo($_POST['menu_ad']),
		'menu_durum' => $_POST['menu_durum']
		));


	if ($insert) {

		Header("Location:../admin/menu.php?durum=ok");

	} else {

		Header("Location:../admin/menu.php?durum=no");
	}

}


if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($update) {

		Header("Location:../admin/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../admin/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}


if (isset($_POST['kategoriekle'])) {

	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ad,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['kategori_ad'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
		));

	if ($insert) {

		Header("Location:../admin/kategori.php?durum=ok");

	} else {

		Header("Location:../admin/kategori.php?durum=no");
	}

}



if ($_GET['kategorisil']=="ok") {
	
	$sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
		));

	if ($kontrol) {

		Header("Location:../admin/kategori.php?durum=ok");

	} else {

		Header("Location:../admin/kategori.php?durum=no");
	}

}

if ($_GET['habersil']=="ok") {
	
	$sil=$db->prepare("DELETE from haber where haber_id=:haber_id");
	$kontrol=$sil->execute(array(
		'haber_id' => $_GET['haber_id']
		));

	if ($kontrol) {

		Header("Location:../admin/haber.php?durum=ok");

	} else {

		Header("Location:../admin/haber.php?durum=no");
	}

}


// Admin Add
if (isset($_POST['haberekle'])) {

	$haber_seourl=seo($_POST['haber_ad']);

	$kaydet=$db->prepare("INSERT INTO haber SET
		kategori_id=:kategori_id,
		haber_ad=:haber_ad,
		haber_detay=:haber_detay,
		haber_fiyat=:haber_fiyat,
		haber_requir=:haber_requir,
		haber_city=:haber_city,
		haber_egitim=:haber_egitim,
		haber_age=:haber_age,	
		haber_tecrube=:haber_tecrube,
		haber_turu=:haber_turu,	
		haber_person=:haber_person,
		haber_tel=:haber_tel,
		haber_email=:haber_email,
		haber_durum=:haber_durum,
		haber_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'haber_ad' => $_POST['haber_ad'],
		'haber_detay' => $_POST['haber_detay'],
		'haber_fiyat' => $_POST['haber_fiyat'],
		'haber_requir' => $_POST['haber_requir'],
		'haber_city' => $_POST['haber_city'],
		'haber_egitim' => $_POST['haber_egitim'],
		'haber_age' => $_POST['haber_age'],
		'haber_tecrube' => $_POST['haber_tecrube'],
		'haber_turu' => $_POST['haber_turu'],
		'haber_person' => $_POST['haber_person'],
		'haber_tel' => $_POST['haber_tel'],
		'haber_email' => $_POST['haber_email'],
		'haber_durum' => $_POST['haber_durum'],
		'seourl' => $haber_seourl

		));

	if ($insert) {

		Header("Location:../admin/haber.php?durum=ok");

	} else {

		Header("Location:../admin/haber.php?durum=no");
	}

}



// User Add
if (isset($_POST['haberadd'])) {

	$haber_seourl=seo($_POST['haber_ad']);

	$kaydet=$db->prepare("INSERT INTO haber SET
		kategori_id=:kategori_id,
		haber_ad=:haber_ad,
		haber_detay=:haber_detay,
		haber_fiyat=:haber_fiyat,
		haber_requir=:haber_requir,
		haber_city=:haber_city,
		haber_egitim=:haber_egitim,
		haber_age=:haber_age,	
		haber_tecrube=:haber_tecrube,
		haber_turu=:haber_turu,	
		haber_person=:haber_person,
		haber_tel=:haber_tel,
		haber_email=:haber_email,
		haber_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'haber_ad' => $_POST['haber_ad'],
		'haber_detay' => $_POST['haber_detay'],
		'haber_fiyat' => $_POST['haber_fiyat'],
		'haber_requir' => $_POST['haber_requir'],
		'haber_city' => $_POST['haber_city'],
		'haber_egitim' => $_POST['haber_egitim'],
		'haber_age' => $_POST['haber_age'],
		'haber_tecrube' => $_POST['haber_tecrube'],
		'haber_turu' => $_POST['haber_turu'],
		'haber_person' => $_POST['haber_person'],
		'haber_tel' => $_POST['haber_tel'],
		'haber_email' => $_POST['haber_email'],
		'seourl' => $haber_seourl

		));

	if ($insert) {

		Header("Location:haber-ekle.php?durum=ok");

	} else {

		Header("Location:haber-ekle.php?durum=no");
	}
}



if (isset($_POST['haberduzenle'])) {

	$haber_id=$_POST['haber_id'];
	$haber_seourl=seo($_POST['haber_ad']);

	$kaydet=$db->prepare("UPDATE haber SET
		kategori_id=:kategori_id,
		haber_ad=:haber_ad,
		haber_fiyat=:haber_fiyat,
		haber_city=:haber_city,
		haber_egitim=:haber_egitim,
		haber_age=:haber_age,	
		haber_tecrube=:haber_tecrube,
		haber_turu=:haber_turu,	
		haber_person=:haber_person,
		haber_tel=:haber_tel,
		haber_email=:haber_email,
		haber_detay=:haber_detay,
		haber_requir=:haber_requir,
		haber_durum=:haber_durum,
		haber_seourl=:seourl		
		WHERE haber_id={$_POST['haber_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'haber_ad' => $_POST['haber_ad'],
		'haber_fiyat' => $_POST['haber_fiyat'],
		'haber_city' => $_POST['haber_city'],
		'haber_egitim' => $_POST['haber_egitim'],
		'haber_age' => $_POST['haber_age'],
		'haber_tecrube' => $_POST['haber_tecrube'],
		'haber_turu' => $_POST['haber_turu'],
		'haber_person' => $_POST['haber_person'],
		'haber_tel' => $_POST['haber_tel'],
		'haber_email' => $_POST['haber_email'],
		'haber_detay' => $_POST['haber_detay'],
		'haber_requir' => $_POST['haber_requir'],
		'haber_durum' => $_POST['haber_durum'],
		'seourl' => $haber_seourl
		));

	if ($update) {

		Header("Location:../admin/haber-duzenle.php?durum=ok&haber_id=$haber_id");

	} else {

		Header("Location:../admin/haber-duzenle.php?durum=no&haber_id=$haber_id");
	}

}



if ($_GET['haber_onecikar']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE haber SET
		
		haber_onecikar=:haber_onecikar
		
		WHERE haber_id={$_GET['haber_id']}");
	
	$update=$duzenle->execute(array(


		'haber_onecikar' => $_GET['haber_one']
		));



	if ($update) {

		

		Header("Location:../admin/haber.php?durum=ok");

	} else {

		Header("Location:../admin/haber.php?durum=no");
	}

}



if (isset($_POST['kullanicisifreguncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
		));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifrə doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
					));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}


		// Bitiş

			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}


		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}




?>