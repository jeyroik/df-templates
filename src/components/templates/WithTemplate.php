<?php
namespace deflou\components\templates;

use deflou\components\applications\THasApplicationName;
use deflou\interfaces\templates\contexts\IContext;
use deflou\interfaces\templates\IWithTemplate;
use extas\components\Item;
use extas\components\parameters\THasParams;
use extas\components\THasClass;
use extas\components\THasDescription;
use extas\components\THasName;
use extas\components\THasStringId;

class WithTemplate extends Item implements IWithTemplate
{
    use THasStringId;
    use THasName;
    use THasDescription;
    use THasParams;
    use THasApplicationName;
    use THasClass;

    public function getApplyToParams(): array
    {
        return $this[static::FIELD__APPLY_TO_PARAM] ?? [];
    }

    public function setApplyToParams(array $applyTo): static
    {
        $this[static::FIELD__APPLY_TO_PARAM] = $applyTo;

        return $this;
    }

    public function getTemplateData(IContext $context): array
    {
        $plugin = $this->buildClassWithParameters();
        return $plugin->getTemplateData($this, $context);
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
