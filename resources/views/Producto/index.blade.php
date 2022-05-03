@extends('layouts.app')    
@section('content')
<div style="text-align: center">
    <a class = "btn btn-secondary botonsito" href="{{route('Producto.create')}}">Crear Producto</a>
</div>


<div class ="col-md-10 mx-auto p-3">
    <table class="table tabla1 table-hover">
        <thead>
            <tr>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead> 
        <tbody>
            @foreach($productos as $productos)   
            <tr>
                <td>{{$productos->nombre}}</td>
                <td>
                    <a class = "btn botonsito btn-success" href="{{route('Producto.show',$productos->id)}}">Ver</a>
                    <a class = "btn botonsito btn-warning" href="{{route('Producto.edit',$productos->id)}}">Modificar</a>
                    <elim_producto producto = {{$productos->id}}><elim_producto>
                    
                </td>
            </tr>
            @endforeach
        </tbody>           
    </table>
</div>
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Status</th>
        <th>Position</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                alt=""
                style="width: 45px; height: 45px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">John Doe</p>
              <p class="text-muted mb-0">john.doe@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Software engineer</p>
          <p class="text-muted mb-0">IT department</p>
        </td>
        <td>
          <span class="badge badge-success rounded-pill d-inline">Active</span>
        </td>
        <td>Senior</td>
        <td>
          <button type="button" class="btn btn-link btn-sm btn-rounded">
            Edit
          </button>
        </td>
      </tr>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">Alex Ray</p>
              <p class="text-muted mb-0">alex.ray@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Consultant</p>
          <p class="text-muted mb-0">Finance</p>
        </td>
        <td>
          <span class="badge badge-primary rounded-pill d-inline"
                >Onboarding</span
            >
        </td>
        <td>Junior</td>
        <td>
          <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                  >
            Edit
          </button>
        </td>
      </tr>
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">Kate Hunington</p>
              <p class="text-muted mb-0">kate.hunington@gmail.com</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">Designer</p>
          <p class="text-muted mb-0">UI/UX</p>
        </td>
        <td>
          <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
        </td>
        <td>Senior</td>
        <td>
          <button
                  type="button"
                  class="btn btn-link btn-rounded btn-sm fw-bold"
                  data-mdb-ripple-color="dark"
                  >
            Edit
          </button>
        </td>
      </tr>
    </tbody>
  </table>
@endsection