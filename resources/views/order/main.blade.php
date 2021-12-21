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
                        @foreach($cart as $item)
                            <tr>
                                    <td>{{$item->product->manufacture}}</td>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td class="test">{{$item->total}}</td>
                            </tr>
                            <input type="hidden" name="cart_items[]" value="{{$item->id}}">
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label for="total" id="totalLabel"></label>
                                <input type="hidden" name="total" id ="total">
                            </td>
                        </tr>
</table>
@endsection