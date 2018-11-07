<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type\Comment;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\Comment\CommentForm;
use Nemundo\Workflow\App\WorkflowTemplate\Content\View\CommentWorkflowTemplateView;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\Comment;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentTemplateStatus extends AbstractWorkflowStatus  // AbstractModelDataWorkflowStatus
{

    public $comment;


    protected function loadType()
    {

        //$this->contentLabel = 'Comment';
        $this->contentLabel = 'Kommentar';
        $this->contentName = 'comment';
        $this->contentId = '9fc81c7a-1fe8-4b8d-aa52-5a9f60431330';
        //$this->modelClass = CommentModel::class;
        $this->changeStatus = false;
        $this->showMenu = false;

        $this->formClass = CommentForm::class;
        $this->viewClass = CommentWorkflowTemplateView::class;

    }


    public function saveType()
    {

        $data = new Comment();
        $data->comment = $this->comment;
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    /*
    public function onCreate()
    {

        $this->saveContentLog();

        $row = (new CommentReader())->getRowById($this->dataId);

        $builder = new SearchEngineBuilder();
        $builder->contentType = $this;
        $builder->addText($row->comment);

    }*/


    public function getJson()
    {


        $data = parent::getJson();

        $row = (new CommentReader())->getRowById($this->dataId);

        //$data[$this->contentName]['comment'] = $row->comment;

        $data['comment'] = $row->comment;

        //$data[$this->contentName]['user']=$this->userCreated->login;
        //$data[$this->contentName]['date_time']=$this->dateTimeCreated->getDbFormat();

        return $data;


    }

}