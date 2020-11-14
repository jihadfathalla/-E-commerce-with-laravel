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
    <h1 style="color:#3cb371"><strong>Questions</strong></h1>
    <div class="p-2">
    <a href="{{route('questions.create')}}"><button type="button"
     class="btn btn-success float-left">Create Question</button></a>
     </div>

     <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
    <tr>
      <th>ID</th>
      <th>Question</th>
      <th>User</th>
      <th>Professional</th>
      <th>category</th>
      <th>State</th>
      <th>Created_at</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($questions as $question)
    <tr>
      <td>{{$question->id}}</td>
      <td>{{$question->question}}</td>
      <td>{{ $question->user ? $question->user->name : 'not exist'}}</td>
      <td>{{ $question->prof ? $question->prof->name : 'not exist'}}</td>
      <td>{{ $question->category ? $question->category->name : 'not exist'}}</td>
      <td>{{$question->state}}</td>
      <td>{{$question?$question->created_at:""}}</td>
      <td>
        <a href="{{route('questions.show',['question'=> $question->id])}}"
         class="btn btn-info  float-left mb-2">Show</a>

        <a href="{{route('questions.edit',['question'=> $question->id])}}"
         class="btn btn-primary  float-left mb-2 mr-2">Edit</a>

        <a class="btn btn-danger float-left " href="#" role="button" data-toggle="modal"
         data-target="#delete-modal-{{$question->id}}"  class="float-left mr-2">Delete</a>
          
         <div class="modal fade" id="delete-modal-{{$question->id}}" tobindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document" >
              <div class="modal-content">
                <form method="POST"  action="{{route('questions.destroy',$question->id)}}"
                class="float-left mr-2">
                  @csrf
                  @method('DELETE')
                  <div class="modal-header">
                    <h5 class="modal-title">Delete question #{{$question->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Click delete to delete the question!
                    
                  </div>
                  <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger  mr-2">Delete</button>
                  </div>
                </form>
            </td>
          </div>
        </div>
      </div>               
      @endforeach
    </tr>
  </tbody>
</table>
</div>
</div>
</div>
@include('admin.layouts.footer')