<?php

namespace Nemundo\Workflow\Model;


use Nemundo\Model\Definition\Model\AbstractModel;
use Nemundo\Model\Type\External\Id\ExternalUniqueIdType;
use Nemundo\Workflow\Data\Workflow\WorkflowExternalType;

abstract class AbstractWorkflowBaseModel extends AbstractModel
{

    /**
     * @var \Nemundo\Model\Type\External\Id\ExternalUniqueIdType
     */
    public $workflowId;

    /**
     * @var WorkflowExternalType
     */
    public $workflow;


    public function __construct()
    {
        parent::__construct();

        $fieldName = 'workflow';
        $aliasFieldName = $this->tableName . '_workflow';

        $this->workflowId = new ExternalUniqueIdType($this);
        $this->workflowId->tableName = $this->tableName;
        $this->workflowId->fieldName = $fieldName;
        $this->workflowId->aliasFieldName = $aliasFieldName;
        //$this->workflowId->label = "Workflow";


        $this->workflow = new WorkflowExternalType($this, $aliasFieldName);
        //$this->workflow->label = 'Workflow';
        $this->workflow->tableName = $this->tableName;
        $this->workflow->fieldName = $fieldName;
        $this->workflow->aliasFieldName = $aliasFieldName;
        $this->workflow->visible->form = false;
        $this->workflow->visible->view = false;

        /*
                $this->workflow = new \Nemundo\Workflow\Data\Workflow\WorkflowExternalType($this, "testapp_anmeldung_workflow_workfow");
                $this->workflow->tableName = "testapp_anmeldung_workflow";
                $this->workflow->fieldName = "workfow";
                $this->workflow->aliasFieldName = "testapp_anmeldung_workflow_workfow";
                $this->workflow->label = "";
                $this->workflow->visible->form = false;
                $this->workflow->visible->view = false;*/


    }


}