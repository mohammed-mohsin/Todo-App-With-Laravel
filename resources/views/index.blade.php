<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    @if(session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <h3 class="text-center"> {{ Session()->get('success') }}</h3>
        <!-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif




    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">

                            Todo App
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="create" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3 mt-3">
                                <input required name="name" type="text" class="form-control" placeholder="Enter Todo" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <input type="submit" name="create" class="btn btn-outline-secondary" type="button" id="" value="+">
                            </div>
                        </form>

                        <ul class="list-group ">



                            @foreach($todos as $todo)
                            <div class="input-group mb-3">
                                <a href="complete/{{$todo->id}}">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">
                                        <div class="input-group-text">
                                            @if($todo->complete)
                                            <input class="form-check-input mt-0" checked type="radio" value="" aria-label="Checkbox for following text input">
                                            @endif

                                            @if(!$todo->complete)
                                            <input class=" form-check-input mt-0" disabled type="radio" name="radio" aria-label="Checkbox for following text input">
                                            @endif


                                        </div>
                                    </span>

                                </a>

                                @if($todo->complete)
                                <li class="list-group-item w-75"><s>{{$todo->name}}</s></li><a href="delete/{{$todo->id}}" class="btn btn-danger btn-sm float-end">X</a>
                                @endif
                                @if(!$todo->complete)
                                <li class="list-group-item w-75">{{$todo->name}}</li><a href="delete/{{$todo->id}}" class="btn btn-danger btn-sm float-end">X</a>
                                @endif


                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>