<?php
  include_once "include/util.php";

  function post_index($params) {
    $output = `sqlite3 chirper.db3 < chirper.sql`;
    redirectRelative("index");
  }
?>