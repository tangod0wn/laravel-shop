@extends('layouts.customer.app')

@section('content')
<div class="container" style="width:60%">
  <h3>Your Orders</h3>
  <div class="menu">
    <div class="accordion">

     @foreach($orders as $order)
      <div class="accordion-group">
        <div class="accordion-heading country">

         <a class="accordion-toggle" data-toggle="collapse" href="#order{{$order->id}}">
         Order #{{$order->id}} - {{ $order->created_at }} by {{ $order->user_id }}
         </a>
         
         </div>
        <div id="order{{$order->id}}" class="accordion-body collapse">
          <div class="accordion-inner">
            Total Product : {{ count($order->orderItems) }}
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th> name </th>
                  <th> Amount </th>
                  <th> Price </th>
                  <th> Total </th>
                </tr>
              </thead>
              <tbody> @foreach($order->orderItems as $orderitem)
              
                <tr>
                  <td>{{$orderitem->name}}</td>
                  <td>{{$orderitem->pivot->amount}}</td>
                  <td>{{$orderitem->pivot->price}}</td>
                  <td>{{$orderitem->pivot->total}}</td>
                </tr> @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td><b>Total</b></td>
                  <td><b>{{$order->total}}</b></td>
                </tr>
                <tr>
                  <td><b>Shipping Address</b></td>
                  <td>{{$order->address}}</td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div> 
      @endforeach
       </div>
  </div>
   @stop