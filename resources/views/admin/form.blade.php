@extends('layouts.main')
@section('title', 'Crear Ficha De Arriendo')
@section('main-content')
{{--NAV--}}
<nav class="navbar bg-body-tertiary " style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <h1 class="align-self-end">ArriendoAPP</h1>
      <form class="d-flex" role="search">
        <a class="btn btn-outline-primary align-self-end" href="{{ route('logout') }}">Cerrar Sesión</a>
      </form>
    </div>
</nav>
{{--END NAV--}}
    @if($errors->any())
    <div class="alert alert-danger my-4" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <br>
    <div>
        <div class="row">
            {{--SIDEBARS--}}
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"></svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                      </svg>
                      Dashboard
                      <hr/>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('listado') }}" class="nav-link text-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"></svg>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                      </svg>
                      Arriendos
                      <hr/>
                    </a>
                  </li>
              </div>
            {{--END SIDEBARS--}}
            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
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
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Patente:</span>
                                            <input type="text" class="form-control" name="patent">
                                        </div>
                                        <br>
                                        <h5>Sobre el prestamo</h5>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Fecha de entrega:</span>
                                            <input type="date" class="form-control" name="fechaEntrega">
                                        </div>
                                        <div class="input-group mt-2">
                                            <span class="input-group-text">Fecha de devolucion:</span>
                                            <input type="date" class="form-control" name="fechaDevolucion">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>

                            <h5>Vehiculos disponibles</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Modelo<br>año</td>
                                        <td class="text-center">PATENTE</td>
                                    </tr>
                                </tbody>
                            </table>

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
        margin-top: 0px;
    }
</style>
@endpush
@endsection
