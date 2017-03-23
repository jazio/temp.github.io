Add a new website:

From the dropplet: https://cloud.digitalocean.com/networking/domains
 Add A jazio.eu directs to 178.62.221.99 (dropplet IP)
 Add nameservers: ns1.digitalocean.com, ns2.digitalocean.com, ns3.digitalocean.com

 In order to redirect all subdomains 'www' string and typos, add
 CNAME
 www and *.jazio.eu is analias of jazio.eu

 Now login into server

 edit /etc/hosts
 add entry 
 178.62.221.99 jazio.eu

make folder /var/www/html/jazio.eu

Create virtual hosts

 in /etc/apache2/sites-available/jazio.eu.conf 
 <VirtualHost *:80>
        ServerName jazio.eu
        ServerAdmin webmaster@localhost
        ServerAlias www.jazio.eu
        DocumentRoot /var/www/html/jazio.eu
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


service apache reload