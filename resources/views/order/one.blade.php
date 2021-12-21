@extends('layouts.order')

@section('order')
<table class="table">
                        <thead>
                            <tr>   
                                <th scope="col">Manufacture</th>
                                <th scope="col">Product</th>
                                <th scope="col">Amount</th>
                                <th scope="col">total</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <input type="hidden" name="product" value="{{$product->id}}">
                                    <td>{{$product->manufacture}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <div class="btn-group w-50">
                                            <button type="button" id="amountDecrement" class="btn btn-light rounded-start">-</button>
                                            <input class="w-50 text-center rounded-0" id="amount" type="text" name="amount" value="1">
                                            <button type="button" id="amountIncrement" class="btn btn-light rounded-end">+</button>
                                        </div>
                                    </td>
                                    <td>
                                        <label for="productTotal" id="productPriceLabel">{{$product->price}}</label>
                                        <input type="hidden" id="productPrice" name="total" value="{{$product->price}}">
                                    </td>
                            </tr>
                        </tbody>
                    </table>
@endsection