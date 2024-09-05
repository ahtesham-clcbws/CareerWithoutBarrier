<html>

<head>

  <link rel="stylesheet" href="{{asset('css/f1font-awesome.min.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="shortcut icon" href="{{ asset('website/assets/images/fav-icon.png') }}" type="image/x-icon">
  <script src="{{ asset('website/assets/js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('website/assets/js/custom.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  <title>Corporate Login</title>
</head>

<body>

  <section class="vh-100" style="background-color: #4629cc;">
    <div class="container p-4">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">

                <img src="https://www.21kschool.com/blog/wp-content/uploads/2021/01/rptgtpxd-1396254731.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height:100%" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">
                        <img src="{{ asset('website/assets/images/fav-icon.png') }}" alt="login form" class="img-thumnails" style="border-radius: 1rem 0 0 1rem;height:100%" />
                      </span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Email ID</label>
                      <input type="text" name="email" placeholder="Email ID" title="Please enter valid Email ID" class="form-control" required="" value="{{old('email')}}">
                      @error('email')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <div style="display: flex;">
                        <input type="password" name="password" placeholder="Password *" class="form-control" required="" value="{{old('password')}}">
                        <i toggle="#password-field" style="cursor: pointer;margin-left: -31px;margin-top: 10px;" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
                      </div>
                      @error('password')
                      <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-md btn-block" style="width: 100%;background: #1616c9;font-weight: 700;" type="submit">Login</button>
                    </div>

                    <a class="small text-muted" href="{{route('corporate.forgotpassword')}}">Forgot password?</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </section>
  <script>
      function success(msg) {
        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",

        }
        toastr.success(msg);
      }

      function error(msg) {
        toastr.options = {
          "closeButton": false,
          "debug": true,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
    
        }
        toastr.error(msg)
      }

      //       new DataTable('.datatablecl', {
      //     responsive: true
      // });
    </script>
    @stack('custom-scripts')
    <x-message />
</body>

</html>