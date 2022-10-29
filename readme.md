[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/paypalme/MoveMaineLLC/5)



# Typemill Plugins
A set of plugins for the [Typemill](https://github.com/typemill) flat file CMS. 

## Custom CSS
* Add custom CSS to your site. 
* A default style.css already exists. If using that file, just enter that file name into the field. 
* Custom CSS files must be located in the `plugins/customcss/css` directory
## Custom JS
* Add custom javascript to your site. 
* A default script.js already exists. If using that file, just enter that file name into the field. 
* Custom javascript files must be located in the `plugins/customjs/js` directory
## HTMLopen and HTMLclose shortcodes
* Adds configurable html tags to content via shortcodes
* Plugins/shortcodes must be used together (HTML must have an opening and closing tag to be valid HTML and to render correctly)
* Use
	```
	[:htmlopen tag="div" id="author" class="card":]
	my content
	[:htmlclose tag="div":]
	```
	Outputs:
	```
	<div id="author" class="card">
	my content
	</div>
	```
* Can nest shortcodes just like HTML for complex layouts & elements in Typemill markdown
* _Need to extend for other HTML attributes (for iframes, etc.)_



