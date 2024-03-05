@extends('Admin.base')

@section('title', 'Edit Game')

@section('contenido')
    <h2>.</h2>
    <form action="{{ url('admin/'.$producto->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-medium text-left">Edit Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-4">
                        <label for="Nombre" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" maxlength="60" required value="{{ old('Nombre', $producto->Nombre) }}">
                    </div>
                    <div class="md-form mb-4">
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="Precio" name="Precio" maxlength="60" required value="{{ old('Precio', $producto->Precio) }}">
                    </div>
                    <div class="md-form mb-4">
                        <label for="Genero" class="form-label">Género</label>
                        <select class="form-select" id="Genero" name="Genero" required>
                            <option value="H" {{ old('Genero', $producto->Genero) == 'H' ? 'selected' : '' }}>Hombre</option>
                            <option value="M" {{ old('Genero', $producto->Genero) == 'M' ? 'selected' : '' }}>Mujer</option>
                        </select>
                    </div>
                    <div class="md-form mb-4">
                        <label for="Talla" class="form-label">Talla</label>
                        <select class="form-select" id="Talla" name="Talla" required>
                            <option value="L" {{ old('Talla', $producto->Talla) == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XS" {{ old('Talla', $producto->Talla) == 'XS' ? 'selected' : '' }}>XS</option>
                            <option value="S" {{ old('Talla', $producto->Talla) == 'S' ? 'selected' : '' }}>S</option>
                            <option value="XL" {{ old('Talla', $producto->Talla) == 'XL' ? 'selected' : '' }}>XL</option>
                        </select>
                    </div>
                 <div class="md-form mb-4">
  <label for="imagen" class="form-label">Imagen</label>
  <input type="file" class="form-control" id="imagen" accept="image/*" name="imagen" onchange="checkFileSize(this)">
</div>

<script>
function checkFileSize(input) {
  const fileSize = input.files[0].size; // Get file size in bytes
  const limit = 5 * 1024 * 1024; // 5 MB limit

  if (fileSize > limit) {
  
    input.value = ""; // Clear the file selection
  }
}
</script>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </form>
@endsection
