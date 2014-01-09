<?php

$db_hostname = 'localhost';
$db_database = 'bookmark';
$db_username = 'root';
$db_password = '';
$db = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db)
or die("Unable to select database: " . mysql_error());

  if (isset($_POST['delete']) && $_POST['delete']!="") {
    
      $id =  $_POST['delete'];

  $query = "DELETE FROM bookmark where id='$id'";
	$result = mysql_query($query);
  };

if (isset($_POST['url'])) {
  $url = $_POST['url'];

  function getTitle($Url) {
    $str = file_get_contents($Url);
    if(strlen($str)>0){
        preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
        return $title[1];
    }
};

$b = getTitle($url);


$query = "insert into bookmark (title ,  link)  VALUES('$b' , '$url')";
$result = mysql_query($query);


};

$query = "select * from bookmark";
$result = mysql_query($query);

$rows = mysql_num_rows($result); 
echo '<div id="div">';
for ($i = 0 ; $i < $rows ; $i++)
{
$row = mysql_fetch_row($result);

echo <<<_END

<ul>
<li>
Title:</li>
<li><a href=$row[1]><p>$row[0]</p></a></li>
<li><button type="button" id="$row[2]">DELETE</button></li>
</ul>
_END;



  }
  echo '</div>';
mysql_close($db);
?>