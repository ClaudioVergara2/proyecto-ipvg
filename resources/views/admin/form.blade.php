@extends('layouts.main')
@section('form-content')

<div class="container py-4">

    <div class="d-flex justify-content-between">
        <h1 class="align-self-end">ArriendoAPP</h1>
        <a class="btn btn-outline-primary align-self-end" href="{{ route('logout') }}">Cerrar Sesión</a>
    </div>
    <hr />

    @if($errors->any())
    <div class="alert alert-danger my-4" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif



    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <nav>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Dashboard</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Arriendos</button>
                        <a class="nav-link text-center active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="true">Messages</a>
                    </div>
                </nav>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"></div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
                    <div class="tab-pane fade show active" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <section class="section-separator">
                            <form action="{{ route('vehicles.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <h1 class="section-separator mb-4">Nuevo arriendo</h1>
                                    <div class="col-6">
                                        <h5>Datos del cliente</h5>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Nombres:</span>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Apellido paterno:</span>
                                            <input type="text" class="form-control" name="surname">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Apellido materno:</span>
                                            <input type="text" class="form-control" name="lastname">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Rut:</span>
                                            <input type="number" class="form-control" name="rut">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Email:</span>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5>Datos del vehiculo</h5>
                                        <span>Patente:</span>
                                        <select class="form-select" name="patent">
                                            <!---aca debe ir las patentes de que hay-->
                                            <option value="">holaaaa</option>
                                            <option value="">chaoooo</option>
                                        </select>
                                        <br>
                                        <h5>Sobre el prestamo</h5>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Fecha de entrega:</span>
                                            <input type="number" class="form-control" name="fechaEntrega">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Fecha de devolucion:</span>
                                            <input type="number" class="form-control" name="fechaDevolucion">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('css')
<style>
    .section-separator {
        margin-top: 80px;
    }
</style>
@endpush
@endsection
