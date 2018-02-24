<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Url Shortner">
    <meta name="author" content="Tom Shafer">

    <title>Code Deploy Short Code Generater</title>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

  </head>

  <body>

    <div class="main text-center" style="background: repeating-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('{{$image}}') center center / cover no-repeat;">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 col-xl-7 mx-auto">
            <div>
                <h1>Code Deploy URL Shortener</h1>
            </div>
            <form method="post" action="/">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="text" name="url" class="form-control form-control-lg" placeholder="Enter url...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary" style="border-color: #3aafa9;background-color:#3aafa9">Generate!</button>
                </div>
              </div>
              @isset($url)
              <div class="alert alert-info mt-1" role="alert">
                {{$url}}<br/>
                Stats: {{$url}}/stats
              </div>
              @endif
               @if ($errors->any())
                    <div class="alert alert-danger mt-1" role="alert">
                      @foreach ($errors->all() as $error)
                        {{ $error }}
                      @endforeach
                    </div>
                @endif
            </form>
          </div>
        </div>
      </div>
    </div>
    <div>Icons made by <a href="https://www.flaticon.com/authors/swifticons" title="Swifticons">Swifticons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
  </body>
</html>
