<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];
  
  try {
    if (!isset($_FILES['file-upload']['error']) || is_array($_FILES['file-upload']['error'])) {
      throw new RuntimeException('Invalid parameters.');
    }

    switch ($_FILES['file-upload']['error']) {
      case UPLOAD_ERR_OK:
        break;
      case UPLOAD_ERR_NO_FILE:
        throw new RuntimeException('No file sent.');
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        throw new RuntimeException('Exceeded filesize limit.');
      default:
        throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here. 
    if ($_FILES['file-upload']['size'] > 1000000) {
      throw new RuntimeException('Exceeded filesize limit.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $validExts = array(
      'txt' => 'text/plain',
      'html' => 'text/html',
      'pdf' => 'application/pdf',
      'doc' => 'application/msword',
      'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
      'xls' => 'application/vnd.ms-excel',
      'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
      'jpg' => 'image/jpeg',
      'png' => 'image/png',
      'gif' => 'image/gif'
    );
    $ext = array_search( $finfo->file($_FILES['file-upload']['tmp_name']), $validExts, true );

    if (false === $ext)
      throw new RuntimeException('Invalid file format.');

    /* Alternative to getting file extention */
    $name = $_FILES["file-upload"]["name"];
    $ext = strtolower(end((explode(".", $name))));

    if (preg_match("/^(jpeg|jpg|png|gif)$/", $ext) == false) {
      throw new RuntimeException('Invalid file format.');
    }
    /* Alternative END */


    // You should name it uniquely.
    // DO NOT USE $_FILES['file-upload']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.

    $salt = uniqid(mt_rand(), true);
    $fileName = 'img_' . sha1($salt . sha1_file($_FILES['file-upload']['tmp_name']));
    $location = sprintf('./Models/Uploads/%s.%s', $fileName, $ext);

    if (!is_dir('./uploads')) {
      mkdir('./uploads');
    }

    if (!move_uploaded_file($_FILES['file-upload']['tmp_name'], $location)) {
      throw new RuntimeException('Failed to move uploaded file.');
    }
    
    
    include_once('./Views/Templates/success-template.php');
    
  } catch (RuntimeException $e) {
    array_push($errors, $e->getMessage());
    include_once('./Views/Templates/fail-template.php');
  }
}

?>

<div class="container-fluid">
  <div class="col-xs-4 col-xs-offset-4">
    <form action="Upload.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <div class="input-group input-file" name="file-upload">
          <span class="input-group-btn">
            <button class="btn btn-default btn-choose" type="button">Choose</button>
          </span>
          <input type="text" class="form-control" placeholder='Choose a file...' />
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <button type="reset" class="btn btn-danger btn-block">Reset</button>
      </div>
    </form>
  </div>
</div>