<!-- Модель TODO -->
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="/templates/theme/assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title><?php echo $title ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width" />
    
    <link href="/templates/theme/bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="/templates/theme/assets/css/gsdk.css" rel="stylesheet"/>
    <link href="/templates/theme/assets/css/style.css" rel="stylesheet"/>
    <link href="/templates/theme/assets/css/imgpicker.css" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>  
    <link href="/templates/theme/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    
    <?php echo $style ?>
    
</head>

<body class="contact-us">

<nav class="navbar navbar-inverse navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a href="/" class="navbar-brand">Державна фіскальна служба України</a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
        <?php if ($user['login']): ?>
            <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Меню<b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="/">Головна</a></li>
                      <li><a href="/?c=news">Новини</a></li>
                      <li><a href="/?c=orders">Бланки звітності</a></li>
                      <li><a href="/?c=zapiti">Бланки запитів</a></li>
                      <li><a href="/?c=soft">Програмне забезпечення</a></li>
                      <li><a href="/forum/">Форум</a></li>
                      <li><a href="/?c=faq">FAQ</a></li>
                      <li><a href="/?c=zvitout">Відправити звіт</a></li>
                      <li><a href="/?c=zvitout">Відправити запит</a></li>
                      <li><a href="/?c=order_add&id=1">Звіт online</a></li>
                  </ul>
            </li>
                
            <li>
                <a href="/profile">
                     <i class=""></i><?php echo $user['login'] ?>
                </a>
            </li>
            <li>
                <a href="/auth" class="btn btn-round btn-default">
                     Вихід
                </a>
            </li>
        <?php else: ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Меню<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/">Головна</a></li>
                    <li><a href="/?c=news">Новини</a></li>
                    <li><a href="/?c=orders">Бланки звітності</a></li>
                    <li><a href="/?c=zapiti">Бланки запитів</a></li>
                    <li><a href="/?c=soft">Програмне забезпечення</a></li>
                    <li><a href="/forum/">Форум</a></li>
                    <li><a href="/?c=faq">FAQ</a></li>
                </ul>
            </li>
            <li>
                <a href="/reg">
                     Реєстрація користувача
                </a>
            </li>
            <li>
                <a href="/auth" class="btn btn-round btn-default">
                     Вхід
                </a>
            </li>
        <?php endif ?>
          </ul>

        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->

    <!-- Menu -->
       </ul>
      
    </div>
  </div>
</nav>

<div class="wrapper" id="err">
    <div class="parallax filter-black">
        <div class="parallax-image">
            <img src="/templates/theme/assets/img/examples/blog_page8.jpg">
        </div>    
        <div class="small-info">
            <h1><?php echo $title ?></h1>    
        </div>
    </div>

    <div class="section">
           <div class="container">
               <?php echo $content ?>
           </div>
    </div><!-- section -->
    <div class="space-50"></div>

     <footer class="footer footer-big footer-black">
         <!-- .footer  -->

         <div class="container">
             <div class="copyright">
                 &copy; 2018 Valerii Yevdochenko, made with love
             </div>
         </div>
     </footer>

    
</div> <!-- wrapper --> 
    <script src="/templates/theme/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="/templates/theme/assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

    <script src="/templates/theme/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
    
    <!--  Plugins -->
    <script src="/templates/theme/assets/js/gsdk-checkbox.js"></script>
    <script src="/templates/theme/assets/js/gsdk-morphing.js"></script>
    <script src="/templates/theme/assets/js/gsdk-radio.js"></script>
    <script src="/templates/theme/assets/js/gsdk-bootstrapswitch.js"></script>
    <script src="/templates/theme/assets/js/bootstrap-select.js"></script>
    <script src="/templates/theme/assets/js/bootstrap-datepicker.js"></script>
    
    <!-- GSDK Pro functions -->
    <script src="/templates/theme/assets/js/get-shit-done.js"></script>

    <!--  Crop -->
    <script src="/templates/theme/assets/js/jquery.Jcrop.min.js"></script>
    <script src="/templates/theme/assets/js/jquery.imgpicker.js"></script>
    
    <script type="text/javascript">
        var big_image;
        $().ready(function(){
            responsive = $(window).width();
            
            $(window).on('scroll', gsdk.checkScrollForTransparentNavbar);
            
            if (responsive >= 768){
                big_image = $('.parallax-image').find('img');
                
                $(window).on('scroll',function(){           
                    parallax();
                });
            }
        });
        
       var parallax = function() {
            var current_scroll = $(this).scrollTop();
            
            oVal = ($(window).scrollTop() / 3); 
            big_image.css('top',oVal);
        };
    </script>
    <?php echo $scripts ?>
</body>
</html>


