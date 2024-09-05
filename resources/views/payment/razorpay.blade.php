
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Razorpay Payment Gateway Integration</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   <body>
    <?php
    $feeAmount =  $studentFee->is_coupan_code_applied ? $studentFee->fee_amount : 750; 

    ?>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Razorpay Payment Gateway Integration <br>
                                Do not press the back button until the payment is successful.
                            </div>
                            <div class="card-body text-center">
                                <form action="{{route('razorpay.payment.store')}}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$feeAmount}}00"
                                        data-currency="INR"
                                        data-buttontext="Pay {{$feeAmount}} INR" data-name="Programming Solutions"
                                        data-description="Razorpay"
                                        data-image="https://cybercollege.info/wp-content/uploads/2021/06/cropped-logo.png"
                                        data-prefill.name="name" data-prefill.email="email"
                                        data-theme.color="#F37254"></script>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
