<?php

namespace Nemundo\Workflow\App\SearchEngine\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Web\Site\AbstractSite;

class SearchEngineItem extends AbstractBase
{

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $text;

    /**
     * @var AbstractSite
     */
    public $site;


}