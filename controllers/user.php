<?php
include_once "include/util.php";
include_once "models/user.php";
include_once "models/chirp.php";
include_once "include/Validator.php";

function get_login() {
  renderTemplate(
    "views/user_login.php",
    array(
      'title' => 'Log in',
    )
  );
}

function post_login() {
  $form = safeParam($_POST, 'form');
  $email = safeParam($form, 'email');
  $password = safeParam($form, 'password');
  
  //$user = findUserByEmailAndPassword($email, $password);
  $user = findUserByEmail($email);
  // Where we use password_verify, to make sure it matches the hash
  // We can use $user['password'] as the hash in password_verify
  // and use $password as the plaintext password to verify
  // Use it password_verify right in the if statement below

  if (!password_verify($password, $user['password'])) {
    $errors = array("Bad username/password combination");
    renderTemplate(
      "views/user_login.php",
      array(
        'title' => 'Log in',
        'form' => $form,
        'errors' => $errors,
      )
    );
  } else {
    $destination = $_SESSION['redirect'] ? $_SESSION['redirect'] : "/index";
    restartSession();
    $_SESSION['user'] = $user;
    $_SESSION['flash'] = "Login successful!";
    redirect($destination);
  }
}

function get_logout() {
  restartSession();
  redirectRelative('index');
}

function get_register() {
  renderTemplate(
    "views/user_addedit.php",
    array(
      'title' => 'Create an account',
      'form' => array(),
      'action' => url('user/register'),
    )
  );
}

function verify_account($form) {
  $errors = array();
  
  if (!$form) {
    $errors[] = "No data submitted";
    return $errors;
  }
  $username = safeParam($form, 'username');
  if (!$username) {
    $errors['username'] = "A username must be provided";
  }
  $email1 = safeParam($form, 'email1');
  if (!$email1) {
    $errors['email1'] = "An email address must be provided";
  }
  $email2 = safeParam($form, 'email2');
  if ($email1 != $email2) {
    $errors['email2'] = "Email addresses must match";
  }
  $password1 = safeParam($form, 'password1');
  if (!$password1 || strlen($password1) < 8) {
    $errors['password1'] = "Passwords must be at least 8 characters long";
  }
  $password2 = safeParam($form, 'password2');
  if ($password1 != $password2) {
    $errors['password1'] = "Passwords must match";
  }
  $firstName = safeParam($form, 'firstName');
  if (!$firstName) {
    $errors['firstName'] = "A first name must be provided";
  }
  $lastName = safeParam($form, 'lastName');
  if (!$lastName) {
    $errors['lastName'] = "A last name must be provided";
  }
  
  return $errors;
}

function post_register() {
  $form = safeParam($_POST, 'form');
  
  //$errors = verify_account($form);
  // Use validator here instead
  // Check each required criteria
  $validator = new Validator();
  $validator->required('username', $form['username']);
  $validator->same('email', $form['email1'], $form['email2']);
  // ...
  // When done, set $errors to the validator's errors
  $errors = $validator->allErrors();

  $user = findUserByEmail(safeParam($form, 'email1', false));
  if ($user) {
    $errors['email1'] = 'An account is already registered with that email address';
  }
  $user = isValidUser(safeParam($form, 'username', false));
  if ($user) {
    $errors['username'] = 'An account is already registered with that username';
  }

  // Do some $_FILES validation here to check profile photo is correct mime type + size
  if($_FILES['photo']['type'] != "image/jpeg" && $_FILES['photo']['size'] > 2000000) {
    $errors ['photo'] = "Photo too large or wrong type to upload!"; 
  }

  if ($errors) {
    renderTemplate(
      "views/user_addedit.php",
      array(
        'title' => 'Create an account',
        'form' => $form,
        'errors' => $errors,
        'action' => url('user/register'),
      )
    );
  } else {
    error_log("Trying to add to database");
    $id = addUser($form['email1'], $form['username'], $form['password1'], $form['firstName'], $form['lastName'], $form['profile']);
    error_log("After add, id is $id");

    // move_uploaded_file right here using $_FILES
    // use the $id variable as the name of the photo
    move_uploaded_file($_FILES['photo']['tmp_name'], "photos/" . $id . ".jpg");

    restartSession();
    $user = findUserById($id);
    $_SESSION['user'] = $user;
    flash("Welcome to Chriper, {$user['firstName']}!");
    redirectRelative("index");
  }
}

function get_edit() {
  ensureLoggedIn();
  $user = $_SESSION['user'];
  
  renderTemplate(
    "views/user_addedit.php",
    array(
      'title' => 'Edit your profile',
      'action' => url("user/edit/${user['id']}"),
      'form' => array(
        'username'  => $user['username'],
        'firstName' => $user['firstName'],
        'lastName'  => $user['lastName'],
        'email1'    => $user['email'],
        'email2'    => $user['email'],
        'password1' => $user['password'],
        'password2' => $user['password'],
        'profile'   => $user['profile'],
      )
    )
  );
}

function post_edit($id) {
  ensureLoggedIn();
  $user=$_SESSION['user'];
  if ($id != $user['id']) {
    die("Can't edit somebody else.");
  }
  $form = safeParam($_POST, 'form');
  $errors = verify_account($form);
if($_FILES['photo']['type'] != "image/jpeg" && $_FILES['photo']['size'] > 2000000) {
    $errors ['photo'] = "Photo too large or wrong type to upload!"; 
  }
  if ($errors) {
    renderTemplate(
      "views/user_addedit.php",
      array(
        'title' => 'Edit your profile',
        'form' => $form,
        'errors' => $errors,
        'action' => url("user/edit/${user['id']}"),
      )
    );
  } else {
    move_uploaded_file($_FILES['photo']['tmp_name'], "photos/" . $id . ".jpg");
    updateUser($user['id'], $form['email1'], $form['username'], $form['password1'], $form['firstName'], $form['lastName'], $form['profile']);
    $_SESSION['user'] = findUserById($user['id']);
    flash("Profile updated");
    redirectRelative("index");
  }
}

function get_view($id) {
  $user = findUserById($id);
  if (!$user) {
    die("No user found by that id.");
  }
  $posts = findPostsByUserId($id);
  if (!$posts) {
    $posts = array();
  }
  
  renderTemplate(
    "views/user_view.php",
    array(
      'title' => "Posts by {$user['firstName']} {$user['lastName']}",
      'user' => $user,
      'posts' => $posts,
    )
  );
}

function post_delete($id) {
  ensureLoggedIn();
  if ($id != $_SESSION['user']['id']) {
    die ("Can't delete other users");
  }
  deleteChirpByUserId($id);
  deleteUser($id);
  restartSession();
  flash("Account deleted");
  redirectRelative("index");
}
?>
