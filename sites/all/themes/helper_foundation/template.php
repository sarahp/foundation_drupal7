<?php


/**
 * Adds `button` class to all submit buttons.
 */

function helper_foundation_preprocess_button(&$variables) {
  $variables['element']['#attributes']['class'] = array();
  $variables['element']['#attributes']['class'][] = 'button';


  // Special styles for Delete/Destructive Buttons.
  if (stristr($variables['element']['#value'], 'Delete') !== FALSE) {
    $variables['element']['#attributes']['class'][] = 'alert';
  }
}

/**
 * Returns the HTML for a button.
 */

function helper_foundation_button($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'submit';
  element_set_attributes($element, array('id', 'name', 'value'));

  $element['#attributes']['class'][] = 'form-' . $element['#button_type'];
  if (!empty($element['#attributes']['disabled'])) {
    $element['#attributes']['class'][] = 'disabled';
  }

  return '<input' . drupal_attributes($element['#attributes']) . ' /> ';
}


