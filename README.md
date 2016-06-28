# Phalcon Basic Structure - PHP
## A project from [Eduardo Destruti](http://destruti.com/)

###What is Phalcon PHP [phalconphp.com](https://phalconphp.com/)
A full-stack PHP framework delivered as a C-extension
Its innovative architecture makes Phalcon the fastest PHP framework ever built!

![php-benchmark.Exemp2](https://systemsarchitectdotnet.files.wordpress.com/2013/04/php-benchmark.png)


##Install Features to run this Phalcon Project on Linux

###Install Basics
> sudo apt-get update

> sudo apt-get install -y memcached git vim htop lynx whois curl xclip build-essential


###Install Composer
> curl -sS https://getcomposer.org/installer | php

> sudo mv composer.phar /usr/local/bin/composer

###Install Apache

> sudo apt-get update

> sudo apt-get install apache2

> sudo a2enmod rewrite

> sudo service apache2 restart

###Install Apache

> sudo apt-get install mysql-server

> sudo /usr/bin/mysql_secure_installation

###Install PHP

> sudo apt-get install libapache2-mod-php5 php5-common php5-mysql php5-xmlrpc php5-curl php5-gd php5-cli php-pear php5-dev php5-imap php5-mcrypt php5-json php5-geoip php5-imagick php5-memcache php5-memcached

###Install Phalcon

> sudo apt-add-repository ppa:phalcon/stable

> sudo apt-get update

> sudo apt-get install php5-phalcon

##Atention


## VHOSTS ##

If you need help with apache configs, go to folder "scripts/apache.conf". Its a good example to config your VHOST.

```
#!sh

<VirtualHost *:80>
        ServerAdmin eduardo@destruti.com
        ServerName  destruti.dev

        SetEnv APPLICATION_ENV "development"

        DocumentRoot "/var/www/php-phalcon-basic-structure/public"

	    <Directory "/var/www/php-phalcon-basic-structure">
        	Options Indexes FollowSymLinks MultiViews
        	AllowOverride All
        	Order allow,deny
        	allow from all
    	</Directory>

    	<Directory "/var/www/php-phalcon-basic-structure/public">
        	Options Indexes FollowSymLinks MultiViews
        	AllowOverride All
        	Order allow,deny
        	allow from all
    	</Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.php-phalcon-basic-structure.log
        LogLevel warn

        CustomLog ${APACHE_LOG_DIR}/access.php-phalcon-basic-structure.log combined

    Alias /doc/ "/usr/share/doc/"
    <Directory "/usr/share/doc/">
        Options Indexes MultiViews FollowSymLinks
        AllowOverride None
        Order deny,allow
        Deny from all
        Allow from 127.0.0.0/255.0.0.0 ::1/128
    </Directory>

</VirtualHost>```







