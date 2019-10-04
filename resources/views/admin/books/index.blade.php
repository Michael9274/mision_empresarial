@extends('admin.layouts.layout-admin')

@section('content-admin')

    <div class="animated fadeIn mt-4">
        <div class="card">
            <div class="card-header bg-light">
                <h2 class="d-inline">Todos los libros</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <button id="newProduct" class="btn btn-success float-right">Nuevo Libro</button>
                        <div class="clearfix"></div>
                        <br>
                    </div>
                    <div class="col-12 table-responsive mt-4">
                        <table id="myTable" class="table table-bordered table-striped table-hover">
                            <caption>Libros registrados</caption>
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td style="width: 5%;">
                                        <img class="w-100" src="{{ Storage::url($book->image) }}" alt="">
                                    </td>
                                    <td style="width: 16%;">{{ $book->title }}</td>
                                    <td style="width: 30%;">{{ $book->description }}</td>
                                    <td style="width: 5%;">
                                        <button class="btn btn-warning editProduct"
                                                bookId="{{ $book->id }}"
                                                bookTitle="{{ $book->title }}"
                                                bookDescription="{{ $book->description }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td style="width: 5%;">
                                        <form class="d-inline" method="POST" action="{{ route('libros.destroy', $book->id) }}">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scriptsAdmin')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        var token = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {

            $('#newProduct').on('click', function () {
                $('body').append(initModal({
                    id: 'createBookModal',
                    size: 'modal-lg',
                    classHeader: 'bg-light text-dark',
                    header: 'Crear libro',
                    content: `
                        @include('admin.books.create')
                    `,
                    footer: `
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button id="newProductSubmitForm" type="submit" form="createBook" class="btn btn-success">Crear Libro</button>
                    `
                }));

                $('#createBookModal').modal('show');

                bsCustomFileInput.init();

                $('#category_id').selectpicker({
                    liveSearch: true
                });

                closeModal('createBookModal');
            });

            $('body').on('click', '#btnCreateCode', function () {
                getBarCode();
            })
        });

        $('body').on('click', '.editProduct', function () {
            $(this).map(function () {
                let bookId = $(this).attr('bookId');
                let bookTitle = $(this).attr('bookTitle');
                let bookDescription = $(this).attr('bookDescription');

                $('body').append(initModal({
                    id: 'editBookModal',
                    size: 'modal-lg',
                    classHeader: 'bg-warning text-dark',
                    header: 'Editar Producto',
                    content: `
                        <form id="editProduct" method="post" action="{{ route('libros.update', 1) }}" enctype="multipart/form-data">
                            {!! method_field('PUT') !!}
                            @csrf
                            <input type="hidden" value="${bookId}" name="idBook">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title"><strong>Titulo:</strong></label>
                                        <input class="form-control" type="text" id="title" name="title" value="${bookTitle}">
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
                                        <textarea class="form-control" id="description" name="description" rows="3">${bookDescription}</textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    `,
                    footer: `
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button id="editProductSubmitForm" type="submit" form="editProduct" class="btn btn-success">Editar Libro</button>
                    `
                }));

                $('#editBookModal').modal('show');

                bsCustomFileInput.init();

                $('#id_category').selectpicker({
                    liveSearch: true
                });

                closeModal('editBookModal');
            })
        });

    </script>
@endpush
