<!DOCTYPE html>
<html lang="en" ng-app="mobileApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oiler zamena masla</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div class="fade-wrap">
        <div class="sk-fading-circle">
            <div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div>
            <div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div>
            <div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div>
            <div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div>
            <div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div>
            <div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div>
        </div>
    </div>

    <div id="site-wrapper">

        <!-- site canvas -->
        <div id="site-canvas">


            <!-- HEADER -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <div id="logo-wrap" class="top-left">
                                <div id="logo"></div>
                                <h2>Автосервис и автомагазин </h2>
                            </div>

                            <div class="top-right">
                                <div id="sandwich">
                                    <div class="burgx"></div>
                                    <div class="burgx2"></div>
                                    <div class="burgx3"></div>
                                </div>
                                <div id="top-contacts">
                                    <div class="phone"><a href="tel:0442234175">(044) 223-41-75</a></div>
                                    <div class="location"><i class="fa fa-map-marker"></i>Киев, ул. Киквидзе, 43</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- site menu -->
            <page-menu></page-menu>

            <!-- BANNER -->
            <div id="top-banner-wrap">
                <div id="top-banner-inner" class="form" ng-controller="BannerController as bannerCtrl">
                    <h1>{{bannerCtrl.info.heading}}</h1>
                    <p class="you-need">Что для этого надо?</p>
                    <div class="we-got">
                        <span>Все есть у нас:</span>
                        <ul>
                            <li ng-repeat="item in bannerCtrl.items">{{item.name}}</li>
                        </ul>
                    </div>
                    <div class="price">
                        Всего<b>{{bannerCtrl.info.price}}</b><span>грн</span>
                        <div>Всего {{bannerCtrl.info.time}} работы</div>
                    </div>
                    <div class="sign-in" >
                        <form action="ajax/contact.php" method="post" class="ajax">
                            <input type="tel" class='phoneValue' name="phone">
                            <button type="submit" class="submit-btn">Записаться</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- REASONS SECTION  -->
            <oiler-reasons ></oiler-reasons>

            <!-- TESTIMONIALS -->
            <oiler-testimonials></oiler-testimonials>

            <!-- FORM -->
            <section id="single-form-first" class="common-section form "  ng-controller="BannerController as bannerCtrl">
                <div class="row">
                    <div class="sign-in sign-in-body section-bg" >
                        <div class="price">
                            <div>Запишитесь сейчас!</div>
                            Всего<b>{{bannerCtrl.info.price}}</b><span>грн</span>
                        </div>
                        <form action="ajax/contact.php" method="post" class="ajax">
                            <input type="tel" class='phoneValue' name="phone">
                            <button type="submit" class="submit-btn">Записаться</button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- EXPIERENCE -->
            <oiler-expierence></oiler-expierence>

            <!-- CONCLUSIONS -->
            <oiler-conclusions></oiler-conclusions>

            <!-- FORM -->
            <section id="single-form-second" class="common-section form"  ng-controller="BannerController as bannerCtrl">
                <div class="row">
                    <div class="sign-in sign-in-body section-bg" >
                        <div class="price">
                            <div>Запишитесь сейчас!</div>
                            Всего<b>{{bannerCtrl.info.price}}</b><span>грн</span>
                        </div>
                        <form action="ajax/contact.php" method="post" class="ajax">
                            <input type="tel" class='phoneValue' name="phone">
                            <button type="submit" class="submit-btn">Записаться</button>
                        </form>
                    </div>
                </div>
            </section>

            <div id="map-area">
                <div class="location">
                    <h1>ул. Киквидзе, 43</h1>
                    <p><i class="fa fa-map-marker"></i>Киев, Печерский район</p>
                    <ul class="time">
                        <li>Пн-Пт: с 8:00 до 21:00</li>
                        <li>Сб-Вс: с 8:00 до 19:00</li>
                    </ul>
                </div>
                <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1271.5023884533164!2d30.554249073011707!3d50.403748571292915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf5938ffd075%3A0xc022574068b4ade2!2sOiler.com.ua!5e0!3m2!1sru!2sua!4v1443792013487"  frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="footer">
                    <span>Oiler &copy; 2010 — <?php echo date("Y"); ?></span>
                     <a href="#top" id="button-top" >
                        <i class="fa fa-arrow-circle-up"></i>
                     </a>
                </div>
            </div>
        </div>
    </div>

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>-->
    <script src="libs/angular.min.js"></script>
    <script src="js/angular-sanitize.min.js"></script>
    <script src="js/app/app.js"></script>
    <script src="js/app/lists.js"></script>
    <script src="libs/jquery.mask.js"></script>
    <script src="js/script.js"></script>
</body>
</html>