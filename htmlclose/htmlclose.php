<?php

namespace Plugins\htmlclose;

use \Typemill\Plugin;
use \Typemill\Events\OnShortcodeFound;

class htmlclose extends Plugin
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
    if(is_array($shortcodeArray) && $shortcodeArray['name'] == 'htmlclose')
    {
      # we found our shortcode, so stop firing the event to other plugins
      $shortcode->stopPropagation();

      # Of course you should validate the user input here, but let us skip it to keep it easy ...
      $htmlclosetag = isset($shortcodeArray['params']['tag']) ? $shortcodeArray['params']['tag'] : '';
      $html = '</' . $htmlclosetag . '>';

      # and return a html-snippet that replaces the shortcode on the page.
      $shortcode->setData($html);
    }
  }
}