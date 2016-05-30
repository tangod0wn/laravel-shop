@extends('layouts.customer.app')

@section('content')
<div class="row">
  <div class="col-md-3">
    <hr>
  </div>
  <div class="col-md-6 text-center">
    <div class="content_header">
      Check your cart
    </div>
  </div>
  <div class="col-md-3">
    <hr>
  </div>
</div>

<div class="row">

  <div class="content-category-products text-center">

  <div class="col-md-10" >   

      <div class="table-responsive  panel panel-default cart_info">
        <table class="table">
          <thead class="panel-heading">
            <tr class="cart_menu">
              <td class="image"></td>
              <td class="description">product name</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody class="panel-body">
            <tr>
              <td class="cart_product">
                <a href=""><img src="upload/product/onion-red-indian-piyaj-500-gm.jpeg" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">Colorblock Scuba</a></h4>
              </td>
              <td class="cart_price">
                <p>$59</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$59</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <tr>
              <td class="cart_product">
                <a href=""><img src="upload/product/onion-red-indian-piyaj-500-gm.jpeg" alt=""></a>
              </td>
              <td class="cart_description">
                <h4><a href="">Colorblock Scuba</a></h4>
              </td>
              <td class="cart_price">
                <p>$59</p>
              </td>
              <td class="cart_quantity">
                <div class="cart_quantity_button">
                  <a class="cart_quantity_up" href=""> + </a>
                  <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                  <a class="cart_quantity_down" href=""> - </a>
                </div>
              </td>
              <td class="cart_total">
                <p class="cart_total_price">$59</p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
              </td>
            </tr>            

          </tbody>
        </table>
      </div>













      
    
  </div> <!--/#cart_items--> 

  </div>
</div>
@endsection