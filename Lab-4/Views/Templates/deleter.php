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

<?php
  try {
    if(unlink(urldecode($filename))) { ?>
      <div class='text-center'>
        <h2 class='text-danger'><?php echo ucfirst(basename($filename));?> successfully deleted!</h2>
        <a href='./'>Go home?</a>
      </div>
<?php } else
      throw new Exception("Nope");
  } catch(Exception $e){ ?>
      <div class='text-center'>
        <h2 class='text-danger text-center'>Could not delete file (<?php echo $filename; ?>)!</h2>
        <a href='./'>Go home?</a>
      </div>
<?php  } ?>