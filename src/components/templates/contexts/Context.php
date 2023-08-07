<?php
namespace deflou\components\templates\contexts;

use deflou\interfaces\templates\contexts\IContext;
use extas\components\Item;
use extas\components\parameters\THasParams;
use extas\components\THasName;

abstract class Context extends Item implements IContext
{
    use THasName;
    use THasParams;

    public function __toString(): string
    {
        return $this->getName();
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
