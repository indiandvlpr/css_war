@php
  $users = \App\Models\User::all();
  
  $userCount = \App\Models\User::count();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script>
    function updateOutput(id, html, css) {
      var code = document.getElementById(id).contentWindow.document;
      code.open();
      code.writeln(`
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,
html {
    width: 100vw;
    height: 100vh;
    overflow: hidden;
}

body {
    display: grid;
    place-items: center;
    position: relative;
    background-color: rgb(147, 163, 253);
}


body>div.csswar_root {
    position: relative !important;
    width: 500px !important;
    min-width: 500px !important;
    background-color:white;
    height: 300px !important;
    overflow: hidden !important;
    box-shadow:
        0 2.8px 2.2px rgba(0, 0, 0, 0.034),
        0 6.7px 5.3px rgba(0, 0, 0, 0.048),
        0 12.5px 10px rgba(0, 0, 0, 0.06),
        0 22.3px 17.9px rgba(0, 0, 0, 0.072),
        0 41.8px 33.4px rgba(0, 0, 0, 0.086),
        0 100px 80px rgba(0, 0, 0, 0.12) !important;
    border-radius: 5px !important;
}

${css}

        </style>
</head>

<body>
    ${html}
</body>

</html>`);

      code.close();
    }
  </script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100vh;
      width: 100vw;
      position: relative;
    }

    body {
      overflow-x: hidden;
      display: grid;
      place-items: center;
    }

    .container {
      width: 100%;
      height: 100%;
      display: flex;
      flex-wrap: wrap;
      column-gap: 20px;
      row-gap: 20px;
      justify-content: space-evenly;
      margin-top: 100px;
    }

    .box {
      width: 500px;
      height: 300px;
      border-radius: 5px;
      box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
      position: relative;
      overflow: hidden;
      cursor: pointer;
      cursor: pointer;
    }

    .box .overlap {
        width: 100%;
        height: 100%;
        top: 0;
        position: absolute;
        color: white;
        background-color: rgba(11, 17, 37, 0.664);
        display: flex;
    }
    .box .overlap {

    }

    .box:hover {
      transform: scale(1.05);
      transition: .5s linear;
    }

    .box iframe {
      width: 100%;
      height: 100%;
    }
  </style>
</head>

<body>

  <div class="container">
    @foreach ($users as $user)
      <div class="box">
        <iframe id="{{ 'frame_' . $user->phone }}" frameborder="0"></iframe>

        @php
          $htmlCode = $user->htmlCode;
          $cssCode = $user->cssCode;
        @endphp

        <div class="overlap">
          <h1>{{ $user->first_name . ' ' . $user->last_name }}</h1>
        </div>

        <script>
          updateOutput('{{ 'frame_' . $user->phone }}', `{!! $htmlCode !!}`, `{!! $cssCode !!}`)
        </script>
      </div>
    @endforeach
  </div>






</body>

</html>
