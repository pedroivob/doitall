@extends('layouts.single')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
  <table class="table ">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">User_id</th>
            </tr>
          </thead>
          <tbody>
              @foreach($cads as $product)
            <tr>
              <td>{{ $product->id }} </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->user_id }} </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>
@endsection