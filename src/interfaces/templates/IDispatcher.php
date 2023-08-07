<?php
namespace deflou\interfaces\templates;

use deflou\interfaces\templates\contexts\IContext;
use deflou\interfaces\templates\IWithTemplate;

interface IDispatcher 
{
    public function getTemplateData(IWithTemplate $templated, IContext $context): array;
}
