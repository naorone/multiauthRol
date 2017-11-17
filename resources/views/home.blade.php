@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @switch(Auth::user()->role())

                        @case('escritor')
                            <h1>Acceso para escritores</h1>
                        @break

                        @case('lector')
                            <h1>Acceso para lectores</h1>
                        @break

                        @case('role')
                            <h1>Acceso para usuarios PREMIUM</h1>
                        @break

                        @case('user')
                            <h1>Acceso para usuarios</h1>
                        @break

                    @endswitch


                        You are logged in!

                    <a href="{{ url('/nuevaVista') }}">Otra vista</a><br/>


                        <?php
                        echo "Nombre de sesion: ". Session::getName(). "<br/>";
                        echo "Id Sesion: ". Session::getId();
                        ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
