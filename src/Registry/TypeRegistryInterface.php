<?php

/*
 * This file is part of the Ivory Serializer package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\Serializer\Registry;

use Ivory\Serializer\Type\TypeInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
interface TypeRegistryInterface
{
    /**
     * @param string        $name
     * @param TypeInterface $type
     */
    public function registerType($name, TypeInterface $type);

    /**
     * @param string $name
     *
     * @return TypeInterface
     */
    public function getType($name);
}
