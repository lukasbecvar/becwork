## Becwork framework documentation

# INDEX
- <a href="#requirements">Requirements</a>
- <a href="#installation">Installation</a>
- <a href="#configuration">Configuration</a>
- <a href="#controllers">Controllers</a>
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
- Build production app (panel.sh)
- Copy files from build/ to your server (web space)
- Set 400, 403, 404, etc.. errors redirect to error.php?code=ERROR_CODE
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

# <h2 id="assets">Assets</h2>
- Default css is public/assets/css/main.css
- You can add new assets to public/assets/*/