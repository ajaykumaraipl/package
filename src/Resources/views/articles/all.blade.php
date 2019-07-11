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
        <!-- Default box -->
        <div class="row">
            <!-- THE ACTUAL CONTENT -->
            <div class="col-md-12">
                <div class="row m-b-10">
                    <div class="row m-b-10">
                        <div class="col-xs-6">
                            <div class="hidden-print with-border" style="margin-left: 40px;">
                                <a href={{ url("/news/create") }}
                                    class="btn btn-default ladda-button" data-style="zoom-in">
                                    <span class="ladda-label">
                                        <i class="fas fa-plus"></i> Add article
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-hidden">
                    <div id="crudTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row" style="margin: 0 auto;">
                            <div class="col-sm-12">
                                <table class="table table-striped table-hover table-responsive">
                                    <thead class="">
                                        <tr role="row">
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($allNews as $news)
                                            <tr role="row" class="odd">
                                                <td tabindex="0">
                                                    <span>
                                                            {!! $news->date ?: '<font style="color:red"> No Data</font>' !!}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span>{!! $news->status ?: '<font style="color:red"> No Data</font>' !!}</span>
                                                </td>
                                                <td>
                                                    <span>{!! $news->title ?: '<font style="color:red"> No Data</font>'!!}</span>
                                                </td>
                                                <td>
                                                    <img src={!! url("uploads/package/img/thumbnail/$news->image") !!} style="width:100px"/>
                                                </td>
                                                <td>
                                                    <span>{!! $news->category_name !!}</span>
                                                </td>
                                                <td>
                                                    @php
                                                        $tagName = '';
                                                        foreach ($tags as $key => $tag) {
                                                            if ($tag->id == $news->tag){
                                                                $tagName = $tag->name;
                                                            }
                                                        }    
                                                    @endphp
                                                    <span>{!! $tagName !!}</span>
                                                </td>
                                                <td>
                                                    <!-- Single edit button -->
                                                    <a href={{ url("/news/edit/$news->id") }}
                                                        class="btn btn-sm btn-outline-default waves-effect">
                                                        <i class="far fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href={{ url("/news/delete/$news->id") }} 
                                                        class="btn btn-sm btn-outline-danger waves-effect">
                                                        <i class="far fa-trash-alt"></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
    </section>
    {{-- @dd($allNews); --}}
</body>

</html>