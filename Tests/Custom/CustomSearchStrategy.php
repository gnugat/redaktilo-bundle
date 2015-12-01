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

use Gnugat\Redaktilo\Search\SearchStrategy;
use Gnugat\Redaktilo\Text;

class CustomSearchStrategy implements SearchStrategy
{
    /**
     * {@inheritdoc}
     */
    public function findAbove(Text $text, $pattern, $location = null)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function findBelow(Text $text, $pattern, $location = null)
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($pattern)
    {
        return is_bool($pattern);
    }
}
