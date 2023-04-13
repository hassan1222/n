<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
  
   <title>Perfumes Cart</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />

   <style type="text/css">
      .center{
         margin:auto;
         width:60%;
         text-align:center;
         padding:30px;
      }
      table,th,td{
         border:1px solid grey;
      }
      .th_deg{
         font-size:30px;
         padding:5px;
         background:lightblue;
      }
      .img_deg{
         height:200px;
         width:200px;
      }
      .total_deg{
         font-size:20px;
         padding:40px;
      }
   </style>
</head>

<body>
   <div class="hero_area">
      <!-- Header section -->
      @include('home.header')
   
   <div class="center">
      <table>
         <tr>
         <th class="th_deg">Product Title</th>
         <th class="th_deg">Product quantity</th>
         <th class="th_deg">Price</th>
         <th class="th_deg">Image</th>
         <th class="th_deg">Action</th>
         </tr>

         <?php $totalprice=0;?>
         @foreach($cart1 as $cart1)
         <tr>
            <td>{{$cart1->product_title}}</td>
            <td>{{$cart1->quantity}}</td>
            <td>Rs.{{$cart1->price}}</td>
            <td><img class="img_deg" src="/product/{{$cart1->image}}"></td>
            <td><a class="btn btn-danger" onclick="return confirm('Do you wish to remove?')" href="{{url('remove_cart',$cart1->id)}}">Remove Product</a></td>
         </tr>
         <?php $totalprice=$totalprice+$cart1->price?>
         @endforeach
        
      </table>
      <div>
         <h1 class="total_deg">
            Total Price: Rs.{{$totalprice}}
         </h1>
      </div>
      <div>
         <h1 style="font-size:25px; padding-bottom:15px;">
           Please Confirm to Place the Order
         </h1>
         <a href="{{url('cash_order')}}" class="btn btn-success">Cash On Delivery</a>
         
      </div>
   </div>



   
   <div class="cpy_">
      <p class="mx-auto">© 2023 All Rights Reserved<br>

      </p>
   </div>
   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
</body>

</html>