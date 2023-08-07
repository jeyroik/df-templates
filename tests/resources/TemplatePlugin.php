<?php
namespace tests\resources;

use deflou\interfaces\stages\templates\IStageTemplate;
use deflou\interfaces\templates\IWithTemplate;
use deflou\interfaces\templates\contexts\IContext;
use extas\components\plugins\Plugin;

class TemplatePlugin extends Plugin implements IStageTemplate
{
    public function __invoke(array $templateData, IWithTemplate $plugin, mixed &$template, IContext $context): void
    {
        $result = '';

        foreach ($templateData as $name => $value) {
            $result .= $name . '=' . (is_array($value) ? array_shift($value) : $value) . ';';
        }

        $template = $result;
    }
}
