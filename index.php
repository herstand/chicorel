<?php
include "../env/setupEnvironment.php";
?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0 minimal-ui" />
<meta name="google-signin-client_id" content="<?php echo apache_getenv("CLIENT_ID"); ?>" />
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  document.querySelector("h1").innerText = "Thanks for logging in, " + profile.getName() + "!";
  document.querySelector("h2").innerText = profile.getEmail();
  document.querySelector("img").src = profile.getImageUrl();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  document.querySelector(".signin").classList.add("hidden");
  document.querySelector(".signout").classList.remove("hidden");
  document.querySelector("span[id^=connected]").style.display = "unset";
  document.querySelector("span[id^=not_signed_in]").style.display = "none";
}
function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
  document.querySelector("main h1").innerText = "";
  document.querySelector("main h2").innerText = "";
  document.querySelector("main img").src = "";
  document.querySelector(".signout").classList.add("hidden");
  document.querySelector(".signin").classList.remove("hidden");
  document.querySelector("span[id^=not_signed_in]").style.display = "unset";
  document.querySelector("span[id^=connected]").style.display = "none";
  });
}
</script>
<style>
* {
  box-sizing:border-box;
}
html, body {
  font-size:1em;
  text-align:center;
  margin:0px;
  padding:0px;
}
main {
  text-align:center;
}
.signin {
  display:inline-block;
  position:absolute;
  top:50vh;
  margin-top:-18px;
  left:50vw;
  margin-left:-60px;
}
h1 {
  font-size:2rem;
  color:black;
  text-align:center;
  padding:0px;
  margin:20px auto 0px auto;
}
h2 {
  font-size:1em;
  color:#CCC;
  margin:5px auto 20px auto;
}
img {
  
}
.hidden {
  display:none;
}
</style>
</head>
<body>
<main>
<div class="g-signin2 signin" data-onsuccess="onSignIn"></div>
<h1></h1>
<h2></h2>
<img src="" />
</main>
<button class="signout hidden" onclick="signOut();">Sign out</button>
</body>
</html>
