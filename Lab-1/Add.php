<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Lab 1 - Add</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Views/CSS/style.css">
  </head>

  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="./">Lab 1</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="./">Home</a></li>
          <li class="active"><a href="Add.php">Add</a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      
      <div class="col-md-4">
        <form action="." method="post">
          <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
          </div>

          <div class="form-group">
            <label for="fullname">Email address:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="fullname">Address:</label>
            <input type="text" class="form-control" id="address" name="addressline1">
          </div>

          <div class="form-group">
            <label for="fullname">City:</label>
            <input type="text" class="form-control" id="city" name="city">
          </div>

          <div class="form-group">
            <label for="fullname">State:</label>
            <input type="text" class="form-control" id="state" name="state">
          </div>

          <div class="form-group">
            <label for="fullname">Zip Code:</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
          </div>

          <div class="form-group">
            <label for="fullname">Birthday:</label>
            <input type="text" class="form-control" id="fullname" name="fullname">
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>

      <?php


      ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
