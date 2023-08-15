<?php
include_once 'models/db.php';

function __empty_chirp() {
  return array(
    'id' => '',
    'chirp_content' => '',
    'datestamp' => '',
    'author' => ''
  );
}

/*function __check_chirp($chirp) {
  $errors = array();
  if (!$chirp['chirp_content']) {
    $errors['chirp_content'] = "Chirp content may not be empty.";
  }
  if(strlen($chirp['chirp_content']) > 140) {
    $errors['chirp_content'] = "A chirp may not be longer than 140 characters.";
  }
  return $errors;
}*/

function findChirpById($id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM chirps WHERE id = :id');
  $st -> execute(array(':id' => $id));
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findAllChirps($limit = 25) {
  global $db;
  $st = $db -> prepare('SELECT chirps.*, user.username FROM chirps, user WHERE chirps.user_id=user.id ORDER BY chirps.datestamp DESC LIMIT :limit');
  $st -> execute(array(':limit' => $limit));
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addChirp($chirp, $user_id) {
  global $db;
  $st = $db -> prepare("INSERT INTO chirps (datestamp, chirp_content, user_id) VALUES (:datestamp, :chirp_content, :user_id)");
  $st -> bindValue(':datestamp', date('Y-m-d H:i:s T'));
  $st -> bindParam(':chirp_content', $chirp['chirp_content']);
  $st -> bindParam(':user_id', $user_id);  
  $st -> execute();
  return $db->lastInsertId();
}

function deleteChirpById($id) {
  global $db;
  $st = $db -> prepare("DELETE FROM chirps WHERE id=:id");
  $st -> bindValue(':id', $id);
  $st -> execute();
}

function deleteChirpByUserId($user_id) {
  global $db;
  $st = $db -> prepare("DELETE FROM chirps WHERE user_id = :user_id");
  $st -> bindValue(':user_id', $user_id);
  $st -> execute();
}

function findChirpsByUserId($user_id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM chirps WHERE user_id = :user_id ORDER BY datestamp DESC LIMIT 15');
  $st -> execute(array(':user_id' => $user_id));
  $results = $st -> fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function findChirpsByUsername($username) {
  global $db;
  $st = $db -> prepare('SELECT chirps.*, user.id, user.username
                        FROM chirps, user 
                        WHERE chirps.user_id=user.id AND user.username=:username 
                        ORDER BY chirps.datestamp DESC LIMIT 15');
  $st -> execute(array(':username' => $username));
  $results = $st -> fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

function findChirpsMentioningUsername($username){
  global $db;
  $st = $db -> prepare("SELECT chirps.*, user.username, user.id 
                       FROM chirps, user
                       WHERE chirp_content LIKE :username AND user.id=chirps.user_id
                       ORDER BY datestamp DESC LIMIT 15");
  $st -> execute(array(':username' => "%$username%"));
  $results = $st -> fetchAll(PDO::FETCH_ASSOC);
  return $results;
}

?>
