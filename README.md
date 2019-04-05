# Shopping Cart
## Tested on/with
* Ubuntu 18.04
* PHP 7.2
* Apache 2
## Installation
1. `cd /etc/apache2/sites-available`
2. `sudo nano 000-default.conf`
3. Change `DocumentRoot` to `/path/to/project/shopping-cart`
4. `cd /etc/apache2`
5. `sudo nano apache2.conf`
6. Change `Require all denied` to `Require all granted` in `<Directory />`
7. `sudo service apache2 restart`
8. Go to `127.0.0.1` from your browser