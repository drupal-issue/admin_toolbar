<?php
/**
 * @file
 * Contains \Drupal\admin_toolbar_tools\Controller\ToolbarController.
 *
 */

namespace Drupal\admin_toolbar_tools\Controller;

//Use the necessary classes
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\RedirectResponse;


/**
 * Class ToolbarController
 * @package Drupal\admin_toolbar_tools\Controller
 */
class ToolbarController extends ControllerBase {

  //This function display the tools in the menu.
  public function home() {
    return new RedirectResponse('/');
  }

  //This function flush all caches.
  public function flushAll() {
    drupal_flush_all_caches();
    drupal_set_message(t('All cache cleared.'));
    return new RedirectResponse('/');
  }

  //This function flush css and javascript caches.
  public function flush_js_css() {
    \Drupal::state()
      ->set('system.css_js_query_string', base_convert(REQUEST_TIME, 10, 36));
    drupal_set_message(t('CSS and JavaScript cache cleared.'));
    return new RedirectResponse('/');
  }

  //This function flush plugins caches.
  public function flush_plugins() {
    // Clear all plugin caches.
    \Drupal::service('plugin.cache_clearer')->clearCachedDefinitions();
    drupal_set_message(t('Plugin cache cleared.'));
    return new RedirectResponse('/');
  }

  // Reset all static caches.
  public function flush_static() {
    drupal_static_reset();
    drupal_set_message(t('All static caches cleared.'));
    return new RedirectResponse('/');
  }

// this function allow to access in documentation via admin_toolbar module
  public function drupal_org() {
    $response = new RedirectResponse("https://www.drupal.org");
    $response->send();
    return $response;
  }

  // this function allow to access in documentation(list changes of the different versions of drupal core) via admin_toolbar module.
  public function list_changes() {
    $response = new RedirectResponse("https://www.drupal.org/list-changes");
    $response->send();
    return $response;
  }

  //this function allow to add
  public function documentation() {
    $response = new RedirectResponse("https://api.drupal.org/api/drupal/8");
    $response->send();
    return $response;
  }

}