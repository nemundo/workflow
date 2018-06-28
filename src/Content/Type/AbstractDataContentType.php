<?php

namespace Nemundo\Workflow\Content\Type;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\Workflow\Content\Item\DataContentItem;

abstract class AbstractDataContentType extends AbstractContentType
{

    /**
     * @var AbstractModel
     */
    public $modelClass;

    public function __construct()
    {

        $this->itemClass = DataContentItem::class;

        parent::__construct();


    }


    public function getModel()
    {

        $model = (new ModelFactory())->getModelByClassName($this->modelClass);
        return $model;

    }

}