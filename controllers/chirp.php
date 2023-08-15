<?php
include_once "include/util.php";
include_once "models/chirp.php";
include_once "models/user.php";
include_once "include/Validator.php";

function linkifyChirps($chirps){
  for($i = 0; $i < count($chirps); $i++){
    $matches = [];
    $matched = preg_match_all('/()(@)([a-zA-Z0-9_-]*)([\s,.!;:]|$)/', $chirps[$i]['chirp_content'], $matches, PREG_OFFSET_CAPTURE);
    if($matched){
      foreach($matches[3] as $m){
        if(isset($m[0]) and $m[0] != ""){
          if(isValidUser($m[0])){
            $chirps[$i]['chirp_content'] = str_replace("@$m[0]", "<a href='/chirp/username/$m[0]'>@$m[0]</a>", $chirps[$i]['chirp_content']);
          }
        }
      }
    }
  }
  return $chirps;
}

function get_list() {
  $chirps = findAllChirps();
  $chirps = linkifyChirps($chirps);
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'Chirper Network',
      'chirps' => $chirps,
    )
  );
}

function get_add() {
  ensureLoggedIn();
  $chirp = __empty_chirp();
  renderTemplate(
    "views/chirp_add.php",
    array(
      'title' => 'Create a Chirp',
      'chirp' => $chirp,
      'user' => $_SESSION['user']
    )
  );
}

function post_add() {
  ensureLoggedIn();
  $chirp = __empty_chirp();
  $chirp['chirp_content'] = safeParam($_POST, 'chirp_content', false);

  $validator = new Validator();
  $validator->required('chirp_content', $chirp['chirp_content']);
  $validator->between('chirp_content_length', strlen($chirp['chirp_content']), 3, 140); 

  if ($validator->hasErrors()) {
    renderTemplate(
      "views/chirp_add.php",
      array(
        'title' => 'Create a Chirp',
        'errors' => $validator->allErrors(),
        'chirp' => $chirp
      )
    );
  } else {
    $chirp['datestamp'] = time();
    addChirp($chirp, $_SESSION['user']['id']);
    redirectRelative("index");
  }
}

function get_view($id) {
  $chirp = findChirpById($id);
  renderTemplate(
    "views/chirp_view.php",
    array(
      'title' => 'View Chirp Thread',
      'chirp' => $chirp
    )
  );
}

function get_username($username){
  $chirps_by = findChirpsByUsername($username);
  $chirps_at = findChirpsMentioningUsername($username);
  $chirps_by = linkifyChirps($chirps_by);
  $chirps_at = linkifyChirps($chirps_at);
  renderTemplate(
    "views/chirp_user_view.php",
    array(
      'title' => 'View Chirps for User',
      'by' => $chirps_by,
      'at' => $chirps_at,
      'username' => $username
    )
  );
}

function post_delete($id) {
  deleteChirpByID($id);
  redirectRelative("index");
}


?>
