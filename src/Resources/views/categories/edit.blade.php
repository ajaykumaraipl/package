<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
    </head>
    <body>
        <section class="section">
                <!--Navbar -->
                    <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
                        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/news') }}">News</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/categories') }}">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/tags') }}">Tags</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                <!--/.Navbar -->
        </section>
        <section class="content">
                <a href="{{ url('/categories') }}" class="hidden-print" style="margin-left: 40px;">
                    <i class="fas fa-angle-double-left"></i> Back to all 
                    <span>categories</span>
                </a>
            <div class="row m-t-20">
                <div class="col-md-8 col-md-offset-2" style="margin: 0 auto;">
                <!-- Default box -->
                    {{-- <form method="post" action="{{ url('/categories/edit/'.$singleCategory->id) }}">
                        @csrf
                        <div class="col-md-12">
                            <div class="row display-flex-wrap">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <div class="box col-md-12 padding-10 p-t-20">
                                <!-- load the view from type and view_namespace attribute if set -->

                                    <!-- text input -->
                                    <div class="form-group col-xs-12">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{!! $singleCategory->name !!}" class="@error('name') is-invalid @enderror form-control">
                                        @error('name')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- text input -->
                                    <div class="form-group col-xs-12">
                                        <label>Description</label>
                                        <input type="text" name="description" value="{!! $singleCategory->description !!}" class="@error('description') is-invalid @enderror form-control">
                                        @error('description')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <input type="submit" value="Create" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                    <form class="text-center border border-light p-5" method="post" action="{{ url('/categories/edit/'.$singleCategory->id) }}">
                        @csrf
                        <p class="h4 mb-4">Edit Category</p>

                        <!-- Name -->
                        <input type="text" class="@error('name') is-invalid @enderror form-control mb-4" value="{!! $singleCategory->name !!}" name="name" placeholder="Name">
                        @error('name')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Description -->
                        <div class="form-group">
                            <textarea class="@error('description') is-invalid @enderror form-control rounded-0" rows="3" name="description" placeholder="Description">{!! $singleCategory->description !!}</textarea>
                        </div>
                        @error('description')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Send button -->
                        <button class="btn btn-default ladda-button" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </section>
        {{-- @dd($singleNews); --}}
    </body>
</html>
