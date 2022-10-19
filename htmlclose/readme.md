# HTMLclose shortcode
* Adds configurable html tags to content via shortcodes
* HTMLopen and HTMLclose plugins/shortcodes must be used together (HTML must have an opening and closing tag to be valid HTML and to render correctly)
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
