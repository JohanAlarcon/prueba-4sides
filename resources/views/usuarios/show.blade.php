@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="mb-0">Detalle del usuario</h3>
        <div class="ms-auto">
            <a href="{{ route('usuarios.edit',$usuario) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Editar
            </a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary btn-sm">Volver</a>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 text-center">
                @if ($usuario->foto)
                    <img src="{{ asset('storage/'.$usuario->foto) }}" class="img-fluid rounded">
                @else
                    <img src="https://placehold.co/300x300?text=Sin+Foto" class="img-fluid rounded">
                @endif
                <a href="{{ route('usuarios.foto.edit',$usuario) }}"
                   class="btn btn-outline-primary btn-block mt-2">
                    <i class="fas fa-camera"></i> Adjuntar foto
                </a>
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr><th>Alias</th><td>{{ $usuario->usuarioAlias }}</td></tr>
                    <tr><th>Nombre</th><td>{{ $usuario->usuarioNombre }}</td></tr>
                    <tr><th>Email</th><td>{{ $usuario->usuarioEmail }}</td></tr>
                    <tr><th>Estado</th><td>{{ $usuario->usuarioEstado }}</td></tr>
                    <tr><th>Última conexión</th><td>{{ $usuario->usuarioUltimaConexión ? $usuario->usuarioUltimaConexión->format('d/m/Y H:i:s') : 'N/A' }}</td></tr>
                    <tr><th>Usuario conectado</th><td>{{ $usuario->usuarioConectado ? 'Sí' : 'No' }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
