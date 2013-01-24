<?
function db_connect() {
  $db_host = 'localhost:/tmp/mysql';
  $db_user = 'mysql_user';
  $db_pass = 'mysql_password';
  $db_name = 'my_shop_db';

  $link = mysql_connect($db_host, $db_user, $db_pass);
  if (!$link) {
      die('Ошибка соединения с БД: ' . mysql_error());
  } else {
    mysql_select_db($db_name, $link);
  }
  return $link;
}

function db_disconnect($link) {
  mysql_close($link);
}

?>