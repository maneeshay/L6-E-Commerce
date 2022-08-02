<!DOCTYPE html>
<html>
  <head>
    <title>Book Update</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/editGames.css')}}">
  </head>
  <body>
    <div class="testbox">
      <form action="{{url('game/update/'.$games->id)}}" method ="POST">
          @csrf
        <div class="banner">
          <h1>Update Game</h1>
        </div>
        <div class="item">
            <label for="">Game Name</label>
            <input type="text" name="game_name" value="{{$games->game_name}}"/>
        </div>
        <div class="item">
          <label for="">Game Price</label>
          <input type="text" name="game_price" value="{{$games->game_price}}"/>
        </div>
        <div class="item">
          <label for="">Game Description</label><br>
          <input type="text" name="game_description" value="{{$games->game_description}}"></textarea>
        </div>
        <div class="item">
          <label>Game Category</label> <br>
						<select  name="game_category" value="{{$games->game_category}}">
							<<option value="adventure">Adventure</option>
							<option value="strategy">Strategy</option>
							<option value="role_play">Role Play</option>
						</select>
        </div>
        <div class="btn-block">
          <button type="submit" href="/">Update</button>
        </div>
      </form>
    </div>
  </body>
</html>