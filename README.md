# Cherry-Core
The Cherry-project Core

[![GitHub license](https://img.shields.io/github/license/cherry-framework/core.svg)](https://github.com/cherry-framework/core/blob/master/LICENSE)

[![GitHub release](https://img.shields.io/github/release/cherry-framework/core.svg)](https://github.com/cherry-framework/core/releases)

[![Packagist Version](https://img.shields.io/packagist/v/cherry-project/core.svg "Packagist Version")](https://packagist.org/packages/cherry-project/core "Packagist Version")

------------

This is core for Cherry-Project that contains Cherry [Request](https://github.com/ABGEO07/cherry-request),
[Response](https://github.com/ABGEO07/cherry-response), [Router](https://github.com/ABGEO07/cherry-router),
and [Templater](https://github.com/ABGEO07/cherry-templater).

In root of your application you must define main file and call application Core Kernel
and Router classes:

```php
require_once __DIR__ . '/../vendor/autoload.php';

use Cherry\Routing\Router;

$kernel = new Cherry\Kernel(__DIR__);

$router = new Router();
```

`Kernel` class takes only one argument - your application root path.

With main file you mast have directories `config`, `controllers`, `templates`:

```
root
└─ config/
└─ controllers/
└─ templates/
```

### Config

`config` directory is a 'home' for application config and router files:
```
config/
└─ config.json
└─ routes.json
```

`config.json` contains application environmental parameters:
```json
{
  "ROUTES_FILE":      "path-to-routes.json",
  "CONTROLLERS_PATH": "path-to-controllers-directory",
  "TEMPLATES_PATH":   "path-to-templates-directory",
  "LOGS_PATH":        "path-to-logs-directory"
}
```

### Controller

Controller is a simple PHP class that contains public methods mapped on route:
```
"action": "Cherry\\Controller\\DefaultController::index"
```

Every method returns Cherry\HttpUtils\Response object.

```php
$this->render('index');
```

**2019 &copy; Cherry-project**
