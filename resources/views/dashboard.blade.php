@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido a la Aplicación de Gestión de Usuarios') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <p>¡Hola! <b>{{ Auth::user()->name }}</b></p>
                        <p>Nos complace darte la bienvenida a nuestro sistema de gestión de usuarios. Este sistema está diseñado para facilitar la administración de usuarios en tu organización.</p>
                        <p>Con nuestra aplicación, puedes:</p>
                        <ul>
                            <li>Registrar nuevos usuarios</li>
                            <li>Actualizar la información de los usuarios existentes.</li>
                            <li>Consultar la lista de usuarios.</li>
                            <li>Eliminar registros de usuarios cuando sea necesario.</li>
                        </ul>
                        <p>Esperamos que esta herramienta te sea de gran ayuda en la gestión eficiente de tu personal. Si tienes alguna duda o necesitas asistencia, no dudes en contactarnos.</p>
                        <p>¡Gracias por elegir nuestra aplicación!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
