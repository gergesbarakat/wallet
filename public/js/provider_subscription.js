(function($) {
	"use strict";
	 $('.paypal_desc').hide();
    $('#paypal-button').hide();
	
	var base_url=$('#base_url').val();
	var BASE_URL=$('#base_url').val();
	var csrf_token=$('#csrf_token').val();
	
	var csrfName=$('#csrfName').val();
	var csrfHash=$('#csrfHash').val();

	var stripe_key=$("#stripe_key").val();
	var web_logo=$("#logo_front").val();
	$( document ).ready(function() {
		$('#my_stripe_payyment').hide();
		$('.callStripe').on('click',function(){
			var e=this;
			
			callStripe(e);
		}); 
		$('.plan_notification').on('click',function(){
			plan_notification();
		}); 
	});
	var final_gig_amount = 1;
	var sub_id = '';
	var striep_currency ='';

	var final_gig_amount1 = 1;
	var service_id = '';
	var provider_id = '';
	var booking_date = '';
	var booking_time = '';
	var service_location = '';
	var service_latitude = '';
	var service_longitude = '';
	var final_gig_currency = 'USD';
	var notes = '';

	var paystack_key = $("#paystack_key").val();

	function plan_notification(){

		Swal.fire({
			title: " Plan warning..!",
			text: "Already subscribed to high range so choose higher plan!",
			icon: "error",
			button: "okay",
			closeOnEsc: false,
			closeOnClickOutside: false
		});
	}
	function callStripe(e) {
		var payment_type = $('input[name="payment_type"]:checked').val();
		var subsid = $(e).attr('data-subid');
		
		sub_id = $(e).attr('data-id');
		final_gig_amount = $(e).attr('data-amount');
		final_gig_currency = $(e).attr('data-currency');
		var curconv = $(e).attr('data-curcon');
		var csrf_token=$('#csrf_token').val();

		if(parseInt(final_gig_amount)==0.00) {
			free_subscription();
		}
		else {
			
			if (payment_type == '' || payment_type == undefined) {
                Swal.fire({
                    title: "payment Type",
                    text: "Kindly Select payment Type...",
                    icon: "error",
                    button: "okay",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                return false;
            }
			if (payment_type == "razorpay" && payment_type != undefined) {
				var cval = $('[name="currency_code"]').val(); 
				curconv = curconv *100;
				var product_id =  '123';
				var product_name =  'Add Subscription';		
				
				var options = {
					"key": $('#razorpay_apikey').val(),
					"currency": cval, //final_gig_currency,
					"amount": Math.round(curconv),
					"name": product_name,
					"description": product_name,
					"handler": function (response){
						  $.ajax({
							url: base_url+'user/subscription/razorpay_payment',
							type: 'post',
							dataType: 'json',
							data: {sub_id:sub_id,final_gig_amount:curconv * 100,csrf_token_name:csrf_token},
							success: function (msg) {						
							  window.location.href = base_url+'provider-subscription';
							}
						});
					},
					"theme": {
						"color": "#F37254"
					}
				}
				var rzp1 = new Razorpay(options);
				rzp1.open();
				// e.preventDefault();
				return false;
			}
			if (payment_type == "stripe" && payment_type != undefined) {
				$('#my_stripe_payyment').click();
			}
			if (payment_type == "paypal") {
				
				// document.getElementById("frm_paypal_detail_"+sub_id).submit();
				var amnt=curconv * 100;
				$('#subs_id').val();
				//jayacode
			
                    paypal_add_wallet(amnt,final_gig_currency,subsid,sub_id);
                
                
            }
            if (payment_type == "paysolution" && payment_type != undefined) {
				
            	$('#paysolution_amt').val(final_gig_amount);
            	// $('#productdetail').val('subscription_'+sub_id);
				$('#paysolution_subscription').submit();
			}
			
			//flutterwave
			if(payment_type == "flutter" && payment_type != undefined) {
			
				if(flutter_key == '' || flutter_key == undefined) {
                  
                    Swal.fire({
                    title: "Empty Key",
                    text: "Please Enter Payment api key",
                    icon: "error",
                    button: "okay",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                } else {
										
					makePayment();
                    function makePayment(){
						
						var amount =  curconv;
						var product_id = '1234';
                        var product_name = 'Add Subscription';	
                        var public_key = $('#flutter_key').val();
                        var email = $('#email').val();
                        var mobileno = $('#mobileno').val();
                        var username = $('#username').val();
						var uniqueid = $('#refno').val();
						var currency = "USD";

                        FlutterwaveCheckout({
                            
                            "public_key": public_key,
							"tx_ref" : uniqueid,
                            "amount" : amount,
                            "currency": currency,
                            payment_options: "card, mobilemoneyghana, ussd",
                            redirect_url: base_url+'flutterwave-payment-post',
                            customer: {
                            	"email": email,
								"name":username,
                               "phone_number": "<?=  !empty($mobileno) ? $mobileno : ''; ?>",
                            },
                            callback: function (data) {
                            },
                            onclose: function () {
                            },
                           
                        });
                        
                    }
        			
				}
			}

			//iyzico

			if(payment_type == "iyzico" && payment_type != undefined) {
			
				if(iyzico_key == '' || iyzico_key == undefined) {
                  
                    Swal.fire({
                    title: "Empty Key",
                    text: "Please Enter Payment api key",
                    icon: "error",
                    button: "okay",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                } else {
					var totalAmount =  curconv;
					
                    var product_id = '123';
                    var product_name = 'Wallet Topup';
                    var public_key = $('#iyzico_apikey').val();
                    var email = $('#email').val();
                    var mobileno = $('#mobileno').val();
                    var username = $('#username').val();
                    var uniqueid = $('#refno').val();
                    var currency = $('#currency_val').val();
                    var csrf_token = $('#csrf_token').val();
					var cur = $('#user_currency').val();
				
                    if(cur != "USD") {						
						Swal.fire({
							title: "Currency Value",
							text: "Iyzico Supports only USD",
							icon: "error",
							button: "okay",
							closeOnEsc: false,
							closeOnClickOutside: false
					}).then(function(){
						window.location.reload();
					});
					return false;
					}
                    var req_url = base_url+'user/dashboard/iyzico_provider_subscription/'+totalAmount;
					
                    window.location.replace(req_url);						
					
                }        			
				
			}


			//midtrans
			if (payment_type == "midtrans" && payment_type != undefined) {

				curconv = curconv *100;
			
				var product_id =  '1234';
				var product_name =  'Add Subscription';				
				var options = {
					"key": $('#midtrans_key').val(),
					"currency": 'IDR', //final_gig_currency,
					"amount": Math.round(curconv),
					"name": product_name,
					"description": product_name,
					"handler": function (response){
						  $.ajax({
							url: base_url+'user/subscription/midtrans_payment',
							type: 'post',
							dataType: 'json',
							data: {sub_id:sub_id,final_gig_amount:curconv * 100,csrf_token_name:csrf_token},
							success: function (msg) {						
							  window.location.href = base_url+'provider-subscription';
							}
						});
					},
					
				}
				
            	$('#gross_amount').val(final_gig_amount);
            	$('#order_id').val('subscription_'+sub_id);
				$('#midtrans_form').submit();
			}

			var currency_val = $("#currency_val").val();
			 //paystack
	            if(payment_type=="paystack") {
	                if(paystack_key == '' || paystack_key == undefined) {
                    Swal.fire({
                        title: "Empty Key",
                        text: "Please Enter Payment api key",
                        icon: "error",
                        button: "okay",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
	                } else {
	                    button_loading();
	                    currency_conversion(final_gig_amount,currency_val);
	                }
	            }

	          //endpaystack

	          //Offline Payment
	          if (payment_type=="offline_payment") {
	          	var sub_amount = final_gig_amount + currency_val;
	          	$('#sub_amount').val(sub_amount);
	          	window.location.href = base_url+'user/dashboard/offlinepayment/'+sub_id;
	          }

					
			
		}
	}

	function free_subscription() {
		$.ajax({
			url: base_url+'user/subscription/stripe_payments/',
			data: {sub_id:sub_id,final_gig_amount:final_gig_amount,csrf_token_name:csrf_token},
			type: 'POST',
			dataType: 'JSON',
			beforeSend: function(){
				$('.loading').show();
			},
			success: function(response){
				$('.loading').fadeOut("slow");
				window.location.href = base_url+'provider-subscription';
			},
			error: function(error){
				console.log(error);
			}
		});
	}

	function currency_conversion(amt, currency) {
        var data="amount="+amt+"&currency="+currency+"&csrf_token_name="+csrf_token;
         $.ajax({
            url: base_url + 'user/dashboard/paystack_amt_conversion',
            data: data,
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                if(response) {
                    var wallet_amt = response.amount;
                    $('#paystack_wallet_amt').val(wallet_amt);
                    paystack_subscription(wallet_amt,currency);
                } else {
                    $('#paystack_wallet_amt').val('0');
                    paystack_subscription(wallet_amt,currency);
                }
            },
        });
    }

    function paystack_subscription(stripe_amt,currency_val) {
        var api_key = $('#paystack_key').val();
        var firstname = $('#name').val();
        var email = $('#email').val();
        let handler = PaystackPop.setup({
            key: $('#paystack_key').val(),
            email: email,
            amount: stripe_amt,
            firstname: firstname,
            currency:'NGN',
            ref: '', //ref, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
                alert('Window closed.');
            },
            callback: function(response) {
                $.ajax({
                    url: base_url+'user/subscription/paystack_payment_success',
                    data: {sub_id:sub_id,final_gig_amount:stripe_amt,csrf_token_name:csrf_token},
                    type: 'GET',
                    dataType: 'JSON',
                    success: function (response) { 
                        var obj = response;
                        if (obj.status == 0)
                        {
                        Swal.fire({
                            title: "Somethings wrong !",
                            text: "Somethings wents to wrongs, try again..!",
                            icon: "error",
                            button: "okay",
                            closeOnEsc: false,
                            closeOnClickOutside: false
                        }).then(function(){
                            window.location.reload();
                        });
                        } else
                        {
                        Swal.fire({
                            title: "Success!",
                            text: "Payment Successfully..!",
                            icon: "success",
                            button: "okay",
                            closeOnEsc: false,
                            closeOnClickOutside: false
                        }).then(function(){
                            window.location.reload();
                        });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
        handler.openIframe();
    }


	var handler = StripeCheckout.configure({
		key: stripe_key,
		image: web_logo,
		locale: 'auto',
		token: function(token,args) {
		// You can access the token ID with `token.id`.
		$('#access_token').val(token.id);
		var tokenid = token.id;
		$.ajax({
			url: base_url+'user/subscription/stripe_payment/',
			data: {sub_id:sub_id,final_gig_amount:final_gig_amount,tokenid:tokenid,det:token,csrf_token_name:csrf_token,currency: final_gig_currency},
			type: 'POST',
			dataType: 'JSON',
			success: function(response){
				window.location.href = base_url+'provider-subscription';
			},
			error: function(error){
				console.log(error);
			}
		});
	}
});
	$('#my_stripe_payyment').on('click', function(e) {
	final_gig_amount = (final_gig_amount * 100); //  dollar to cent	
	// Open Checkout with further options:
	handler.open({
		name: base_url,
		description: 'Subscribe',
		amount: final_gig_amount,
		currency:final_gig_currency
	});
	e.preventDefault();
});



	function callStripe_booking(e) {
		service_id = $(e).attr('data-id');
		provider_id = $(e).attr('data-provider');
		final_gig_amount1 = $(e).attr('data-amount');
		booking_date = $("#booking_date").val();
		booking_time = $("#from_time").val();
		service_location = $("#service_location").val();
		service_latitude = $("#service_latitude").val();
		service_longitude = $("#service_longitude").val();
		notes = $("#notes").val();

		if(parseInt(final_gig_amount1)==0) {
			alert('Service amount cannot be empty');
		}
		else {
			var booking_date1 = $("#booking_date").val();
			var booking_time1 = $("#from_time").val();
			var service_location1 = $("#service_location").val();

			if(booking_date1 == '') {
				$('.error_date').show();
				return false;
			}
			else if(booking_time1 == '' || booking_time == null) {
				$('.error_time').show();
				return false;
			}
			else if(service_location1 ==  '') {
				$('.error_date').hide();
				$('.error_loc').show();
				return false;
			}
			$('#stripe_booking').click();
		}
	}



	function callStripe_booking(e) {
		service_id = $(e).attr('data-id');
		provider_id = $(e).attr('data-provider');
		final_gig_amount1 = $(e).attr('data-amount');
		booking_date = $("#booking_date").val();
		booking_time = $("#from_time").val();
		service_location = $("#service_location").val();
		service_latitude = $("#service_latitude").val();
		service_longitude = $("#service_longitude").val();
		notes = $("#notes").val();

		if(parseInt(final_gig_amount1)==0) {
			alert('Service amount cannot be empty');
		}
		else {
			var booking_date1 = $("#booking_date").val();
			var booking_time1 = $("#from_time").val();
			var service_location1 = $("#service_location").val();

			if(booking_date1 == '') {
				$('.error_date').show();
				return false;
			}
			else if(booking_time1 == '' || booking_time == null) {
				$('.error_time').show();
				return false;
			}
			else if(service_location1 ==  '') {
				$('.error_date').hide();
				$('.error_loc').show();
				return false;
			}
			$('#stripe_booking').click();
		}
	}
	
	    function paypal_add_wallet(amt,currency_val,subsid,sub_id) {
			
        // Create a client.
        var username = $('#username').val();
        var mobileno = $('#mobileno').val();
        var address = $('#address').val();
        var pincode = $('#pincode').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var sandbox_type = $('#paypal_gateway').val();
        var braintree_key = $('#braintree_key').val();
	
		var subscriptionId = sub_id;
		
        braintree.client.create({
            authorization: braintree_key
        }, function (clientErr, clientInstance) {

            if (clientErr) {
                console.error('Error creating client:', clientErr);
                return;
            }
// Create a PayPal Checkout component.
            braintree.paypalCheckout.create({
                client: clientInstance
            }, function (paypalCheckoutErr, paypalCheckoutInstance) {
// Stop if there was a problem creating PayPal Checkout.
// This could happen if there was a network error or if it's incorrectly
// configured.
                if (paypalCheckoutErr) {
                    console.error('Error creating PayPal Checkout:', paypalCheckoutErr);
                    return;
                }

// Set up PayPal with the checkout.js library
                paypal.Button.render({
                    env: sandbox_type,
                    commit: true, // This will add the transaction amount to the PayPal button
                    payment: function () {
                        return paypalCheckoutInstance.createPayment({
                            flow: 'checkout', // Required
                            amount: amt, // Required
                            currency: currency_val, // Required
                            enableShippingAddress: true,
                            shippingAddressEditable: false,
                            shippingAddressOverride: {
                                recipientName: username,
                                line1: address,
                                city: city,
                                countryCode: country,
                                postalCode: pincode,
                                state: state,
                                phone: mobileno,
								subid: subscriptionId
                            }
                        });
                    },
                    onAuthorize: function (data, actions) {
                        return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
							
                            var intent = data.intent;
                            var paymentID = data.paymentID;
                            var payerID = data.payerID;
                            var paymentToken = data.paymentToken;
                            var paymentMethod = 'PayPal';
                            var orderID = data.orderID;
						
							$("#payload_nonce-"+subsid).val(payload.nonce);
							$("#orderID-"+subsid).val(orderID);
                            
                            if (orderID) {
                                
                                $('#paypal_amount').val(amt);
                                $('#paypal-button').hide();
                                $('.paypal_desc').hide();
							
                                
								document.getElementById("myForm-"+subsid).submit();
                                button_loading();
                            }
                        });
                    },
                    onCancel: function (data) {
                        location.reload();
                        console.log('checkout.js payment cancelled', JSON.stringify(data, 0, 2));
                    },
                    onError: function (err) {
                        console.error('checkout.js error', err);
                    }
                }, '#paypal-button-'+subsid).then(function () {
                });
            });
        });
		
        $('#paypal_amount').val(amt);
		showPaypalButton(subsid);
    }
	
	function showPaypalButton(subsid) {
		setTimeout(function () {
			$('#subs_id_' + subsid).find('.paypal_desc').show();    	
			$('#subs_id_' + subsid).find("#paypal-button-"+subsid).show();
	
		}, 5000);
	}
	
	function button_loading() {
        var $this = $('.btn');
        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
        if ($this.html() !== loadingText) {
            $this.data('original-text', $this.html());
            $this.html(loadingText).prop('disabled', 'true').bind('click', false);
        }
    }

})(jQuery);