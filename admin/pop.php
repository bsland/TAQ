<html>
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
</head>
<body>
<?php
  $sqliteerror="<p>there was an sqlite3 error";
  if ($db = sqlite_open('mydb', 0666, $sqliteerror)) {
    $vals = "delete from queue where rowid in (select rowid from queue order by timestamp asc limit 1)";
    if(!sqlite_exec($db, $vals, $error)){
      echo $error;
    }
  }
  else{
    die($sqliteerror);
  }
  sqlite_close($db);
?>
<p>
<a href="index.php">Go back</a>
</p>
</body>
</html>
