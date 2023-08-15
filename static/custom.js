/**
 * Create a a form on the body of the document that can be submitted through a post
 * and then submit it. All information must be in the URL (no form fields).
 */
function post(url) {
  $('<form method="post" action="' + url + '" />').appendTo(document.body).submit();
}

/**
 * Local redirect to a URL. Similar to the above "post" method, all information must
 * be in the URL (no form fields).
 */
function get(url) {
  window.event.preventDefault(); // prevent a button click from submitting a form.
  location.href=url;
}
