<!DOCTYPE html>
<html>
  <head>
    <title>CD Update</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/editGames.css')}}">
  </head>
  <body>
    <div class="testbox">
      <form action="{{url('cd/update/'.$cds->id)}}" method ="POST">
          @csrf
        <div class="banner">
          <h1>Update CD</h1>
        </div>
        <div class="item">
            <label for="">CD Name</label>
            <input type="text" name="cd_name" value="{{$cds->cd_name}}"/>
        </div>
        <div class="item">
          <label for="">CD Price</label>
          <input type="text" name="cd_price" value="{{$cds->cd_price}}"/>
        </div>
        <div class="item">
          <label for="">CD Description</label><br>
          <input type="text" name="cd_description" value="{{$cds->cd_description}}"></textarea>
        </div>
        <div class="item">
          <label>CD Category</label> <br>
						<select  name="cd_category" value="{{$cds->cd_category}}">
							<<option value="pop">Pop</option>
							<option value="classical">Classical</option>
							<option value="romantic">Romantic</option>
						</select>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">Update</button>
        </div>
      </form>
    </div>
  </body>
</html>