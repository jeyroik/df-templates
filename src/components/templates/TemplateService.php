<?php
namespace deflou\components\templates;

use deflou\interfaces\stages\templates\IStageTemplate;
use deflou\interfaces\templates\contexts\IContext;
use deflou\interfaces\templates\ITemplateService;
use deflou\interfaces\templates\IWithTemplate;
use extas\components\Item;
use extas\interfaces\repositories\IRepository;

class TemplateService extends Item implements ITemplateService
{
    public function getTemplates(IRepository $pluginsRepository, IContext $context): array
    {
        $applyTo = array_merge([static::ANY], $context->getApplyTo());
        $appNames = array_merge([static::ANY], $context->getApplicationNames());

        /**
         * @var IWithTemplate[] $templateds
         */
        $templateds = $pluginsRepository->all([
            IWithTemplate::FIELD__APPLICATION_NAME => $appNames,
            IWithTemplate::FIELD__APPLY_TO_PARAM => $applyTo
        ]);

        $result = [];

        foreach ($templateds as $templated) {
            $data = $templated->getTemplateData($context);
            $template = null;
            
            $this->applyContextPlugins($data, $templated, $template, $context);
            $this->applyPluginPlugins($data, $templated, $template, $context);

            if (!$template) {
                continue;
            }

            $result[$templated->getName()] = $template;
        }

        return $result;
    }

    protected function applyContextPlugins(array $templateData, IWithTemplate $valuePlugin, mixed &$template, IContext $context): void
    {
        foreach ($this->getPluginsByStage(IStageTemplate::NAME . $context) as $plugin) {
            /**
             * @var IStageTemplate $plugin
             */
            $plugin($templateData, $valuePlugin, $template, $context);
        }
    }

    protected function applyPluginPlugins(array $templateData, IWithTemplate $valuePlugin, mixed &$template, IContext $context): void
    {
        foreach ($this->getPluginsByStage(IStageTemplate::NAME . $context . '.' . $valuePlugin->getName()) as $plugin) {
            /**
             * @var IStageTemplate $plugin
             */
            $plugin($templateData, $valuePlugin, $template, $context);
        }
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
