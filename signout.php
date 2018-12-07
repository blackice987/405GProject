<?php
if(isset($_COOKIE["user"])) {
    unset($_COOKIE["user"]);
    setcookie('user', null, -1, '/');
    echo "You have successfully signed out.";
} else{
	echo "Not signed in.";
}
?>
