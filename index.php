<!DOCTYPE html>
<html lang="en" ng-app="mobileApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sasstest</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- angular -->


</head>
<body>
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
                                <h2>Автосервис и автомагазин</h2>
                            </div>

                            <div class="top-right">
                                <div id="sandwich">
                                    <div class="burgx"></div>
                                    <div class="burgx2"></div>
                                    <div class="burgx3"></div>
                                </div>
                                <div id="top-contacts">
                                    <div class="phone">(044) 223-41-75</div>
                                    <div class="location"><i class="fa fa-map-marker"></i>Киев, ул. Киквидзе, 43</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- site menu -->
            <div id="site-menu">
                <h2>Меню</h2>
                <ul>
                    <li><a href="http://oiler.com.ua/sto/">СТО</a></li>
                </ul>
            </div>

            <!-- BANNER -->
            <div id="top-banner-wrap">
                <div id="top-banner " class="form" ng-controller="BannerController as bannerCtrl">
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
                            <input type="text" class='phoneValue' name="phone">
                            <button type="submit" class="submit-btn">Запсаться</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- REASONS SECTION  -->
            <section class="common-section reasons" ng-controller="ReasonsController as reasonsCtrl">
                <h1>{{reasonsCtrl.getLength()}} ПРИЧИН обслуживаться У НАС</h1>
                <p>Вы получаете:</p>
                <ul class="bgli">
                    <li ng-repeat="reason in reasonsCtrl.reasons"><span class="round">{{$index + 1}}</span> {{reason.name}}</li>
                </ul>
            </section>

            <!-- TESTIMONIALS -->
            <section class="common-section testimonials" ng-controller="TestimonialsController as testimonialsCtrl">
                <h1>Отзывы клиентов</h1>
                <ul class="bgli">
                    <li class="testimonial" ng-repeat="testimonial in testimonialsCtrl.testimonials | limitTo: testimonialsCtrl.quantity" >
                        <div class="img">
                            <img ng-src="{{testimonial.img}}" height="35" width="35" alt="">
                        </div>
                        <div class="content">
                            <div class="person">{{testimonial.name}}
                                <span class="date">{{testimonial.date}}</span>
                            </div>
                            <!-- todo -->
                            <div class="stars" ng-bind-html="testimonial.stars"></div>

                            <div class="text">
                                <span>{{testimonial.text | limitTo: testimonial.limit }}{{ testimonialsCtrl.makeDots($index) }}</span>
                                <i class="fa fa-chevron-down " ng-click="testimonialsCtrl.toggleLimit($index)" ng-show="testimonialsCtrl.checkLength($index)"></i>
                            </div>
                        </div>
                    </li>
                    <button class="showMore" ng-click="testimonialsCtrl.changeQuantity()">{{testimonialsCtrl.moreQuantityText}}</button>
                </ul>
            </section>

            <!-- FORM -->
            <section id="single-form-first" class="common-section form"  ng-controller="BannerController as bannerCtrl">
                <div class="sign-in section-bg" >
                    <div class="price">
                        <div>Запишитесь сейчас!</div>
                        Всего<b>{{bannerCtrl.info.price}}</b><span>грн</span>
                    </div>
                    <form action="ajax/contact.php" method="post" class="ajax">
                        <input type="text" class='phoneValue' name="phone">
                        <button type="submit" class="submit-btn">Запсаться</button>
                    </form>
                </div>
            </section>

            <!-- GRAPH -->
            <section class="common-section expierence">
                <h1>Наш опыт</h1>
                <div class="section-bg">
                    <div class="subheader">Количество обслуживаемых машин: <b>23 в день</b></div>
                    <img src="img/graph.png" height="108" width="253" alt="">
                </div>
                <!-- expierence -->
                <h3 class="subheader">В 2014 году мы:</h3>
                <div class="list-bg" ng-controller="ExpierenceController">
                    <ul class="list-group">
                        <li class="list-group-item" ng-repeat="item in items">
                            <span class="item-text">
                                <span class="list-dot"></span>{{item.title}}
                            </span>
                            <span class="total">{{item.qnt}}</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- TOTAL -->
            <section class="common-section expierence" ng-controller="TotalController">
                <h1>Итоги</h1>
                <p>Итак, вы убедились, что вы получаете:</p>
                <ul class="bgli">
                    <li ng-repeat="item in items"><span class="round">{{$index + 1}}</span> {{item.name}}</li>
                </ul>
            </section>

            <!-- FORM -->
            <section id="single-form-second" class="common-section form"  ng-controller="BannerController as bannerCtrl">
                <div class="sign-in section-bg" >
                    <div class="price">
                        <div>Запишитесь сейчас!</div>
                        Всего<b>{{bannerCtrl.info.price}}</b><span>грн</span>
                    </div>
                    <form action="ajax/contact.php" method="post" class="ajax">
                        <input type="text" class='phoneValue' name="phone">
                        <button type="submit" class="submit-btn">Запсаться</button>
                    </form>
                </div>
            </section>

            <div id="map">
                <div class="location">
                    <h1>ул. Киквидзе, 43</h1>
                    <p><i class="fa fa-map-marker"></i>Киев, Печерский раен</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1271.5023884533164!2d30.554249073011707!3d50.403748571292915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4cf5938ffd075%3A0xc022574068b4ade2!2sOiler.com.ua!5e0!3m2!1sru!2sua!4v1443792013487"  frameborder="0" style="border:0" allowfullscreen></iframe>

                <div class="footer">
                    <ul class="time">
                        <li>Пн-Пт: с 8:00 до 21:00</li>
                        <li>Сб-Вс: с 8:00 до 19:00</li>
                    </ul>
                    <span>Oiler &copy; 2010 — <?php echo date("Y"); ?></span>
                </div>
            </div>


        </div>
    </div>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="libs/angular.min.js"></script>
    <script src="js/angular-sanitize.min.js"></script>
    <script src="js/app/app.js"></script>
    <script src="libs/jquery.mask.js"></script>
    <script src="js/script.js"></script>
</body>
</html>