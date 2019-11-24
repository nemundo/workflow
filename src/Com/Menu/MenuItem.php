<?php


namespace Nemundo\Workflow\Com\Menu;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Web\Site\AbstractSite;

class MenuItem extends AbstractBase
{

    /**
     * @var string
     */
    public $label;

    /**
     * @var bool
     */
    public $active = false;

    /**
     * @var bool
     */
    public $linked = true;

    /**
     * @var AbstractSite
     */
    public $site;


}