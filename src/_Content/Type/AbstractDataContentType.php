<?php

namespace Nemundo\App\Content\Type;


use Nemundo\Core\Log\LogMessage;
use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Factory\ModelFactory;
use Nemundo\App\Content\Item\DataContentItem;

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

        if ($this->modelClass == null) {
            (new LogMessage())->writeError('No modelClass defined');
            return;
        }


        $model = (new ModelFactory())->getModelByClassName($this->modelClass);
        return $model;

    }

}