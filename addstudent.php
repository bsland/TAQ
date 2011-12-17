<html>
<head>
<title>Submitted</title>
<meta HTTP-EQUIV="REFRESH" content="1.7; url=http://www.eecs.tufts.edu/~bschwa06">
</head>
<body>
<p>
Thanks <?php echo $_POST["name"]; ?>!
</p>
<?php
  $sqliteerror="<p>there was an sqlite3 error</p>";
  if ($db = sqlite_open('admin/mydb', 0666, $sqliteerror)) {
    $vals = "insert into queue values('".$_POST["name"]."',".$_POST["room"].",datetime('now','localtime'))";
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
