<?php

namespace Nemundo\Workflow\App\Task\Form;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapDatePicker;
use Nemundo\Package\Bootstrap\FormElement\BootstrapFileUpload;
use Nemundo\Package\Bootstrap\FormElement\BootstrapLargeTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\User\Data\User\UserListBox;
use Nemundo\User\Information\UserInformation;
use Nemundo\Workflow\App\Task\Builder\TaskBuilder;
use Nemundo\Workflow\App\Task\Process\TaskProcess;
use Nemundo\Workflow\Process\AbstractProcess;
use Schleuniger\App\Application\Type\AbstractWorkflowApplication;
use Schleuniger\App\Task\Data\TaskErledigtBis\TaskErledigtBis;
use Schleuniger\App\Task\Builder\TaskBuilderOld;
use Schleuniger\App\ToDo\Data\ToDo\ToDo;
use Schleuniger\App\ToDo\Data\ToDo\ToDoReader;
use Schleuniger\App\ToDo\Data\ToDo\ToDoUpdate;
use Schleuniger\App\ToDo\Data\ToDoDeadline\ToDoDeadline;
use Schleuniger\App\ToDo\Application\ToDoWorkflowApplication;
use Schleuniger\App\ToDo\Data\ToDoFile\ToDoFile;
use Schleuniger\App\ToDo\Data\ToDoUser\ToDoUser;
use Schleuniger\App\ToDo\Data\UserResponsible\UserResponsible;
use Schleuniger\App\ToDo\WorkflowStatus\ErfassungToDoWorkflowStatus;


class TaskBuilderForm extends BootstrapForm
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var string
     */
    //public $workflowPrefix;

    /**
     * @var string
     */
    public $source;

    /**
     * @var string
     */
    public $sourceId;

    /**
     * @var string
     */
    public $dataId;

    /**
     * @var BootstrapTextBox
     */
    private $task;

    /**
     * @var UserListBox
     */
    private $verantwortlicher;

    /**
     * @var BootstrapDatePicker
     */
    private $erledigenBis;

    /**
     * @var BootstrapTextBox
     */
    private $aufwand;

    /**
     * @var BootstrapLargeTextBox
     */
    private $bemerkungen;

    /**
     * @var BootstrapFileUpload
     */
    private $datei;


    protected function loadCom()
    {
        parent::loadCom();

        $this->contentType = new TaskProcess();

    }


    public function getHtml()
    {

        $this->task = new BootstrapTextBox($this);
        $this->task->label = 'Aufgabe';
        $this->task->autofocus = true;
        $this->task->validation = true;

        $this->verantwortlicher = new UserListBox($this);
        $this->verantwortlicher->label = 'Verantwortlicher';
        $this->verantwortlicher->validation = true;
        $this->verantwortlicher->value = (new UserInformation())->getUserId();

        $this->erledigenBis = new BootstrapDatePicker($this);
        $this->erledigenBis->label = 'Erledigen bis';
        $this->erledigenBis->value = (new Date())->setNow()->addDay(7)->getShortDateLeadingZeroFormat();

        $this->aufwand = new BootstrapTextBox($this);
        $this->aufwand->label = 'Aufwand';

        $this->bemerkungen = new BootstrapLargeTextBox($this);
        $this->bemerkungen->label = 'Bemerkungen';

        $this->datei = new BootstrapFileUpload($this);
        $this->datei->multiUpload = true;
        $this->datei->label = 'Datei';

        return parent::getHtml();

    }


    protected function onSubmit()
    {

        $deadline = (new Date())->fromGermanFormat($this->erledigenBis->getValue());


        $builder = new TaskBuilder();
        $builder->contentType = $this->contentType;  // new TaskProcess();
        //$builder->application = $this->applicationType;  // new ToDoApplicationType();
        //$builder->userId = $this->verantwortlicher->getValue();
        //$builder->workflowNumber = '';
        $builder->source = $this->source;
        $builder->sourceId = $this->sourceId;
        //$builder->workflowNumber = $todoRow->workflowNumber->prefixAutoNumber;
        $builder->task = $this->task->getValue();
        $builder->deadline = $deadline;
        $builder->timeEffort = $this->aufwand->getValue();
        $builder->dataId = 0;  //$todoId;
        $builder->createUserTask($this->verantwortlicher->getValue());

        //$builder->createItem();

    }


}