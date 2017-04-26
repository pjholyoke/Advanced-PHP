
<div class="container-fluid">
  <div class="col-xs-6 col-xs-offset-3 gallery">
    <table class="table table-bordered table-striped table-condensed table-inverse">
      <thead>
        <th>#</th>
        <th>File Name</th>
        <th>View</th>
        <th>Delete</th>
      </thead>

      <tbody>
        <?php
        $folder = '.'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Uploads';
        $count = 1;

        if(!is_dir($folder))
          die('Folder <strong>' . $folder . '</strong> does not exist' );

        $directory = new DirectoryIterator($folder);
        ?>
        
        <?php foreach ($directory as $fileInfo) : ?>
          <?php if ( $fileInfo->isFile() ) : ?>
            <tr>
              <td><?php echo $count++; ?></td>
              <td><a href="View.php?file=<?php echo urlencode($fileInfo->getPathname()); ?>"><?php echo $fileInfo->getFilename(); ?></a></td>
              <td><a href="View.php?file=<?php echo urlencode($fileInfo->getPathname()); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
              <td><a href="Delete.php?file=<?php echo urlencode($fileInfo->getPathname()); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="./Upload.php"><button class="btn btn-block btn-download"><i class="fa fa-plus"></i></button></a>
    <br />
  </div>
</div>