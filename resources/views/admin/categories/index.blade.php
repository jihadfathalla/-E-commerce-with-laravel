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
       <a href="{{route('category.create')}}"><button type="button"
        class="btn btn-success float-left">Create Category</button></a>
        </div>
        
        
    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Action</th>
     </tr>
     </thead>
    <tbody>
    @foreach ($categories as $category)
    <tr>
    <th>{{$category->id}}</th>
    <td>{{$category->name}}</td> 
   <td>
    <a href="{{route('category.show', $category->id)}}"><button type="button"
    class="btn btn-info float-left  mr-2">Show</button></a>
    
                                            
    <a href="{{route('category.edit', $category->id)}}"><button type="button"
    class="btn btn-primary float-left  mr-2 ">Edit</button></a>

    <form action="{{route('category.destroy', $category->id) }}" method="POST"
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



