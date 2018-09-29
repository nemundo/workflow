<?php

namespace Nemundo\Workflow\App\RepeatingTask\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Workflow\App\RepeatingTask\Site\RepeatingTaskItemSite;

class RepeatingTaskContentType extends AbstractContentType
{

    protected function loadData()
    {
        $this->contentName = 'Wiederholdende Aufgabe';
        $this->contentId = '59f7cdb2-19c6-49ab-94a4-53488bf0994c';
        $this->itemSite = RepeatingTaskItemSite::$site;
    }

}