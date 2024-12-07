(function($) {
	"use strict";
	var current_page=$('#current_page').val();
	// Stick Sidebar
	var base_url=$('#base_url').val();
  var BASE_URL=$('#base_url').val();
  var csrf_token=$('#csrf_token').val();
  var csrfName=$('#csrfName').val();
  var csrfHash=$('#csrfHash').val();
  var modules=$('#modules_page').val();
  var sticky_header =$('#sticky_header').val();
	if ($(window).width() > 767) {
		if($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
			  // Settings
			  additionalMarginTop: 125
			});
		}
	}
	// Sidebar

	if($(window).width() <= 991){
		var Sidemenu = function() {
			this.$menuItem = $('.main-nav a');
		};

		function init() {
			var $this = Sidemenu;
			$('.main-nav a').on('click', function(e) {
				if($(this).parent().hasClass('has-submenu')) {
					e.preventDefault();
				}
				if(!$(this).hasClass('submenu')) {
					$('ul', $(this).parents('ul:first')).slideUp(350);
					$('a', $(this).parents('ul:first')).removeClass('submenu');
					$(this).next('ul').slideDown(350);
					$(this).addClass('submenu');
				} else if($(this).hasClass('submenu')) {
					$(this).removeClass('submenu');
					$(this).next('ul').slideUp(350);
				}
			});
		}

	// Sidebar Initiate
	init();
}

	// Mobile menu sidebar overlay

	$('body').append('<div class="sidebar-overlay"></div>');
	$(document).on('click', '#mobile_btn', function() {
		$('main-wrapper').toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		$('.header').removeClass('navbar-fixed');
		return false;
	});

	$(document).on('click', '.sidebar-overlay', function() {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});

	$(document).on('click', '#menu_close', function() {
		$('html').removeClass('menu-opened');
		$('.sidebar-overlay').removeClass('opened');
		$('main-wrapper').removeClass('slide-nav');
	});

	// Content div min height set

	function resizeInnerDiv() {
		var height = $(window).height();
		var header_height = $(".header").height();
		var footer_height = $(".footer").height();
		var breadcrumb_height = $(".breadcrumb-bar").height();
		var setheight = height - header_height;
		var trueheight = setheight - footer_height;
		var trueheight2 = trueheight - breadcrumb_height;
		$(".content").css("min-height", trueheight2);
	}

	if($('.content').length > 0 ){
		resizeInnerDiv();
	}

	$(window).resize(function(){
		if($('.content').length > 0 ){
			resizeInnerDiv();
		}
	});

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > 100 ) {
			if(sticky_header == 1) {
				$('.sticktop').addClass('navbar-fixed');
			}
		} else {
			$('.sticktop').removeClass('navbar-fixed');
		}
	});

	if($('.service-slider').length > 0 ){
		$('.service-slider').owlCarousel({
			items:3,
			margin:30,
			dots:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1170:{
					items:3	,
					loop:false
				}
			}
		});
	}

	if($('.popular-slider').length > 0 ){
		$('.popular-slider').owlCarousel({
			items:3,
			margin:30,
			dots:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1170:{
					items:2
				}
			}
		});
	}

	if($('.images-carousel').length > 0 ){
		$('.images-carousel').owlCarousel({
			rtl: true,
			loop: true,
			center: true,
			margin: 10,
			responsiveClass: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				1000: {
					items: 1,
					margin: 20
				}
			}
		})
	}




    // Membership Add More

    $(".membership-info").on('click','.trash', function () {
    	$(this).closest('.membership-cont').remove();
    	return false;
    });

    $(".add-membership").on('click', function () {
    	var len = $('.membership-cont').length + 1;
    	if(len <= 4) {
    	var membershipcontent = '<div class="row form-row membership-cont">' +
    	'<div class="col-12 col-md-10 col-lg-6">' +
    	'<div class="form-group">' +
    	'<input type="text" class="form-control" name="service_offered[]" id="field1">' +
    	'</div>' +
    	'</div>' +
    	'<div class="col-12 col-md-2 col-lg-2">' +
    	'<a href="#" class="btn btn-danger trash"><i class="far fa-times-circle"></i></a>' +
    	'</div>' +
    	'</div>';
    	$(".membership-info").append(membershipcontent);
    	 } else {
        $('.add-membership').hide();
        alert('Allow 4 links only');
    }
    	return false;
    });

	//add additional
	$(".additional-info").on('click','.additional-cont .trash', function () {
		$(this).closest('.additional-cont').remove();
		var divCount = $('.additional-cont').length;
		if(divCount == 0){
			$(".additional-cont-label").addClass("d-none");
		}
    	return false;
    });
	function chknum(){
        $('.onlynumber').keyup(function(e) {
          if (/\D/g.test(this.value)) {
            this.value = this.value.replace(/\D/g, '');
          }
        });
      }
	$(".add-additional").on('click', function () {
    	$(".additional-cont-label").removeClass("d-none");
		var durintxt = $("#durintxt").val();
    	var membershipcontent = '<div class="row form-row additional-cont">' +

		'<div class="col-12 col-md-10 col-lg-4">' +
    	'<div class="form-group">' +
    	'<input class="form-control addicls" type="text" name="addi_servicename[]" id="addi_name" />' +
    	'</div>' +
    	'</div>' +

		'<div class="col-12 col-md-10 col-lg-3">' +
    	'<div class="form-group">' +
    	'<input class="form-control addicls onlynumber" type="text" name="addi_serviceamnt[]" id="addi_amnt" />' +
    	'</div>' +
    	'</div>' +

		'<div class="col-12 col-md-10 col-lg-3">' +
    	'<div class="form-group">' +
    	'<div class="input-group">	' +
		'<input type="text" class="form-control addicls onlynumber" name="addi_servicedura[]" id="addi_dura" />' +
		  '<div class="input-group-append">' +
			'<span class="input-group-text" id="basic-addon2">'+durintxt+'</span>' +
		  '</div>			' +
		'</div>' +
    	'</div>' +
    	'</div>' +

		'<div class="col-12 col-md-2 col-lg-2">' +
    	'<a href="#" class="btn btn-danger trash"><i class="far fa-times-circle"></i></a>' +
    	'</div>' +

    	'</div>';
    	$(".additional-info").append(membershipcontent);
		chknum();
    	return false;
    });

    if ($(window).scrollTop() > 200) {
    	$('.sticktop').addClass('menu-bg');
    } else {
    	$('.sticktop').removeClass('menu-bg');
    }



	// chat action button toggle

	$(document).on('click', '#action_menu_btn', function() {
		$('.action_menu').toggle();
	});



	// Delete service
	if(current_page=="my-services"){
		var delete_title = "Inactive Service";
		var delete_msg = "Are you sure want to inactive this service?";
		var delete_text = "Your service has been Inactive";

	}
	if(current_page=="my-services-inactive"){
		var delete_title = "Delete Service";
		var delete_msg = "Are you sure want to delete this service?";
		var delete_text = "Your service has been deleted";
		var delete_active_title = "Active Service";
		var delete_active_msg = "Are you sure want to Active this service?";
		var delete_active_text = "Your service has been Actived";
	}
	if(current_page=="featured-services"){
		var delete_title = "Delete Service";
		var delete_msg = "Are you sure want to delete this service?";
		var delete_text = "Your service has been deleted";
	}


	$(document).on('click','.si-delete-service',function() {
		var s_id = $(this).attr("data-id");
		$('#deleteConfirmModal').modal('toggle');
		$('#acc_title').html('<i>'+delete_title+'</i>');
		$('#acc_msg').html(delete_msg);

		$(document).on('click','.si_accept_confirm',function(){
			var dataString="s_id="+s_id+"&csrf_token_name="+csrf_token;
			var url = base_url+'user/service/delete_service';
			$.ajax({
				url:url,
				data:{s_id:s_id,csrf_token_name:csrf_token},
				type:"POST",
				beforeSend:function(){
					$('#deleteConfirmModal').modal('toggle');
				},
				success: function(res){
					if(res==1) {
						window.location = base_url+'my-services';
					}else if(res==2){
						window.location = base_url+'my-services';
					}
				}
			});
		});
		$(document).on('click','.si_accept_cancel',function(){
		});
	});

	$(document).on('click','.si-delete-inactive-service',function() {
		var s_id = $(this).attr("data-id");
		$('#deleteConfirmModal').modal('toggle');
		$('#acc_title').html('<i>'+delete_title+'</i>');
		$('#acc_msg').html(delete_msg);
		 $('.del_reason_error').hide();
		$(document).on('click','#delete_reason',function(){
			var dataString="s_id="+s_id;
			var reason = $('#del_reason').val();
			if (reason != '') {
        		$('.del_reason_error').hide();
            } else if (reason == '') {
            	$('.del_reason_error').show();
            	 return false;
            }
			var url = base_url+'user/service/delete_inactive_service';
			$.ajax({
				url:url,
				data:{s_id:s_id,reason:reason,csrf_token_name:csrf_token},
				type:"POST",
				beforeSend:function(){
					$('#deleteConfirmModal').modal('toggle');
				},
				success: function(res){
					if(res==1) {
						window.location = base_url+'my-services-inactive';
					}else if(res==2){
						window.location = base_url+'my-services-inactive';
					}
				}
			});
		});
		$(document).on('click','.si_accept_cancel',function(){
		});
	});

	$(document).on('click','.si-delete-active-service',function() {
		var s_id = $(this).attr("data-id");
		$('#activeConfirmModal').modal('toggle');
		$('#acc_title').html('<i>'+delete_active_title+'</i>');
		$('#acc_msg').html(delete_active_msg);

		$(document).on('click','.si_accept_confirm',function(){
			var dataString="s_id="+s_id;
			var url    =  base_url+'user/service/delete_active_service';
			$.ajax({
				url:url,
				data:{s_id:s_id,csrf_token_name:csrf_token},
				type:"POST",
				beforeSend:function(){
					$('#activeConfirmModal').modal('toggle');
				},
				success: function(res){
					if(res==1) {
						window.location = base_url+'my-services-inactive';
					}else if(res==2){
						window.location = base_url+'my-services-inactive';
					}
				}
			});
		});
	});

	$(window).on('load',function(){
		$('.page-loading').fadeOut();
	});

	$(document).on("click", "#not_del", function () {
    var id=$(this).attr('data-id');
    delete_modal_show(id);
	});
	function delete_modal_show(id) {
      $('#not_delete_modal').modal('show');
      $('#confirm_delete_sub').attr('data-id',id);
  	}
  	$(document).on("click", "#confirm_delete_sub", function () {
  	//$('#confirm_delete_sub').on('click',function(){
      var id=$(this).attr('data-id');
      confirm_delete_subcription(id);
  	});
  	function confirm_delete_subcription(id) {
      if(id!=''){
            $('#not_delete_modal').modal('hide');
             $.ajax({
                   type:'POST',
                   url: base_url+'user/service/pro_not_del',
                   data : {id:id,csrf_token_name:csrf_token},
                   dataType:'json',
                   success:function(response)
                   {
                      Swal.fire({
                        title: "Success..!",
                        text: "Deleted SuccessFully",
                        icon: "success",
                        button: "okay",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                      }).then(function(){
                        location.reload();
                      });
                }
              });
            }
  	}

  	$(document).on("click", "#not_del_all", function () {
    var id=$(this).attr('data-id');
    alldelete_modal_show(id);
	});
	function alldelete_modal_show(id) {
      $('#notall_delete_modal').modal('show');
      $('#confirm_deleteall_sub').attr('data-id',id);
  	}
  	$('#confirm_deleteall_sub').on('click',function(){
      var id=$(this).attr('data-id');
      confirm_deleteall_subcription(id);
  	});
  	function confirm_deleteall_subcription(id) {
      if(id ==''){
            $('#notall_delete_modal').modal('hide');
             $.ajax({
                   type:'POST',
                   url: base_url+'user/service/pro_not_del',
                   data : {id:id,csrf_token_name:csrf_token},
                   dataType:'json',
                   success:function(response)
                   {
                      Swal.fire({
                        title: "Success..!",
                        text: "Deleted SuccessFully",
                        icon: "success",
                        button: "okay",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                      }).then(function(){
                        location.reload();
                      });
                }
              });
            }
  	}

  $(document).on("click", "#abuse_report", function () {
    var id=$(this).attr('data-id');
    abuse_modal_show(id);
  });
  function abuse_modal_show(id) {
      $('#abuse_modal').modal('show');
      $('#confirm_abuse_sub').attr('data-id',id);
      $('.repo_reason_error').hide();
    }
  $('#confirm_abuse_sub').on('click',function(){
    var id=$(this).attr('data-id');
    var user_id=$(this).attr('data-userid');
    var desc=$('#abuse_desc').val();
    if (desc != '') {
        $('.repo_reason_error').hide();
      } else if (desc == '') {
        $('.repo_reason_error').show();
         return false;
      }
    confirm_abuse_reports(id,user_id);
  });
  function confirm_abuse_reports(id,user_id) {
    if(id !=''){
    	  var desc=$('#abuse_desc').val();
          $('#abuse_modal').modal('hide');
           $.ajax({
                 type:'POST',
                 url: base_url+'user/service/abuse_report_post',
                 data : {id:id,desc:desc,user_id:user_id,csrf_token_name:csrf_token},
                 dataType:'json',
                 success:function(response)
                 {
                    Swal.fire({
                      title: "Success..!",
                      text: "Reported SuccessFully",
                      icon: "success",
                      button: "okay",
                      closeOnEsc: false,
                      closeOnClickOutside: false
                    }).then(function(){
                      location.reload();
                    });
              }
            });
          }
    }

     $('#copy_userlogin_details').on('click',function(){
		var email = 'demouser@gmail.com';
		var password = '123456';
		$('#login_email').val(email);
		$('#login_password').val(password);
		$('#login_mode').val(2);
    });

    $('#copy_userpro_details').on('click',function(){
		var email = 'demoprovider@gmail.com';
		var password = '123456';
		$('#login_email').val(email);
		$('#login_password').val(password);
		$('#login_mode').val(1);
    });
	// if ('loading' in HTMLImageElement.prototype) {
	// 	const images = document.querySelectorAll('img[loading="lazy"]');
	// 	images.forEach(img => {
	// 		img.src = img.dataset.src;
	// 	});
	// } else {
	// 	// Dynamically import the LazySizes library
	// 	const script = document.createElement('script');
	// 	script.src =
	// 		'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
	// 	document.body.appendChild(script);
	// }

})(jQuery);
