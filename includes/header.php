<!DOCTYPE html>
<html>
    <head>
        <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-104414893-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-104414893-6');
        </script> -->
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $pageDescription; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="theme-color" content="#9c27b0">
        <meta property="og:title" content="<?php echo $title; ?>" />
        <meta property="og:description" content="<?php echo $pageDescription; ?>" />
        <meta property="og:image" content="<?php echo $imagePath; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo $canonUrl; ?>" />
        <link rel="shortcut icon" href="<?php echo BaseAddress; ?>/favicon.ico" type="image/x-icon" />    
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/materialize.min.css">
        <link rel="stylesheet" href="<?php echo BaseAddress; ?>/css/main.1.0.css?q=1">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Anton|Roboto:300,400,500" rel="stylesheet">
        <link rel="canonical" href="<?php echo $canonUrl; ?>" />
    </head>
    <body>
        
        <nav class="nav-extended purple">

            <div class="nav-wrapper">
                <a href="<?php echo BaseAddress; ?>" class="brand-logo"><img src="<?php echo BaseAddress; ?>/favicon.ico" class="hide-on-med-and-down" alt="Malgadi Books Logo">Malgadi</a>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa fa-bars" aria-hidden="true"></i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo BaseAddress; ?>">Home</a></li>
                    <li><a href="<?php echo BaseAddress; ?>/cart.php"><i class="fa fa-shopping-cart left" aria-hidden="true"></i>My Cart</a></li>
                    <li><a href="<?php echo BaseAddress; ?>/track.php"><i class="fa fa-truck left" aria-hidden="true"></i>Track Order</a></li>
                    <li><a href="review.php">Review Us</a></li>
                    <li><a href="#contact-form">Contact</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
                <div class="<?php echo $extendNavbar ? 'show' : 'hide'; ?>"><br><br><br><br></div>
            </div>

            <div class="nav-content center">
                <span class="nav-title nav2-title <?php echo $subtitleVisibility ? 'show' : 'hide'; ?>">Make Ideas Happen</span>
            </div>

            <form action="search.php" method="get" id="search_form">
                <div class="row <?php echo $searchVisibility ? 'show' : 'hide'; ?>">
                    <div class="col s8 l4 offset-s2 offset-l4 input-field">
                        <input id="search" type="text" name="q" placeholder="Search" class="white grey-text text-darken-3" autocomplete="off">
                    </div>
                </div>
            </form>

            <div class="nav-content">
                <ul class="tabs tabs-fixed-width grey lighten-5">
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="ceDrop">CE</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="itDrop">IT</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="ecDrop">EC</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="mechDrop">Mech</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="icDrop">IC</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="civilDrop">Civil</a></li>
                    <li class="tab"><a href="#" class="grey-text text-darken-2 dropdown-trigger" data-target="chemDrop">Chem</a></li>
                    <li class="tab hide"><a href="#" class="active"></a></li>
                </ul>
            </div>

            <ul id='ceDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=ce&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=ce&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ce&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ce&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ce&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='itDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=it&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=it&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=it&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=it&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=it&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='ecDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=ec&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=ec&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ec&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ec&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ec&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='mechDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=mech&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=mech&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=mech&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=mech&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=mech&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='icDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=ic&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=ic&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ic&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ic&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=ic&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='civilDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=civil&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=civil&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=civil&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=civil&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=civil&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

            <ul id='chemDrop' class='dropdown-content'>
                <li><a href="categories.php?br=cm&sem=1" class="blue-text text-darken-2">1<sup>st</sup> Sem</a></li>
                <li><a href="categories.php?br=cm&sem=2" class="blue-text text-darken-2">2<sup>nd</sup> Sem</a></li>
                <li><a href="categories.php?br=chem&sem=3" class="blue-text text-darken-2">3<sup>rd</sup> Sem</a></li>
                <li><a href="categories.php?br=chem&sem=4" class="blue-text text-darken-2">4<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=chem&sem=5" class="blue-text text-darken-2">5<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=chem&sem=6" class="blue-text text-darken-2">6<sup>th</sup> Sem</a></li>
                <li><a href="categories.php?br=chem&sem=7" class="blue-text text-darken-3">7<sup>th</sup> Sem</a></li>
            </ul>

        </nav>

        <ul id="slide-out" class="sidenav">

            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="<?php echo BaseAddress; ?>/images/logoPushed.jpg" width="100%" alt="Malgadi Electronics Logo">
                    </div>
                    <br><br><br>
                </div>
            </li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="active">
                        <a class="collapsible-header active"><span class="light">Categories</span><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="categories.php?q=Basic+Components"><span class="light">Basic Components</span></a></li>
                                <li><a href="categories.php?q=Robotics"><span class="light">Robotics</span></a></li>
                                <li><a href="categories.php?q=Controllers"><span class="light">Controllers</span></a></li>
                                <li><a href="categories.php?q=Sensors"><span class="light">Sensors</span></a></li>
                                <li><a href="categories.php?q=IC"><span class="light">ICs</span></a></li>
                                <li><a href="categories.php?q=Kits"><span class="light">Kits</span></a></li>
                                <li><a href="categories.php?q=EG+Kits"><span class="light">EG Kits</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li> 

            <li class="divider hide-on-large-only"></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>"><span class="light">Home</span></a></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>/cart.php"><span class="light">My Cart</span><i class="fa fa-shopping-cart right" aria-hidden="true"></i></a></li>
            <li class="hide-on-large-only"><a href="<?php echo BaseAddress; ?>/track.php"><span class="light">Track Order</span><i class="fa fa-truck right" aria-hidden="true"></i></a></li>
            <li class="hide-on-large-only sidenav-close"><a href="#contact-form"><span class="light">Contact</span></a></li>
            <li class="hide-on-large-only"><a href="about.php"><span class="light">About Us</span></a></li>
            <li class="hide-on-large-only"><a href="review.php"><span class="light">Review Us</span></a></li>
               
        </ul>

        <div class="fixed-action-btn <?php echo $cartVisibility ? 'show' : 'hide'; ?>">
            <a class="btn-floating btn-large waves-effect waves-light blue darken-2" href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <div class="cart-info blue-text text-darken-2 light">
                <span id="cart-quantity"><?php echo sizeof($_SESSION['cart']) ?></span> Item(s)
            </div>
        </div>