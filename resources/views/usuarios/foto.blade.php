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

<h3>Adjuntar foto a {{ $usuario->usuarioAlias }}</h3>

<form method="POST" action="{{ route('usuarios.foto.update',$usuario) }}"
      enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="foto" class="form-label">Seleccionar imagen</label>
        <input class="form-control" type="file" name="foto" id="foto" accept="image/*">
    </div>

    {{-- Preview --}}
    <div class="mb-3">
        <img id="preview" style="max-height:200px;">
    </div>

    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('usuarios.show',$usuario) }}" class="btn btn-secondary">Cancelar</a>
</form>

@push('scripts')
<script>
document.getElementById('foto').addEventListener('change', e=>{
   const [file] = e.target.files;
   if (file) document.getElementById('preview').src = URL.createObjectURL(file);
});
</script>
@endpush
@endsection