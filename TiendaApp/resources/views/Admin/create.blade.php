@extends('Admin.base')
@section('title', 'Argo Create Game')
@section('contenido')
    <h2>.</h2>
     <form action="{{ url('admin') }}" method="post" enctype="multipart/form-data">
         @csrf
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header text-center">
    <h4 class="modal-title w-100 font-weight-medium text-left">Create Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body mx-3">
    <div class="md-form mb-4">
      <label for="Nombre" class="form-label">Producto</label>
      <input type="text" class="form-control validate" id="Nombre" name="Nombre" maxlength="255"  required value="{{ old('Nombre') }}">
    </div>
    <div class="md-form mb-4">
      <label for="Precio" class="form-label">Precio</label>
      <input type="number" class="form-control validate" id="Precio" name="Precio" maxlength="255"  required value="{{ old('Precio') }}">
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
  <div class="md-form mb-4">
  <label for="Genero" class="form-label">Género</label>
  <select class="form-select" id="Genero" name="Genero" required>
    <option value="H">Hombre</option>
    <option value="M">Mujer</option>
  </select>
</div>
<div class="md-form mb-4">
  <label for="Talla" class="form-label">Talla</label>
  <select class="form-select" id="Talla" name="Talla" required>
    <option value="L">L</option>
    <option value="XS">XS</option>
    <option value="S">S</option>
    <option value="XL">XL</option>
  </select>
</div>

  <div class="modal-footer d-flex justify-content-center">
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
  </div>
</div>
</div>
</form>
@endsection
