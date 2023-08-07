<?php
namespace deflou\interfaces\templates\contexts;

use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;

interface IContext extends IItem, IHasName, IHaveParams
{
    public const SUBJECT = 'deflou.template.context';

    public function getApplicationNames(): array;
    public function getApplyTo(): array;
}
