<?php

/*
 * This file is part of the RedaktiloBundle project.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Redaktilo\Tests;

use Gnugat\Redaktilo\Text;

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

    public function testContentFactoryService()
    {
        $contentFactory = $this->container->get('redaktilo.content_factory');

        $this->assertInstanceOf('Gnugat\Redaktilo\Service\ContentFactory', $contentFactory);
    }

    public function testCustomCommand()
    {
        $editor = $this->container->get('redaktilo.editor');

        // Should not throw \Gnugat\Redaktilo\Command\CommandNotFoundException
        $editor->run('acme.custom', array());
    }

    public function testCustomSearchStrategy()
    {
        $editor = $this->container->get('redaktilo.editor');
        $text = Text::fromString('');

        // Should not throw \Gnugat\Redaktilo\Search\PatternNotSupportedException
        $editor->hasBelow($text, false);
    }
}
