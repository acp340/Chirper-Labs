<?php
global $db;
try {
    $db = new PDO('sqlite:chirper.db3');
    if (!$db) {
      print_r($db->errorInfo());
    }
} catch (PDOException $e) {
    die("Could not open database. " . $e->getMessage() . $e->getTraceAsString());
}

function adHocQuery($q) {
    global $db;
    $st = $db -> prepare($q);
    $st -> execute();
    return $st -> fetchAll(PDO::FETCH_ASSOC);
}
?>
