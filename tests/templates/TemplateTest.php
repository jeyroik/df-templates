<?php

use deflou\components\templates\contexts\ContextAny;
use deflou\components\templates\TemplateService;
use deflou\components\templates\WithTemplate;
use deflou\interfaces\stages\templates\IStageTemplate;
use extas\components\plugins\Plugin;
use tests\ExtasTestCase;
use tests\resources\TemplateDispatcher;
use tests\resources\TemplatePlugin;

class TemplateTest extends ExtasTestCase
{
    protected array $libsToInstall = [
        'jeyroik/df-applications' => ['php', 'json'],
        '' => ['php', 'php']
        //'vendor/lib' => ['php', 'json'] storage ext, extas ext
    ];
    protected bool $isNeedInstallLibsItems = false;
    protected string $testPath = __DIR__;

    public function testTemplateService(): void
    {
        $ts = new TemplateService();

        $ts->withTemplates()->create(new WithTemplate([
            WithTemplate::FIELD__APPLICATION_NAME => '*',
            WithTemplate::FIELD__APPLY_TO_PARAM => ['*'],
            WithTemplate::FIELD__NAME => 'test',
            WithTemplate::FIELD__CLASS => TemplateDispatcher::class
        ]));

        $ts->plugins()->create(new Plugin([
            Plugin::FIELD__CLASS => TemplatePlugin::class,
            Plugin::FIELD__STAGE => IStageTemplate::NAME . 'any'
        ]));

        $templates = $ts->getTemplates($ts->withTemplates(), new ContextAny([
            ContextAny::FIELD__NAME => 'any'
        ]));

        $this->assertCount(1, $templates);
        $this->assertArrayHasKey('test', $templates);

        $this->assertEquals(
            WithTemplate::FIELD__APPLICATION_NAME.'=*;'.WithTemplate::FIELD__APPLY_TO_PARAM.'=*;',
            $templates['test']
        );
    }
}
