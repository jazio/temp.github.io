
#Uninstalling the php

```
sudo apt-get purge php.*
```

#Search packages

apt-cache search php5-

https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu

#Install a module
sudo apt-get install php5.6-mbstring

#Enable a module
```
php5enmod http
```

Module opcache speed the application but make the debug more difficult. It store precompiled bytecode in memory.


Examine the enabled modules and theirs ini
/etc/php/5.6/mods-available


