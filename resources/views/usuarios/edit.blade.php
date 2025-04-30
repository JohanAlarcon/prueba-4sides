@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Editar usuario</h3>
        </div>

        <form action="{{ route('usuarios.update', $usuario) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="card-body">
                {{-- Alias --}}
                <div class="mb-3">
                    <label class="form-label">Alias *</label>
                    <input type="text" name="usuarioAlias" class="form-control"
                        value="{{ old('usuarioAlias', $usuario->usuarioAlias) }}" required>
                    <x-input-error :messages="$errors->get('usuarioAlias')" />
                </div>

                {{-- Nombre --}}
                <div class="mb-3">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="usuarioNombre" class="form-control"
                        value="{{ old('usuarioNombre', $usuario->usuarioNombre) }}" required>
                    <x-input-error :messages="$errors->get('usuarioNombre')" />
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email *</label>
                    <input type="email" name="usuarioEmail" class="form-control"
                        value="{{ old('usuarioEmail', $usuario->usuarioEmail) }}" required>
                    <x-input-error :messages="$errors->get('usuarioEmail')" />
                </div>

                {{-- Estado --}}
                <div class="mb-3">
                    <label class="form-label">Estado *</label>
                    <select name="usuarioEstado" class="form-select" required>
                        <option value="Activo" @selected(old('usuarioEstado', $usuario->usuarioEstado) === 'Activo')>Activo</option>
                        <option value="Inactivo" @selected(old('usuarioEstado', $usuario->usuarioEstado) === 'Inactivo')>Inactivo</option>
                    </select>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input class="form-control" type="file" name="foto" id="foto" accept="image/*">
                    <x-input-error :messages="$errors->get('foto')" />
                </div>

                <div class="mb-3">
                    @if ($usuario->foto)
                        <img id="preview" src="{{ asset('storage/' . $usuario->foto) }}" style="max-height:200px;">
                    @else
                        <img id="preview" style="max-height:200px;">
                    @endif
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('foto').addEventListener('change', e => {
            const [file] = e.target.files;
            if (file) document.getElementById('preview').src = URL.createObjectURL(file);
        });
    </script>
@endpush
