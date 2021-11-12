<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <h2>Login</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                    
                    @endforeach
                </ul>
            </div>
            @endif

            {{session()->get('message')}}
            <form method="post" action="{{ url('/Student/dologin') }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">E-Mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword" aria-describedby="emailHelp" placeholder="email">
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="password">
            </div>
            
            <div class="form-group">
                <input type="checkbox" name="R_me">
                <label for="exampleInputPassword">Remember me</label>
            </div>

            <button type="submit">Login</button>
           
        </form>
        </div>
        
    </body>
</html>