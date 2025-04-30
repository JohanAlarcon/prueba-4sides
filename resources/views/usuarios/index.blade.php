@extends('layouts.app')

@section('content')


    <div class="row">

        @if (session('message'))
            <div class="col-sm-12">

                <div class="alert alert-success" align="center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><i
                        class="fas fa-check-circle"></i>&emsp;{{ session('message') }}
                </div>

            </div>
        @endif

        @if ($errors->any())
            <div class="col-sm-12">

                <div class="alert alert-danger" align="center">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            </div>
        @endif


    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Lista de usuarios</h3>
            <div class="ms-auto">
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i> Nuevo
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Alias</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Foto</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $u)
                            <tr>
                                <td>{{ $u->idUsuario }}</td>
                                <td>{{ $u->usuarioAlias }}</td>
                                <td>{{ $u->usuarioNombre }}</td>
                                <td>{{ $u->usuarioEmail }}</td>
                                <td>
                                    <span class="badge bg-{{ $u->usuarioEstado === 'Activo' ? 'success' : 'secondary' }}">
                                        {{ $u->usuarioEstado }}
                                    </span>
                                </td>
                                <td>
                                    @if ($u->foto)
                                        <img src="{{ asset('storage/' . $u->foto) }}" class="img-thumbnail"
                                            style="height:40px">
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('usuarios.show', $u) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('usuarios.edit', $u) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"
                                        onclick="eliminar('eliminar-{{ $u->idUsuario }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form action="{{ route('usuarios.destroy', $u) }}" method="POST"
                                        id="eliminar-{{ $u->idUsuario }}" class="d-inline-block">
                                        @csrf @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-3">Sin registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($usuarios->hasPages())
            <div class="card-footer">{{ $usuarios->links() }}</div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function eliminar(id_form) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "No podrás recuperar este registro",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                if (result.value) {
                    Swal.fire({
                        title: 'Eliminando...',
                        text: 'Por favor, espere.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    const form = document.getElementById(id_form);
                    form.submit();
                }
            })

        }
    </script>
