(function(){

	angular.module('mobileApp', ['appDirectives', 'ngSanitize'])
		// top banner info
		.controller('BannerController', ['$http',function($http){
			var banner = this;
			banner.items = [];
			banner.info = [];

			$http.get('js/app/data/banner-info.json')
				.success(function(data){
					banner.info = data;
				})
				.error(function(errorm, status){
					console.log("Error status " + status);
				});

			$http.get('js/app/data/banner-items.json')
				.success(function(data){
					banner.items = data;
				})
				.error(function(errorm, status){
					console.log("Error status " + status);
				});
		}]);

})();

