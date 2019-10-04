@extends('admin.layouts.layout-admin')

@section('content-admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ver el mensaje
                <small>Aquí podrás ver mejor el mensaje</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/home') }}"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                <li><a href="{{ route('mensajes.index') }}">Examples</a></li>
                <li class="active">Ver mensaje</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Ver el mensaje # {{ $message->id }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="container" id="edit">
                        <div class="row my-5">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h2>Mensaje de {{ $message->name }}</h1>
                                    </div>
                                    <div class="card-body pl-4">
                                        <h3 class="card-title">Contacto: </h3><p><strong class="text-secondary">Teléfono: </strong>{{ $message->phone }} <br> <strong class="text-secondary">E-mail: </strong>{{ $message->email }}</p>
                                        <h3 class="card-title">Datos de la solicitud: </h3><p><strong class="text-secondary">Tipo de cirugía: </strong>{{ $message->typeSurgery }} <br> <strong class="text-secondary">Tentativa de cita: </strong>{{ $message->citaFecha }}</p>
                                        <h3 class="card-title">Mensaje: </h3><p>{{ $message->content }}</p>
                                        <a href="#" class="btn btn-primary">Responder...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@endsection
