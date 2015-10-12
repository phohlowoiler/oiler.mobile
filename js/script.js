(function($){

	//$.mobile.autoInitializePage = false;

	var sandwich = {
		init: function(value){
			sandwich.common = {
				element: '#sandwich',
				activeClass: 'active',
				siteWrapper: '#site-wrapper',
				showNav: 'show-nav'
			};

			$.extend(sandwich.common, value);
			//console.log(sandwich.common);
			sandwich.setup();
		},

		setup: function(){
			var s = $( sandwich.common.element );
			s.on( 'click', sandwich.toggleNav );
		},

		toggleNav: function(){
			$( this ).toggleClass( sandwich.common.activeClass );
			$( sandwich.common.siteWrapper ).toggleClass( sandwich.common.showNav );
		}
	};

	sandwich.init();


	// var windowResize = {
	// 	init: function(value){
	// 		windowResize.common = {
	// 			w: window,
	// 			maxHeight: 620,
	// 			top: '#top',
	// 			bannerWrap: '#top-banner-wrap'
	// 		};

	// 		$.extend(windowResize.common, value);
	// 		windowResize.setup();
	// 	},

	// 	setup: function(){
	// 		var w = $( windowResize.common.w );
	// 		w.resize( windowResize.scaleWindowHeight );
	// 	},

	// 	scaleWindowHeight: function(){
	// 		if( +$( this ).height() < windowResize.common.maxHeight ){
	// 			$( windowResize.common.bannerWrap ).css({
	// 				'height': +$( this ).height() - +$( windowResize.common.top ).outerHeight()
	// 			});
	// 		}
	// 	}
	// };

	// windowResize.init();

	var phoneValidation = {
		init: function(value){
			phoneValidation.common = {
				field: '.phoneValue',
				mask: "+38(000)-000-00-00",
				placeholder: "Ваш телефон",
				submit: '.submit-btn',
				invalidMessageClass: 'allertMessage',
				//validMessageText: 'С вами свяжутся через 5 минут',
				invalidMessageText: 'Введите телефон до конца',
				buttonAlertClass: 'alertButton',
				validPhoneLength: 18
			}

			$.extend( phoneValidation.common, value);
			phoneValidation.setup();
		},

		setup: function(){
			
			// toggle placeholder
			$( phoneValidation.common.field )
			.focus(function(){
				$(this).attr('placeholder', '');
			})
			.blur(function(){
				if( !$(this).val() ){
					$(this).attr('placeholder', phoneValidation.common.placeholder);
				}
			}); 
			
			// mask field in input
			$( phoneValidation.common.field ).mask( phoneValidation.common.mask, { placeholder: phoneValidation.common.placeholder } );
			// submiting form
			$( phoneValidation.common.submit ).on('click', phoneValidation.validate);
		},

		validate: function(event){
			var btn = $( this ),
			form = btn.closest('form').filter('.ajax'),
			phone = form.find( phoneValidation.common.field ),
			message = $("<div><p></p><i class='fa fa-times'></i></div>");

			btn.addClass('active');
			$( '.' + phoneValidation.common.invalidMessageClass ).remove();
			message.on('click', { button: btn }, phoneValidation.removeMessage);

			// if invalid
			if( phoneValidation.checkLength( phone.val() ) ){
				// add invalid class
				message.find('p').text( phoneValidation.common.invalidMessageText );
				message.addClass( phoneValidation.common.invalidMessageClass );
				btn.after(message);
				message.show();
				event.preventDefault();
			}else{
				var url = form.attr('action'),
				type = form.attr('method'),
				data = {};

				form.find('[name]').each(function(index, value){
					var that = $( this ),
					name = that.attr('name'),
					value = that.val();

					data[name] = value;
					//alert("Data is:" + data);
				});

				$.ajax({
					url: url,
					type: type,
					data: data,
					success: function(response){
						$( phoneValidation.common.field ).val('');
						window.location.href = 'return.php';
						// message.text( phoneValidation.common.validMessageText );
						// message.addClass( phoneValidation.common.invalidMessageClass );
						// btn.after(message);
						// message.show();
					}
				});
				return false;
			}
		},

		removeMessage: function(obj){
			$( this ).remove();
			var btn = obj.data.button;
			btn.removeClass('active');
		},

		checkLength: function( phoneLength ){
			//if invalid will return true			
			return phoneLength.length < phoneValidation.common.validPhoneLength;
		}

	};

	phoneValidation.init();

	// for desctops 
	$("#map").on('click', function(){
		$(this).find('iframe').css('pointer-events', 'all');
	})
	.on('mouseleave', function(){
		$(this).find('iframe').css('pointer-events', 'none');
	});
	
	//for mobile
	// $("#map").on('taphold', function(){
	// 	$(this).find('iframe').toggleClass('taped');
	// 		console.log('ON');
	// })
	// .on('vmouseout', function(){
	// 	$(this).find('iframe').removeClass('taped');
	// 	console.log('OFF');
	// });
	$('#button-top').click(function(event) {
		event.preventDefault();
	$('html, body').animate({scrollTop:0}, 500); // Scroll speed to the top
	});


})(jQuery);

// $(window).scroll(function(){
// 	var wHeight = $(document).height() - 600;
// 	var y = $( this ).scrollTop();

// 	if( y >= wHeight ){
// 		$('#button-top').fadeIn('slow');
// 	}else{
// 		$('#button-top').fadeOut('fast');
// 	}
// });

$(window).load(function(){
	
	function hidePreload(){
		$('.fade-wrap').fadeOut('slow', 'swing');
	}
	//IMPORTANT SHOW
	hidePreload();
});