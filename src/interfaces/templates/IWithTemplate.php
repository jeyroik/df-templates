<?php
namespace deflou\interfaces\templates;

use deflou\interfaces\applications\IHaveApplicationName;
use deflou\interfaces\templates\contexts\IContext;
use extas\interfaces\IHasClass;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;
use extas\interfaces\parameters\IHaveParams;

interface IWithTemplate extends IItem, IHaveUUID, IHasName, IHasDescription, IHasClass, IHaveParams, IHaveApplicationName
{
    public const SUBJECT = 'deflou.template.with';

    public const FIELD__APPLY_TO_PARAM = 'apply_to_params';

    public function getApplyToParams(): array;
    public function setApplyToParams(array $applyTo): static;
    public function getTemplateData(IContext $context): array;
}
