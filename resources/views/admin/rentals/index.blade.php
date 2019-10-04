@extends('admin.layouts.layout-admin')

@section('content-admin')
    <div class="animated fadeIn mt-5">
        <div class="card">
            <div class="card-header bg-light">
                <h2 class="d-inline">Todos los alquileres</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 table-responsive mt-4">
                        <table id="myTable" class="table table-bordered table-hover">
                            <caption>Mensajes recibidos</caption>
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Libro</th>
                                <th>Usuario</th>
                                <th>Fecha de alquiler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rentals as $rental)
                                <tr>
                                    <td>{{ $rental->id }}</td>
                                    <td>{{ $rental->rentalsBook->title }}</td>
                                    <td>{{ $rental->rentalsUser->name }}</td>
                                    <td>{{ substr($rental->created_at, 0, 10) }}</td>
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


