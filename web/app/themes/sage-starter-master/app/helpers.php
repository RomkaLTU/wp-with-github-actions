<?php

/**
 * Theme helpers.
 */

namespace App;


// Echoes email preventing from scraping it
function hideEmail($email)
{

  $parts = explode('@', $email);
  $user = $parts[0];
  $domain = "@" . $parts[1];

  echo "<a class='js-email' href='javascript:void(0)' data-name='{$user}' data-domain='{$domain}'></a>";
}


// Echoes img html
function imgSrcset($img, $classes = false)
{
  if (empty($img)) return;

  $imgUrl = $img["url"] ?? null;
  $imgAlt = $img["alt"] ?? null;
  $srcSet = wp_get_attachment_image_srcset($img["id"]);

  echo "<img src='{$imgUrl}' srcset='{$srcSet}' class='{$classes}' alt='{$imgAlt}'>";
}
