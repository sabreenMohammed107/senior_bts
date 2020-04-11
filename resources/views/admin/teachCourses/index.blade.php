@extends('admin.adminLayout.main')
@section('title', 'Home')


@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
      <a href="{{url('admin')}}"><i class="material-icons"></i> {{ __('Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> {{ __('Training Course') }} </li>
    </ol>
  </nav>

@endsection

@section('content')


<div class="row">

          <div class="col-md-12">
  
  
  
            <div class="ms-panel">
              <div class="ms-panel-header d-flex justify-content-between">
                <h6>Expertise</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add new </a>
              </div>
              <div class="ms-panel-body">
                <div class="table-responsive">
                  <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                    <thead>
						<tr>
                        <th>#</th>
							<th>Course Name </th>
							<th>Action</th>
						</tr>
                    </thead>
                    @foreach($teachCourses as $index => $teachCourse)
                    <tbody>
  
                      <tr>
					  	<td>{{ $index +1 }}</td>
                        
                        
                        <td><p>{{ $teachCourse->name }}</p></td>

                        <td>
                          <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                          data-target="#editclient{{$teachCourse->id}}">edit</a>
                          <a href="#" onclick="destroy('this TeachCourse','{{$teachCourse->id}}')"  class="btn d-inline-block btn-danger">delete</a>
                        <form id="delete_{{$teachCourse->id}}" action="{{ route('teach.destroy', $teachCourse->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                        </td>
                      </tr>
  
                    </tbody>
                    <!-- Edit Expertise Modal -->
   <div class="modal fade" id="editclient{{$teachCourse->id}}" tabindex="-1" role="dialog" aria-labelledby="editclient">
    <div class="modal-dialog modal-lg " role="document">
      <div class="modal-content">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
         
        </button>
        <h3>Edit Course</h3>
        <div class="modal-body">
          <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
            <form action="{{route('teach.update',$teachCourse->id) }}" method="POST">
              @csrf
        @method('PUT')
                <div class="ms-auth-container row">
                    
                    

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Course Name</label>
                      <div class="input-group">
                        <input type="text" name="name" value="{{$teachCourse->name}}" id="newOrder" class="form-control" placeholder="Name">
                      </div>
                    </div> </div>
                  
                  </div>
                  <div class="input-group d-flex justify-content-end text-center">
                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                    <input type="submit" value="Add" class="btn btn-success ">
                  </div>
 </form>
      </div>
    </div>
  </div>

</div>
</div>
</div>
      
      <!--  Setup  -->
      @endforeach
                  </table>
                </div>
              </div>
            </div>
  
  
  
  
          </div>
  
        </div>

        <!-- Add Expertise Modal -->
    <div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
      <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
          <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X
           
          </button>
          <h3>Add Course</h3>
        
          <div class="modal-body">
  
           
            <div class="ms-auth-container row no-gutters">
              <div class="col-12 p-3">
              <form action="{{route('teach.store') }}" method="POST">
			  		<div class="ms-auth-container row">
            @csrf
                      

                        <div class="col-md-12">
                          <div class="form-group">
						  	<div class="form-group">


						  			<label>Course Name</label>
						  		</div>

						  		<div class="input-group">
						  			<input type="text" name="name" class="form-control" placeholder="Name">
						  		</div>
						  	</div>
                            <!--<div class="input-group">
                              <input type="text" id="newClient" class="form-control" placeholder="client">
                            </div>-->
                          </div>
						</div>
                   
                    <div class="input-group d-flex justify-content-end text-center">
                      <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                      <input type="submit" value="Add" class="btn btn-success ">
                    </div>
   </form>
        </div>
      </div>
    </div>

  </div>
</div>
	</div>
<!-- /Add Expertise Modal -->


@endsection
@section('scripts')

@endsection