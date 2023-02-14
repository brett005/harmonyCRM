<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Loding font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css')}}">

    <title>Se Connecter</title>
</head>
<body>

<!-- Backgrounds -->

<div id="login-bg" class="container-fluid">

    <div class="bg-img"></div>
    <div class="bg-color"></div>
</div>

<!-- End Backgrounds -->

<div class="container" id="login">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="login">

                <h1>Se Connecter</h1>

                <!-- Loging form -->
                <form method="POST" action="{{  route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" id="name" aria-describedby="emailHelp" placeholder="Utilisateur ">
                        @error('user')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe " name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check">

                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <label class="form-check-label" for="exampleCheck1">Souviens-toi de moi </label>

                        <label class="forgot-password"><a href="#">Mot de passe oublié? <a></label>

                    </div>

                    <br>
                    <button type="submit" class="btn btn-lg btn-block btn-success">se connecter</button>
                </form>
                <!-- End Loging form -->

            </div>
        </div>
    </div>
</div>


</body>
</html>
