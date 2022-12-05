<!DOCTYPE html>
<html>
<head>
	    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
	<title>Edit Spaceship</title>
</head>
<body>

		<form action={{url('update_spaceship')}} method="post" enctype="multipart/form-data">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			@csrf <!-- {{ csrf_field() }} -->

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="name" class="form-control" name="name"  value="{!! $spaceship->spaceship_name !!}">
 		  </div>
		  <div class="form-group">
		    <label for="email">class</label>
		    <input type="text" name="spaceship_class" class="form-control" id="spaceship_class" value="{!! $spaceship->spaceship_class !!}">
		  </div>
		  <div class="form-group">
		    <label for="email">Crew</label>
		    <input type="text" name="crew" class="form-control" id="crew" value="{!! $spaceship->crew !!}">
		  </div>

		  <div class="form-group">
		    <label for="email">Image</label>
		    <input type="file" name="file" class="form-control" id="file"  >
		  </div>

		  <div class="form-group">
		    <label for="email">Image</label>
		    <img src="{{url('spaceship/'.$spaceship->image)}}" width="500px" height="250px" >
		  </div>



		  <div class="form-group">
		    <label for="value">Value</label>
		    <input type="text" name="spaceship_value" class="form-control" id="spaceship_value" value="{!! $spaceship->spaceship_value !!}" >
		  </div>

		  <div class="form-group">
		    <label for="email">Status</label>
		    <select name="status" class="form-control">
		    	<option value="operational" {{ $spaceship->status == 'operational' ? 'selected' : '' }}>Ooperational</option>
		    	<option value="damaged" {{ $spaceship->status == 'damaged'? 'selected' : '' }} >Damaged</option>
		    </select>

		    <input type="hidden" name="id" value="{{$spaceship->id}}">

		  </div>

		  <br/>
		  <br/>


 		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>

</body>
</html>