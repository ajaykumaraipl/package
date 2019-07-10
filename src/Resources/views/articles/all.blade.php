<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section class="section">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/news') }}">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/news') }}">News</a></li>
                    <li><a href="{{ url('/categories') }}">Categories</a></li>
                    <li><a href="{{ url('/tags') }}">Tags</a></li>
                </ul>
            </div>
        </nav>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <!-- THE ACTUAL CONTENT -->
            <div class="col-md-12">
                <div class="">
                    <div class="row m-b-10">
                    <div class="row m-b-10">
                        <div class="col-xs-6">
                            <div class="hidden-print with-border">
                                <a href={{ url("/news/create") }}
                                    class="btn btn-primary ladda-button" data-style="zoom-in">
                                    <span class="ladda-label">
                                        <i class="fa fa-plus"></i>Add article
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div id="crudTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="crudTable"
                                        class="box table table-striped table-hover display responsive nowrap m-t-0 dataTable dtr-inline"
                                        cellspacing="0" aria-describedby="crudTable_info" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>Featured</th>
                                                <th>Category</th>
                                                <th>Tags</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allNews as $news)
                                                <?php
                                                    // echo "<pre>";
                                                    //     print_r($news);
                                                    // echo "</pre>";
                                                ?>
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
                                                        <span>
                                                            @if($news->featured == 0)
                                                                <span class="glyphicon glyphicon-remove" style="color:red"></span>
                                                            @else
                                                                <span class="glyphicon glyphicon-ok" style="color:green"></span>
                                                            @endif
                                                        </span>
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
                                                            class="btn btn-xs btn-default">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                            Edit
                                                        </a>
                                                        <a href={{ url("/news/delete/$news->id") }} 
                                                            class="btn btn-xs btn-default" data-button-type="delete">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Title</th>
                                                <th>Featured</th>
                                                <th>Category</th>
                                                <th>Tags</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section>
    {{-- @dd($allNews); --}}
</body>

</html>