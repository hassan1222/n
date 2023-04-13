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
    <!-- was unable to find css in public so we mentioned base -->

    <base href="/public">
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

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        #button_color {
            background-color: blueviolet;
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
                    <h1 class="font_size">Updating The Product</h1>
                    <!-- enctype is needed beacuse we are adding the product image. -->
                    <!-- uploading file by choosing it so it is needed -->
                    <div class="modal-body">
                        <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="div_design">
                                <label>Product Title : </label>
                                <input class="text_color" id="title" type="text" name="title" placeholder="Product Title" required="" value="{{$product->title}}">
                            </div>
                            <div class="div_design">
                                <label>Product description : </label>
                                <input class="text_color" id="description" type="text" name="description" placeholder="Product Description" required="" value="{{$product->description}}">
                            </div>
                            <div class="div_design">
                                <label>Product Price : </label>
                                <input class="text_color" id="product_price" type="number" name="price" placeholder="Product Price" required="" value="{{$product->price}}">
                            </div>
                            <div class="div_design">
                                <label>Discount Price : </label>
                                <input class="text_color" id="discount_price" type="number" name="discount_price" placeholder="Discount Price" value="{{$product->discount_price}}">
                            </div>
                            <div class="div_design">
                                <label>Product Quantity : </label>
                                <input class="text_color" id="quantity" type="number" min="0" name="quantity" placeholder="Quantity" required="" value="{{$product->quantity}}">
                            </div>
                            <div class="div_design">
                                <label>Product Category : </label>
                                <select class="text_color" id="category" name="category" required="">
                                    <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                    <!-- Showing other categories as well -->
                                    @foreach($category as $category)
                                    <option>{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- Showing the image -->
                            <div class="div_design">
                                <label>Current Product Image</label>
                                <img style="margin:auto;" id="image" height="100" width="100" src="/product/{{$product->image}}">
                            </div>

                            <div class="div_design">
                                <label>Change Product Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="div_design">
                                <button type="submit" class="btn btn-info" id="button_color" value="Add Product">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- container-scroller -->
            <!-- Javascript -->
            @include('admin.script')
</body>

</html>