(function(){

	function showError(status){
		console.log("Error status " + status);
	}

	var testimonialsItems = null;

	angular.module('appDirectives', [])
	.directive('scrollTo', function(){
		return{
			restrict: 'A',
			link: function(scope, element, attrs){
				$(element).on('click', function(){
					if( $('.testimonial').length == testimonialsItems.length ){
						$("body").animate({ scrollTop: $('.testimonial').offset().top - 100 }, "slow");
					} else{
						$("body").animate({ scrollTop: $('.testimonial').filter(':last').offset().top }, "slow");
					}
				});
			}
		};
	})
	.directive('pageMenu', function(){
		return{
			restrict: 'E',
			templateUrl: 'js/app/directives/menu.html',
			controller: function($http){
				var menu = this;
				menu.menuItems = [];

				$http.get('js/app/data/menu.json')
					.success(function(data){
						menu.menuItems = data;
					})
					.error( function(errorm, status){
						showError(status);
					});
			},
			controllerAs: 'menuCtr'
		}
	})
	.directive('oilerTestimonials', function(){
		return{
			restrict: 'E',
			templateUrl: 'js/app/directives/testimonials.html',
			controller: function($http){
				var testim = this; 
				testim.testimonials = [];



				$http.get('js/app/data/testimonials.json')
					.success(function(data){
						testim.testimonials= data;
						testimonialsItems = data;
						testim.limit = "74";
						testim.quantity = 3;
						testim.moreQuantityText = "Еще отзывы";

						var	minLimit = 74, // limit of chars in hide testimonial
							maxLimit = 200, // limit of chars in open testimonial
							minQuantity = 3; // minimum quantity of testimonial on page 
							
						testim.toggleLimit = function(index){
							var elementt = testim.testimonials[index];
							
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

						testim.checkLength = function(index){
							return testim.testimonials[index].text.length > minLimit;
						};

						testim.makeDots = function(index){
							return ( testim.testimonials[index].limit == minLimit  && testim.testimonials[index].text.length >= minLimit ) ? '...' : '';
						};

						testim.changeQuantity = function(){
							if( testim.quantity == testim.testimonials.length - 1 ){
								testim.moreQuantityText = "Скрыть все последние";
									// var button = event.target;
									// angular.element(button).addClass('hideAllTestimonials');
									// $location.hash('testimonials');
									// $anchorScroll();
								} if( testim.quantity == testim.testimonials.length ) {
									testim.moreQuantityText = "Еще отзывы";
									testim.quantity = minQuantity;
									//scroll to top of testimonials

								} else {
									testim.quantity += 1;
								}
							};
					})
					.error(function(errorm, status){
						showError(status);
					})
				
				},
				controllerAs: 'testimonialsCtr'
			}
		})
	.directive('oilerExpierence', function(){
		return{
			restrict: 'E',
			templateUrl: 'js/app/directives/expierence.html',
			controller: function($http){
				var exp = this;
				exp.items = [];

				$http.get('js/app/data/expierence.json')
					.success(function(data){
						exp.items = data;
					})
					.error(function(errorm, status){
						showError(status);
					});
			},
			controllerAs: 'expCtr'
		}
	})
	.directive('oilerReasons', function(){
		return{
			restrict: 'E',
			templateUrl: 'js/app/directives/reasons.html',
			controller: function( $http ){
				var oilerReasons = this;

				oilerReasons.reasons = [];
				oilerReasons.supportText = '';


				$http.get('js/app/data/oiler-reasons.json')
					.success(function(data){

						oilerReasons.reasons = data;
						oilerReasons.supportText = 'Вы получаете:';

						oilerReasons.getLength = function(){
							return oilerReasons.reasons.length;
						};

					}).error(function(errorm, status){
						oilerReasons.getLength = function(){
							return "Есть много";
						};

						showError(status);
					});

			},
			controllerAs: 'reasonsCtr'
		};
	}).directive('oilerConclusions', function(){
		return{
			restrict: 'E',
			templateUrl: 'js/app/directives/conclusions.html',
			controller: function($http){
				var oilerConclusions = this;

				oilerConclusions.items = conclusionItems;
				oilerConclusions.supportText = '';

				$http.get('js/app/data/oiler-conclusions.json')
					.success(function(data){
						oilerConclusions.items = $.extend( oilerConclusions.items, data );
						oilerConclusions.supportText = 'Итак, вы убедились, что вы получаете:';
					})

					.error(function(errorm, status){
						showError(status);
					});
				// oilerConclusions.items = totalItems;

			},
			controllerAs: 'conclusionCtr'
		}
	});



// Shoud be here ( default values if file with conclusions was not found )
var conclusionItems = [
	{"name" : "Персонального менеджера"},
	{"name" : "Гарантию на товары и услуги"},
	{"name" : "Уверенность в сотрудничестве"},
	{"name" : "Гарантию"}
];
})();