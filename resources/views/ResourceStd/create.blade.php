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
  <form method="post" action="{{ url('/Users') }}"  enctype ="multipart/form-data"> 
  <!-- token hidden input --> 
  <input type="hidden" name="_token" value="{{  csrf_token() }}" /> 
  
  <div class="form-group"> 
    <label for="exampleInputPassword1">  name </label> 
    <input type="text" name="name"   value="{{old('name')}}" class="form-control" id="exampleInputPassword1" placeholder="name"> 
  </div> 

  <div class="form-group"> 
    <label for="exampleInputEmail1">Email address</label> 
    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> 
  </div> 
 
  <div class="form-group"> 
    <label for="exampleInputPassword1">  Password </label> 
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> 
  </div> 

  
  <div class="form-group"> 
    <label for="exampleInputPassword1">  Department </label> 
    <select name="dep_id" class="form-control">
      @foreach ($data as $dep)
        <option value="{{$dep->id}}">{{$dep->title}}</option>
          
      @endforeach 
    </select>
  </div> 
  
   
  <button type="submit" class="btn btn-primary">check</button> <br><br><br> 
  <p>Don't have an account ? <a href="signup.php"> SignUp </a></p> 
</form> 
</div> 
 
 
 
</body> 
</html>