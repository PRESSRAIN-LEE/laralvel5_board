@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
<<<<<<< HEAD
=======
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('영문이름') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name_en') ? ' is-invalid' : '' }}" name="name_en" value="{{ old('name_en') }}" required autofocus>

                                @if ($errors->has('name_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone1" class="col-md-4 col-form-label text-md-right">{{ __('연락처') }}</label>

                            <div class="col-md-2">
                                <input id="phone1" type="text" class="form-control{{ $errors->has('phone1') ? ' is-invalid' : '' }}" name="phone1" value="{{ old('phone1') }}" required autofocus>

                                @if ($errors->has('phone1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone1') }}</strong>
                                    </span>
                                @endif
                                
                                -
                                <input id="phone2" type="text" class="form-control{{ $errors->has('phone2') ? ' is-invalid' : '' }}" name="phone2" value="{{ old('phone2') }}" required autofocus>
                                -
                                <input id="phone3" type="text" class="form-control{{ $errors->has('phone3') ? ' is-invalid' : '' }}" name="phone3" value="{{ old('phone3') }}" required autofocus>

                                

                                {{-- @if ($errors->has('phone2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('phone3'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone3') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
