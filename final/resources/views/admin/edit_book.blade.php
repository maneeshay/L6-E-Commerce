<!DOCTYPE html>
<html>
  <head>
    <title>Book Update</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('asset/css/editBook.css')}}">
  </head>
  <body>
    <div class="testbox">
      <form action="{{url('book/update/'.$books->id)}}" method ="POST">
          @csrf
        <div class="banner">
          <h1>Update Book</h1>
        </div>
        <div class="item">
            <label for="">Book Name</label>
            <input type="text" name="book_name" value="{{$books->book_name}}"/>
        </div>
        <div class="item">
          <label for="">Book Price</label>
          <input type="text" name="book_price" value="{{$books->book_price}}"/>
        </div>
        <div class="item">
          <label for="">Book Description</label><br>
          <input type="text" name="book_description" value="{{$books->book_description}}"></textarea>
        </div>
        <div class="item">
          <label>Book Category</label> <br>
						<select  name="book_category" value="{{$books->book_category}}">
							<option value="fictional">Fictional</option>
							<option value="love story">Love Story</option>
							<option value="horror">Horror</option>
							<option value="mystery">Mystery</option>
						</select>
        </div>
        
        <div class="btn-block">
          <button type="submit" href="/">Update</button>
        </div>
      </form>
    </div>
  </body>
</html>