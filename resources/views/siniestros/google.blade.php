@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <br><br><br>
            <form action="google-drive/file-upload" method="get" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="file" name="thing" id="">
                <br>
                <input type="submit" class="btn btn-sm btn-block btn-danger" value="Upload">

            </form>
        </div>
    </div>
</div>


@endsection