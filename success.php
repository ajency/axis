<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="">
<title>Registration - Manali Travel Mart</title>
<link rel="stylesheet" href="asset/jqueryui/style.css"/>
<link rel="stylesheet" href="asset/fphp/style.css"/>
<link rel="stylesheet" href="asset/font-awesome/style.css"/>
<link rel="stylesheet" href="asset/bootstrap/style.css"/>
<link rel="stylesheet" href="asset/pageslide/style.css"/>
<link rel="stylesheet" type="text/css" href="library/css/system.css" />
<link rel="stylesheet" type="text/css" href="templates/default/css/form.css" />
<link rel="stylesheet" type="text/css" href="templates/default/css/listing.css" />
<link rel="stylesheet" type="text/css" href="css/layout.css" />
<script type="text/javascript" src="asset/jquery/script.js"></script>
<script type="text/javascript" src="asset/jqueryui/script.js"></script>
<script type="text/javascript" src="asset/fphp/script.js"></script>
<script type="text/javascript" src="modules/gallery/list.script/bxSlider.js"></script>
<script type="text/javascript" src="templates/default/js/common.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#fModule-3371 .fGalleryImages").bxSlider({
auto: true,
controls: false,
pager: false,
speed: 2000,
pause: 5000,
});
});
</script>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700,300' rel='stylesheet' type='text/css'>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
input{margin:5px 0 5px}
</style>
</head>
<body   class="com-pages view-default alias-136404 path---home cva-pages-default-136404 no-user ">
<script>

            $(function () {
                $('a[href*=#]:not([href=#])').not(".fancybox-inline").not(".fancybox-inline a").click(function () {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top - 80
                            }, 1000);
                            return false;
                        }
                    }
                });
            });
        </script>
<script>
            function toggleNav() {
                $("#fModule-1390").toggleClass("hidden-xs").toggleClass("hidden-sm");
            }
            $(window).scroll(function () {
                if ($(this).scrollTop() > 1) {
                    $('header').addClass("sticky");
                }
                else {
                    $('header').removeClass("sticky");
                }
            });
			
			
    $(function () {
        $("input[name='registering_for']").click(function () {
            if ($("#reg_others").is(":checked")) {
                $("#dvRegisterForOther").show();
            } else {
                $("#dvRegisterForOther").hide();
            }
        });
    });
	
	$(function () {
        $("input[name='company_dealing']").click(function () {
            if ($("#company_dealingNo").is(":checked")) {
                $("#dvCompany_dealing").show();
            } else {
                $("#dvCompany_dealing").hide();
            }
        });
    });
	
	var clicks = 0;
	function updateImg()
	{
	clicks++
	var doc = document.getElementById("captcha");
	doc.src = "captcha.php" + "?act=" + clicks;
	}
			
        </script>
<header id="fHead">
  <div class="head-rail">
    <div class="top-banner">
      <!-- Position: head-rail -->
      <div class="fRegion region-head-rail row" data-fphp-region="head-rail">
        <div class="fModule fModuletop-banner  col-md-9" data-fphp-entity-type="moduleinstance" id="fModule-3324" data-fphp-entity-id="3324">
          <div class="fModuleContent">
            <ul class="fGalleryImages fGalleryList">
              <li class="fGalleryItem fGalleryItem-18244"> <a  class="fGalleryImage" href="index.php"><img alt="Spotlight-sampkle" src="http://app.axisrooms.com/static/images/axisrooms-new-logo-sm.png" style="padding: 10px;width: 186px;" /></a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="head-cont" style="height:5px;">
    <div class="head-cont-container">
     <!--  <div class="fRegion region-head-left col-xs-6 col-md-2" data-fphp-region="head-right">
       <div class="fModule fModuleMainMenuSwitch col-md-2" data-fphp-entity-type="moduleinstance" id="fModule-2249" data-fphp-entity-id="2249">
         <div class="fModuleContent">
           <div >
             <p><a href="#"><span>Menu</span><i class="fa fa-bars">&nbsp;</i></a></p>
           </div>
         </div>
       </div>
     </div> -->
      
      <!-- Position: head-left -->
      
      <div class="fRegion region-head-right col-xs-6 col-md-10" data-fphp-region="head-left">
        <div class="fModule fModuleMainMenu  hidden-xs hidden-sm" data-fphp-entity-type="moduleinstance" id="fModule-2260" data-fphp-entity-id="2260">
          <div class="fModuleContent">
            <!-- <nav>
              <ul class='fMenu'>
                <li class=''><a href='index.php' title='Home'><span><i class="fa fa-home"></i> Home</span></a></li>
                <li class=''><a href='#' title='MTM'><span><i class="fa fa-info-circle"></i> Manali Travel Mart</span></a>
                  <ul>
                    <li class=''><a href='about-mtm.php' title='About MTM'><span>About MTM</span></a></li>
                    <li class=''><a href='mtm-schedule.php ' title='Schedule'><span>Schedule</span></a></li>
                    <li class=''><a href='how-to-reach.php' title='Reaching there '><span>Reaching there</span></a></li>
                  </ul>
                </li>
                <li class=''><a href='registration-form.php' title='Registration'><span><i class="fa fa-user"></i> Buyer Registration Form</span></a></li>
                <li class=''><a href='hosted-buyers-program.php' title='Hosted Buyers Program'><span><i class="fa fa-group"></i> Hosted Buyers Program</span></a></li>
                <li class=''><a href='contact-us.php' title='Contact Us'><span><i class="fa fa-envelope"></i> Contact Us</span></a></li>
              </ul>
            </nav> -->
          </div>
        </div>
      </div>
      <!-- Position: head-right -->
      
    </div>
  </div>
</header>
<!-- <section id="fContentPre">
  Position: contentPre
  <div class="fRegion region-contentPre " data-fphp-region="contentPre">
    <div class="fModule fModulefSpot" data-fphp-entity-type="moduleinstance" id="fModule-3371" data-fphp-entity-id="3371">
      <div class="fModuleContent">
        <ul class="fGalleryImages fGalleryList">
          <li class="fGalleryItem"> <a  class="fGalleryImage"><img alt="slide1" src="images/slide1.jpg" /></a> </li>
          <li class="fGalleryItem"> <a  class="fGalleryImage"><img alt="slide2" src="images/slide2.jpg" /></a> </li>
          <li class="fGalleryItem"> <a  class="fGalleryImage"><img alt="slide3" src="images/slide3.jpg" /></a> </li>
          <li class="fGalleryItem"> <a  class="fGalleryImage"><img alt="slide4" src="images/slide4.jpg" /></a> </li>
          <li class="fGalleryItem"> <a  class="fGalleryImage"><img alt="slide5" src="images/slide5.jpg" /></a> </li>
        </ul>
      </div>
    </div>
  </div>
</section> -->
<div id="fContent">
  <div class="container">
    <div class="">
      <section id="fMatter" class="col-xs-12 ">
        <div id="f-messages"></div>
        
        <div>
          <h3>Payment Done Successfully.Thank You.</h3>
          <p>&nbsp;</p>
        </div>
      </section>
    </div>
  </div>
</div>
<footer id="fFooter" class="">
  <!-- Position: footer -->
  <div class="fRegion region-footer " data-fphp-region="footer">
    <div class="fModule fModule fFooter " data-fphp-entity-type="moduleinstance" id="fModule-2256" data-fphp-entity-id="2256">
      <div class="fModuleContent">
        <div >
          <p style="margin-left: auto; margin-right: auto; text-align: center;"><strong><span style="color:#000000;"></span><a href="#"><span style="color:#000000;">axisrooms.com</span></a></strong></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="asset/pageslide/pageslide.js"></script>
</body>
</html>