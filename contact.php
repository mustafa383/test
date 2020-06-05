<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Quirky - İletişim</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
              <li class="nav-item"><a class="nav-link" href="index.html">Anasayfa</a></li> 
              <li class="nav-item"><a class="nav-link" href="service.html">Hakkımızda</a>
              <li class="nav-item"><a class="nav-link" href="pricing.html">Komutlar</a>
              <li class="nav-item active"><a class="nav-link" href="contact.php">İletişim</a></li>
            </div>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->


  <!--================ Banner SM Section start =================-->
  <section class="hero-banner hero-banner-sm text-center">
    <div class="container">
      <h1>İletişim</h1>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Quirky</a></li>
          <li class="breadcrumb-item active" aria-current="page">İletişim</li>
        </ol>
      </nav>
    </div>
  </section>
  <!--================ Banner SM Section end =================-->



  <!-- ================ contact section start ================= -->
  <section class="section-margin">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">    
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Bize Mail Gönder!</h2>
        </div>
        <div class="col-lg-8 mb-4 mb-lg-0">
          <form class="form-contact contact_form" action="contact.php" method="post" >
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Bir şeyler yaz..."></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Adın">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="E-mail">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Konu">
                </div>
              </div>
            </div>
            <div class="form-group mt-lg-3">
              <button type="submit" class="button button-contactForm">Gönder</button>
            </div>
          </form>




<?php
error_reporting(0); //Hataları Gizle
//Form'dan Bütün Değerler Post Methodu ile Çekiliyor
$AdiSoyadi = trim(strip_tags($_POST['name']));
$MailAdresi = trim(strip_tags($_POST['email']));
$MesajKonusu = trim(strip_tags($_POST['subject']));
$Mesaj = trim(strip_tags($_POST['message']));
//Form'dan Bütün Değerler Post Methodu ile Çekiliyor Tamamlandı


if($AdiSoyadi and $MailAdresi and $MesajKonusu and $Mesaj){ //Form'dan bütün değerler geliyorsa mail gönderme işlemini başlatıyoruz.

    $Mesaj = "
    Adı soyadı: $AdiSoyadi
    Mail Adresi : $MailAdresi
    Mail Konusu : $MesajKonusu
    Mesaj : $Mesaj
    ";

    //Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz
    include ('phpmail/class.phpmailer.php');
    include ('phpmail/class.smtp.php');
    //Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz Tamamlandı

    //Mail Bağlantı Ayarları 
    //Mail Hangi Hesaptan Gönderilecek ise onun bilgilerini yazın.
    $MailSmtpHost = "smtp.gmail.com";
    $MailUserName = "mailgonder12312@gmail.com";
    $MailPassword = "38mustafa";
    //Mail Bağlantı Ayarları Tamamlandı

    //Doldurulan Form Mail Olarak Kime Gidecek?
    $MailKimeGidecek = "quirkybotdestek@gmail.com";
    //Doldurulan Form Mail Olarak Kime Gidecek Tamamlandı
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $MailSmtpHost; //Smtp Host
    $mail->SMTPSecure = 'ssl';  //yada tls
    $mail->Port = 465;  //SSL kullanacaksanız portu 465 olarak değiştiriniz - TLS Portu 587
    $mail->Username = $MailUserName; //Smtp Kullanıcı Adı
    $mail->Password = $MailPassword; //Smtp Parola
    $mail->SetFrom($mail->Username, 'Quirky Bot Mail');
    $mail->AddAddress("$MailKimeGidecek", 'Quirky Bot Destek'); //Mailin Gideceği Adres ve Alıcı Adı
    $mail->CharSet = 'UTF-8'; //Mail Karakter Seti
    $mail->Subject = $MesajKonusu; //Mail Konu Başlığı
    $mail->MsgHTML("$Mesaj"); //Mail Mesaj İçeriği
    if($mail->Send()) {
        echo '<script>alert("Mail gönderildi!");</script>';
        echo '<script>document.location="contact.php"</script>';
    } else {
        echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
    }


} //Mail gönderme işlemi tamamlandı end.if

?>




        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Discord Sunucumuz</h3>
              <li><a href="https://discord.gg/P7uVAAe">Katılmak İçin Tıkla</a></li>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:quirkybotdestek@gmail.com">quirkybotdestek@gmail.com</a></h3>
              <p>Bize mail gönder!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->





  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>Bilgi</h4>
          <p>Quirky Discord için geliştirilmiş bir bottur. Sunucunuza ekleyerek birbirinden güzel özelliklerini kullanabilirsiniz.</p>
          <a class="navbar-brand logo_h d-none d-xl-block" href="index.html"><img src="img/logo.png" alt=""></a>
				</div>
				<div class="col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
					<h4>İletişim</h4>
					<ul>
						<li>Bize daha hızlı ulaşmak istiyorsan;</li>
						<li><a href="https://discord.gg/P7uVAAe">Destek Sunucumuza Katıl</a></li>
						<li><a href="mailto:quirkybotdestek@gmail.com">Email: quirkybotdestek@gmail.com</a></li>
					</ul>
				</div>
				<div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
				</div>
				<div class="offset-xl-1 col-xl-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">

          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
            method="get">
              <div class="input-group">
                <div class="input-group-append">
                </div>
              </div>
              <div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
            </form>
          </div>
          
				</div>
			</div>
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright&copy;<script>document.write(new Date().getFullYear());</script> Tüm Hakları Saklıdır.<i class="ti-heart" aria-hidden="true"></i> Design by <a href="https://colorlib.com" target="_blank">RuffLys</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->




  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>