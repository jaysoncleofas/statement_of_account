<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <style media="print">
        body{
            font-family: calibri;
        }
        @media print {
            table thead tr.highlighted > th {
                background-color: #f15b51 !important;
            }
        }
    </style>    

    <title>NEXTVATION SOFTWARE SOLUTIONS</title>
</head>

<body>
    <div class="container mb-5">
        <a href="javascript:void(0)" id="savepdf" class="btn btn-primary float-right mt-1">Save as PDF</a>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="{{ asset('img/nextvation-logo.png') }}" class="img-fluid" alt="" style="width:80%;">   
                <!-- <p>
                    <strong>AS OF 08/10/2018</strong> <br>
                    Ref # 121212
                </p> -->
            </div>
            <div class="col-md-6 text-center">
                <p>
                    <strong>NEXTVATION SOFTWARE SOLUTIONS</strong> <br>
                    Suite 105, Clark Welcome Center Office Suites, <br>
                    Berthaphil VIII Compound, SCTEXT Road Clark Freeport Zone <br>
                    (045) 458-4600 / (045) 499 8473 <br>
                    Website: www.nextvation.com
                </p>
            </div>
            <h1 class="font-weight-bold text-center">STATEMENT OF ACCOUNT</h1>
        </div>

        <div class="row p-3 mb-1 mx-0" style="background:#5598cd;">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-3 text-right">
                        <p class="text-white">Name:</p>
                    </div>
                        <div class="col-md-9" style="background:white;border-top-left-radius:10px;border-top-right-radius:10px;">
                        <p>
                            {{ $statement->client->name }}
                        </p>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-3 text-right">
                        <p class="text-white">Billing Address:</p>
                    </div>
                    <div class="col-md-9" style="background:white;">
                        <p>
                            {{ $statement->client->address }}
                        </p>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-3 text-right">
                        <p class="text-white">Contact No:</p>
                    </div>
                    <div class="col-md-9 pb-3" style="background:white;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                        <p>
                            {{ $statement->client->contact }}    
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6 text-right">
                        <p class="text-white">Account Type:</p>
                    </div>
                    <div class="col-md-6" style="background:white;border-top-left-radius:10px;border-top-right-radius:10px;">
                        <p>
                            {{ $statement->accountType }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-right">
                        <p class="text-white">Total Amount Due:</p>
                    </div>
                    <div class="col-md-6" style="background:white;">
                        <p>
                            {{ number_format($statement->totalAmount, 2) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-right">
                        <p class="text-white">Minimum Amount Due:</p>
                    </div>
                    <div class="col-md-6" style="background:white;">
                        <p>
                            {{ number_format($statement->minimumAmount, 2) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-right">
                        <p class="text-white">Due Date:</p>
                    </div>
                    <div class="col-md-6" style="background:white;border-bottom-left-radius:10px;border-bottom-right-radius:10px;">
                        <p>
                            {{ date("m/j/Y",strtotime($statement->dueDate)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="text-center" style="background:#f15b51;color:white;">
                        <tr class="highlighted">
                            <th scope="col">Date</th>
                            <th scope="col">Particulars</th>
                            <th scope="col">Covered Date</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($statement->particulars as $particular)
                        <tr class="text-center">
                            <td>{{ date("m/d/Y",strtotime($particular->date)) }}</td>
                            <td>{{ $particular->description }}</td>
                            <td>{{ date("m/d/Y",strtotime($particular->fromDate)) }} to {{
                                date("m/d/Y",strtotime($particular->toDate)) }}</td>
                            <td>P {{ number_format($particular->balance, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>No data available</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <p class="mb-2"><strong>You may settle your bills at this channel listed below:</strong></p>
                <p class="mb-0">
                    <strong>Account Name:</strong> NEXTVATION SOFTWARE SOLUTIONS <br>
                    <strong>Account Number:</strong> 008778001624
                </p>
                <img src="{{ asset('img/bdo-logo.png') }}" class="img-fluid" style="width:6%;" alt="">    
                <p><i><strong>Note:</strong> Posting of payment is within 2-3 days after payment date.</i></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="border-radius:30px;border:1px solid #40ad96;background:#d9d9d9;padding: 4px 16px 30px">
                <p>Thank you for paying your monthly subscription fees promptly. We appreciate your efforts for keeping your account updated from time to time.</p>
                <p>Please examine the charges in your statement of account and advise our Billing Department of any discrepancy within 15 days from statement date, otherwise this statement of account will be considered correct.</p>
                <p class="text-center text-primary" ><u>billing@nextvation.com</u></p>
            </div>
            <div class="col-md-12">
                <p class="ml-4"><i>Please disregard this statement if payment has been made. Thank you.</i></p>
                <hr>
            </div>
        </div>

        <div class="row p-3" style="background;">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Name <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-9">
                        <p>
                            {{ $statement->client->name }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Billing Address <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-9">
                        <p>
                            {{ $statement->client->address }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Contact No <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-9">
                        <p>
                            {{ $statement->client->contact }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <p class="font-weight-bold">Received By <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-9">
                        <p>
                            ______________________________________ <br>
                            <span class="ml-3">Signature over Printed Name</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Account Type <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            {{ $statement->accountType }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Total Amount Due <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            {{ number_format($statement->totalAmount, 2) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Minimum Amount Due <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            {{ number_format($statement->minimumAmount, 2) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="font-weight-bold">Due Date <span class="float-right">:</span> </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            {{ date("m/j/Y", strtotime($statement->dueDate)) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script>
            $(document).ready( function () {
                $( "#savepdf" ).click(function() {
                    $('#savepdf').hide();
                    window.print();
                    $('#savepdf').show();
                });
            });
        </script>
</body>

</html>