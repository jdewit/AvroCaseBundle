AvroCaseBundle
-----------------
Convert strings to different formats.

Supports: camelCase, PascalCase, Title Case, underscore_case.

Installation
------------
This bundle is listed on packagist.

Simply add it to your apps composer.json file

``` js
    "avro/case-bundle": "dev-master"
```

Enable the bundle in the kernel:

``` php
// app/AppKernel.php

    new Avro\CaseBundle\AvroCaseBundle
```


Usage
-----
``` php
$str = 'underscore_format';

$camelCaseFormat = $this->container->get('avro_case.converter')->underscoreToCamelCase($str);
```


