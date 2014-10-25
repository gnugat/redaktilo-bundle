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

class CommandCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('redaktilo.command_invoker')) {
            return;
        }
        $definition = $container->getDefinition('redaktilo.command_invoker');
        $taggedServices = $container->findTaggedServiceIds('redaktilo.command');
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addCommand',
                array(new Reference($id))
            );
        }
    }
}
