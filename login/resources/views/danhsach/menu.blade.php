

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    

<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($demo as $dm)
            @csrf
            <tr>
                <td id="{{ $dm->id }}">{{ $dm->id }}</td>
                <td id="name-{{ $dm->id }}">{{ $dm->name }}</td>
                <td id="email-{{ $dm->id }}">{{ $dm->email }}</td>
                <td id="password-{{ $dm->id }}">{{ $dm->password }}</td>
                
              

            </tr>
        @endforeach
    </tbody>
    
</table>

</body>
</html>