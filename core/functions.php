<?php

/**
 * Strips HTML tags that have not been white listed
 * @var string $html Unsanitized HTML
 * @return string Sanitized HTML
 */
function cleanHTML($html){

  $allowed = '<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6>
  <ul><ol><li><dl><dt><dd><strong><em><b><i><u>
  <img><a><abbr><address><blockquote><area><audio><video>
  <form><fieldset><label><input><textarea>
  <caption><table><tbody><td><tfoot><th><thead><tr>';

  return strip_tags($html, $allowed);
}

/**
 * Creates a slug from a given string
 * @var string $string
 * @return string
 */
function slug($string){
  return preg_replace(
    "/[^a-z0-9-]+/",
    "-",
    strtolower($string)
  );
}

function check_user_role($roles, $user_id = null) {
	if ($user_id) $user = get_userdata($user_id);
	else $user = wp_get_current_user();
	if (empty($user)) return false;
	foreach ($user->roles as $role) {
		if (in_array($role, $roles)) {
			return true;
		}
	}
	return false;
}

// reference from web
// if (check_user_role(array('author','editor','custom_role'), 177)) {
	// do stuff for user ID 177
// }