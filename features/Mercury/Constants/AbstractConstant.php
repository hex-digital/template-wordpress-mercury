<?php

namespace Features\Mercury\Constants;

abstract class AbstractConstant
{
    /**
     * Get a constant value by name
     *
     * @param string $name The name of the constant
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed The value of the constant
     */
    public static function getByName($name)
    {
        $constants = self::getConstants();

        if (!isset($constants[$name])) {
            throw new \InvalidArgumentException(
                'Wrong ' . self::getReflection()->getShortName() . ' name: ' . $name
            );
        }

        return $constants[$name];
    }

    /**
     * Get a constant name by value
     *
     * @param string $value
     *
     * @throws \InvalidArgumentException
     *
     * @return int|string
     */
    public static function getByValue($value)
    {
        $constants = self::getConstants();
        foreach ($constants as $constantName => $constantValue) {
            if ($constantValue === $value) {
                return $constantName;
            }
        }
        throw new \InvalidArgumentException(
            'Wrong ' . self::getReflection()->getShortName() . ' value: ' . $value
        );
    }

    /**
     * Get an array of all constants defined and their values
     *
     * @return array
     */
    public static function getConstants(): array
    {
        return self::getReflection()->getConstants();
    }

    /**
     * Get an array of all constant names
     *
     * @return array
     */
    public static function getConstantNames(): array
    {
        return array_keys(self::getConstants());
    }

    /**
     *
     * @return \ReflectionClass
     */
    protected static function getReflection(): \ReflectionClass
    {
        return new \ReflectionClass(get_called_class());
    }
}
