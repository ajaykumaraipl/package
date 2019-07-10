<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <section class="content">
            <a href="{{ url('/categories') }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> Back to all <span>categories</span></a>
            <div class="row m-t-20">
                <div class="col-md-8 col-md-offset-2">
                <!-- Default box -->
                <form method="post" action="{{ url('/categories/save') }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="row display-flex-wrap">
                            <!-- load the view from the application if it exists, otherwise load the one in the package -->

                            <div class="box col-md-12 padding-10 p-t-20">
                            <!-- load the view from type and view_namespace attribute if set -->

                                <!-- text input -->
                                <div class="form-group col-xs-12">
                                    <label>Name</label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror form-control">
                                    @error('name')
                                        <div class="error"  style="color:red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- text input -->
                                <div class="form-group col-xs-12">
                                    <label>Description</label>
                                    <input type="text" value="{{ old('description') }}" name="description" class="@error('description') is-invalid @enderror form-control">
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
                </form>
                </div>
            </div>
        </section>
        {{-- @dd($singleNews); --}}
    </body>
</html>
