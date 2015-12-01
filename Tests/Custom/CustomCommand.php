<?php

/*
 * This file is part of the RedaktiloBundle project.
 *
 * (c) Loïc Faugeron <faugeron.loic@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\RedaktiloBundle\Tests\Custom;

use Gnugat\Redaktilo\Command\Command;

class CustomCommand implements Command
{
    /**
     * {@inheritdoc}
     */
    public function execute(array $input)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'acme.custom';
    }
}
