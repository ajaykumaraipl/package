<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
            <a href="{{ url('/news') }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> Back to all <span>articles</span></a>
            <div class="row m-t-20">
                <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                    <form method="post" action="{{ url('/news/edit/'.$singleNews->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="row display-flex-wrap">
                                <!-- load the view from the application if it exists, otherwise load the one in the package -->

                                <div class="box col-md-12 padding-10 p-t-20">
                                <!-- load the view from type and view_namespace attribute if set -->

                                    <!-- text input -->
                                    <div class="form-group col-xs-12">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{!! $singleNews->title !!}" class="@error('title') is-invalid @enderror form-control">
                                        @error('date')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- text input -->
                                    <div class="form-group col-xs-12">
                                        <label>Slug (URL)</label>
                                        <input type="text" name="slug" value="{!! $singleNews->slug !!}" class="@error('slug') is-invalid @enderror form-control">
                                        @error('date')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label>Date</label>
                                        <input type="date" name="date" value="{!! date("Y-m-d", strtotime($singleNews->date)) !!}" class="@error('date') is-invalid @enderror form-control">
                                        @error('date')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- CKeditor -->
                                    <div class="form-group col-xs-12">
                                        <label>Content</label>
                                        <textarea id="ckeditor-content" name="content" class="@error('content') is-invalid @enderror form-control">
                                            {!! $singleNews->content !!}
                                        </textarea>
                                        @error('date')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label>Image</label>
                                        <input type="file" name="image" value="{!! $singleNews->image !!}" class="@error('image') is-invalid @enderror form-control">
                                        <img src={!! url("uploads/package/img/thumbnail/$singleNews->image") !!} height="100" width="100"/>
                                        @error('image')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label>Category</label>
                                        <select name="category_id" class="@error('category_id') is-invalid @enderror form-control">
                                            <option></option>
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
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label>Tags</label>
                                        {!! $singleNews->tag !!}
                                        <select name="tags" class="@error('tags') is-invalid @enderror form-control">
                                            <option></option>
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
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label>Publish</label>
                                        <select name="status" class="@error('status') is-invalid @enderror form-control">
                                            <option value="Publish" @php (($singleNews->status ==  'Publish') ? 'selected' : '' ) @endphp > Publish </option>
                                            <option value="Draft" @php (($singleNews->status ==  'Draft') ? 'selected' : '' ) @endphp > Draft </option>
                                        </select>
                                        @error('status')
                                            <div class="error"  style="color:red">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <input type="submit" value="Create" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        {{-- @dd($singleNews); --}}
    </body>
</html>
