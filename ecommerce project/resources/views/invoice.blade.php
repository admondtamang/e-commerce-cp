<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .page-break {
            page-break-after: always;
        }

        .bg-grey {
            background: #F3F3F3;
        }

        .text-right {
            text-align: right;
        }

        .w-full {
            width: 100%;
        }

        .small-width {
            width: 15%;
        }

        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
</head>

<body class="bg-grey">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1" style="margin-top:20px; text-align: right">
                <div class="btn-group mb-4">
                    <button onclick="print()" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Save as PDF</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="">
                <div class="invoice">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>From:</h4>
                            <address>
                                      <strong>Bigheart Company</strong><br>
                                      Balaju, kathmandu - 44600<br>
                                      Phone: (416) 123 - 4567 <br>
                                      Email: company@bigheart.com
                                    </address>
                        </div>

                        <div class="col-md-6 text-right">
                            <img src="{{url('images/shop.png')}}" alt="logo">
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-7">
                            <h4>To:</h4>
                            <address>
                  <strong>Andre Madarang</strong><br>
                  <span>123 Cool St.</span><br>
                  <span>andre@andre.com</span>
                </address>
                        </div>

                        <div class="col-sm-5 text-right">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table invoice-table">
                            <thead style="background: #F5F5F5;">
                                <tr>
                                    <th>Item List</th>
                                    <th></th>
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Service</strong>
                                        <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                            perferendis doloribus, quaerat molestias est eum, adipisci dolorem nulla rerum
                                            voluptatibus.
                                        </p>
                                    </td>
                                    <td></td>
                                    <td class="text-right">$600</td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>Service</strong>
                                        <p>Description here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita
                                            perferendis doloribus, quaerat molestias est eum, adipisci dolorem nulla rerum
                                            voluptatibus.
                                        </p>
                                    </td>
                                    <td></td>
                                    <td class="text-right">$600</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /table-responsive -->

                    <table class="table invoice-total">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Total :</strong></td>
                                <td class="text-right small-width">$600</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="invbody-terms">
                                Thank you for your business. <br>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>