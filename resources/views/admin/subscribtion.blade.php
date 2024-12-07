<!DOCTYPE html>
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

?>
<html>

<x-head>

</x-head>


<title>Dashboard</title>



</head>

<body>




    <div class="main-wrapper">

        <x-header>

        </x-header>

        <div class="content">

            <div class="container">

                <div class="row">

                    <x-side-menu>

                    </x-side-menu>

                    <div class="col-xl-9 col-md-8">


                        <div class="row pricing-box">



                            <div id="subs_id_0" class="col-xl-4 col-md-6 pricing-selected">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pricing-header">
                                            <h2>3 Months Subscription</h2>
                                            <input type="hidden" name="subs_id" value="0" id="subs_id">
                                            <p>
                                                Monthly Price </p>
                                        </div>

                                        <div class="pricing-card-price">
                                            <h3 class="heading2 price">£2000.00</h3>
                                            <input type="hidden" name="currency_val" value="EGP" id="currency_val">
                                            <input type="hidden" name="name" value="ISLAM" id="name">
                                            <input type="hidden" name="email" value="islamwaheed1@hotmail.com"
                                                id="email">

                                            <p>Duration: <span>3 Months </span></p>
                                        </div>

                                        <ul class="pricing-options">

                                            <li class="d-none"><i class="far fa-check-circle"></i> 3 months </li>

                                            <li><i class="far fa-check-circle"></i> 90 days expiration</li>

                                        </ul>


                                        <a href="javascript:void(0);" class="btn btn-primary btn-block">Subscribed</a>


                                    </div>

                                </div>

                            </div>


                        </div>



                        <div class="card">

                            <div class="card-body">

                                <div class="plan-det">

                                    <h6 class="title">Plan Details</h6>

                                    <ul class="row">

                                        <li class="col-sm-4">

                                            <p>


                                                <span class="text-muted">Started On</span> 29-08-2024
                                            </p>

                                        </li>

                                        <li class="col-sm-4">

                                            <p><span class="text-muted">Price</span> £2000.00</p>

                                        </li>

                                        <li class="col-sm-4">

                                            <p>


                                                <span class="text-muted">Expired On</span> 27-11-2024
                                            </p>

                                        </li>

                                    </ul>

                                    <h6 class="title">Last Payment</h6>

                                    <ul class="row">

                                        <li class="col-sm-4">

                                            <p>Change Plan 29-08-2024</p>

                                        </li>

                                        <li class="col-sm-4">

                                            <p><span class="amount">£2000.00 </span>
                                                <span class="badge bg-success-light">Paid</span>
                                            </p>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>



                        <h5 class="mb-4">Subscribed Details</h5>

                        <div class="card transaction-table mb-0">

                            <div class="card-body">

                                <div class="table-responsive">

                                    <table class="table table-center mb-0 no-footer">

                                        <thead>

                                            <tr>

                                                <th>Plan</th>

                                                <th>Start Date</th>

                                                <th>End Date</th>

                                                <th>Amount</th>

                                                <th>Status</th>

                                            </tr>

                                        </thead>

                                        <tbody>



                                            <tr role="row">

                                                <td>3 Months Subscription</td>

                                                <td>29-08-2024</td>

                                                <td>27-11-2024</td>

                                                <td>£2000.00</td>

                                                <td>
                                                    <span class="badge bg-success-light">Paid</span>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>


                    </div>
                </div>

            </div>

        </div>




 
    <x-footer>

    </x-footer>


    <x-scripts>

    </x-scripts>






</body>



</html>
