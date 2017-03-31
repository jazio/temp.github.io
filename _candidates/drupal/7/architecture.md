

DRUPAL 7



It is essentially a php 4 application: superglobals + code. The output is printed using header() + print $output. The order is uncontrolled, php easily will break.
Responses are strings instead objects.

Drupal 7

Info --
Contains declaratives necessary for the module: name, description, php version, package they belong, classes (files[]), site wide css and javascript. No need to add version and project.

Hooks --
In Drupal hooks does not need to be explicitly called. They are called by Drupal during the bootstrap process.

You can get full information about available hooks in the terminal by invoking hook_permission(). This is useful because you can grep the output for what you need.

$ drush eval "var_dump(module_invoke_all('permission'))"



Look for hooks in core or in contributed modules, api.inc files.

The new entities, widgets etc are declared to the system via a 
hook_something_info()

Permissions --
The most basic permissions are via access callbacks. This is a boolean yes/no access to the content.

// Disable the '/node' page.
$items['node']['access callback'] = FALSE;

// Use our own access callback for the 'node/%node' page.
$items['node/%node']['access callback'] = 'myown_settings_node_access_callback';

You can add your own access callback.
user_access() is the next level determining if you have or not access to 
The next level

Forms --
They can be automatically submitted or you can create a custom submit handler.

/**
 * Build the admin settings form.
 */
function dt_node_settings_helpers_overall() {
  $node_types = node_type_get_names();

  $form = array();
  $form['content_types'] = array(
    '#tree' => TRUE,
    '#type' => 'fieldset',
    '#title' => t('Content types'),
    '#description' => t('Indicate helper content types for the project.'),
  );

  foreach ($node_types as $type => $label) {
    $form['content_types'][$type] = array(
      '#type' => 'checkbox',
      '#title' => $label,
      '#default_value' => variable_get('dt_node_settings_helper_node_type_' . $type, 0),
    );
  }
  // Add a submit handler function.
  $form['#submit'][] = 'dt_node_settings_helpers_overall_submit';

  return system_settings_form($form);
}
system_settings_form($form) is automatically created buttons Submit and Cancel


Fields ---


Validation --
Fields in the content types  are already validated.

E.g. link field is validated by link module (there is a validator)

Custom fields needs validation via custom validation handler.




Database Queries ---
db_select() is better but has disadvantages
Read here when should you use one or other methods http://drupal.stackexchange.com/questions/129669/whats-faster-db-query-db-select-or-entityfieldquery

database.inc contains utility functions all prefixed by db_...()




Caching --

Temporary storage bin in computer memory
$my_data = &drupal_static(__FUNCTION__);

Persistent cache is saved in database cache_ prefixed tables

Caching has to do with performance.
Read: https://www.drupal.org/documentation/performance

Must read article: https://www.lullabot.com/articles/a-beginners-guide-to-caching-data-in-drupal-7

Temporary storage bin 
  $my_data = &drupal_static(__FUNCTION__);


Cache handling
includes/cache.inc,

Persistent cache is saved in database cache_ prefixed tables

Mainly it is handled via cache_get() and cache_set()

Usage

In D7 (taken from menu.module):
$cache = cache_get($cid, 'cache_menu');


And in D8, which uses cache():
$cache = cache('menu')->get($cid);


function my_module_function() {
  $my_data = &drupal_static(__FUNCTION__);
  if (!isset($my_data)) {
    if ($cache = cache_get('my_module_data')) {
      $my_data = $cache->data;
    }
    else {
      // Do your expensive calculations here, and populate $my_data
      // with the correct stuff..
      cache_set('my_module_data', $my_data, 'cache');
    }
  }
  return $my_data;
}


Ajax

The idea is to collect a set of commands as an Ajax response and send them in block to the server via ajax_deliver().

$commands[] = … see ajax.inc for the ajax command API
ajax_deliver(array('#type' => 'ajax', '#commands' => $commands));




Paths --

Paths are represented by internal paths that could have an alias.
Use drupal_get_normal_path() to give alias and get an internal path.
The opposite is drupal_get_path_alias().

Contributed Modules Notes --

Field_collection - lack of support of entity_translation and workbench_moderation.


Static

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. A property declared as static cannot be accessed with an instantiated class object (though a static method can)

Because static methods are callable without an instance of the object created, the pseudo-variable $this is not available inside the method declared as static.

Static properties cannot be accessed through the object using the arrow operator ->.


Database Updates in Drupal


Introduction:

Drupal stores which update hooks has been run as it only runs the update hooks once. If a specific update hook is not run, the most probable reasons is
It has already been run
An update hook that needs to be run before fails.
You can see in the system table all the modules enabled and the schema_version shows which update has been run last.

My hook has been triggered?
select name,schema_version from system where name="estat_microdata";
+-----------------+----------------+
| name            | schema_version |
+-----------------+----------------+
| estat_microdata |             -1 |
+-----------------+----------------+
This means the module is not enabled.
If the value is not 0 try to reset it to 0 

update system set schema_version=0 where name='estat_microdata';

> Query OK, 1 row affected (0.01 sec)
> Rows matched: 1  Changed: 1  Warnings: 0

then run the hook again:
drush updb























ㅡ
OOP

Static

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. A property declared as static cannot be accessed with an instantiated class object (though a static method can)

Because static methods are callable without an instance of the object created, the pseudo-variable $this is not available inside the method declared as static.

Static properties cannot be accessed through the object using the arrow operator ->. 



Validation
Fields in the content types  are already validated.

E.g. link field is validated by link module (there is a validator)

Custom fields needs validation via custom validation handler.




The standard aproach in Drupal on data is it should be validated but not filtered before saving into DB. You should filter it when rendering data.
check_markup run data through input filters and sanitize it, assuming the filters are properly set up.


Altering the presentation layout of a node/entity could be done a several levels:
Early by altering the unrendered (yet) array via hooks: hook_node_view and hook_node_view_alter respectively hook_entity_view, hook_entity_view_alter. Here you could alter properties like (properties are set with #): #markup, #weight, #access (visibility) of node/entity fields. A later level would be at presentation later: preprocess and template level.


Exporting configuration.
----------------------------------------------------
Features module. You can export most of the configuration, variables (Strongarm module), Fields (Base field + instances in Features 2+), Views, Rules, vocabularies, terms (only with Features Extra), nodequeues (only definitions, use fe_nodequeue module to export all), blocks (fe_block module, it also exports, block settings, visibility), fe_block and fe_nodequeues are included in Feature Extra module.


Media module

The thumbnails are being generated by the transcoder (ffmpeg).
The working settings are admin/config/media/video/presets_en
presets/preset/default_flash_conversion

The key setting is: Force one-pass encoding (checked)

OK Video transcoder: FFmpeg / avconv	2.6.2



#Blocks

How adding multiple instances of a block in a page.
----------------------------------------------------
Use Context module. You simply add this block in different contexts. You can use it only once per context.


Vocabularies

When I edit a node I don't get taxonomy terms in the autocompleter.
----------------------------------------------------
Check admin/structure/types/manage/, choose your content type then find field Term settings.
There in Vocabulary select, you can choose your vocabulary.

#Fields

You can delete a field (with instances) that simple
  
```
  field_delete_field('field_name_of_field');
  field_purge_batch(1);
```
  
  or just instances:
  
  ```
  if ($instance = field_info_instance('field_name_of_field1', 'field_name_of_field2', 'field_name_of_field3')) {
    field_delete_instance($instance, TRUE);
    field_purge_batch(1);
  }
  ```
  
  Fetching a field and if the field is set then render a specific form. This is a typical functionality for a Survey.
  