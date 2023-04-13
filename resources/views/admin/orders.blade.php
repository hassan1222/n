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

    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_deg {
            background-color:  blueviolet;
        }

        .img_size {
            width: 200px;
            height: 100px;
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
                    <h1 class="title_deg">All Orders Placed</h1>

                    <table class="table_deg">
                        <tr class="th_deg">
                            <th style="padding:10px;">Name</th>
                            <th style="padding:10px;">Email</th>
                            <th style="padding:10px;">Address</th>
                            <th style="padding:10px;">Phone</th>
                            <th style="padding:10px;">Product Title</th>
                            <th style="padding:10px;">Quantity</th>
                            <th style="padding:10px;">Price</th>
                            <th style="padding:10px;">Payment Status</th>
                            <th style="padding:10px;">Delivery Status</th>
                            <th style="padding:10px;">Image</th>
                            <th style="padding:10px;">Delivered</th>
                        </tr>
                        @foreach($order as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$order->image}}">
                            </td>
                            <td>
                                @if($order->delivery_status=='processing')
                                <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this is delivered?')" class="btn btn-primary">Delivered</a>
                                @else
                                <p>Delivered</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- container-scroller -->
            <!-- Javascript -->
            @include('admin.script')
</body>

</html>