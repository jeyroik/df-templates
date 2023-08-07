<?php
namespace deflou\interfaces\templates;

use deflou\interfaces\templates\contexts\IContext;
use extas\interfaces\IItem;
use extas\interfaces\repositories\IRepository;

interface ITemplateService extends IItem
{
    public const SUBJECT = 'deflou.template.service';

    public const ANY = '*';

    public function getTemplates(IRepository $pluginsRepository, IContext $context): array;
}
