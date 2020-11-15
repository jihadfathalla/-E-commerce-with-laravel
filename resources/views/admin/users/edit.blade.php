
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
  
        <form method="POST" action="{{route('user.update',$user->id)}}" class="mb-4" >
        @csrf 
            @method('POST')
            <div style="text-align:center">
                    <h1 style="color:#E44D3A; font-size:50px;"><strong>Edit User</strong></h1> 
                </div>     

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Name</strong></label>
            <input name="name" type="text"  class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group mt-5">
            <label style="color: #E44E3A"><strong>Email</strong></label>
            <input name="email" type="text"  class="form-control" value="{{$user->email}}">
        </div>


        
        <div class="justify-content-end mt-5">
           <input type="submit" value="Submit" class="btn btn-success">
           </div>
    </form>

    <div class="pull-right m-3">
                <a class="btn btn-primary" href="{{route('user.index')}}">Back</a>
            </div>
      </div>

</div>
</div>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
  