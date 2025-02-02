(function ($) {
    "use strict";
    $('.paypal_desc').hide();
    $('#paypal-button').hide();
    var base_url = $('#base_url').val();
    var BASE_URL = $('#base_url').val();
    var csrf_token = $('#csrf_token').val();
    var csrfName = $('#csrfName').val();
    var csrfHash = $('#csrfHash').val();

    var tokens = $('#tokens').val();
    var stripe_key = $("#stripe_key").val();
    var web_logo = $("#logo_front").val();

    var stripe_amt = 1;
    var stripe_key = $("#stripe_key").val();
    var web_logo = $("#logo_front").val();
    var final_gig_amount = 0;

    var paypall_key = $("#paypal_key").val();
    var razorpay_key = $("#razorpay_key").val();
    var paystack_key = $("#paystack_key").val();
    $(document).ready(function () {
            $('#stripe_booking').hide();
            $('.add_wallet_value').on('click', function () {
                var id = $(this).attr('data-amount');
                add_wallet_value(id);
            });
            $('.isNumber').on('keypress', function (evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode;
    			var element =  this;
    			if ((charCode != 45 || $(element).val().indexOf('-') != -1) && (charCode != 46 || $(element).val().indexOf('.') != -1) && (charCode < 48 || charCode > 57))
    				return false;
            });

            var user_handler = StripeCheckout.configure({
                key: stripe_key,
                image: web_logo,
                locale: 'auto',
                token: function (token, args) {
                    var tokens = $('#tokens').val();
                    var stripe_amt = $("#wallet_amt").val();
    				var currency_val = $("#currency_val").val();
                    var tokenid = token.id;
    				var payment_type = $('input[name="payment_type"]:checked').val();
                    var data = "Token=" + tokens + "&amount=" + stripe_amt + "&currency=" + currency_val + "&tokenid=" + tokenid+ "&paytype=" + payment_type;

                    $.ajax({
                        url: base_url + 'api/add-user-wallet',
                        data: data,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (response) {
                            window.location.reload();
                            
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });

        $('#stripe_wallet').on('click', function (e) {
    		
            var currency_val = $("#currency_val").val();
            var stripe_amt = $("#wallet_amt").val();
            var payment_type = $('input[name="payment_type"]:checked').val();

            if (payment_type == '' || payment_type == undefined) {
                
                Swal.fire({
                    title: "payment Type",
                    text: "Kindly Select payment Type...",
                    icon: "error",
                    button: "okay",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                $("#wallet_amt").select();
                return false;
            }
            if (stripe_amt == '' || stripe_amt < 1) {

                // alert("Wallet field was empty please fill it.");
                Swal.fire({
                    title: "Amount empty",
                    text: "Wallet field is empty please fill it...",
                    icon: "error",
                    button: "okay",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                $("#wallet_amt").select();
                return false;
            }
            if (payment_type == "paypal") {
                if(paypall_key == '' || paypall_key == undefined) {
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
                    paypal_add_wallet(stripe_amt,currency_val);
                }
                
            }
    		else if (payment_type == "razorpay" && payment_type != undefined) {
                if(razorpay_key == '' || razorpay_key == undefined) {
                    Swal.fire({
                        title: "Empty Key",
                        text: "Please Enter Payment api key",
                        icon: "error",
                        button: "okay",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                } else {
        			var totalAmount = $('#wallet_amt').val();
        			var product_id =  '123';
        			var product_name =  'Wallet Topup';				
        			var options = {
        				"key": $('#razorpay_apikey').val(),
        				"currency": currency_val,
        				"amount": totalAmount*100,
        				"name": product_name,
        				"description": product_name,
        				"handler": function (response){
        					  $.ajax({
        						url: base_url+'user/dashboard/razor_payment_success',
        						type: 'get',
        						dataType: 'json',
        						data: {
        							razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
        						}, 
        						success: function (msg) {						
        						   window.location.href = base_url+'user/dashboard/razorthankyou?res='+msg;
        						}
        					});
        				},
        				"theme": {
        					"color": "#F37254"
        				}
        			}
        			var rzp1 = new Razorpay(options);
        			rzp1.open();
        			e.preventDefault();
        			return false;
                }
    		}
    		else if (payment_type == "paytabs" && payment_type != undefined) {
    			$('#paytab_payment').submit();
    		} else if(payment_type == "paystack" && payment_type != undefined) {
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
                    currency_conversion(stripe_amt,currency_val);
                }
            } else if(payment_type == "paysolution" && payment_type != undefined) {
               
                $('#paysolution_amt').val(stripe_amt);
                $('#paysolution_form').submit();
            } else if(payment_type == "midtrans" && payment_type != undefined) {
                $('#midtrans_amt').val(stripe_amt);
                $('#midtrans_form').submit();
                
            }
                
             else if (payment_type == "flutter" && payment_type != undefined) {
               
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

                        var totalAmount =  $('#wallet_amt').val();
                        
                        var product_id = '123';
                        var product_name = 'Wallet Topup';
                        var public_key = $('#flutter_apikey').val();
                        var email = $('#email').val();
                        var mobileno = $('#mobileno').val();
                        var username = $('#username').val();
                        var uniqueid = $('#refno').val();
                        var currency = "NGN";
                  
                        FlutterwaveCheckout({
                            
                            "public_key": public_key,
                            "tx_ref" : uniqueid,
                            "amount" : totalAmount,
                            "currency": currency,
                            "payment_options": "card, mobilemoneyghana, ussd, banktransfer, mpesa",
                    
                            redirect_url: base_url+'flutterwave-payment-post',
                            customer: {
                            "email": email,
                               "phone_number": "<?=  !empty($mobileno) ? $mobileno : ''; ?>",
                                "name": username,
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
            else if (payment_type == "iyzico" && payment_type != undefined) {
           
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
                                  
                    var totalAmount =  $('#wallet_amt').val();
                        
                    var product_id = '123';
                    var product_name = 'Wallet Topup';
                    var public_key = $('#iyzico_apikey').val();
                    var email = $('#email').val();
                    var mobileno = $('#mobileno').val();
                    var username = $('#username').val();
                    var uniqueid = $('#refno').val();
                    var currency = $('#currency_val').val();
                    var csrf_token = $('#csrf_token').val();
                    
                    var req_url = base_url+'user/dashboard/iyzico_payment/'+totalAmount;
                   
                    window.location.replace(req_url);
        					
        			}
                }
        			
            else {
                final_gig_amount = (stripe_amt * 100); //  dollar to cent
                var currency_sign = $('#currency_sign').val();
                
                // Open Checkout with further options:
                user_handler.open({
                    name: base_url,
                    description: 'Wallet Recharge',
                    amount: final_gig_amount,
                    currency: currency_val
                });
            }

            e.preventDefault();
        });
    
    });
    
    function currency_conversion(amt, currency) {
        var data="amount="+amt+"&Token="+tokens+"&currency="+currency+"&csrf_token_name="+csrf_token;
         $.ajax({
            url: base_url + 'user/dashboard/paystack_amt_conversion',
            data: data,
            type: 'POST',
            dataType: 'JSON',
            success: function (response) {
                if(response) {
                    var wallet_amt = response.amount;
                    $('#paystack_wallet_amt').val(wallet_amt);
                    paystack_add_wallet(wallet_amt,currency);
                } else {
                    $('#paystack_wallet_amt').val('0');
                    paystack_add_wallet(wallet_amt,currency);
                }
            },
        });
    }

    function paystack_add_wallet(stripe_amt,currency_val) {
        var api_key = $('#paystack_apikey').val();
        var firstname = $('#username').val();
        var email = $('#email').val();
        var walletAmount = $('#paystack_wallet_amt').val();
        let handler = PaystackPop.setup({
            key: $('#paystack_apikey').val(),
            email: email,
            amount: stripe_amt * 100,
            firstname: firstname,
            currency:'NGN',
            ref: '', //ref, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            onClose: function(){
                alert('Window closed.');
            },
            callback: function(response) {
                $.ajax({
                    url: base_url + 'dashboard/paystack_payment_success',
                    type: 'get',
                    dataType: 'json',
                    data: { reference:response.reference, status:response.status, message:response.message, transaction: response.transaction, amount : stripe_amt ,firstname: firstname,email: email },
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function () {
                    },
                    success: function (response) { 
                         var obj = response;
                        if (obj.status == 0)
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
                        } else
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
     

    function paypal_add_wallet(amt,currency_val) {
        // Create a client.
        console.log($('#country').val());
        var username = $('#username').val();
        var mobileno = $('#mobileno').val();
        var address = $('#address').val();
        var pincode = $('#pincode').val();
        var state = $('#state').val();
        var country = $('#country').val();
        var city = $('#city').val();
        var sandbox_type = $('#paypal_gateway').val();
        var braintree_key = $('#braintree_key').val();
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
                                phone: mobileno
                            }
                        });
                    },
                    onAuthorize: function (data, actions) {
                        return paypalCheckoutInstance.tokenizePayment(data, function (err, payload) {
                            // Submit `payload.nonce` to your server
                            var intent = data.intent;
                            var paymentID = data.paymentID;
                            var payerID = data.payerID;
                            var paymentToken = data.paymentToken;
                            var paymentMethod = 'PayPal';
                            var orderID = data.orderID;

                            document.getElementById('payload_nonce').value = payload.nonce;
                            document.getElementById('orderID').value = orderID;
                            if (orderID) {
                                
                                $('#paypal_amount').val(amt);
                                $('#paypal-button').hide();
                                $('.paypal_desc').hide();
                                document.getElementById("myForm").submit();
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
                }, '#paypal-button').then(function () {


                // The PayPal button will be rendered in an html element with the id
                // `paypal-button`. This function will be called when the PayPal button
                // is set up and ready to be used.
                });
            });
        });

        $('#paypal_amount').val(amt);
        setTimeout(function () {
            $('.paypal_desc').show();
            $('#paypal-button').show();
        }, 5000);

    }

    function add_wallet_value(input) {
        $("#wallet_amt").val(input);
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

