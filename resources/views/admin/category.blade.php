<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- CSS -->
    @include('admin.css')

    <!-- Styling our category page -->
    <style type="text/css">
        .div_center{
            text-align:center; 
            padding-top:40px;
        }
        .h2_font{
            font-size:40px;
            padding-bottom:40px;
        }
        .input_color{
            color:black;
        }
        .center{
          margin:auto;
          width:50%;
          text-align:center;
          margin-top:30px;
          border:3px solid green;
        }
        #button_color{
          background-color: green;
          font-weight: bold;
          font-size:27px;
     
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
            <div class='content-wrapper'>
                <!-- To display the message if the category is added successfully. -->
             @if(session()->has('message'))
             <div class="alert alert-success alert-dissmissible" role="alert">
                <!-- To close the session when data added successfully -->
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                {{session()->get('message')}}
             </div>   
             @endif

            <div class='div_center'>
                <h2 class="h2_font">Add Category</h2>
                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input class="input_color" type="text" name="category" placeholder="Write Category name" >
                    <button type="submit" class="btn btn-success" id="button_color">Add Category</button>
                </form>
                </div>

                <!-- Showing category Data -->
                <table class="center">
                  <tr>
                    <td>Category Name</td>
                    <td>Action</td>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td>{{$data->category_name}}</td>
                    <td>
                      <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
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
