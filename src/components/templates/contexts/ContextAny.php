<?php
namespace deflou\components\templates\contexts;

class ContextAny extends Context
{
    public function getApplicationNames(): array
    {
        return []; //by default template service is searching by any app, so we do not pass any apps names
    }

    public function getApplyTo(): array
    {
        return []; //by default template service is searching by any param, so we do not pass any params names
    }
}
