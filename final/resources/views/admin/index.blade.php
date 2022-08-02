@extends('admin.admin_master')
@section('admin')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
          	<a class="navbar-brand" href="{{route('admin_dashboard')}}">Dashboard</a>
          	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="{{route('admin_dashboard')}}">Books</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('game.index')}}">Games</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('cd.index')}}">CDs</a>
					</li>
				</ul>
				<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit" >Search</button>
				</form>	
          	</div>
        </div>
		<!-- {{Auth::guard('admin')->user()->name}} -->

		<div class="dropdown">
			<button class="dropbtn">{{Auth::guard('admin')->user()->name}}</button>
			<div class="dropdown-content">
				<a href="#">My profile</a>
				<a href="{{route('admin.logout')}}">Logout</a>	
			</div>
		</div>
</nav>
	  
<div class="container-xl">
		@if(Session::has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('success')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif()	




	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Books</b></h2>    
					</div>
                    
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Book</span></a>
						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Book Image</th>
						<th>Book Name</th>
						<th>Price</th>
						<th>Created at</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($books as $book)
					<tr>
						<th scope="row">{{$books->firstItem()+$loop->index}}</th>
						<td><img src="{{asset($book->book_image)}}" style="height:40px;width:70px;" alt="" srcset=""></td>
						<td>{{$book->book_name}}</td>
						<td>{{$book->book_price}}</td>
						<td>{{$book->created_at->diffForHumans()}}</td>
						<td>
							<!-- <a href="{{url('book/edit/'.$book->id) }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> -->
							<a href="{{ url('book/edit/'.$book->id) }}" class="btn btn-info">Edit</a><br><br>
							<a href="{{ url('book/delete/'.$book->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-info">Delete</a>
							<!-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> -->
						</td>
					</tr>	
					@endforeach				
				</tbody>
			</table>
			{{$books->links()}}
		</div>
	</div>        
</div>
 <!--link for pagination-->


<!-- Add Book -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('store.book')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add New Book</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Book Image</label>
						<input type="file" name="book_image" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Book Name</label>
						<input type="text" name="book_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Book Price</label>
						<input type="text" name="book_price" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Book Description</label>
						<textarea name="book_description"class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Book Category</label> <br>
						<select  name="book_category">
							<option value="fictional">Fictional</option>
							<option value="love story">Love Story</option>
							<option value="horror">Horror</option>
							<option value="mystery">Mystery</option>
						</select>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Delete BooKs -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>