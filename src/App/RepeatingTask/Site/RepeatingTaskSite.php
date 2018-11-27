<?php

namespace Nemundo\Workflow\App\RepeatingTask\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\RepeatingTask\Data\RepeatingTask\RepeatingTaskAdmin;

class RepeatingTaskSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'RepeatingTask';
        $this->url = 'repeating-task';

        new RepeatingTaskItemSite($this);
        new RepeatingTaskDoneSite($this);

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        new RepeatingTaskAdmin($page);


        $page->render();


    }
}