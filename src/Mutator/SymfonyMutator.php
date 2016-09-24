<?php

/*
 * This file is part of the Ivory Serializer package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\Serializer\Mutator;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PropertyAccess\PropertyPath;
use Symfony\Component\PropertyAccess\PropertyPathInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class SymfonyMutator implements MutatorInterface
{
    /**
     * @var PropertyAccessorInterface
     */
    private $propertyAccessor;

    /**
     * @var PropertyPathInterface[]
     */
    private $propertyPaths = [];

    /**
     * @param PropertyAccessorInterface|null $propertyAccessor
     */
    public function __construct(PropertyAccessorInterface $propertyAccessor = null)
    {
        $this->propertyAccessor = $propertyAccessor ?: PropertyAccess::createPropertyAccessor();
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($object, $property, $value)
    {
        $this->propertyAccessor->setValue($object, $this->getPropertyPath($property), $value);
    }

    /**
     * @param string $property
     *
     * @return PropertyPathInterface
     */
    private function getPropertyPath($property)
    {
        return isset($this->propertyPaths[$property])
            ? $this->propertyPaths[$property]
            : $this->propertyPaths[$property] = new PropertyPath($property);
    }
}
