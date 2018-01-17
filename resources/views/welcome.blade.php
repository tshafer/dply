<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Url Shortner">
    <meta name="author" content="Tom Shafer">

    <title>Code Deploy Short Code Generater</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

  </head>

  <body>

    <div class="main text-center" style="background: repeating-linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url('{{$image['full']}}') center center / cover no-repeat;">
      <div class="container">
        <div class="row">

          <div class="col-md-12 col-lg-8 col-xl-7 mx-auto">
            <div>
                <h1>Code Deploy URL Shortener</h1>
            </div>
            <form>
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="email" class="form-control form-control-lg" placeholder="Enter url...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary" style="border-color: #3aafa9;background-color:#3aafa9">Generate!</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
  </body>
</html>
