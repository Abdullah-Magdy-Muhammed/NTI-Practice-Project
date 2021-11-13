<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>Registeration</title> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head> 
<body> 
 
<div class="container"> 
  <h2>Register</h2> 

  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
   @endif 
  <form method="post" action="{{ url('/Users/'.$data->id) }}"  enctype ="multipart/form-data"> 
  <!-- token hidden input --> 
  @csrf
  <input type="hidden" name="_method" value="put">
  @method("put")
  <div class="form-group"> 
    <label for="exampleInputPassword1">  {{trans('website.name')}} </label> 
    <input type="text" name="name"   value="{{$data->name}}" class="form-control" id="exampleInputPassword1" placeholder="name"> 
  </div> 

  <div class="form-group"> 
    <label for="exampleInputEmail1">{{trans('website.email')}}</label> 
    <input type="email" name="email" value="{{$data->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
  </div> 
   
  <button type="submit" class="btn btn-primary">{{trans('website.save')}}</button> 
 
</form> 
</div> 
 
 
 
</body> 
</html>