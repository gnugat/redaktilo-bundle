# Redaktilo Bundle

Documentation:

* [Installation](#installation)
* [Further documentation](#further-documentation)

[![Travis CI](https://travis-ci.org/gnugat/redaktilo-bundle.png)](https://travis-ci.org/gnugat/redaktilo-bundle)

## Installation

Use [Composer](http://getcomposer.com) to install the bundle:

    composer require gnugat/redaktilo-bundle:~1.0

Then register the bundle in you kernel. For example:

```php
<?php
// File: app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Gnugat\RedaktiloBundle\GnugatRedaktiloBundle(),
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
```

## Further documentation

You can see the current and past versions using one of the following:

* the `git tag` command
* the [releases page on Github](https://github.com/gnugat/redaktilo/releases)
* the file listing the [changes between versions](CHANGELOG.md)

You can find more documentation at the following links:

* [copyright and MIT license](LICENSE)
* [versioning and branching models](VERSIONING.md)
* [contribution instructions](CONTRIBUTING.md)
