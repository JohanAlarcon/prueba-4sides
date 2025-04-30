@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="mb-0">Nuevo usuario</h3></div>

    <form action="{{ route('usuarios.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Alias *</label>
                <input type="text" name="usuarioAlias" class="form-control"
                       value="{{ old('usuarioAlias') }}" required>
                <x-input-error :messages="$errors->get('usuarioAlias')" />
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text" name="usuarioNombre" class="form-control"
                       value="{{ old('usuarioNombre') }}" required>
                <x-input-error :messages="$errors->get('usuarioNombre')" />
            </div>

            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" name="usuarioEmail" class="form-control"
                       value="{{ old('usuarioEmail') }}" required>
                <x-input-error :messages="$errors->get('usuarioEmail')" />
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Contraseña *</label>
                    <input type="password" name="usuarioPassword"
                           class="form-control" required>
                    <x-input-error :messages="$errors->get('usuarioPassword')" />
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Confirmar contraseña *</label>
                    <input type="password" name="usuarioPassword_confirmation"
                           class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Estado *</label>
                <select name="usuarioEstado" class="form-select" required>
                    <option value="Activo"   @selected(old('usuarioEstado')==='Activo')>Activo</option>
                    <option value="Inactivo" @selected(old('usuarioEstado')==='Inactivo')>Inactivo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Foto (opcional)</label>
                <input class="form-control" type="file" name="foto" id="foto" accept="image/*">
                <x-input-error :messages="$errors->get('foto')" />
            </div>

            <div class="mb-3">
                <img id="preview" style="max-height:200px;">
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('foto').addEventListener('change', e=>{
   const [file] = e.target.files;
   if (file) document.getElementById('preview').src = URL.createObjectURL(file);
});
</script>
@endpush
