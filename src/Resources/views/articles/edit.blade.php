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
            <div class="row m-t-20">
                <div class="col-md-8 col-md-offset-2">
                        <a href="{{ url('/news') }}" class="hidden-print" style="margin-left: 40px;">
                            <i class="fas fa-angle-double-left"></i> Back to all 
                            <span>articles</span>
                        </a>
                </div>
            </div>
            <div class="row m-t-20">
                <div class="col-md-8 col-md-offset-2" style="margin: 0 auto;">
                <!-- Default box -->
                    <form class="text-center border border-light p-5" method="post" action="{{ url('/news/edit/'.$singleNews->id) }}" enctype="multipart/form-data">
                        @csrf
                        <p class="h4 mb-4">Edit article</p>
                    
                        <!-- Title -->
                        <input type="text" class="@error('title') is-invalid @enderror form-control mb-4" value="{!! $singleNews->title !!}" name="title" placeholder="title">
                        @error('title')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Slug -->
                        <input type="text" class="@error('slug') is-invalid @enderror form-control mb-4" value="{!! $singleNews->slug !!}" name="slug" placeholder="slug">
                        @error('slug')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- date -->
                        <input type="date" class="@error('date') is-invalid @enderror form-control mb-4" value="{!! date("Y-m-d", strtotime($singleNews->date)) !!}" name="date" placeholder="date">
                        @error('date')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- content -->
                        <div class="form-group">
                            <textarea class="@error('content') is-invalid @enderror form-control rounded-0" rows="3" name="content" placeholder="content">
                                {!! htmlspecialchars($singleNews->content) !!}
                            </textarea>
                        </div>
                        @error('content')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror
                        
                        <div class="form-group text-left">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="@error('image') is-invalid @enderror custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="image" value="{!! $singleNews->image !!}">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <img src={!! url("uploads/package/img/thumbnail/$singleNews->image") !!} height="100" width="100"/>
                        </div>
                        @error('image')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Category -->
                        <select class="@error('category_id') is-invalid @enderror browser-default custom-select mb-4" name="category_id">
                            <option value="">Choose category</option>
                            @foreach ($categories as $categorie)
                                @php
                                    $selected = ($singleNews->category_id ==  $categorie->id)?'selected':'';    
                                @endphp
                                <option value="{!! $categorie->id !!}" {!! $selected !!}>{!! $categorie->name !!}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Tag -->
                        <select class="@error('tags') is-invalid @enderror browser-default custom-select mb-4" name="tags">
                            <option value="">Choose Tag</option>
                            @foreach ($tags as $tag)
                                @php
                                    $selected = ($singleNews->tag ==  $tag->id)?'selected':"$singleNews->tag ==  $tag->id";
                                @endphp
                                <option value="{!! $tag->id !!}" {!! $selected !!}>{!! $tag->name !!}</option>
                            @endforeach
                        </select>
                        @error('tags')
                            <div class="error"  style="color:red">{{ $message }}</div>
                        @enderror

                        <!-- Status -->
                        <select class="@error('status') is-invalid @enderror browser-default custom-select mb-4" name="status">
                            <option value="">Choose status</option>
                            <option value="Publish" {!! (($singleNews->status ==  'Publish') ? 'selected' : '') !!} > Publish </option>
                            <option value="Draft" {!! (($singleNews->status ==  'Draft') ? 'selected' : '' ) !!} > Draft </option>
                        </select>
                        @error('status')
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
