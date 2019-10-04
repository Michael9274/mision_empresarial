@extends('admin.layouts.layout-admin')

@section('content-admin')

    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header bg-light">
                <h2>Crear usuarios</h2>
                <small>Diligencie todos los campos con <span class="text-danger">*</span></small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name"><strong><span class="text-danger">*</span> Nombre:</strong></label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                                        {!! $errors->first('name', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="username"><strong><span class="text-danger">*</span> Username:</strong></label>
                                        <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}">
                                        {!! $errors->first('username', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="document_type">Tipo de documento</label>
                                            <select class="form-control" id="document_type" name="document_type">
                                                <option value="">Seleccione un documento</option>
                                                <option value="CC">Cédula de Ciudadanía</option>
                                                <option value="CE">Cédula de Extranjería</option>
                                                <option value="PA">Pasaporte</option>
                                                <option value="RC">Registro Civil</option>
                                                <option value="TI">Tarjeta de Identidad</option>
                                            </select>
                                        </div>
                                        {!! $errors->first('document_type', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="document_number"><strong>Número de documento:</strong></label>
                                        <input class="form-control" type="text" id="document_number" name="document_number" value="{{ old('document_number') }}">
                                        {!! $errors->first('document_number', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="address"><strong>Dirección:</strong></label>
                                        <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}">
                                        {!! $errors->first('address', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="phone"><strong>Celular:</strong></label>
                                        <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}">
                                        {!! $errors->first('phone', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email"><strong><span class="text-danger">*</span> Email:</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                                        {!! $errors->first('email', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label for="image"><strong>Imagen:</strong></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" lang="es" value="{{ old('image') }}">
                                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="type"><span class="text-danger">*</span> Tipo de usuario</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="">Seleccione un tipo de usuario</option>
                                                <option value="C">Cliente</option>
                                                <option value="E">Empleado</option>
                                            </select>
                                        </div>
                                        {!! $errors->first('document_type', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="area">Area de empleado</label>
                                            <select class="form-control" id="area" name="area">
                                                <option value="">Seleccione el área del empleado</option>
                                                <option value="mercadeo">Mercadeo</option>
                                                <option value="operacion">Operacion</option>
                                                <option value="gerencia">Gerencia</option>
                                            </select>
                                        </div>
                                        {!! $errors->first('document_type', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password"><strong><span class="text-danger">*</span> Contraseña:</strong></label>
                                        <input class="form-control" type="password" id="password" name="password" value="{{ old('pass') }}">
                                        {!! $errors->first('password', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="password_confirmation"><strong><span class="text-danger">*</span> Repetir contraseña:</strong></label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}">
                                        {!! $errors->first('password_confirmation', '<small>:message</small><br>') !!}
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
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

@push('scriptsAdmin')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush