
<html lang="en">
<head>
  <title>Laravel  Image Intervention</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container">
    <h3 class="jumbotron">Laravel  Image Intervention </h3>
    <form method="post" action="{{url('upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <input type="file" name="file1" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
          <button type="submit" class="btn btn-success" style="margin-top:10px" value="upload">Upload Image</button>
          </div>
        </div>    
        @if($image)
   	    <div class="row">
         <div class="col-md-8">
              <strong>Original Image:</strong>
              <br/>
              <img src="/images/{{$image->file1}}" />
        </div>
        <div class="col-md-4">
            <strong>Thumbnail Image:</strong>
            <br/>
            <img src="/thumbnail/{{$image->file1}}"  />
       	 </div>
   		</div>
        @endif        
  </form>
  </div>
</body>
</html>