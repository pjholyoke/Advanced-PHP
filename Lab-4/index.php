<?php 
include_once('Autoloader.php');
include_once('./Views/Templates/header.php');

/*
    Print a table with every file in uploads folder:
    Must be able to view, and delete these files.

    Accepted file types/mime types:
    -------------------------------
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
  */
include_once('./Views/Templates/gallery.php');

include_once('./Views/Templates/footer.php');
?>