<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 style="text-align: center; margin: 40px; ">Url Shortener</h1>
    @if ($errors->any())
        <div class="alert alert-danger col-6">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <form method="post" action="{{ route('shorten') }}" >
                @csrf
                <div class="form-group" >
                    <input type="url" class="form-control" placeholder="Enter your url" id="exampleInput1" name="original_link">
                </div>
                <div class="form-group" >
                    <input type="submit"  value="Transform" class="btn btn-primary" style="margin-left: 50%; width: 300px; transform: translateX(-50%);">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        @if (session('status'))
            <div class="col-xl-12">
                <div class="alert alert-success">
                    <a href="{{ session('status') }}" target="_blank">{{ session('status') }}</a>
                </div>
            </div>
        @endif
    </div>
</div>
</body>
</html>
