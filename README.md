# Redaktilo Bundle

Provides the following services from [Redaktilo](http://github.com/gnugat/redaktilo)
in a [Symfony2](http://symfony.com) application:

* `redaktilo.editor`: an instance of [`Gnugat\Redaktilo\Editor`](http://github.com/gnugat/redaktilo/tree/master/src/Gnugat/Redaktilo/Editor.php)

Documentation:

* [Extending](#extending)
* [Installation](#installation)
* [Usage with Symfony2 DependencyInjection Component standalone](#usage-with-symfony2-dependencyinjection-component-standalone)
* [Further documentation](#further-documentation)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/57bf6bda-fec9-405d-8e73-ff1ecbeba868/mini.png)](https://insight.sensiolabs.com/projects/57bf6bda-fec9-405d-8e73-ff1ecbeba868)
[![Travis CI](https://travis-ci.org/gnugat/redaktilo-bundle.png)](https://travis-ci.org/gnugat/redaktilo-bundle)

## Extending

You can also [extend](http://github.com/gnugat/redaktilo/tree/master/doc/05-extending.md)
Redaktilo by creating new [`SearchStrategy`](http://github.com/gnugat/redaktilo/tree/master/src/Gnugat/Redaktilo/Search/SearchStrategy.php)
and new [`Command`](http://github.com/gnugat/redaktilo/tree/master/src/Gnugat/Redaktilo/Command/Command.php).

To make your custom `Command` and `SearchStrategy` available, simply define them
as services in your Symfony2 application and tag them:

```yaml
services:
    acme_redaktilo.custom_command:
        class: Acme\RedaktiloBundle\Command\CustomCommand
        tags:
            - { name: redaktilo.command }

    acme_redaktilo.custom_search_strategy:
        class: Acme\RedaktiloBundle\Search\SearchStrategy
        tags:
            - { name: redaktilo.search_strategy, priority: 20 }
```

> **Note**: `SearchStrategy`'s priority is optionnal (defaults to 0).
> The higher the priority is, the sooner `SearchEngine` will check if the
> `SearchStrategy` supports the given pattern.

## Installation

Use [Composer](http://getcomposer.com) to install the bundle:

    composer require gnugat/redaktilo-bundle:^1.0

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

## Usage with Symfony2 DependencyInjection Component standalone

If you're not using the full stack framework, but rather just the Symfony2
DependencyInjection Component, you can still use this bundle:

```php
<?php

use Gnugat\RedaktiloBundle\DependencyInjection\CommandCompilerPass;
use Gnugat\RedaktiloBundle\DependencyInjection\SearchStrategyCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

$container = new ContainerBuilder();
$fileLocator = new FileLocator(__DIR__.'/vendor/gnugat/redaktilo/Resources/config');
$loader = new YamlFileLoader($container, $fileLocator);

$loader->load('services.yml');
$container->addCompilerPass(new SearchStrategyCompilerPass());
$container->addCompilerPass(new CommandCompilerPass());
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
