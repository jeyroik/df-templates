<?php
namespace tests\resources;

use deflou\interfaces\templates\contexts\IContext;
use deflou\interfaces\templates\IDispatcher;
use deflou\interfaces\templates\IWithTemplate;

class TemplateDispatcher implements IDispatcher
{
    public function getTemplateData(IWithTemplate $templated, IContext $context): array
    {
        return [
            IWithTemplate::FIELD__APPLICATION_NAME => $templated->getApplicationName(),
            IWithTemplate::FIELD__APPLY_TO_PARAM => $templated->getApplyToParams()
        ];
    }
}
