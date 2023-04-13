<!-- Responsible for creating loguout option -->
<!-- <x-app-layout>
   
</x-app-layout> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- CSS -->
    @include('admin.css')
    <!-- Styling for the adding the products in the admin page -->
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }
        label{
            display:inline-block;
            width:200px;
        }

        .div_design{
            padding-bottom: 15px;
        }
        #button_color{
            background-color: green;
            font-size: 25px;
            
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
                <div class="div_center">

                @if(session()->has('message'))
             <div class="alert alert-success alert-dissmissible" role="alert">
                <!-- To close the session when data added successfully -->
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                {{session()->get('message')}}
             </div>   
             @endif
                    <h1 class="font_size">Add Product</h1>
                    <!-- enctype is needed beacuse we are adding the product image. -->
                    <!-- uploading file by choosing it so it is needed -->
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="div_design">
                        <label>Product Title : </label>
                        <input class="text_color" type="text" name="title" placeholder="Product Title" required="">
                    </div>
                    <div class="div_design">
                        <label>Product description : </label>
                        <input class="text_color" type="text" name="description" placeholder="Product Description" required="">
                    </div>
                    <div class="div_design">
                        <label>Product Price : </label>
                        <input class="text_color" type="number" name="price" placeholder="Product Price" required="">
                    </div>
                    <div class="div_design">
                        <label>Discount Price : </label>
                        <input class="text_color" type="number" name="discount_price" placeholder="Discount Price" >
                    </div>
                    <div class="div_design">
                        <label>Product Quantity : </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Quantity" required="">
                    </div>
                    <div class="div_design">
                        <label>Product Category : </label>
                       <select class="text_color" name="category" required="">
                       <option value="" selected="">Add a category here </option> 
                       @foreach($category as $category)
                       <option>{{$category->category_name}}</option>
                       @endforeach
                       </select>
                    </div>
                    
                    <div class="div_design">
                        <label>Product Image</label>
                        <input type="file" name="image" required="">
                    </div>
                    <div class="div_design">
                      <button type="submit" class="btn btn-success" id="button_color" value="Add Product">Add Product</button>
                    </div>
                    </form>
                </div>
            </div>

            <!-- container-scroller -->
            <!-- Javascript -->
            @include('admin.script')
</body>

</html>