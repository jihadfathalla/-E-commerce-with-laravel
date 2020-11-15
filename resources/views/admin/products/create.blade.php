
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
@if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  
    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        <h1 style="color:#3cb371"><strong>Create New Product</strong></h1>
        <div class="form-group ">
            <label >Name</label>
            <input name="name" type="text"  class="form-control">
        </div>
        

        <div class="form-group mt-5">
   <h6 ><strong>Product Image</strong></h6>
  <div class="custom-file ">
  <input type="file"  class="form-control"  name="image">
</div>
</div>

        <div class="form-group mt-5">
            <label >Brand</label>
            <select  class="form-control"  name="brand_id">
            @foreach ($brands as $brand)
               <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
            </select>
            </div>

            <div class="form-group mt-5">
            <label >Categories</label>
            <select  class="form-control"  name="brand_id">
            @foreach ($categories as $category)
               <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
            </div>

        <div class="justify-content-end">
           <input type="submit" value="Create" class="btn btn-success">
           </div>

        </div>

    </form>
    
     
</div>

  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')





