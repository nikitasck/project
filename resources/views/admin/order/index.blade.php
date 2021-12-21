@extends('layouts.admin_layout')

@section('title', 'Categories')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
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
                      <th style="width: 10%">
                            Customer
                      </th>
                      <th style="width: 15%">
                            Adress
                      </th>
                      <th style="width: 10%">
                            Delivery
                      </th>
                      <th style="width: 10%">
                            Order
                      </th>
                      <th style="width: 5%">
                          Amount
                      </th>
                      <th style="width: 10%">
                          Total
                      </th>
                      <th style="width: 15%">
                            Status
                      </th>
                      <th style="width:10%">
                            Ordered
                      </th>
                  </tr>
              </thead>
              <tbody>
                    @foreach ($orders as $order)
                      <tr>
                        <td>
                            {{ $order->id }}
                        </td>
                        <td>
                            {{ $order->user->firstname }} {{$order->user->lastname}}
                        </td>
                        <td>
                            {{ $order->adress->country }} <br>
                            {{ $order->adress->city }} <br>
                            {{ $order->adress->street }} <br>
                            {{ $order->adress->house_number }} <br>
                        </td>
                        <td>
                            {{$order->delivery->name}}
                        </td>
                        <td>
                            @foreach($order->products as $product)
                                {{$product->manufacture}} {{$product->name}}<br>
                                {{$product->name}}<br>
                                <b>price:</b> {{$product->price}}
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderProduct as $item)
                                {{$item->amount}}<br>
                            @endforeach
                        </td>
                        
                        <td>
                            {{$order->total}}
                        </td>
                        <td>
                            <form action="{{route('order.update', $order->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <select name="status" class="form-select rounded-0">
                                        @foreach($status as $item)
                                            @if($item == $order->status)
                                                <option value="{{$item}}" selected>{{$item}}</option>
                                            @else
                                                <option value="{{$item}}">{{$item}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    <button class="btn btn-success text-light rounded-0 btn-outline-secondary">Update</button>
                                </div>
                            </form>
                        </td>
                        <td>
                            {{ $order->created_at }}
                        </td>
                        <td class="project-actions text-right">
                            <form action="" method="POST" style="display:inline-block">
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
        {{ $orders->links() }}
      </div>

@endsection