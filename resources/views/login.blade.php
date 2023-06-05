<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="{{asset("css/login.css")}}">
  <style>
    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Montserrat", sans-serif;
        font-size: 12px;
        background-image: url("{{ asset('assets/background.jpg') }}");
        background-size: cover;
        background-position: center;
        color: #a0a5a8;
    }
    body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("{{ asset('assets/background.jpg') }}");
    background-size: cover;
    background-position: center;
    filter: blur(7px);
}
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  </head>
  <body>
 
    <div class="main">
      <div class="container a-container" id="a-container">
        <img class="user"src="{{asset('assets/usuario.png')}}">
        <form class="form" id="a-form" method="post" action="{{url('api/login')}}">
          @csrf
          <h2 class="form_title title">Iniciar Sesión</h2>
          
          <input class="form__input" type="email" placeholder="Correo" name="email" required >
          <div class="input-container">
            <input class="form__input" type="password" placeholder="Contraseña" name="password" id="password" required>
            <button class="show-password" type="button" onclick="showPassword()" >
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <script>
            function showPassword() {
              var passwordInput = document.getElementById("password");
              if (passwordInput.type === "password") {
                passwordInput.type = "text";
              } else {
                passwordInput.type = "password";
              }
            }
          </script>
          <button class="form__button button submit">Iniciar Sesión</button>
        </form>
      </div>

      <div class="switch" id="switch-cnt">
        <div class="switch__container" id="switch-c1">
          <div class="header">
            <img class="image" src="{{asset('assets/vallesur_logo.png')}}">
            <h2 class="switch__title title">Hotel Valle Sur</h2>
          </div>
          <h2 class="switch__title title">Bienvenido de nuevo!</h2>
          <p class="switch__description description">Gracias por trabajar con nosotros</p>
          <div class="footer">
            @if (session('error'))
                <div class="error">
                    Error: {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="status">
                    Alerta: {{ session('status') }}
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
</body>

</html>
