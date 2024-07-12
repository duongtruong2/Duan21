(function ($) {
	"use strict";

	// Sticky nav
	var $headerStick = $(".Sticky");
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 80) {
			$headerStick.addClass("sticky_element");
		} else {
			$headerStick.removeClass("sticky_element");
		}
	});

	// Menu Categories
	$(window)
		.resize(function () {
			if ($(window).width() >= 768) {
				$('a[href="#"]').on("click", function (e) {
					e.preventDefault();
				});
				$(".categories").addClass("menu");
				$(".menu ul > li")
					.on("mouseover", function (e) {
						$(this).find("ul:first").show();
						$(this).find("> span a").addClass("active");
					})
					.on("mouseout", function (e) {
						$(this).find("ul:first").hide();
						$(this).find("> span a").removeClass("active");
					});
				$(".menu ul li li")
					.on("mouseover", function (e) {
						if ($(this).has("ul").length) {
							$(this).parent().addClass("expanded");
						}
						$(".menu ul:first", this)
							.parent()
							.find("> span a")
							.addClass("active");
						$(".menu ul:first", this).show();
					})
					.on("mouseout", function (e) {
						$(this).parent().removeClass("expanded");
						$(".menu ul:first", this)
							.parent()
							.find("> span a")
							.removeClass("active");
						$(".menu ul:first", this).hide();
					});
			} else {
				$(".categories").removeClass("menu");
			}
		})
		.resize();

	// Mobile Mmenu
	var $menu = $("#menu").mmenu(
		{
			extensions: ["pagedim-black"],
			counters: true,
			keyboardNavigation: {
				enable: true,
				enhance: true,
			},
			navbar: {
				title: "MENU",
			},
			offCanvas: {
				pageSelector: "#page",
			},
			navbars: [
				{ position: "bottom", content: ['<a href="#0">© 2022 Allaia</a>'] },
			],
		},
		{
			// configuration
			clone: true,
			classNames: {
				fixedElements: {
					fixed: "menu_fixed",
				},
			},
		}
	);

	// Menu
	$("a.open_close").on("click", function () {
		$(".main-menu").toggleClass("show");
		$(".layer").toggleClass("layer-is-visible");
	});
	$("a.show-submenu").on("click", function () {
		$(this).next().toggleClass("show_normal");
	});
	$("a.show-submenu-mega").on("click", function () {
		$(this).next().toggleClass("show_mega");
	});

	$("a.btn_search_mob").on("click", function () {
		$(".search_mob_wp").slideToggle("fast");
	});

	// Carousel product page
	$(".prod_pics").owlCarousel({
		items: 1,
		loop: false,
		margin: 0,
		dots: true,
		lazyLoad: true,
		nav: false,
	});

	// Carousel
	$(".products_carousel").owlCarousel({
		center: false,
		items: 2,
		loop: false,
		margin: 10,
		dots: false,
		nav: true,
		lazyLoad: true,
		navText: [
			"<i class='ti-angle-left'></i>",
			"<i class='ti-angle-right'></i>",
		],
		responsive: {
			0: {
				nav: false,
				dots: true,
				items: 2,
			},
			560: {
				nav: false,
				dots: true,
				items: 3,
			},
			768: {
				nav: false,
				dots: true,
				items: 4,
			},
			1024: {
				items: 4,
			},
			1200: {
				items: 4,
			},
		},
	});

	// Carousels
	$(".carousel_centered").owlCarousel({
		center: true,
		items: 2,
		loop: true,
		margin: 10,
		responsive: {
			0: {
				items: 1,
				dots: false,
			},
			600: {
				items: 2,
			},
			1000: {
				items: 4,
			},
		},
	});

	// Carousel brands
	$("#brands").owlCarousel({
		autoplay: true,
		items: 2,
		loop: true,
		margin: 10,
		dots: false,
		nav: false,
		lazyLoad: true,
		autoplayTimeout: 3000,
		responsive: {
			0: {
				items: 3,
			},
			767: {
				items: 4,
			},
			1000: {
				items: 6,
			},
			1300: {
				items: 8,
			},
		},
	});

	// Countdown offers
	$("[data-countdown]").each(function () {
		var $this = $(this),
			finalDate = $(this).data("countdown");
		$this.countdown(finalDate, function (event) {
			$this.html(event.strftime("%DD %H:%M:%S"));
		});
	});

	// Lazy load
	var lazyLoadInstance = new LazyLoad({
		elements_selector: ".lazy",
	});

	// Jquery select
	$(".custom-select-form select").niceSelect();

	// Product page color select
	$(".color").on("click", function () {
		$(".color").removeClass("active");
		$(this).addClass("active");
	});

	$("input[name=size]").on("change", function () {
		var dataquantity = $(this).attr("dataquantity");

		var inventory = $("#inventory");
		var sku = $("#sku");
		var sku_1 = $("#sku_1");

		var datasku = $(this).attr("datasku");
		sku.text("SKU: " + datasku);
		sku_1.val(datasku);

		inventory.text("Còn " + dataquantity + " sản phẩm");

		// Giới hạn giá trị của ô input text dựa trên giá trị dataQuantity
		var quantityInput = $(".qty2");
		quantityInput.attr("max", dataquantity);
	});

	$(".quantity").change(function () {
		var id = $(this).attr("data-id");
		var qty = $(this).val();

		var data = { id: id, qty: qty,act: "change" };

		// ajax xử lí
		$.ajax({
			url: "process.php",
			method: "POST",
			data: data,
			dataType: "text",
			success: function (data) {
				var result = data.split(",");

				$("#total-" + id).text(result[0]);
				$("#total-price").text(result[1]);
			},

			// hàm kiểm tra lỗi nếu có
			error: function (xhr, ajaxOptions, thrownError) {
				console.log(thrownError);
			},
		});
	});

	$(".button_inc").on("click", function () {
		var $button = $(this);

		var $input = $button.siblings(".quantity"); // Tìm ô input kề cận

		var oldValue = parseFloat($input.val());

		if ($button.text() == "+") {
			var newVal;
			if(oldValue == $input.attr("max")){
				newVal = $input.attr("max");
			}else{
				newVal = oldValue + 1;
			}
			
		} else {
			// Không cho phép giảm dưới 0
			if (oldValue > 1) {
				var newVal = oldValue - 1;
			} else {
				newVal = 1;
			}
		}

		$input.val(newVal).trigger("change"); // Cập nhật giá trị và kích hoạt sự kiện onchange
	});

	$(".inc_btn").on("click", function () {
		var $button = $(this);

		var $input = $button.siblings(".qty2"); // Tìm ô input kề cận

		var oldValue = parseFloat($input.val());

		if ($button.text() == "+") {
			var newVal = oldValue + 1;
		} else {
			// Không cho phép giảm dưới 0
			if (oldValue > 1) {
				var newVal = oldValue - 1;
			} else {
				newVal = 0;
			}
		}

		$input.val(newVal).trigger("change"); // Cập nhật giá trị và kích hoạt sự kiện onchange
	});

	$(".qty2").on("change", function () {
		var quantityInput = $(this);

		if (
			parseInt(quantityInput.val(), 10) >
			parseInt(quantityInput.attr("max"), 10)
		) {
			quantityInput.val(quantityInput.attr("max"));
		}

		if (
			parseInt(quantityInput.val(), 10) <
			parseInt(quantityInput.attr("min"), 10)
		) {
			quantityInput.val(quantityInput.attr("min"));
		}
	});

	/* Cart dropdown */
	$(".dropdown-cart, .dropdown-access").hover(
		function () {
			$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeIn(300);
		},
		function () {
			$(this).find(".dropdown-menu").stop(true, true).delay(50).fadeOut(300);
		}
	);

	/* Cart Dropdown Hidden From tablet */
	$(window).bind("load resize", function () {
		var width = $(window).width();
		if (width <= 768) {
			$("a.cart_bt, a.access_link").removeAttr("data-toggle", "dropdown");
		} else {
			$("a.cart_bt,a.access_link").attr("data-toggle", "dropdown");
		}
	});

	// Opacity mask
	$(".opacity-mask").each(function () {
		$(this).css("background-color", $(this).attr("data-opacity-mask"));
	});

	/* Animation on scroll */
	new WOW().init();

	// Forgot Password
	$("#forgot").on("click", function () {
		$("#forgot_pw").fadeToggle("fast");
	});

	// Top panel on click: add to cart, search header
	var $topPnl = $(".top_panel");
	var $pnlMsk = $(".layer");

	$(".btn_add_to_cart a").on("click", function () {
		// $topPnl.addClass("show");
		// $pnlMsk.addClass("layer-is-visible");
		if (!isLoggedIn) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            window.location.href = 'index.php?act=dangnhap';
        }

		var size = $('input[name="size"]:checked').val();
    	var quantity = $('#quantity_1').val();
    	var price = $('input[name="price"]').val();
    	var sku = $('#sku_1').val();

    	// Sử dụng Ajax để gửi dữ liệu lên server
    	$.ajax({
        	url: 'process.php',
        	type: 'POST',
        	data: {
            	size: size,
            	quantity: quantity,
            	price: price,
            	sku: sku,
				add_to_cart: true
        	},
			dataType: "text",
        	success: function (response) {
				var result = response.split(",");
				$(".cart_bt strong").text(result['0']);
				$(".total_c span").text(result['1']);
            	swal("Sản phẩm đã được thêm vào giỏ hàng","","success");
        	},
       		error: function (error) {
            	console.log(error);
        	}
    	});
	});

	$("a.search_panel").on("click", function () {
		$topPnl.addClass("show");
		$pnlMsk.addClass("layer-is-visible");
	});
	$("a.btn_close_top_panel").on("click", function () {
		$topPnl.removeClass("show");
		$pnlMsk.removeClass("layer-is-visible");
	});

	//Footer collapse
	var $headingFooter = $("footer h3");
	$(window)
		.resize(function () {
			if ($(window).width() <= 768) {
				$headingFooter.attr("data-bs-toggle", "collapse");
			} else {
				$headingFooter.removeAttr("data-bs-toggle", "collapse");
			}
		})
		.resize();
	$headingFooter.on("click", function () {
		$(this).toggleClass("opened");
	});

	/* Footer reveal */
	if ($(window).width() >= 1024) {
		$("footer.revealed").footerReveal({
			shadow: false,
			opacity: 0.6,
			zIndex: 1,
		});
	}

	// Scroll to top
	var pxShow = 800; // height on which the button will show
	var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.
	$(window).scroll(function () {
		if ($(window).scrollTop() >= pxShow) {
			$("#toTop").addClass("visible");
		} else {
			$("#toTop").removeClass("visible");
		}
	});
	$("#toTop").on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, scrollSpeed);
		return false;
	});

	// Tooltip
	var tooltipTriggerList = [].slice.call(
		document.querySelectorAll('[data-bs-toggle="tooltip"]')
	);
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl);
	});

	// Modal Sign In
	$("#sign-in").magnificPopup({
		type: "inline",
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: "auto",
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		closeMarkup:
			'<button title="%title%" type="button" class="mfp-close"></button>',
		mainClass: "my-mfp-zoom-in",
	});

	$('#other_addr input').on("change", function (){
		if(this.checked)
			$('#other_addr_c').fadeIn('fast');
		else
			$('#other_addr_c').fadeOut('fast');
	});

	// hủy đơn
	$(".cancelOrder").on("click", function() {
		// Sử dụng hàm confirm để hiển thị hộp thoại xác nhận
		return confirm("Bạn có chắc là muốn hủy?");
	  });

	// vouvher

	$("#applyVoucher").click(function() {
        // Lấy mã voucher từ ô input
        var voucherCode = $("#voucherCode").val();
        var subtotal = $("#totalbill").val();

		var discounted = $("#voucher").val();

		if(discounted != 0){
			swal("Bạn đã áp dụng mã giảm giá rồi!","","warning");
			return false;
		}

        // Gửi yêu cầu Ajax để kiểm tra và áp dụng voucher
        $.ajax({
            type: "POST",
            url: "process.php",
            data: { voucherCode: voucherCode,subtotal: subtotal},
            success: function(response) {
				if(response == 'null'){
					swal("Mã giảm giá không hợp lệ","","warning");
					$("#voucherCode").val("");
				}else{
					var result = JSON.parse(response);
					
					$("li #discounted").text(result.discounted.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " đ");
					$("#subtotal").text(result.result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " đ");
					$("#voucher").val(result.discounted);
					$("#totalbill").val(result.result);
				}   
            },
            error: function(error) {
                console.log("Error:", error);
            }
        });
    });

	$("#selectAll").click(function() {
		$(".checkbox").prop("checked", true);
	  });

	// Image popups
	$(".magnific-gallery").each(function () {
		$(this).magnificPopup({
			delegate: "a",
			type: "image",
			preloader: true,
			gallery: {
				enabled: true,
			},
			removalDelay: 500, //delay removal by X to allow out-animation
			callbacks: {
				beforeOpen: function () {
					// just a hack that adds mfp-anim class to markup
					this.st.image.markup = this.st.image.markup.replace(
						"mfp-figure",
						"mfp-figure mfp-with-anim"
					);
					this.st.mainClass = this.st.el.attr("data-effect");
				},
			},
			closeOnContentClick: true,
			midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		});
	});

	// Popup up
	setTimeout(function () {
		$(".popup_wrapper").css({
			opacity: "1",
			visibility: "visible",
		});
		$(".popup_close").on("click", function () {
			$(".popup_wrapper").fadeOut(300);
		});
	}, 1500);
})(window.jQuery);
