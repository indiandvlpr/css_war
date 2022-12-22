<!doctype html>
<html lang="en">



@php
  // $user = \Auth::user();
  // dd($user);
@endphp



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | CSS_WAR</title>
  <link rel="stylesheet" href="./assets/css/vendor/bootstrap.css">
  <link rel="stylesheet" href="./assets/css/default_main.css">
  <link rel="stylesheet" href="./assets/css/page_home.css">
  <style>
    .btn_verify {
      border: 1px solid #acacac;
      color: var(--color_black);
      opacity: .8;
    }

    .btn_verify:active {
      transform: scale(.9);
    }
  </style>

  {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
</head>

<body>

  <div class="container d-flex justify-content-center align-items-center" style="padding-top: 30px;min-height:500px">

    <form style="background: white;" class="shadow custom_form form_border" method="POST"
      action="{{ route('register_user') }}" style="height: max-content;width:420px">
      @csrf
      <div class="d-flex mb-3 justify-content-center">
        <a href="/" style="color:#FF2525">
          <div style="font-size:30px;font-weight:bold;">CSS_WAR </div>
          <br>
        </a>
      </div>

      <div class="heading mb-4">Register</div>
      <div class="row">
        <div class="my-2 col">
          <label for="first_name">First Name: <span class="text-danger">*</span></label>
          <div class="input_box ps-2">
            <input type="text" value="" placeholder="E.g. Roshan" name="first_name">
          </div>
        </div>
        <div class="my-2 col">
          <label for="last_name">Last Name: <span class="text-danger">*</span></label>
          <div class="input_box ps-2">
            <input type="text" value=""" placeholder=" E.g. Kumar" name="last_name">
          </div>
        </div>
      </div>


      <div class="my-2">
        <label for="phone">Phone no. <span class="text-danger">*</span></label>
        <div class="input_box px-2">
          <input type="text" id="phone" value="" placeholder="E.g. 87997 XXXXX " name="phone">
        </div>
      </div>

      <div class="my-2">
        <label for="email">Email. <span class="text-danger">*</span></label>
        <div class="input_box px-2">
          <input type="text" id="email" value="" placeholder="E.g dvlprroshan@gmail.com" name="email">
        </div>
      </div>


      <div class="my-2">
        <label for="course">Course / Branch / Year. <span class="text-danger">*</span></label>
        <div class="input_box px-2">
          <input type="text" id="course" value="" placeholder="E.g Btech/AIDS/2nd" name="course">
        </div>
      </div>

      <div class="my-2">
        <label for="password">Password: <span class="text-danger">*</span></label>
        <div class="input_box ps-2">
          <input type="password" placeholder="Password:" name="password">
        </div>
      </div>

      <div class="my-2">
        <label for="password_confirmation">Conform Password: <span class="text-danger">*</span></label>
        <div class="input_box ps-2">
          <input type="password" placeholder="Confirm password:" name="password_confirmation">
        </div>
      </div>

      {{-- <div class="g-recaptcha" data-sitekey="6LezgYciAAAAAE3cRbjNPoeQg048IsI3alDtAiAx" data-size="normal"
                data-theme="light" id="recaptcha-element"></div> --}}


      <button class=" w-100 btn_primary font-weight-bolder mt-4 font-weight-bold"
        style="background-color: #FFE53B;background-image: linear-gradient(147deg, #FFE53B 0%, #FF2525 74%);">Register</button>

    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./assets/js/vendor/proper.js"></script>
  <script src="./assets/js/vendor/typed.js"></script>
  <script src="./assets/js/vendor/select2.js"></script>
  <script src="./assets/js/vendor/swal.js"></script>
  <script src="./assets/js/vendor/moment.js"></script>

</body>

</html>
