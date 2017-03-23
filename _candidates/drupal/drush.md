# D*R*U*S*H*

---------------------------------------------------------------------------

# See all commands
$ drush --filter

# Drupal installation info
$ drush status

# Update all modules. Dangerous. Use it only to see what's new (updates)
$ drush up
# Better alternative
$ drush ups


# Info about your module
$ drush pmi your-module
# Info about the available releases on drupal.org
$ drush rl your_module

# Install a specific version with drush
drush dl og-7.x-1.3

or in modules/contrib
```
wget http://ftp.drupal.org/files/projects/file_entity-7.x-2.0-alpha3.tar.gz
drush en file_entity
```

#Migrate content

drush mreg
drush mi ClassName

# When things are turning bad
drush mr
drush mr -all

Query

# Get the superuser name
`drush sqlq "select name from users where uid=1"`

# Set the superuser password
`drush sqlq "update users set pass=md5(pass) where uid=1"`