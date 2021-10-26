@extends('layouts.admin_layout')

@section('title', 'Add product')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
            <div class="row justify-content-md-center">
                <div class="col-lg-8">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                          <label>Multiple</label>
                          <p>Choose product category or add new one.</p>
                          <div class="row">
                            <div class="col-10">
                              <select name = "category" class="form-control">
                                @foreach ($categories as $category)
                                  <option value ="{{ $category->id }}">{{$category->category}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-2">
                            <!-- Button trigger modal -->
                            <a href="{{route('category.create')}}" class="btn btn-primary"> Add Category</a>
                            </div>
                          </div>
                        </div>

                          <div class="form-group">
                            <label for="categoryInputText">manufacture</label>
                            @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input name="manufacture" value="{{ old('manufacture') }}" class="form-control" id="categoryInputText" placeholder="Enter product manufacture">
                        </div>
                        <div class="form-group">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="categoryInputText">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="categoryInputText" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="categoryInputText">Product description</label>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="categoryInputText" placeholder="Enter product description">
                        </div>
                        <div class="form-group">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="categoryInputText">Product price</label>
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="categoryInputText" placeholder="Enter product price">
                        </div>

                        <div class="form-group">
                          <label>Colors</label>
                          <div class="row">
                            <div class="col-10">
                              <select id="color" name="colors[]" class="form-control colors select2-hidden-accessible" multiple="" data-placeholder="Select a color" style="width: 100%;" data-select2-id="" tabindex="-1" aria-hidden="true">
                                @foreach ($colors as $color)
                                  <option value="{{ $color->id }}" data-select2-id="{{$color->id}}">{{$color->color}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-2">
                            <a href="{{route('color.create')}}" class="btn btn-primary"> Add Color</a>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Sizes</label>
                          <p>If product have sizes choose it or add new one.</p>
                          <div class="row">
                            <div class="col-10">
                              <select id="size" name="sizes[]" class="form-control sizes select2-hidden-accessible" multiple="" data-placeholder="Select " style="width: 100%;" data-select2-id="" tabindex="-1" aria-hidden="true">
                                @foreach ($sizes as $size)
                                  <option value="{{ $size->id }}" data-select2-id="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-2">
                            <a href="{{route('size.create')}}" class="btn btn-primary"> Add sizes</a>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Storages</label>
                          <p>If product have storages choose it or add new one.</p>
                          <div class="row">
                            <div class="col-10">
                              <select id="storage" name="storages[]" class="form-control storages select2-hidden-accessible" multiple="" data-placeholder="Select " style="width: 100%;" data-select2-id="" tabindex="-1" aria-hidden="true">
                                @foreach ($storages as $storage)
                                  <option value="{{ $storage->id }}" data-select2-id="{{$storage->id}}">{{$storage->storage_size}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-2">
                            <a href="{{route('storage.create')}}" class="btn btn-primary"> Add sizes</a>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="categoryInputText">Picture</label>
                            <div class="input-group">
                              <input type="file" name="image" class="file-input" id="categoryInputText" placeholder="Enter picture">
                            </div>
                        </div>



                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@section('scripts')
        <script type="text/javascript">     
            $(document).ready(function() {
                  $('.colors').select2();
                  $('.sizes').select2();
                  $('.storages').select2();
                  $('#color').select2();
                  $('#size').select2();
                  $('#storage').select2();
            });
        </script>  
 

        

@endsection