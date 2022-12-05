<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <title>List All Spaceships</title>
   </head>
  <body>

    
    	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Status</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<h4><a href={{url('/add')}}>Add</a></h4>
   
  	@if(null!==($all_spaceships))
   	@foreach($all_spaceships as $spaceship) 	
 
    <tr>
      <th scope="row">{{$spaceship->id}}</th>
      <td>{{$spaceship->spaceship_name}}</td>
      <td>{{$spaceship->spaceship_class}}</td>
      <td>{{$spaceship->status}}</td>
       <td><a href={{url('edit_spaceship/'.$spaceship->id)}}>Edit</a> | <a href={{url('/delete_user/'.$spaceship->id)}}>Delete</a> <a href="{{url('spaceship_details/'.$spaceship->id)}}">Details</a></td>
     </tr>
    @endforeach   

    @else
    <tr ><th scope="row"></th><td></td><td>No Data to show</td><td></td> </tr>
    @endif


  </tbody>
</table>
  </body>
 
 
 </html>

