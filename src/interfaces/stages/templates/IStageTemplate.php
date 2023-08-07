<?php
namespace deflou\interfaces\stages\templates;

use deflou\interfaces\templates\contexts\IContext;
use deflou\interfaces\templates\IWithTemplate;

interface IStageTemplate
{
    public const NAME = 'deflou.template';

    public function __invoke(array $templateData, IWithTemplate $plugin, mixed &$template, IContext $context): void;
}
