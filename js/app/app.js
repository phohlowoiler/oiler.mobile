(function(){

	angular.module('mobileApp', ['ngSanitize'])
		// top banner info
		.controller('BannerController', function(){
			this.items = bannerItems;
			this.info = bannerInfo;
		})
		//Reasons why we
		.controller('ReasonsController', function(){
			this.reasons = reasonsItems;
			this.getLength = function(){
				return this.reasons.length;
			};
		})
		// testimonials
		.controller('TestimonialsController', function(){
			this.testimonials = testimonialsItems;
			this.limit = "74";
			this.quantity = 3;
			this.moreQuantityText = "Еще отзывы";


			var	minLimit = 74, // limit of chars in hide testimonial
				maxLimit = 200, // limit of chars in open testimonial
				minQuantity = 3; // minimum quantity of testimonial on page 

			this.toggleLimit = function(index){
				var elementt = this.testimonials[index];

				//show testimonial
				if( elementt.limit <= minLimit){
					elementt.limit = maxLimit;
					angular.element('.testimonials').find('.fa-chevron-down').eq(index).addClass('toggleup');
				//hide testimonial
				}else{
					elementt.limit = minLimit;
					angular.element('.testimonials').find('.fa-chevron-down').eq(index).removeClass('toggleup');
				}
				
			};

			this.checkLength = function(index){
				return this.testimonials[index].text.length > minLimit;
			};

			this.makeDots = function(index){
				return ( this.testimonials[index].limit == minLimit  && this.testimonials[index].text.length >= minLimit ) ? '...' : '';
			};

			this.changeQuantity = function(){
				if( this.quantity == this.testimonials.length - 1 ){
					this.moreQuantityText = "Скрыть все последние";
				} if( this.quantity == this.testimonials.length ) {
					this.moreQuantityText = "Еще отзывы";
					this.quantity = minQuantity;
				} else {
					this.quantity += 1;
				}
			};

		})
		// list items
		.controller('ExpierenceController', function( $scope ){
			$scope.items = expierenceItems;
		})
		// total
		.controller('TotalController', function( $scope ){
			$scope.items = totalItems;
		})


// BannerController data
	var bannerInfo = {
		"heading": "Замена масла в OILER",
		"price": "99",
		"time": "30 минут"
	};

	var bannerItems = [
		{ "name" : "23 бренда масла в наличии"},
		{ "name" : "Консультирующий и помогающий вам менеджер"},
		{ "name" : "Высоко-квалифицированный мастер"},
		{ "name" : "Фильтры на все марки авто"}
	];

// ReasonsController data
	var reasonsItems = [
		{"name" : "Экономию времени"},
		{"name" : "Профессиональный подбор масла"},
		{"name" : "Акт с детальным списком работ"},
		{"name" : "Комфортабельную комнату клиента"},
		{"name" : "Стоимость работ известную заранее"},
		{"name" : "Только сертифицированный товар"},
		{"name" : "Широкий выбор масел ( 24 бренда )"}
	];;

// TestimonialsController data
	var testimonialsItems = [
		{
			"name": "Максим Волков",
			"img": "img/person_01.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star grey-star'></i>",
			"date": "12.09",
			"text": "Сегодня был на замене передних колодок тормозов. До этого перезвонил на СТО и объя трения металл об мета)",
			"isClose": "false",
			"limit": "74"
		},
		{
			"name": "Сергей Исаев",
			"img": "img/person_02.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star '></i>",
			"date": "12.09",
			"text": "Одним словом молодцы! Приехал (точнее притянул друга) на СТО за пол часа до закрытия в воскресенье, предварительно перезвонив менеджеру",
			"isClose": "false",
			"limit": "74"
		},
		{
			"name": "Генадий Наумов",
			"img": "img/person_03.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star grey-star'></i>",
			"date": "12.09",
			"text": "Одним словом молодцы!",
			"isClose": "false",
			"limit": "74"
		},
		{
			"name": "Антон Давыдов",
			"img": "img/person_04.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star '></i>",
			"date": "12.09",
			"text": "Сегодня был на замене передних колодок тормозов. До этого перезвонил на СТО и объя трения металл об металл)",
			"isClose": "false",
			"limit": "74"
		},
		{
			"name": "Никита Каменев",
			"img": "img/person_05.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star grey-star'></i>",
			"date": "12.09",
			"text": "Одним словом молодцы! Приехал (точнее притянул друга) на СТО за пол часа до закрытия в воскресенье, предварительно перезвонив менеджеру",
			"isClose": "false",
			"limit": "74"
		},
		{
			"name": "Петр Шмелев",
			"img": "img/person_06.jpg",
			"stars": "<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></i><i class='fa fa-star '></i>",
			"date": "12.09",
			"text": "Одним словом молодцы!",
			"isClose": "false",
			"limit": "74"
		}
	];

	var expierenceItems = [
		{"title": "Провели замен масла", "qnt": "3621"},
		{"title": "Сделали диагностик авто", "qnt": "3131"},
		{"title": "Поменяли воздушныхфильтров", "qnt": "2003"},
		{"title": "Поменяли топливных фильтров", "qnt": "1191"},
		{"title": "Поменяли фильтров салона", "qnt": "873"},
		{"title": "Продали литров масла", "qnt": "33396"}
	];

	var totalItems = [
		{"name" : "Персонального менеджера"},
		{"name" : "Гарантию на товары и услуги"},
		{"name" : "Уверенность в сотрудничестве"},
		{"name" : "Больше чем услугу по замене"},
		{"name" : "Гарантию"}
	];
})();

