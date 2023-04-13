 <!DOCTYPE html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="csrf-token" content="{{csrf_token()}}">
     <title>Admin</title>
     <!-- CSS -->
     @include('admin.css')
     <style type='text/css'>
         .center {
             margin: auto;
             width: 50%;
             border: 2px solid white;
             text-align: center;
             margin-top: 40px;
         }

         .font_size {
             text-align: center;
             font-size: 40px;
             padding-top: 20px;
         }

         .img_src {
             width: 150px;
             height: 150px;
         }

         .th_color {
             background: blueviolet;
         }

         .th_design {
             padding: 30px;
         }
     </style>
 </head>

 <body>
     <div class="container-scroller">
         <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
         <!-- partial -->
         <div class="container-fluid page-body-wrapper">
             <!-- partial:partials/_navbar.html -->
             @include('admin.navbar')
             <!-- partial -->
             <div class="main-panel">
                 <div class="content-wrapper">
                     @if(session()->has('message'))
                     <div class="alert alert-success alert-dissmissible" role="alert">
                         <!-- To close the session when data added successfully -->
                         <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                         {{session()->get('message')}}
                     </div>
                     @endif
                     <h2 class="font_size">All Products</h2>
                     <table class="center">
                         <tr class="th_color">
                             <th class="th_design">Product Title</th>
                             <th class="th_design">Description</th>
                             <th class="th_design">Quantity</th>
                             <th class="th_design">Category</th>
                             <th class="th_design">Price</th>
                             <th class="th_design">Discount Price</th>
                             <th class="th_design">Product Image</th>
                             <th class="th_design">Edit</th>
                             <th class="th_design">Delete</th>
                         </tr>
                         @foreach($product as $product)
                         <tr>
                             <td>{{$product->title}}</td>
                             <td>{{$product->description}}</td>
                             <td>{{$product->quantity}}</td>
                             <td>{{$product->category}}</td>
                             <td>{{$product->price}}</td>
                             <td>{{$product->discount_price}}</td>
                             <td><img class="img_src" src="/product/{{$product->image}}">
                             </td>
                             <td><a class="btn btn-info" href="{{url('update_product',$product->id)}}" id="edit_todo">Edit</a></td>
                             <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                         </tr>
                         @endforeach
                     </table>
                 </div>
             </div>

             <!-- container-scroller -->
             <!-- Javascript -->
             @include('admin.script')
             <!-- This script is for ajax in the project -->


 </body>

 </html>