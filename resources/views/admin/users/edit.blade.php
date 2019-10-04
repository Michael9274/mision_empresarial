@extends('admin.layouts.layout-admin')

@section('content-admin')

    <div class="animated fadeIn mt-5">
        <div class="card">
            <div class="card-header bg-light">
                <h2>Editar a {{ $user->name }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <form class="default-form contact-form" method="post" action="{{ route('usuarios.update', $user->id) }}">
                            {!! method_field('PUT') !!}
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-xs-12">

                                    <div class="form-group">
                                        <label for="name"><strong>Nombre:</strong></label>
                                        <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}">
                                        {!! $errors->first('name', '<small>:message</small><br>') !!}
                                    </div>

                                    <div class="form-group">
                                        <label for="email"><strong>Email:</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                        {!! $errors->first('email', '<small>:message</small><br>') !!}
                                    </div>

                                </div>

                                <div class="col-md-6 col-xs-12">
                                    <label for="role"><strong>Rol:</strong></label>
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


@endsection
