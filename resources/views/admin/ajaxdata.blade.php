<head>
    <title>Ajax Fetching Records</title>
    <!-- bootstrap core css -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @include('admin.css')

    <style type="text/css">
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

        .th_design {
            padding: 30px;

        }

        .th_color {
            background: blueviolet;
        }

        .img_src {
            width: 150px;
            height: 150px;
        }

      
    </style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container">
                        <h2 class="font_size">All Products</h2>
                        <!-- <table class="table table-bordered table-striped " id="productTable"> -->
                        <table class="center" id="productTable">
                            <thead>
                                <p><br><input type="button" value="Fetch all products" id="btn" class="btn btn-success"></p>
                                <tr class="th_color">
                                    <th class="th_design">Product Title</th>
                                    <th class="th_design">Description</th>
                                    <th class="th_design">Quantity</th>
                                    <th class="th_design">Category</th>
                                    <th class="th_design">Price</th>
                                    <th class="th_design">Discount Price</th>
                                    <th class="th_design">Product Image</th>

                                </tr>
                            </thead>
                            <tbody id='tbody'>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>


            <script type='text/javascript'>
                $(document).ready(function() {
                    $("#btn").on('click', function() {

                        $.ajax({
                            url: "/getproducts",
                            type: "GET",
                            success: function(result) {
                                console.log("Result: ", result);
                                result.forEach((products) => {
                                    return $("#tbody").append(
                                        "<tr><td>" +
                                        products.title +
                                        "</td><td>" +
                                        products.description +
                                        "</td><td>" +
                                        products.quantity +
                                        "</td><td>" +
                                        products.category +
                                        "</td><td>" +
                                        products.price +
                                        "</td><td>" +
                                        products.discount_price +
                                        "</td><td>" +
                                        `<img class="img_src" src=/product/${products.image}>` +
                                        "</td></tr>"


                                    );
                                });
                            },

                        });
                    });
                });
            </script>



</body>