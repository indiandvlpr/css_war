@php
  $user = \Auth::user();
@endphp

<!DOCTYPE html>
<html>

<head>
  <title>browser-amd-editor</title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik+Gemstones&display=swap');

    * {
      margin: 0;
      padding: 0;
    }

    body,
    html {
      height: 100vh;
      width: 100vw;
      overflow: hidden;
      position: relative;
    }


    .main_container {
      width: 100%;
      height: 100%;
      background-color: #1e1e1e;
    }

    .main_container .nav {
      height: 60px;
      width: 100%;
      border-bottom: 2px solid #4e4d4d;
      position: relative;
    }

    .nav .nav_logo {
      color: white;
      font-family: 'Rubik Gemstones', cursive;
      font-size: 30px;
      /* font-weight: bold; */

      height: 60px;
      margin-left: 20px;
      display: grid;
      place-items: center;
      width: 150px;
      color: rgb(231, 89, 89);
      cursor: pointer;
    }

    .nav_logo span {
      font-size: 15px;
      font-family: serif;
      letter-spacing: 3px;
      transform: translateY(-6px);
    }

    .nav_menu {
      position: absolute;
      right: 10px;
      color: white;
      top: 0;
      display: flex;
      height: 60px;
      align-items: center;
      column-gap: 10px;
    }

    .nav_menu .logout {
      color: rgb(228, 77, 77);
      text-transform: uppercase;
      text-decoration: none;
      font-weight: bold;
    }

    /* buttons */

    [class*="btn_"] {
      border-radius: 5px;
      padding: 0 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      column-gap: 10px;
      position: relative;
      height: 40px;
      overflow: hidden;
      cursor: pointer;
      width: max-content;
    }


    button[class*="btn_"] {
      border: none;

    }

    button[class*="btn_"]:focus {
      outline: none;
    }

    a[class*="btn_"] {
      color: white;
    }

    [class*="btn_"]:not([class*="btn_simple"]):after {
      position: absolute;
      content: '';
      width: 20px;
      height: 20px;
      background: #fff;
      border-radius: 50%;
      opacity: .5;
      left: 0;
      top: 40px;
      margin-left: -20px;
      transition: all .5s ease-in;
    }

    [class*="btn_"]:not([class="btn_simple"]):hover::after {
      width: 200%;
      height: 200px;
      margin-top: -100%;
      opacity: 0;
    }

    .btn_primary {
      background-color: #4338CA;
      color: white;
      font-size: 19px;
      font-weight: bold;
      text-transform: uppercase;
      /* margin-top: 10px; */
    }

    .preview_img {
      color: #717075;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      cursor: pointer;
    }
  </style>



</head>

<body>


  <div class="modal modal-lg fade" id="previewImg" tabindex="-1" aria-labelledby="previewImgLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="previewImgLabel">Preview Image</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body " style="display: grid; place-items: center;">
          <div id="carouselExampleControls" style="height:500px ; width: 100%;display: flex;place-items: center;"
            class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./image.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./image.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./image.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="main_container">
    <div class="nav">
      <div class="nav_logo">CSS_WAR <span>Design the web</span></div>
      <div class="nav_logo" style="display:flex">
        <img src="/society_logo.png" height="50" alt="">
        <span style="font-weight:bold;color:white !important;">DATAZOIC</span>
      </div>
      <div class="nav_menu">
        <div class="preview_img" data-bs-toggle="modal" data-bs-target="#previewImg">Preview Images</div>
        <div class="save_code btn_primary" onclick="submitCode()">Submit Code</div>
        <a href="/logout" class="logout">Logout</a>
      </div>
    </div>
    <div style="width:100%;display:flex;flex-direction:row; height: calc(100vh - 60px);">
      <div class="code"
        style="display:flex;flex-direction:column;height:calc(100vh - 60px);min-width: min(100%,500px);">
        <div class="html" id="html" style="height:calc(50vh - 30px);border-bottom: 2px solid rgb(61, 58, 58);">
        </div>
        <div class="css" id="css" style="height:calc(50vh - 30px);"></div>
      </div>
      <iframe class="output" style="width:100% ;background: white;" id="output"></iframe>
    </div>
  </div>





  <!-- OR ANY OTHER AMD LOADER HERE INSTEAD OF loader.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="./node_modules/monaco-editor/min/vs/loader.js"></script>
  <script src="https://unpkg.com/emmet-monaco-es/dist/emmet-monaco.min.js"></script>

  <script>
    require.config({
      paths: {
        vs: '../node_modules/monaco-editor/min/vs'
      }
    });

    require(['vs/editor/editor.main'], function() {
      emmetMonaco.emmetHTML(monaco)
      emmetMonaco.emmetCSS(monaco)
      var editorHTML = monaco.editor.create(document.getElementById('html'), {
        value: `{!! $user->htmlCode ??
            '<div class="csswar_root">
                                    <!-- Write code here --></div>' !!}`,
        language: 'html',
        theme: "vs-dark",
        // formatOnType: true
      });
      var editorCSS = monaco.editor.create(document.getElementById('css'), {
        value: `{!! $user->cssCode !!}`,
        language: 'css',
        theme: "vs-dark",
        // formatOnType: true
      });

      window.editorCSS = editorCSS;
      window.editorHTML = editorHTML;

    });




    function updateOutput(html, css) {
      var code = document.getElementById("output").contentWindow.document;
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




    setInterval(() => {

      // if (window.localStorage.getItem("cssCode") === null || window.localStorage.getItem("htmlCode") === null) {
      // }

      if (window.localStorage.getItem("cssCode") === editorCSS.getValue() &&
        window.localStorage.getItem("htmlCode") === editorHTML.getValue()) {
        return
      }
      window.localStorage.setItem("htmlCode", editorHTML.getValue());
      window.localStorage.setItem("cssCode", editorCSS.getValue());

      updateOutput(window.localStorage.getItem("htmlCode"), window.localStorage.getItem("cssCode"));
    }, 1000);

    updateOutput(window.localStorage.getItem("htmlCode"), window.localStorage.getItem("cssCode"));



    function submitCode() {
      let htmlCode = editorHTML.getValue();
      let cssCode = editorCSS.getValue();

      try {
        fetch('{{ route('submitCode') }}', {
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
            'Accept': "application/json"
          },
          body: JSON.stringify({
            htmlCode,
            cssCode,
            "_token": "{{ csrf_token() }}"
          })
        }).then((res) => res.json()).then(res => {
          if (res?.success) {
            swal("Your Code is Saved Successfully!", "", "success");

          }
        });
      } catch (e) {
        consol.log("Error:");
      }
    }


    document.addEventListener('keydown', function(event) {
      if (event.ctrlKey && event.key === 's') {
        event.preventDefault();
        submitCode();
      }
    });
  </script>
</body>

</html>
