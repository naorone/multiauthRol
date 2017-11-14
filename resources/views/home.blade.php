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

                    You are logged in!

                    <a href="{{ url('/nuevaVista') }}">Otra vista</a><br/>


                        <?php

                        print_r(session()->all());?> <br/><?php

                        echo "Nombre de sesion: ". Session::getName(). "<br/>";
                        echo "Id Sesion: ". Session::getId();
                        ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
