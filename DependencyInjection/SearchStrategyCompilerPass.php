<?php

/*
 * This file is part of the RedaktiloBundle project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\RedaktiloBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class SearchStrategyCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('redaktilo.search_engine')) {
            return;
        }
        $definition = $container->getDefinition('redaktilo.search_engine');
        $taggedServices = $container->findTaggedServiceIds('redaktilo.search_strategy');
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'registerStrategy',
                array(new Reference($id), $attributes[0]['priority'])
            );
        }
    }
}
