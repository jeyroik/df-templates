<?php

use extas\components\repositories\RepoItem;

return [
    "name" => "jeyroik/df-templates",
    "tables" => [
        // Please, do not use this abstract table for prod, cause it lost semantic.
        "with_templates" => [
            "namespace" => "deflou\\repositories",
            "item_class" => "deflou\\components\\templates\\WithTemplate",
            "pk" => "id",
            "aliases" => ["withTemplates"],
            "code" => [
                'create-before' => '\\' . RepoItem::class . '::setId($item);'
                                  .'\\' . RepoItem::class . '::throwIfExist($this, $item, [\'name\']);'
            ]
        ]
    ]
];
