The Oro Platform - Business Application Platform (BAP)
======================================================

The platform is based on the Symfony 2 framework.

This repository contains base bundles forming the Oro Platform (BAP) which allows to easily create new custom business applications.

Installation
------------

```bash
git clone https://github.com/orocrm/platform.git

curl -s https://getcomposer.org/installer | php

php composer.phar install
```

Run unit tests
--------------

To run unit tests of any bundnles :

```bash
phpunit
```

Use as dependency in composer
-----------------------------

```yaml
    "require": {
        "oro/platform": "dev-master",
    }
```
