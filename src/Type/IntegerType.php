<?php

/*
 * This file is part of the Ivory Serializer package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\Serializer\Type;

use Ivory\Serializer\Context\ContextInterface;
use Ivory\Serializer\Mapping\TypeMetadataInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class IntegerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    protected function doConvert($data, TypeMetadataInterface $type, ContextInterface $context)
    {
        return $context->getVisitor()->visitInteger($data, $type, $context);
    }
}
