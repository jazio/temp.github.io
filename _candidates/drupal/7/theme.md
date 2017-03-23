
Adding a variable to the theme
=====================================================
function MYTHEME_preprocess_page(&$variables) {
  //dpm($variables);//29 elements
     $variables['MYVARIABLE'] = 'MYVALUE';
  //dpm($variables);//30 elements
}
Note: No need for return because this is a preprocessor function

Add a css class to the class array
=====================================================
When needed am extra css class, first identify the place (block, region etc.) then assign it to the classes_array
function coriolis_preprocess_region(&$variables) {
    if($variables['region'] == "sidebar_first") {
      $variables['classes_array'][] = 'sidebar_well';
       }
       else {
$variables['classes_array'][] = 'well';
       }
}

Add a css class based on the domain
=====================================================
function MYTHEME_preprocess_html(&$variables) {
  // Add a class that gives us a domain/server name. A very handy solution in altering domain based style.
  $variables['classes_array'][] = str_replace('.', '-', $_SERVER['SERVER_NAME']);
}


Upgrade jquery library / add a new javascript
=====================================================
function coriolis_js_alter(&$javascript) {
   $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'coriolis') . '/js/jquery-1.8.0.min.js';

}
Override the main menu links
=====================================================
 function MYTHEME_links__system_main_menu($variables) {
  $html = "<div>\n";
  $html .= "  <ul>\n";
  foreach ($variables['links'] as $link) {
    $html .= "<li>".l($link['title'], $link['path'], $link)."</li>";
  }
  $html .= "  </ul>\n";
  $html .= "</div>\n";

  return $html;
 }

Define a custom theme function and a custom template file for your overriding
=====================================================

Supposing I need a custom implementation of main menu links.
In your page.tpl.php you have the menu links like this:

        <?php if ($main_menu || $secondary_menu): ?>

        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('nav')), 'heading' => t(''))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('nav')), 'heading' => t(''))); ?>

    <?php endif; ?>




HYPOTHESIS:

I want to override the links__system_main_menu theme
I want to do it through a custom module called mymenu
SOLUTION:

Create the module folder for the module mymenu and all the necessary files in it.
Implement the hook_theme as follows in template.php.

function mymenu_theme($existing, $type, $theme, $path) {
  return array(
    'links__system_main_menu' => array( //Override the main menu theme
      'variables' => array(),
      'template' => 'links__system_main_menu', //Note that the template name defined here has no .tpl.php extension.
    ),
  );
}
Create your custom template for your links in the module folder.
In our case the template file will be called links__system_main_menu. Here is a sample template.
<div>
  <ul>
  <?php
    foreach ($links as $link) {
      echo '<li>'.l($link['title'], $link['path'], $link).'</li>';
    }
  ?>
  </ul>
</div>


A more elegant solution is to override the

Create the theme folder for the theme mytheme and all the necessary files in it. And make it default theme.
Implement the hook_links__system_main_menu as follows. Probably you will do that in the template.php file in your theme folder.:
function mytheme_links__system_main_menu($variables) {
  $html = "<div>\n";
  $html .= "  <ul>\n";
  foreach ($variables['links'] as $link) {
    $html .= "<li>".l($link['title'], $link['path'], $link)."</li>";
  }
  $html .= "  </ul>\n";
  $html .= "</div>\n";

  return $html;
}

The l() function
=====================================================
l($text, $path, array $options = array())
Format an internal link