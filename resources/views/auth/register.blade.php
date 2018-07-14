@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" enctype='multipart/form-data' method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <!-- name field -->
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- surname field -->
                            <div class="form-group">
                                <label for="surname" class="col-md-4 control-label">Second name</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autofocus>
                                </div>
                            </div>
                            <!-- nickname field -->
                            <div class="form-group">
                                <label for="nickname" class="col-md-4 control-label">Nickname</label>

                                <div class="col-md-6">
                                    <input id="nickname" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>
                                </div>
                            </div>
                            <!-- phone number field -->
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone number</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
                                </div>
                            </div>
                            <!-- sex field -->
                            <div class="form-group">
                                <label for="sex" class="col-md-4 control-label">Sex</label>
                                <label class='form__inline-label' for="male">Male</label>
                                <input class='form__inline-input' name='sex' id='male' value="male" type="radio">
                                <label class='form__inline-label' for="female">Female</label>
                                <input class='form__inline-input' name='sex' id='female' value="female" type="radio">
                            </div>
                            <!-- avatar field -->
                            <div class="form-group">
                                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                            </div>

                            <!-- email field -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- password field -->
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <!-- email_subscribe field -->
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class='form__inline-label' for="showPhone">I agree to receive emails</label>
                                    <input class='form__inline-input' id='showPhone' name='showPhone' type="checkbox">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
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