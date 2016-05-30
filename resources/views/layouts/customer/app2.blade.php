<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Styles -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/cart.css">
  <link rel="stylesheet" href="/css/customer.css">
 
  
  <script src="/js/modernizr.js"></script>
  <script src="/js/TreeMenu.js"></script>
        
        <link href="css/notifIt.css" type="text/css" rel="stylesheet">  


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  @include('layouts.customer.nav')
  <div class="container-fluid customer_area">
    <div class="row">
      <div class="col-md-2 left_sidebar">
        @include('layouts.customer.left-sidebar')
      </div>
      <div class="col-md-10 main_content">

        @yield('banner')
        <div class="row">
          <div class="col-md-11">

              @yield('content')
          </div>
        </div>

      </div>
    </div>
    @include('layouts.customer.cart')


  </div>
  <script src="/js/jquery.min.js"></script>
<script src="js/notifIt.min.js" type="text/javascript"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
  <script src="/js/rightsidebar.js"></script>
  <script src="/js/range.js"></script>
  
  <script src="/js/shoppingCart.js"></script>
  <script>

            $(".add-to-cart").click(function(event){
                event.preventDefault();
                var name = $(this).attr("data-name");
                var price = Number($(this).attr("data-price"));
                var image = $(this).attr("data-image");

                shoppingCart.addItemToCart(name, price, 1, image);
                displayCart();
            });

            $("#clear-cart").click(function(event){
                shoppingCart.clearCart();
                displayCart();
            });

            function displayCart() {
                var cartArray = shoppingCart.listCart();
                 console.log(cartArray);
                var output = "";

                for (var i in cartArray) {
                    output += "<div class='single_product_in_cart row'>"
                        + "<div class='product_range col-md-2'>"
                        + "<div class='input-group number-spinner'>"
                        + "<span class='input-group-btn data-dwn'>"
                        + "<button class='btn cart-btn subtract-item' data-name='"
                        + cartArray[i].name+"'><span class='glyphicon glyphicon-menu-down'></button>"
                        + "</span>"
                        
                        +" <input class='item-count form-control text-center' type='text' data-name='"
                        +cartArray[i].name
                        +"' value='"+cartArray[i].count+"' >"                        
                        + "<span class='input-group-btn data-up'>"
                        + "<button class='btn cart-btn plus-item' data-name='"
                        + cartArray[i].name+"'><span class='glyphicon glyphicon-menu-up'></button>" 
                        + "</span>"
                        
                        + "</div>"
                        + "</div>"
                        + "<div class='product_image  col-md-3'>"
                        + "<img src='/upload/product/"
                        + cartArray[i].image
                        + "'>"
                        + "</div>"
                        + "<div class='product_name col-md-4'>"                   
                        + cartArray[i].name
                        + "</div>"
                        + "<div class='col-md-1 total-cart'>"
                        + cartArray[i].total  
                        + "</div>"                         
                        + "<div class='col-md-1 remove_frm_cart'>"
                        + "<button class='delete-item' data-name='"
                        + cartArray[i].name+"'>X</button>"
                        + "</div>" 
                        + "<input type='hidden' name='product_name' value='" + cartArray[i].name  + "' >"
                        + "<input type='hidden' name='product_price' value='" + cartArray[i].total + "' >"                 
                        + "<input type='hidden' name='product_amount' value='" + cartArray[i].count  + "' >"
                        + "</div>";

                }

                $("#show-cart").html(output);
                $("#count-cart").html( shoppingCart.countCart() );
                $("#total-cart").html( shoppingCart.totalCart() );
            }

            $("#show-cart").on("click", ".delete-item", function(event){
                var name = $(this).attr("data-name");
                shoppingCart.removeItemFromCartAll(name);
                displayCart();
            });

            $("#show-cart").on("click", ".subtract-item", function(event){
                var name = $(this).attr("data-name");
                shoppingCart.removeItemFromCart(name);
                displayCart();
            });

            $("#show-cart").on("click", ".plus-item", function(event){
                var name = $(this).attr("data-name");
                var image = $(this).attr("data-image");
                shoppingCart.increaseItemToCart(name, 0, 1);
                displayCart();
            });

            $("#show-cart").on("change", ".item-count", function(event){
                var name = $(this).attr("data-name");
                var count = Number($(this).val());
                shoppingCart.setCountForItem(name, count);
                displayCart();
            });


            displayCart();

        </script>
    <script>
        function not1(){
            notif({
        msg: "&lt;b&gt;Success:&lt;/b&gt; In 5 seconds i'll be gone",
        type: "success"
      });
        }
        function not2(){
            notif({
        msg: "&lt;b&gt;Oops!&lt;/b&gt; A wild error appeared!",
        type: "error",
        position: "center"
      });
        }
        function not3(){
            notif({
        type: "warning",
        msg: "&lt;b&gt;Warning:&lt;/b&gt; Be patient my friend.",
        position: "left"
      });
        }
        function not4(){
            notif({
        type: "info",
        msg: "&lt;b&gt;Info: &lt;/b&gt;Some info here.",
        width: "all",
        height: 100,
        position: "center"
      });
        }
        function not5(){
            notif({
        type: "error",
        msg: "This error will stay here until you click it.",
        position: "center",
        width: 500,
        height: 60,
        autohide: false
      });
        }
    function not6(){
      notif({
        type: "warning",
        msg: "Opacity is cool!",
        position: "center",
        opacity: 0.8
      });
    }
  function not7(){
      notif({
        type: "info",
        msg: "Testing a multiline text. Testing, one, two.. yep.",
        position: "center",
        width: 100,
        autohide: false,
        multiline: true
      });
    }
  function not8(){
      notif({
        type: "success",
        msg: "Fade mode activated.",
        position: "right",
        fade: true
      });
    }
  function not9(){
      notif({
        msg: "Customize with your favourite color!",
        position: "left",
        bgcolor: "#294447",
        color: "#F19C65"
      });
    }
  function not10(){
      notif({
        type: "info",
        msg: "Customize the timeout!",
        position: "left",
        timeout: 1000
      });
    }
    </script>
</body>

</html>