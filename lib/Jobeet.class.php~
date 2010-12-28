<?php

class Jobeet
{

  static public function slugify($text)
  {
    // replace all non letters or digits by -
    $text = preg_replace('/\W+/', '-', $text);

    // trim and lowercase
    $text = trim($text, '-');

    // transliterate
    if (function_exists('iconv')) {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('#[^-\w]+#', '', $text);

    // return 'n-a' on empty string
    if (empty($text)) {
      $text = 'n-a';
    }

    return $text;
  }

}

?>