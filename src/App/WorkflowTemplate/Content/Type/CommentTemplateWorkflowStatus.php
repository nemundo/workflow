<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractModelDataWorkflowStatus;
use Nemundo\Workflow\App\SearchEngine\Builder\SearchEngineBuilder;
use Nemundo\Workflow\App\WorkflowTemplate\Content\View\CommentWorkflowTemplateView;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentModel;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentTemplateWorkflowStatus extends AbstractModelDataWorkflowStatus
{

    protected function loadType()
    {

        $this->contentLabel = 'Comment';
        $this->contentName = 'comment';
        $this->contentId = '9fc81c7a-1fe8-4b8d-aa52-5a9f60431330';
        $this->modelClass = CommentModel::class;
        $this->changeStatus = false;
        $this->viewClass=CommentWorkflowTemplateView::class;

    }


    public function onCreate()
    {

        $this->saveContentLog();

        $row = (new CommentReader())->getRowById($this->dataId);

        $builder = new SearchEngineBuilder();
        $builder->contentType = $this;
        $builder->addText($row->comment);

    }


    public function exportJson()
    {


        $data = parent::exportJson();

        $row = (new CommentReader())->getRowById($this->dataId);

        //$data['comment'];
        $data[$this->contentName]['comment'] = $row->comment;
        //$data[$this->contentName]['user']=$this->userCreated->login;
        //$data[$this->contentName]['date_time']=$this->dateTimeCreated->getDbFormat();

        return $data;


    }

}