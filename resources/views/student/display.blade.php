<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Display</title>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Read Users</h1>
                <br>
                {{auth()->user()->name}}
                <br>
                <a href="{{url('/logout')}}">LogOut</a> || <a href="{{url('Student/create')}}">Create</a>
            </div>
            {{ session()->get('message') }}
            <table class="table table-hover table-resposive table-bordered">
                <tr>
                    <th>#</th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>action</th> 

                </tr>
<?php $i=1;?>
@foreach ($data as $fetchedData)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$fetchedData->id}}</td>
                    <td>{{$fetchedData->name}}</td>
                    <td>{{$fetchedData->email}}</td>

                    <td>
                        <a href='{{url('Student/delete/'.$fetchedData->id)}}' class="btn btn-danger m-r-1em">Delete</a>
                        <a href='{{url('Student/edit/'.$fetchedData->id)}}' class="btn btn-primary m-r-1em">Edit</a> 
                    </td>
                </tr>
    
@endforeach               

  
            <tr>
              {{--        <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php if(!empty($data['gov'])) {echo $data['gov'];} else {echo '-' ;}?></td>
                <td><?php if(!empty($data['city'])) {echo $data['city'];} else {echo '-' ;}?></td>
                <td><?php if(!empty($data['extradata'])) {echo $data['extradata'];} else {echo '-' ;}?></td>

                <td>
             <a href="delete.php?id=<?php echo $data['id'];?>" class="btn btn-danger m-r-1em">Delete</a>
             <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-primary m-r-1em">Edit</a> --}}
                </td> 


                
            </tr>
            </table>
        </div>
        
    </body>
</html>