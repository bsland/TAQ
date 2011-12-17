<html>
<head>
<title>Test</title>
</head>

<body>
<p>Click the "Submit Query" button to pop the top-most student off the stack.</p>
<form action="pop.php" method="post">
<input type="submit" />
</form>
<br />
<table border="1">
<tr>
<td>Name</td>
<td>Room</td>
</tr>
<?php
  $sqliteerror="<p>there was an sqlite3 error</p>";
  if ($db = sqlite_open('mydb', 0666, $sqliteerror)) {
    //if (! $result = sqlite_exec($db,"create table queue (name varchar, room smallint, timestamp varchar)",$error)) { echo 'False'; echo $error; } 
    //sqlite_query($db,'DELETE FROM queue');
    //if (!sqlite_query($db, "insert into queue values('student',116,'test')",$error)){ echo $error; }
    if ($result = sqlite_query($db, 'select * from queue order by timestamp asc',$error)) {
      while ($entry = sqlite_fetch_array($result, SQLITE_BOTH)){
        echo '<tr><td>' . $entry['name'] . '</td><td>' . $entry['room'] . '</td</tr>';
      }
    }
    else {
      echo $error;
    }
    //var_dump(sqlite_fetch_array($result));
    //or use sqlite_array_query
    //}
    sqlite_close($db);
  }
  else{
    die($sqliteerror);
  }
?>
</table>

<br />
<a href="../index.php">Student Interface</a>

</body>
</html>
