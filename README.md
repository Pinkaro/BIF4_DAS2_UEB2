#Tutorial

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