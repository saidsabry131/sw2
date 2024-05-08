<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><h2>student management system</h2></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              
          </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <a class="active" href="/">Home</a>
                <a href="{{ url('/users/')}}">student</a>
                <a href="">Docter</a>
                <a href="">Courses</a>
                <a href="">Enrollment</a>
                <a href="">payment</a>
              </div>
              
             
              

        </div>

        <div class="col-md-9">
            
                @yield("content")
           
        </div>
    </div>



    </div>
    
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>