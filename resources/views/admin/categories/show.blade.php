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
        <h1 style="color:#3cb371"><strong>categories</strong></h1>
        <div class="p-2">
       <a href=""><button type="button"
        class="btn btn-success float-left">Create Category</button></a>
        </div>
        
        
    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
     </tr>
     </thead>
    <tbody>
    <th>{{$category->id}}</th>
    <td>{{$category->name}}</td> 
       </tbody>
         </table>
                        
        </div>
          </div>
          </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')


