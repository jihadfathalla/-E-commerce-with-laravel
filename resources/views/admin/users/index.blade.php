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
        <h1 style="color:#3cb371"><strong>Customers</strong></h1>
        <div class="p-2">
       <a href="{{route('user.create')}}"><button type="button"
        class="btn btn-success float-left">Create User</button></a>
        </div>
        
        
    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
       <th>Name</th>
       <th>Email</th>
       <th>Action</th>
     </tr>
     </thead>
    <tbody>
    @foreach ($customers as $customer)
    <tr>
    <th>{{$customer->name}}</th>
    <td>{{$customer->email}}</td> 
   <td>
    <a href="{{route('user.show', $customer->id)}}"><button type="button"
    class="btn btn-info float-left  mr-2">Show</button></a>
    
                                            
    <a href="{{route('user.edit', $customer->id)}}"><button type="button"
    class="btn btn-primary float-left  mr-2 ">Edit</button></a>

    <form action="{{route('user.destroy', $customer->id) }}" method="POST"
    class="float-left mr-2"> 
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger float-left   mr-2" onclick="return confirm ('are you sure?')">Delete</button>
    </form>
       
    </td>
    </tr>
    
    @endforeach

    </tbody>
         </table>
  
          
</div>

</div>
</div>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')



