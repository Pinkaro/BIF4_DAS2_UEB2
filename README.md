
# Tutorial

### Form Login

### Http Digest

### 

### Google Login
how does it work:
1. user clicks on login with google.
2. the user is redirected to google to login.
3. google asks for premmisions from user to send certain data.
4. user selects continue.
5. google redirects back to us with an authentication token.
6. we compare the token to an existing user.
7. authenticate an existing or create a new one if doesnt exist.
8. start session for user.

### Anti-CSRF token

how does it work:
1. The web server generates a token
2. The token is statically set as a hidden input on the protected form
3. The form is submitted by the user
4. The token is included in the POST data
5. The web application compares the token generated by the web application with the token sent in through the request

result:
1. If these tokens match, the request is valid, as it has been sent through the actual form in the web application
2. If there is no match, the request will be considered as illegal and will be rejected.

### HTTPS

how does it work:
1. Navigate to XAMPP\Apache
2. Execute "makecert.bat" and finish the key/certificate creation in the cmd
3. Navigate to XAMPP\Apache\Conf\Extra\ and open the file "httpd-vhosts.conf" in an editor
4. Copy the following code into this file:

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/BIF4_DAS2_UEB2"
    ServerName dasu_bif4.com
	ServerAlias www.dasu_bif4.com
	DirectoryIndex index.php
	Redirect permanent / https://localhost
    ErrorLog "logs/dasu_bif4.log"
    CustomLog "logs/dasu_bif.access.log" common
</VirtualHost>


<VirtualHost *:443>
    DocumentRoot "C:/xampp/htdocs/BIF4_DAS2_UEB2"
    #ServerName dasu_bif4.com
	ServerAlias www.dasu_bif4.com
	DirectoryIndex index.php
	SSLEngine on
	SSLCertificateFile "C:\xampp\apache\conf\ssl.crt\server.crt"
	SSLCertificateKeyFile "C:\xampp\apache\conf\ssl.key\server.key"
    ErrorLog "logs/dasu_bif4.log"
    CustomLog "logs/dasu_bif.access.log" common
</VirtualHost>

5. Change the path to where your xampp is installed
6. When you visit your site for the first time you have to accept the connection, because you are using a self signed certificate

result:
You can now use HTTPS for your localhost and your HTTP Requests get redirected to https
