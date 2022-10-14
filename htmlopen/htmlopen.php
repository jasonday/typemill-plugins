<?php

namespace Plugins\htmlopen;

use \Typemill\Plugin;
use \Typemill\Events\OnShortcodeFound;

class htmlopen extends Plugin
{

  protected $settings;

  # listen to the shortcode event
  public static function getSubscribedEvents()
  {
    return array(
      'onShortcodeFound' => 'onShortcodeFound'
    );
  }

  # if typemill found a shortcode and fires the event
  public function onShortcodeFound($shortcode)
  {
    # read the data of the shortcode
    $shortcodeArray = $shortcode->getData();

    # check if it is the shortcode name that we where looking for
    if(is_array($shortcodeArray) && $shortcodeArray['name'] == 'htmlopen')
    {
      # we found our shortcode, so stop firing the event to other plugins
      $shortcode->stopPropagation();

      # Of course you should validate the user input here, but let us skip it to keep it easy ...
      $htmltag = isset($shortcodeArray['params']['tag']) ? $shortcodeArray['params']['tag'] : '';
      $htmlid = isset($shortcodeArray['params']['id']) ? $shortcodeArray['params']['id'] : '';
      $htmlclass = isset($shortcodeArray['params']['class']) ? $shortcodeArray['params']['class'] : '';
      $html = '<' . $htmltag . ' id="' . $htmlid . '" class="' . $htmlclass . '">';

      # and return a html-snippet that replaces the shortcode on the page.
      $shortcode->setData($html);
    }
  }
}