<?php

namespace Plugins\customCss;

use \Typemill\Plugin;

class customCss extends Plugin
{
	protected $settings;
	
    public static function getSubscribedEvents()
    {
		return array(
			'onSettingsLoaded'		=> 'onSettingsLoaded',
			'onTwigLoaded' 			=> 'onTwigLoaded'
		);
    }
	
	public function onSettingsLoaded($settings)
	{
		$this->settings = $settings->getData();
	}
	
	public function onTwigLoaded()
	{
		/* get Twig Instance and add the cookieconsent template-folder to the path */
		$twig 	= $this->getTwig();					
		$loader = $twig->getLoader();
		$loader->addPath(__DIR__ . '/templates');

		$customCssSettings = $this->settings['settings']['plugins']['customcss'];

		if(isset($customCssSettings['customcss']))
		{
			$this->addCSS($twig->fetch('/customcss.twig', $customCssSettings));
		}
			
		
	}
}
