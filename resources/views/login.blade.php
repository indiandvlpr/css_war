<!doctype html>
<html lang="en">

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
</head>

<body>

  <div class="container d-flex justify-content-center align-items-center" style="padding-top: 30px;min-height:500px">

    <form style="background: white;" class="shadow custom_form form_border" method="POST"
      action="{{ route('login_user') }}" style="height: max-content;width:420px">
      @csrf
      <div class="d-flex mb-3 justify-content-center">
        <a href="/" style="color:#FF2525">
          <div style="font-size:30px;font-weight:bold;">CSS_WAR </div>
          <br>
        </a>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul style="margin:0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="heading mb-4">Login</div>

      <div class="my-2">
        <label for="email">Email.<span class="text-danger">*</span></label>
        <div class="input_box px-2">
          <input type="text" id="email" value="" placeholder="E.g dvlprroshan@gmail.com" name="email">
        </div>
      </div>

      <div class="my-2">
        <label for="password">Password: <span class="text-danger">*</span></label>
        <div class="input_box ps-2">
          <input type="password" placeholder="Password:" name="password">
        </div>
      </div>

      <button class=" w-100 btn_primary font-weight-bolder mt-4 font-weight-bold"
        style="background-color: #FFE53B;background-image: linear-gradient(147deg, #FFE53B 0%, #FF2525 74%);">login</button>
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
