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
                                    <div class="location">Киев, ул. Киквидзе, 43</div>
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
                    <li><a href="#">СТО</a></li>
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

            <!-- GRAPH -->
            <section class="common-section expierence">
                <h1>Наш опыт</h1>
                <div class="section-bg">
                    <div class="subheader">Количество обслуживаемых машин: <b>23 в день</b></div>
                    <img src="img/graph.png" height="108" width="253" alt="">
                </div>

                <h3 class="subheader">В 2014 году мы:</h3>
                <div class="list-bg">
                    <ul class="list-group">
                      <li class="list-group-item"><span class="item-text"><span class="list-dot"></span>Провели замен масла </span><span class="total">22222</span></li>
                      <li class="list-group-item"><span class="item-text"><span class="list-dot"></span>Dapibus ac facilisis </span><span class="total">22222</span></li>
                      <li class="list-group-item"><span class="item-text"><span class="list-dot"></span>Поменяли воздушных фильтров</span><span class="total">22222</span></li>
                      <li class="list-group-item"><span class="item-text"><span class="list-dot"></span>Porta ac consectetur</span><span class="total">22222</span></li>
                      <li class="list-group-item"><span class="item-text"><span class="list-dot"></span>Vestibulum at eros</span><span class="total">22222</span></li>
                  </ul>
              </div>

          </section>

      </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="libs/angular.min.js"></script>
  <script src="js/angular-sanitize.min.js"></script>
  <script src="js/app/app.js"></script>
  <script src="libs/jquery.mask.js"></script>
  <script src="js/script.js"></script>
</body>
</html>