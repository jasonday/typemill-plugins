<?php

namespace Plugins\customJs;

use \Typemill\Plugin;

class customJs extends Plugin
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

		$customJsSettings = $this->settings['settings']['plugins']['customjs'];

		if(isset($customJsSettings['customjs']))
		{
			$this->addJS($twig->fetch('/customjs.twig', $customJsSettings));
		}
			
		
	}
}
