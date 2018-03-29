<?php
// zaz:jaimelespetitsponeys
/*PHP_AUTH_USER'
Lorsque vous utilisez l'authentification HTTP, cette variable est définie à l'utilisateur fourni par l'utilisateur.
'PHP_AUTH_PW'
Lorsque vous utilisez l'authentification HTTP, cette variable est définie au mot de passe fourni par l'utilisateur.
*/

if (($_SERVER["PHP_AUTH_USER"] == "zaz" && $_SERVER["PHP_AUTH_PW"] == "jaimelespetitsponeys") || ($_GET["login"] == "zaz" && $_GET["pass"] == "jaimelespetitsponeys"))
{
?>

<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,iVBORw0KGgoAAAA...
...
...
...6MIHnr2t+eeO4Fr+v/H80AmcVvzqAfAAAAAElFTkSuQmCC'>
</body></html>


<?php
}
else
{
	header('Content-type: text/plain');
?>
* About to connect() to j03.local.42.fr port 8080 (#0)
* * Trying 127.0.0.1...
* * connected
* * Connected to j03.local.42.fr (127.0.0.1) port 8080 (#0)
* * Server auth using Basic with user 'root'
* > GET /ex05/members_only.php HTTP/1.1
* > Authorization: Basic cm9vdDpyb290
* > User-Agent: curl/7.24.0 (x86_64-apple-darwin12.0) libcurl/7.24.0 OpenSSL/0.9.8y zlib/1.2.5
* > Host: j03.local.42.fr:8080
* > Accept: */*
>
* HTTP 1.0, assume close after body
* < HTTP/1.0 401 Unauthorized
* < Date: Tue, 26 Mar 2013 09:42:42 GMT
* < Server: Apache
* < X-Powered-By: PHP/5.4.26
* < WWW-Authenticate: Basic realm=''Espace membres''
* < Content-Length: 72
* < Connection: close
* < Content-Type: text/html
* <
* <html><body>Cette zone est accessible uniquement aux membres du site</body></html>
* * Closing connection #0
<?php 
} 
?>
