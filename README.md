# Fignon View Engine

This is an interface to ease any php template engine integration to use within the
Fignon Framework.


See some concrete implementation using

- [The Plates Engine](https://github.com/dahkenangnon/fignon-plate-engine)
- [The Symfony Twig Engine](https://github.com/dahkenangnon/fignon-twig-engine)
- [The Laravel Blade Engine](https://github.com/dahkenangnon/fignon-blade-engine)
- [The Smarty Engine](https://github.com/dahkenangnon/fignon-smarty-engine)


NB: 

- You don't need this package, if you don't need to write an integration of a templates which don't be listed above.

- If you have just to use Twig or something listed above, just grab it with composer and start building using Fignon Framework.

If you really need it:

```bash
composer require dahkenangnon/fignon-view-engine
```

Then, use it like this:

```php
namespace App\ViewsEngine; // This namespace is up to you

use Fignon\Extra\ViewEngine; // Use the Fignon View Engine integration interface

/**
 * View Engine, 
 */
class MyViewEngine implements ViewEngine
{

    public function init(string $templatePath = null, string $templateCachedPath = null, array $options = []): ViewEngine {

        // Init you view engine and return $this;
    }


    public function render(string $viewPath = '', $locals = [], array $options = []): ?string
    {

        // Return the rendered string from your view engine
    }
}
```

You can then use your new view engine integration like this:

```php
//app.php (or index.php) depending of how you call you entry point
declare(strict_types=1);

include_once __DIR__ . "/../vendor/autoload.php";

use Fignon\Tunnel;
use App\Features\Features;
use App\ViewsEngine\MyViewEngine;

$app = new Tunnel();
$app->set('env', 'development');
// ... other middlewares

// View engine initialization
$app->set('views', dirname(__DIR__) . '/templates');
$app->set('views cache', dirname(__DIR__) . '/var/cache');
$app->set('view engine options', []); // Add options to the view engine
$app->engine('my-view-engine-name', new MyViewEngine()); 

$app->set('case sensitive routing', true);
//  ... other middlewares


(new Features($app))->bootstrap();

$app->listen();
```