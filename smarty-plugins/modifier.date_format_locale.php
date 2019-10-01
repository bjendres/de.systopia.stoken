<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     modifier.date_format_locale.php
 * Type:     modifier
 * Name:     date_format_locale
 * Purpose:  Format a date using a given locale
 * -------------------------------------------------------------
 */
function smarty_modifier_date_format_locale($string, $format = NULL, $locale = NULL, $category = NULL) {
  $category = (isset($category) && defined($category) ? constant($category) : LC_ALL);
  if (isset($locale)) {
    $previous_locale = setlocale($category, 0);
    $current_locale = setlocale($category, $locale);
  }
  $string = strftime($format, $string);
  if (isset($locale)) {
    setlocale($category, $previous_locale);
  }
  return $string;
}
