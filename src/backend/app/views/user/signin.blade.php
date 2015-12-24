<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('user.title') }}</title>

    {{ HTML::style('frontend/vendor/kube/kube.min.css') }}
    {{ HTML::style('frontend/css/user.signin.css') }}
</head>

<body>

<div class="units-row">
    <div class="unit-centered unit-20">
        {{ Form::open(array('action' => 'UserController@auth', 'class' => 'forms'))}}
        @if (Session::has('error'))
        <div class="alert alert-danger error">{{ Session::get('error') }}</div>
        @endif
        <p>{{ Form::password('password', array('class' => 'width-100', 'placeholder' => trans('user.password'))) }}</p>
        <p>{{ Form::button(trans('user.signin.submit'), array('class' => 'btn btn-green width-100', 'type' => 'submit')) }}</p>
        {{ Form::close() }}
    </div>
</div>


</body>
</html>
