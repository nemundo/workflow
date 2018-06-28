<?php

namespace Nemundo\Workflow\Content\Type;


use Nemundo\Core\Base\AbstractBaseClass;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\Content\Item\AbstractContentItem;

abstract class AbstractContentType extends AbstractBaseClass
{

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    protected $itemClass;

    /**
     * @var AbstractSite
     */
    public $itemSite;


    abstract protected function loadType();

    public function __construct()
    {
        $this->loadType();
    }


    public function getItem($parentItem = null) {

        /** @var AbstractContentItem $item */
        $item = new $this->itemClass($parentItem);

        return $item;


    }



    public function onCreate() {

    }


}