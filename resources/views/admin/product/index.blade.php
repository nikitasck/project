@extends('layouts.admin_layout')

@section('title', 'Categories')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="card">

        @if (session('success')) 
            <div class="alert alert-success" role="alert">
                <button type="button" role="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif

        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          ID
                      </th>
                      <th style="width: 20%">
                          Manufacture
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 20%">
                          Colors
                      </th>
                      <th style="width: 20%">
                          Price
                      </th>
                  </tr>
              </thead>
              <tbody>
                    @foreach ($products as $product)
                      <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->manufacture }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            @foreach ($product->colors as $color)
                                {{$color->color}}<br>
                            @endforeach
                        </td>
                        <td>
                            <a>
                                {{ $product->price }}
                            </a>
                            <br/>
                            <small>
                                Created {{ $product['created_at'] }}
                            </small>
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="{{ route('product.edit', $product['id']) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <form action="{{ route('product.destroy', $product['id']) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <div class="d-flex justify-content-center fixed-bottom">
        {{ $products->links() }}
      </div>

@endsection