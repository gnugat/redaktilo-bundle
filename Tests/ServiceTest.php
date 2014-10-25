<?php

/*
 * This file is part of the RedaktiloBundle project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Redaktilo\Tests;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    protected function setUp()
    {
        $kernel = new \AppKernel('test', true);
        $kernel->boot();

        $this->container = $kernel->getContainer();
    }

    public function testEditorService()
    {
        $editor = $this->container->get('redaktilo.editor');

        $this->assertInstanceOf('Gnugat\Redaktilo\Editor', $editor);
    }

    public function testTextFactoryService()
    {
        $textFactory = $this->container->get('redaktilo.text_factory');

        $this->assertInstanceOf('Gnugat\Redaktilo\Service\TextFactory', $textFactory);
    }

    public function testCustomCommand()
    {
        $this->markTestSkipped('Will be valid only with redaktilo v1.3');

        $editor = $this->container->get('redaktilo.editor');

        // Should not throw \Gnugat\Redaktilo\Command\CommandNotFoundException
        $editor->run('acme.custom', array());
    }

    public function testCustomSearchStrategy()
    {
        $editor = $this->container->get('redaktilo.editor');
        $textFactory = $this->container->get('redaktilo.text_factory');
        $text = $textFactory->make('');

        // Should not throw \Gnugat\Redaktilo\Search\PatternNotSupportedException
        $editor->hasBelow($text, false);
    }
}
