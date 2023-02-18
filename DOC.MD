## Becwork framework documentation

# INDEX
- <a href="#requirements">Requirements</a>
- <a href="#installation">Installation</a>
- <a href="#configuration">Configuration</a>
- <a href="#controllers">Controllers</a>
- <a href="#utilsinformation">Utils information</a>
- <a href="#assets">Assets</a>

# <h2 id="requirements">Requirements</h2>
- OS: ``Linux``
- WEB-SERVER: ``apache2``
- DATABASE: ``mysql or mariadb``
- PHP: ``PHP 8.* (PDO, CLI, CURL)``

# <h2 id="installation">Installation</h2>
``(Development)``
- Install PHP 8, PHP-PDO, PHP-CLI, PHP-CURL
- Install MariaDB or MySQL
- Clone this repository to your project directory
- Edit the configuration file (database connection)
- Execute structure.sql to your database
- Run composer install in (panel.sh)
- Run development server (panel.sh)

``(Production)``
- Install PHP 8, PHP-PDO, PHP-CLI, PHP-CURL
- Install MariaDB or MySQL
- Disable apache autoindex
- Set web root to public/
- Set 400, 403, 404, etc.. errors redirect to ErrorHandlerer.php?code=ERROR_CODE
- Configure config file (disable dev-mode)
- Execute structure.sql to your database
- Restart MySQL & reload apache
- Try open your site in browser

# <h2 id="configuration">Configuration</h2>
- ``app-name`` = the name of the application displayed in the title
- ``version`` = current application version number
- ``author`` = the name of the app creator
- ``author-link`` = link to app developer
- ``url-check`` = if it is enabled, url will be checked if it is the same as url in the config
- ``dev-mode`` = Includes the whoops library
- ``url`` = url of the application 
- ``encoding`` = default site/database encoding format
- ``https`` = enable only https
- ``maintenance`` = enable maintenance redirct mode
- ``mysql config`` = define default mysql login data

# <h2 id="controllers">Controllers</h2>
- Create a new controller under the namespace: becwork\controller
- After creating a new controller, add it to ControllerManager.php

# <h2 id="utilsinformation">Utils information</h2>
## Config-manager:
```getValueByName("app-name") = return config value```
## Crypt-utils:
```contains methods for encryption (genBase64, decodeBase64, encryptAES, decryptAES)```
## Hash-utils:
```contains methods for hashing passwords (genBlowFish, genSHA1, hashMD5, genSHA256, customhash)```
## mysql-utils:
```class for database functions (connect, insertQuery, logToMysql, fetch, fetchValue, getMySQLVersion```
## Cookie-utils:
```Functions for managing cookies (cookieSet, getCookie, unset_cookie, printCookie)```
## Session-utils:
```Session management functions (sessionStartedCheckWithStart, setSession, checkSessionSet, sessionDestroy, printSession)```
## Escape-utils:
```Function for editing dangerous characters in a string (specialCharshStrip)```
## File-utils:
```File management functions (getJsonFromUrl)```
## Main-utils:
```Common frequently used functions(drawPhpInformation, drawData, getRemoteAdress, getRootDoc, isLampp, getProtocol, drawArray, drawErrors, isSSL)```
## Response-utils:
```Functions for checking the response of websites and services (checkOnline, send404Header, drawApache404ErrorIndex, serviceOnlineCheck)```
## String-utils:
```functions for generating strings etc... (genRandomStringLower, genRandomStringUper, genRandomStringAll, genSpecialChars, genCombinated, genNumbrGenerator)```
## URL-utils:
```Function for editing dangerous characters in a string (getActualURLComplete, getActualURL, redirect, refrash, getRoute, jsRedirect)```

# <h2 id="assets">Assets</h2>
- Default css is public/assets/css/main.css
- You can add new assets to public/assets/*/