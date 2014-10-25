<?php

/*
 * This file is part of the RedaktiloBundle project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\RedaktiloBundle;

use Gnugat\RedaktiloBundle\DependencyInjection\CommandCompilerPass;
use Gnugat\RedaktiloBundle\DependencyInjection\SearchStrategyCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GnugatRedaktiloBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SearchStrategyCompilerPass());
        $container->addCompilerPass(new CommandCompilerPass());
    }
}
