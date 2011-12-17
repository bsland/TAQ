<html>
<head>
<title>TAQ: The TA Queue System</title>
</head>

<body>
<p>Welcome to TAQ, the TA Queue System for Comp 11</p>
<p>If you are not on the list, please add your name and the room you're in.</p>
<p>You can refresh this list to see what position you are in on the list.</p>
<form action="addstudent.php" method="post">
Name: <input type="text" name="name" />
Room: <input type="text" name="room" />
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
  if ($db = sqlite_open('admin/mydb', 0666, $sqliteerror)) {
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

</body>
</html>
