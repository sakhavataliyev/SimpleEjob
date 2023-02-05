<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$habersor=$db->prepare("SELECT * FROM haber order by haber_id DESC");
$habersor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Haber Listeleme <small>,

              <?php 
            if (isset($_GET['durum'])) {
              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }
            }
              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="haber-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Haber Ad</th>
                  <th>Haber Time</th>
                  <th>Haber Fiyat</th>
                  <th>Öne Çıkar</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($habercek=$habersor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $habercek['haber_ad'] ?></td>
                 <td><?php echo $habercek['haber_time'] ?></td>
                 <td><?php echo $habercek['haber_fiyat'] ?></td>
                 <td><center><?php 

                 if ($habercek['haber_onecikar']==0) {?>

                 <a href="../setting/islem.php?haber_id=<?php echo $habercek['haber_id'] ?>&haber_one=1&haber_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>
                   

                 <?php } elseif ($habercek['haber_onecikar']==1) {?>


                 <a href="../setting/islem.php?haber_id=<?php echo $habercek['haber_id'] ?>&haber_one=0&haber_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                   <?php } ?>
                     

                   </center></td>
               

                 <td><center><?php 

                  if ($habercek['haber_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><a href="haber-duzenle.php?haber_id=<?php echo $habercek['haber_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../setting/islem.php?haber_id=<?php echo $habercek['haber_id']; ?>&habersil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
          </tr>



          <?php  }

          ?>


        </tbody>
      </table>

      <!-- Div İçerik Bitişi -->


    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
