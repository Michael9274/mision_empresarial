@extends('layouts.app')

@section('content')
    @include('includes.nav')
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center">Libros disponibles</h1>
                <div class="card-columns mt-5">
                    @foreach($books as $book)
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($book->image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $book->title }}</h5>
                                <p class="card-text">{{ $book->description }}</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary btn-block rental"
                                        book_id="{{ $book->id }}">
                                    Alquilar libro
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('body').on('click', '.rental', function () {
            $(this).map(function () {
                let book_id = $(this).attr('book_id');

                if (localStorage['auth'] == 'true'){
                    Swal.fire({
                        title: 'Quieres alquilar este libro?',
                        text: "Recuerda que el tiempo para entregarlo son 15 días!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, alquilar!',
                        cancelButtonText: 'Cancelar',
                    }).then((result) => {
                        if (result.value) {

                            let user_id = localStorage['userId'];

                            formData = new FormData();
                            formData.append('book_id', book_id);
                            formData.append('user_id', user_id);

                            asyncPost({
                                url: 'rentals',
                                formData: formData
                            }).then(data => {
                                let response = data;
                                Swal.fire(
                                    response,
                                    'Ya puedes pasar por tu libro a cualquiera de nuestras bibliotecas. Busca la mas cercana.',
                                    'success'
                                )
                            })
                        }
                    })
                }else{
                    Swal.fire(
                        'No estas logueado?',
                        'Para alquilar alguno de nuestros libros debes ingresar como cliente. Si no tienes cuenta regístrate ahora!!',
                        'warning'
                    )
                }
            })
        });
    </script>
@endpush
