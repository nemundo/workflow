<?php

namespace Nemundo\Workflow\App\Workflow\Form;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Db\Filter\Filter;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Data\Usergroup\UsergroupListBox;
use Nemundo\Workflow\App\Identification\Type\UsergroupIdentificationType;
use Nemundo\Workflow\App\Identification\Type\UserIdentificationType;
use Nemundo\Workflow\App\Workflow\Com\ListBox\OpenClosedWorkflowListBox;
use Nemundo\Workflow\App\Workflow\Data\Process\ProcessListBox;
use Nemundo\Workflow\App\Workflow\Data\Workflow\WorkflowModel;
use Nemundo\Workflow\App\Workflow\Parameter\ProcessParameter;

class WorkflowSearchForm extends SearchForm
{

    /**
     * @var BootstrapListBox
     */
    private $processListBox;

    /**
     * @var OpenClosedWorkflowListBox
     */
    private $statusListBox;

    /**
     * @var UserListBox
     */
    private $userListBox;

    /**
     * @var UsergroupListBox
     */
    private $usergroupListBox;


    protected function loadCom()
    {
        parent::loadCom();

        $row = new BootstrapFormRow($this);

        $this->processListBox = new ProcessListBox($row);
        $this->statusListBox = new OpenClosedWorkflowListBox($row);
        $this->userListBox = new UserListBox($row);
        $this->usergroupListBox = new UsergroupListBox($row);

    }


    public function getHtml()
    {

        $this->processListBox->label = 'Prozess';
        $this->processListBox->submitOnChange = true;
        $this->processListBox->value = $this->processListBox->getValue();


        //$userListBox->label = 'User Assignment';
        $this->userListBox->label = 'Benutzer Zuweisung';
        $this->userListBox->submitOnChange = true;
        $this->userListBox->value = $this->userListBox->getValue();

        //$usergroupListBox->label = 'Usergroup Assignment';
        $this->usergroupListBox->label = 'Benutzergruppe Zuweisung';
        $this->usergroupListBox->submitOnChange = true;
        $this->usergroupListBox->value = $this->usergroupListBox->getValue();

        return parent::getHtml();

    }


    public function getFilter()
    {

        $model = new WorkflowModel();

        $filter = new Filter();

        $processId = $this->processListBox->getValue();
        $statusId = $this->statusListBox->getValue();
        $userId = $this->userListBox->getValue();
        $usergroupId = $this->usergroupListBox->getValue();

        if ($processId !== '') {
            $filter->andEqual($model->processId, $processId);
        }

        if ($statusId == 1) {
            $filter->andEqual($model->closed, false);
        }

        if ($statusId == 2) {
            $filter->andEqual($model->closed, true);
        }

        if ($userId !== '') {
            $filter->andEqual($model->identificationTypeId, (new UserIdentificationType())->id);
            $filter->andEqual($model->identificationId, $userId);
        }

        if ($usergroupId !== '') {
            $filter->andEqual($model->identificationTypeId, (new UsergroupIdentificationType())->id);
            $filter->andEqual($model->identificationId, $usergroupId);
        }

        return $filter;

    }

}