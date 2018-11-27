<?php

namespace Nemundo\Workflow\App\Workflow\Content\Type;


use Nemundo\App\Content\Type\Model\ModelContentTypeTrait;
use Nemundo\App\Content\View\DataModelContentView;
use Nemundo\Model\Definition\Model\AbstractModel;

abstract class AbstractModelDataWorkflowStatus extends AbstractWorkflowStatus
{

    use ModelContentTypeTrait;

    /**
     * @var AbstractModel
     */
    public $modelClass;


    public function __construct($dataId = null)
    {

        $this->viewClass = DataModelContentView::class;
        parent::__construct($dataId);

    }


    public function onCreate()
    {

    }


}