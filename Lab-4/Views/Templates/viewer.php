<?php
try {
  $filename = filter_input(INPUT_GET, "file");         
  $file = new SplFileObject($filename, "r");
  $contents = $file->fread($file->getSize());
  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mimeType = $finfo->file($filename);  
} catch(Exception $e) { 
?>
<h2 class="text-center text-danger">Uh-oh - Looks like we couldn't get that file. Please go back to the <a href="./index.php">home page</a> and try again.</h2>
<p><?php echo $e; ?></p>
<?php } ?>

<div class="container-fluid">

  <div class="row">
    <div class="col-xs-1" style="margin: 1em;">
      <button class="btn btn-info btn-block" onclick="window.history.back();">Go back</button>
    </div>
  </div>
  
  <div class="col-xs-6">
    <?php
    switch($mimeType) {
      case 'text/plain':
        echo "<textarea class='form-control' style='width: 100%; height: 22em;'>$contents</textarea>";
        break;
      case 'text/html':
      case 'application/pdf':
        echo "<iframe width='100%' height='750px' src='$filename'></iframe>";
        break;
      case 'application/msword':
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
      case 'application/vnd.ms-excel':
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
        echo "<a href='$filename' download><h4>Please click the download button on the right to see this file, or click here.</h4></a>";
        break;
      case 'image/jpeg':
      case 'image/png':
      case 'image/gif':
        echo '<img style="border: 1px solid black;" src="data:'.$mimeType.';base64,'.base64_encode($contents).'"/>';
        break;
      default:
        echo "<h1 class='text-danger'>Couldn't read that file type</h1>";
        break;
    }
    ?>
  </div>

  <div class="col-xs-6">
    
    <h3 class="title"><?php echo ucfirst(basename($filename)); ?></h3>
    
    <table id="gallery" class="table table-bordered table-striped table-condensed table-inverse-left">
      <tbody>
        <tr>
          <th>File Size</th>
          <td><?php echo $file->getSize(); ?> bytes</td>
        </tr>
        <tr>
          <th>Type</th>
          <td><?php echo $mimeType; ?></td>
        </tr>
        <tr>
          <th>Date Created</th>
          <td><?php echo Date('m-d-Y g:i:s', filemtime($filename)); ?></td>
        </tr>
        <tr>
          <th>Download</th>
          <td>
            <a href="<?php  echo $filename; ?>" download>
              <button class="btn btn-block btn-download">
                <i style="font-size: 3em;" class="fa fa-download" aria-hidden="true"></i>
              </button>
            </a>
          </td>
        </tr>
        <tr>
          <th>Delete</th>
          <td>
            <a href="./Delete.php?file=<?php echo urlencode($filename); ?>">
              <button class="btn btn-block btn-delete">
                <i style="font-size: 3em;" class="fa fa-trash" aria-hidden="true"></i>
              </button>
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>