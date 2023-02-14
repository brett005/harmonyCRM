 @extends('Agent.layouts.login')
@section('title')
    Login
@endsection
@section('content')
<style type="text/css">
    .alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    }
    .alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    }
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
</style>

<div class="container-fluid ">
    <div class="container ">
        <div class="row ">
            <div class="col-sm-10 login-box">
                <div class="row">
                    <div class="col-lg-8 col-md-7 log-det">
                        <div class="row">
                            <p class="small-info">     
                                <span class="login100-form-title">
                                    <a href="" target="_blank">
                                        <i class="fas fa-user"></i>
                                    </a>
                                </span>
                            </p>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success text-center" id="msg" >
                            {{ session()->get('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger text-center" id="msg">
                            {{ session()->get('error') }}
                            </div>
                        @endif
                    <form method="POST" action="{{  route('login.custom') }}">
                        @csrf
                        <div class="text-box-cont">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control"  placeholder="Agent" name="user" required id="name" aria-describedby="basic-addon1">
                                @if ($errors->has('user'))
                               <span class="text-danger">{{ $errors->first('user') }}</span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Mot de passe" name="pass" aria-label="passeword" aria-describedby="basic-addon1">
                                @if ($errors->has('pass'))
                                <span class="text-danger">{{ $errors->first('pass') }}</span>
                               @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-users"></i></span>
                                </div>
                                <select class="form-control login100-form-btn" name="campaign" required>
                                    <option selected value=""> -- Choisir la compagne --</option>
                                    @isset($campaigns)
                                    @foreach($campaigns as $camp)
                                        <option value="{{$camp->campaign_id}}">{{$camp->campaign_id.' - '.$camp->campaign_name}}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="row">
                                <p class="forget-p"></p>
                            </div>
                            <div class="input-group center mb-3">
                                <button class="btn btn-round" style="background: #144659;color: white;">Se connecter</button>
                       
                            </div>    
                        </div>
                    </form>
                    <br>
                    <!-- <div class="col-md-12">
                        <div class="wrap-input100 m-b-16">
                           <a class="nv-login-submit login100-form-btn" href="#">Administration</a>
                        </div>
                    </div> -->
                        


                    </div>
                    <div class="col-lg-4 col-md-5 box-de">
                        <div class="ditk-inf">
                            <img src="{{asset('Agent/images/capital.jpg')}}">
                            <h2 class="w-100"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- <div class="container-login100">
    <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
        @if(session()->has('success'))
            <div class="alert alert-success text-center" id="msg" >
            {{ session()->get('success') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger text-center" id="msg">
            {{ session()->get('error') }}
            </div>
        @endif
        <form class="login100-form flex-sb flex-w" method="POST" action="{{ route('login.custom') }}">
            <span class="login100-form-title">
                <a href="" target="_blank">
                    <i class="fas fa-user"></i>
                </a>
            </span>
            <div class="wrap-input100 m-b-16">
                <input class="input100" type="text" placeholder="Agent" name="user" required>
                <span class="focus-input100"></span>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
            </div>
            <div class="wrap-input100 m-b-16">
                <input class="input100"  type="password" placeholder="Mot de passe" name="pass">
                <span class="focus-input100"></span>
                @if ($errors->has('pass'))
                    <span class="text-danger">{{ $errors->first('pass') }}</span>
                @endif
            </div>
            <div class="wrap-input100 m-b-16 text-center">
                <select class="form-control login100-form-btn text-center" name="campaign" required>
                    <option selected value=""> -- Choisir la compagne --</option>
                    @isset($campaigns)
                    @foreach($campaigns as $camp)
                        <option value="{{$camp->campaign_id}}">{{$camp->campaign_id.' - '.$camp->campaign_name}}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div class="wrap-input100 m-b-16">
                <input type="submit" class="nv-login-submit login100-form-btn" name="submit" value="Se Connecter">
            </div>
            <img class="fit-picture" src="{{asset('images/aa.png')}}" alt="HarmonieCrm">
            
        </form><br>
        <div class="col-md-12">
            <div class="wrap-input100 m-b-16">
               <a class="nv-login-submit login100-form-btn" href="#">Administration</a>
            </div>
        </div>
    </div>
</div> -->
@endsection



