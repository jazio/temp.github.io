## Good tips on Drupal
----------------------------------
Based on experience

Avoid field collection -- issues with translation of fields

A good solution for rich menus: TB Mega Menu

Lock base fields but keep at your own pick the instances -- see the 2 field.inc files from your feature

Allways store in the database UNIX timestamp and not custom date strings as they create conversion and performance issues. If the fields contain data use a hook to convert all data.

Media is a buggy module with almost no other options.

Organize your functionality around a class.

Do database queries using entity meta wrapper or EntityFieldQuery rather on db database API

Use Drupal php wrappers. They already solved problems of security, UTF-8 etc




