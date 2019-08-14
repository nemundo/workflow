<?php

namespace Nemundo\Workflow\Model;


use Nemundo\Orm\Model\AbstractOrmModel;
use Nemundo\Orm\Type\External\ExternalOrmType;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowExternalType;

class WorkflowBaseOrmModel extends AbstractOrmModel
{

    /**
     * @var WorkflowExternalType
     */
    public $workflow;


    public function __construct()
    {
        parent::__construct();

        $this->templateLabel = 'Workflow Base Model';
        $this->templateId = 'fdef5ced-b111-45a2-a12b-92074140bd75';
        $this->templateExtendsClass = AbstractWorkflowBaseModel::class;

        $this->workflow = new ExternalOrmType($this);
        $this->workflow->externalModelClassName = WorkflowOrmModel::class;
        $this->workflow->fieldName = 'workflow';
        $this->workflow->variableName = 'workflow';
        $this->workflow->visible->form = false;
        $this->workflow->visible->view = false;
        $this->workflow->createModelProperty = false;

    }


    protected function loadModel()
    {

    }

}