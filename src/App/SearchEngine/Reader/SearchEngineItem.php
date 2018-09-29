<?php

namespace Nemundo\Workflow\App\SearchEngine\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Web\Site\AbstractSite;

class SearchEngineItem extends AbstractBase
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var AbstractSite
     */
    public $site;


}