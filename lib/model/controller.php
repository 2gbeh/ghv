<?PHP
function appstate ($args) {if (isset($_SESSION[$args])) return 1;}
function logstate ($goto) {if ($_REQUEST['logout'] == true) logout($goto);}
function logout ($goto, $request = "?") {session_unset(); redir($goto.$request);}
?>