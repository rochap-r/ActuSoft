<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>actu-soft.com | Réinitialiser le mot de passe</title>
    <link rel="icon" href="{{ asset('logo/icone.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('auth/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/my-login.css')}}">
</head>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">

                <div class="cardx fat">
                    <div class="card-body">
                        <h4 class="card-title">Réinitialiser le mot de passe</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token')}}">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Adresse e-mail" value="{{ old('email', $request->email) }}">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">nouveau mot de passe</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Entrez un nouveau mot de passe">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirmez le mot de passe</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Entrez le mot de passe de confirmation">
                                <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Réinitialiser le mot de passe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>
                                    <small class="block">&copy;
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                        Tous les droits sont réservés | créé avec
                                        <i class="icon-heart text-danger" aria-hidden="true"></i>
                                        par
                                        <a href="{{ route('about')}}" target="_blank" class="text-primary">actu-soft</a>
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('blog_template/js/jquery.min.js') }}"></script>
<script src="{{ asset('auth/bootstrap/js/popper.js')}}"></script>
<script src="{{ asset('auth/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ asset('auth/js/my-login.js')}}"></script>
</body>
</html>
