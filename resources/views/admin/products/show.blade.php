@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <div class="container">
        <div class="p-3" style="text-align:center">
        <h1 style="color:#3cb371"><strong>Products</strong></h1>
        <div class="p-2">
       <a href=""><button type="button"
        class="btn btn-success float-left">Create Product</button></a>
        </div>
        
        
    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
      <th>Name</th>
       <th>SKE</th>
       <th>Image</th>
       <th>BrandId</th>
       <th>CategoryId</th>
     </tr>
     </thead>
    <tbody>
    <th>{{$product->name}}</th>
    <td>{{$product->ske}}</td> 
    <td><img style="width: 50px;" src="/uploads/images/{{$product->image}}" alt="">
    <td>{{$product->brand_id}}</td> 
    <td>{{$product->category_id}}</td> 
       </tbody>
         </table>
                        
        </div>
          </div>
          </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')


