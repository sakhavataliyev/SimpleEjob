<?php include 'header.php'; ?>

<div class="container">
	
	<form action="baku/setting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<h2 class="title">Kayıt Formu</h2>
				</div>

				<?php 

				if ($_GET['durum']=="farklisifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
				</div>
					
				<?php } elseif ($_GET['durum']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>
					
				<?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
				</div>
					
				<?php } elseif ($_GET['durum']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
				</div>
					
				<?php }
				 ?>


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_adsoyad" placeholder="Ad ve Soyadınızı Giriniz...">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" required="" name="kullanici_mail"  placeholder="Dikkat! Mail adresiniz kullanıcı adınız olacaktır.">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone"    placeholder="Şifrenizi Giriniz...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Şifrenizi Tekrar Giriniz...">
					</div>
				</div>


				<button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Kayıt İşlemini Yap</button>
			</div>
			
			
<div class="col-md-6">
				<div class="title-bg">
					<h2 class="title">QAYDALAR</h2>
				</div>
		
			
			<pre>
			
Bir vakansiyanın 30 gün müddətinə yerləşdirilməsi pulsuz həyata keçirilir.

Vakansiya yalnız Azərbaycan daxilində olan işləri əhatə etməlidir.

Vakansiya haqqında elanın ən qısa müddətdə dərc olunması üçün formanın doldurulmasına dair bütün təlimatlara ciddi riayət olunmalıdır. Səliqəsiz doldurulmuş formalar redaktəyə məruz qalacaq və dərhal dərc olunmayacaq.

Elanların yalnız baş (BÖYÜK) hərflərlə və ya başqa əlifba ilə (translitlə) yazılması qadağandır. Elan bütünlüklə bir dildə olmalıdır.

Şirkətin adı olan sütunda şirkətin rəsmi, hüquqi adı, həmin müəssisə holdinq tərkibindədirsə, holdinqin adı və şirkətin fəaliyyət istiqaməti (növü) qeyd olunmalıdır.

Əlaqələr yazılan sütunda aktiv şəhər telefonlarının nömrələri və şirkətin korporativ elektron ünvanları qeyd olunmalıdır.

İstifadəçi 5 və 6-cı bəndlərə riayət etmədikdə, elan ödənişli əsaslarla qəbul edilir.

Tibb müəssisələrinin elanları və ya tibbi tərkibli, alış-veriş haqqında, o cümlədən saytda onlayn-satışlı elanlar pulludur.

«Əmək haqqı» sütununun doldurulması mütləqdir, məbləğ AZN-lə göstərilməlidir. Əgər əmək haqqı 500 AZN-ə qədərdirsə, əmək haqqı diapazonu 200 AZN-i; 1000 AZN-ə qədərdirsə 300 AZN-i; 2000 AZN-ə qədərdirsə, 500 AZN-i aşmamalıdır.

Dərc olunmuş elanda əlaqə nömrələrinin, vakansiyanın adının dəyişdirilməsi qadağandır.

«Namizədə olan tələblər» mümkün qədər ətraflı yazılmalıdır.

«Mövqenin (vəzifənin) təsviri» də həmçinin iş qrafiki, vəzifə öhdəlikləri və işin şərtləri qeyd olunmaqla, ətraflı yazılmalıdır.

Mövqe (vəzifə) seçilmiş kateqoriyaya uyğun olmalı, əgər elə kateqoriya yoxdursa, onda «Müxtəlif» adlanan alt-kateqoriyada yerləşdirilməlidir.

Aşağıdakı kimi elanlar dərhal ləğv olunacaq:

ədəbsiz, təhqiredici sözlər və ifadələr olan;
şəbəkə marketinqi və ya qadağan olunmuş, şübhəli fəaliyyət növləri ilə məşğul olan şirkətlərdə iştirak təklifləri olan.
			
	</pre>		
			
			
			
			
			
		</div>
	</div>
</form>


<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>