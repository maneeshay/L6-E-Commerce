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
						<h2>Manage <b>Games</b></h2>    
					</div>
                    
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Game</span></a>
						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Game Image</th>
						<th>Game Name</th>
						<th>Price</th>
						<th>Created at</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($games as $game)
					<tr>
						<th scope="row">{{$games->firstItem()+$loop->index}}</th>
						<td><img src="{{asset($game->game_image)}}" style="height:40px;width:70px;" alt="" srcset=""></td>
						<td>{{$game->game_name}}</td>
						<td>{{$game->game_price}}</td>
						<td>{{$game->created_at->diffForHumans()}}</td>
						<td>	
							<a href="{{ url('game/edit/'.$game->id) }}" class="btn btn-info">Edit</a><br><br>
							<a href="{{ url('game/delete/'.$game->id) }}" class="btn btn-info">Delete</a>	
						</td>
					</tr>	
					@endforeach	
				</tbody>
				
			</table>
			{{$games->links()}}
		</div>
	</div>        
</div>
 <!--link for pagination-->
 
 

<!-- Add Game -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('store.game')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add New Game</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Game Image</label>
						<input type="file" name="game_image" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Game Name</label>
						<input type="text" name="game_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Game Price</label>
						<input type="text" name="game_price" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Game Description</label>
						<textarea name="game_description"class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Game Category</label> <br>
						<select  name="game_category">
							<option value="adventure">Adventure</option>
							<option value="strategy">Strategy</option>
							<option value="role_play">Role Play</option>
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

<!-- Delete Games -->
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