# Boz-MW

This is another MediaWiki API handler in PHP.

## Tools

See [the tools](./tools/README.md).

## API showcase

Here some usage examples:

```php
<?php
// autoload classes
require 'boz-mw/autoload.php';

// enable verbose messages
\cli\Log::$DEBUG = true;

echo "Simple Italian Wikipedia API query:\n";
$w = \wm\WikipediaIt::getInstance();
$response = $w->fetch( [
	'action' => 'query',
	'prop'   => 'info',
	'titles' => [
		'Pagina principale'
	]
] );
print_r( $response );

echo "Simple Italian Wikipedia API query with continuation support:\n";
$members = \wm\WikipediaIt::getInstance()->createQuery( [
	'action' => 'query',
	'list'   => 'categorymembers',
	'cmtitle' => 'Categoria:Software con licenza GNU GPL',
] );
foreach( $members->getGenerator() as $response ) {
	print_r( $response );
}

echo "Simple POST request:\n";
\mw\API::$DEFAULT_USERNAME = 'My username';
\mw\API::$DEFAULT_PASSWORD = 'My bot password';
$w = \wm\WikipediaIt::getInstance()->login();
$response = $w->edit( [
	'title'   => 'Special:Nothing',
	'text'    => 'My wikitext',
	'summary' => 'My edit summary',
] );
print_r( $response );
```

## Known usage
* [ItalianWikipediaDeletionBot](https://github.com/valerio-bozzolan/ItalianWikipediaDeletionBot)
* [wiki-users-leaflet](https://github.com/valerio-bozzolan/wiki-users-leaflet/) hosted at [WMF Labs](https://tools.wmflabs.org/it-wiki-users-leaflet/)
