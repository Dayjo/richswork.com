# richswork.com
Menu for http://richswork.com/


## Setup
* Update the config.php file so that the ROOT variable matches where the site is on your domain. 
* You may need to remove the `<IFModule> ... </IfModule>` from .htaccess
* The .htaccess rewrites any not found file or directory (`/aisdhasdsaodihasd/asdoihasdoiashdasd/asdsauiha`) to `index.php?f=/aisdhasdsaodihasd/asdoihasdoiashdasd/asdsauiha`. You may want your own 404 document, you can add `ErrorDocument 404 /404.html` changing /404.html to your 404 page. 


Any element can open the menu, it just needs the class "nav-opener" given to it.
