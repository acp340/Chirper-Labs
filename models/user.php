<?php
include_once 'models/db.php';

function findUserById($id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE id = ?');
  $st -> bindParam(1, $id);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findUserByEmailAndPassword($email, $password) {
  global $db;
  $st = $db -> prepare('SELECT * 
                       FROM user 
                       WHERE (email = :email OR username = :email) AND password = :password');
  $st -> bindParam(':email', $email);
  $st -> bindParam(':password', $password);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findUserByEmail($email) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE email = :email OR username = :email');
  $st -> bindParam(':email', $email);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findAllUsers() {
  global $db;
  $st = $db -> prepare('SELECT * FROM user ORDER BY id');
  $st -> execute();
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addUser($email, $username, $password, $firstName, $lastName, $profile) {
  global $db;
  $st = $db -> prepare("INSERT INTO user (email, username, password, firstName, lastName, profile) values (:email, :username, :password, :firstName, :lastName, :profile)");
  $st -> bindParam(':email', $email);
  $st -> bindParam(':username', $username);
  $st -> bindParam(':password', $password);
  $st -> bindParam(':firstName', $firstName);
  $st -> bindParam(':lastName', $lastName);
  $st -> bindParam(':profile', $profile);
  $st -> execute();
  return $db->lastInsertId();
}

function updateUser($id, $email, $username, $password, $firstName, $lastName, $profile) {
  global $db;
  $st = $db -> prepare("UPDATE user SET email = :email, username = :username, password = :password, firstName = :firstName, lastName = :lastName, profile = :profile WHERE id = :id");
  $st -> bindParam(':email', $email);
  $st -> bindParam(':username', $username);
  $st -> bindParam(':password', $password);
  $st -> bindParam(':firstName', $firstName);
  $st -> bindParam(':lastName', $lastName);
  $st -> bindParam(':profile', $profile);
  $st -> bindParam(':id', $id);
  $st -> execute();
}

function deleteUser($id) {
  global $db;
  $st = $db -> prepare("DELETE FROM user WHERE id = :id");
  $st -> bindValue(':id', $id);
  $st -> execute();
}

function isValidUser($username) {
  global $db;
  $st = $db -> prepare("SELECT count(*) FROM user WHERE username = :username");
  $st -> bindValue(':username', $username);
  $st -> execute();
  $rows = $st -> fetchColumn();
  return $rows;
}

?>
