@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <h2>Тестирование приложения</h2>
                    <h3>Автризация через Github</h3>

                    <p>
                        Приложение необходимо развернуть в виртуальном домене
                        с адресом <code>http://dz4.loc/</code> иначе просто Github откажет в авторизациии
                    </p>
                    <h3>Пользователи</h3>
                    <p>Для удобства тестирования все пользователи имеют пароль <code>123456789</code></p>
                    <p>Существует всего один пользователь с правами админа. </p>
                    <p>Email:: <code>mfc2005@ukr.net</code> Pass::<code>123456789</code></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
