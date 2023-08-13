@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div> 
@endif

<div class="table-responsive small col-lg-8 mb-5">
  <a href="/dashboard/categories/create" class="btn btn-primary my-3"><i class="bi bi-pencil me-1"></i>New Category</a>
  <table class="table table-striped table-sm align-middle">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category</th>
        <th scope="col" style="text-align: center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td style="text-align: center">
              <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square text-white"></i></a>
              <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus category ini?')"><i class="bi bi-trash3-fill"></i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection