Move WP to local



    Check that the directory on .htaccess are the correct
    Check the fields "siteurl" and "home" are the correct



## 



UPDATE wp8j_options SET option_value = replace(option_value, 'http://italgraniti.ro', 'http://localhost/it'); 
UPDATE wp8j_posts SET post_content = replace(post_content, 'http://italgraniti.ro', 'http://localhost/it'); 
UPDATE wp8j_posts SET guid = replace(guid, 'http://italgraniti.ro','http://localhost/it'); 
UPDATE wp8j_links SET link_url = replace(link_url, 'http://italgraniti.ro', 'http://localhost/it');


##
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /it/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /it/index.php [L]
</IfModule>