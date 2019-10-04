<form id="createBook" method="post" action="{{ route('libros.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="title"><strong>Titulo:</strong></label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('name') }}">
                {!! $errors->first('name', '<small>:message</small><br>') !!}
            </div>
        </div>

        <div class="col-12 col-md-6">
            <label for="image"><strong>Imagen:</strong></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" lang="es">
                <label class="custom-file-label" for="image">Seleccionar Archivo</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="description">Descripción del libro</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
        </div>
    </div>
</form>

@push('stylesAdmin')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@push('scriptsAdmin')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endpush
