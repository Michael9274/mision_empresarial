@extends('admin.layouts.layout-admin')

@section('content-admin')

    <div class="animated fadeIn mt-5">
        <div class="card">
            <div class="card-header bg-light">
                <h2>Crear usuarios</h2>
                <small>Diligencie todos los campos</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="name"><strong>Nombre:</strong></label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                                        {!! $errors->first('name', '<small>:message</small><br>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"><strong>Email:</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                        {!! $errors->first('email', '<small>:message</small><br>') !!}
                                    </div>

                                </div>

                                <div class="col-md-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="password"><strong>Contraseña:</strong></label>
                                        <input class="form-control" type="password" id="password" name="password" value="{{ old('pass') }}">
                                        {!! $errors->first('password', '<small>:message</small><br>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation"><strong>Repetir contraseña:</strong></label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                                        {!! $errors->first('password_confirmation', '<small>:message</small><br>') !!}
                                    </div>

                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <label for="role"><strong>Roles:</strong></label>
                                    <div class="form-group">
                                        @foreach($roles as $id => $name)
                                            <input
                                                type="checkbox"
                                                value="{{ $id }}"
                                                {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                                                name="roles[]">
                                            {{ $name }}<br>
                                        @endforeach
                                    </div>
                                    <div class="w-100">
                                        {!! $errors->first('roles', '<small>:message</small><br>') !!}
                                    </div>
                                </div>

                                <div class="col-md-6 col-xs-12">

                                    <div class="form-group text-center mt-4">
                                        <button type="submit" class="btn btn-info btn-block border border-primary text-white">Crear <i class="fas fa-check"></i></button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
