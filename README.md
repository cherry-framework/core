# Cherry-Core
The Cherry-project Core

[![GitHub license](https://img.shields.io/github/license/abgeo07/cherry-core.svg)](https://github.com/ABGEO07/cherry-core/blob/master/LICENSE)

[![GitHub release](https://img.shields.io/github/release/abgeo07/cherry-core.svg)](https://github.com/ABGEO07/cherry-core/releases)

[![Packagist Version](https://img.shields.io/packagist/v/cherry-project/core.svg "Packagist Version")](https://packagist.org/packages/cherry-core/request "Packagist Version")

------------

This is core for Cherry-Project that contains Cherry [Request](https://github.com/ABGEO07/cherry-request),
[Response](https://github.com/ABGEO07/cherry-response), [Router](https://github.com/ABGEO07/cherry-router),
[Templater](https://github.com/ABGEO07/cherry-templater) and [Logger](https://github.com/ABGEO07/cherry-logger).

In root of your application you must define main file and call application Core Kernel class:

```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

$kernel = new Cherry\Kernel(__DIR__);
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
