@extends('admin.layouts.layout-admin')

@section('content-admin')

        <div class="animated fadeIn mt-5">
            <div class="card">
                <div class="card-header bg-light">
                    <h2 class="d-inline">Todos los Usuarios</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('usuarios.create') }}">
                                <button class="btn btn-success float-right">Nuevo Usuario</button>
                            </a>
                            <div class="clearfix"></div>
                            <br>
                        </div>
                        <div class="col-12 table-responsive mt-4">
                            <table id="myTable" class="table table-bordered table-hover">
                                <caption>Mensajes recibidos</caption>
                                <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Fecha de creación</th>
                                    <th>Borrar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('usuarios.edit', $user->id) }}">{{ $user->name }}</a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->pluck('display_name')->implode(' - ') }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <form class="d-inline" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
                                                @csrf
                                                {!! method_field('DELETE') !!}
                                                <button class="btn btn-danger btn-block" type="submit"><i class="fas fa-trash-alt"></i></button>
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


