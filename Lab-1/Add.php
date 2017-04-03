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
      
      <?php
        require_once('./Models/DB.php');
        require_once('./Models/CRUD.php');
        require_once('./Models/Util.php');
      
        // Default Empty String
        $fullname     = filter_input(INPUT_POST, 'fullname')     ?: "";
        $email        = filter_input(INPUT_POST, 'email')        ?: "";
        $addressline1 = filter_input(INPUT_POST, 'addressline1') ?: "";
        $city         = filter_input(INPUT_POST, 'city')         ?: "";
        $state        = filter_input(INPUT_POST, 'state')        ?: "";
        $zip          = filter_input(INPUT_POST, 'zip')          ?: "";
        $birthday     = filter_input(INPUT_POST, 'birthday')     ?: "";

        $errors = [];
      
        switch($_SERVER['REQUEST_METHOD']) {
          case "POST":
            if(empty($email) || !ValidateEmail($email)) {
              if(empty($email)) array_push($errors, "Email is required");
              if(!ValidateEmail($email)) array_push($errors, "Email is invalid");    
            }

            if(empty($zip) || !ValidateZip($zip)) {
              if(empty($zip)) array_push($errors, "Zipcode is empty");
              if(!ValidateZip($zip)) array_push($errors, "Zipcode is invalid");
            }

            if(empty($birthday) || ValidateDate($birthday)) {
              if(empty($birthday)) array_push($errors, "Birthdate is empty");
              if(!ValidateDate($birthday)) array_push($errors, "Birthdate is invalid");
            }

            if(empty($fullname)) array_push($errors, "Full name is required");
            if(empty($addressline1)) array_push($errors, "Address is required");
            if(empty($city)) array_push($errors, "City is required");
            if(empty($state)) array_push($errors, "State is required");

            if(count($errors) === 0)
            {
              echo "Woo, good job.";
            }
            else 
            {
              echo "<pre>";
              var_dump($errors);
              echo("<br>");
              echo("<br>");
              var_dump($_POST);
              //echo("$fullname, $email, $addressline1, $city, $state, $zip, $birthday");
              echo "</pre>";
            }

            //CreateAddress($fullname, $email, $addressline1, $city, $state, $zip, $birthday);   
            break;
          case "PUT":
            break; // Do nothing
          case "DELETE":
            break; // Do nothing
          default:
            break; // Do nothing
        }      
      ?>
      
      <div class="col-md-4">
        <form action="Add.php" method="post">
          <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>">
          </div>

          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
          </div>

          <div class="form-group">
            <label for="addressline1">Address:</label>
            <input type="text" class="form-control" id="addressline1" name="addressline1" placeholder="Address" value="<?php echo $addressline1; ?>">
          </div>

          <div class="form-group">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city; ?>">
          </div>

          <div class="form-group">
            <label for="state">State:</label>
            <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $state; ?>">
          </div>

          <div class="form-group">
            <label for="zip">Zip Code:</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code" value="<?php echo $zip; ?>">
          </div>

          <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo $birthday; ?>">
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
