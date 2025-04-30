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
        <div class="card-header">
            <h3 class="mb-0">Mi perfil</h3>
        </div>

        <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="card-body">
                {{-- Alias --}}
                <div class="mb-3">
                    <label class="form-label">Alias *</label>
                    <input type="text" name="usuarioAlias" class="form-control"
                        value="{{ old('usuarioAlias', $user->usuarioAlias) }}" required>
                    <x-input-error :messages="$errors->get('usuarioAlias')" />
                </div>

                {{-- Nombre --}}
                <div class="mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="usuarioNombre" class="form-control"
                        value="{{ old('usuarioNombre', $user->usuarioNombre) }}" required>
                    <x-input-error :messages="$errors->get('usuarioNombre')" />
                </div>

                {{-- Correo --}}
                <div class="mb-3">
                    <label class="form-label">Correo electrónico *</label>
                    <input type="email" name="usuarioEmail" class="form-control"
                        value="{{ old('usuarioEmail', $user->usuarioEmail) }}" required>
                    <x-input-error :messages="$errors->get('usuarioEmail')" />
                </div>

                {{-- Nueva contraseña --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control">
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>

                {{-- Foto + preview --}}
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto" id="foto" accept="image/*">
                    <x-input-error :messages="$errors->get('foto')" />

                    <div class="mt-3">
                        <img id="preview"
                            src="{{ $user->foto ? asset('storage/' . $user->foto) : 'https://placehold.co/250x250?text=Sin+Imagen' }}"
                            class="img-thumbnail" style="max-height: 250px;">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success"><i class="fas fa-save"></i> Guardar cambios</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', e => {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];

            preview.src = file ? URL.createObjectURL(file) :
                '{{ $user->foto ? asset('storage/' . $user->foto) : 'https://placehold.co/250x250?text=Sin+Imagen' }}';
        });
    </script>
@endpush
