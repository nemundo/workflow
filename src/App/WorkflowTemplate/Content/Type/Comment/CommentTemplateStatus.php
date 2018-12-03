<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type\Comment;


use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\WorkflowTemplate\Content\Form\Comment\CommentForm;
use Nemundo\Workflow\App\WorkflowTemplate\Content\View\CommentWorkflowTemplateView;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\Comment;
use Nemundo\Workflow\App\WorkflowTemplate\Data\Comment\CommentReader;

class CommentTemplateStatus extends AbstractWorkflowStatus
{

    /**
     * @var string
     */
    public $comment;


    public $commentLabel = 'Kommentar';

    protected function loadType()
    {

        $this->contentLabel = 'Kommentar';
        $this->contentName = 'comment';
        $this->contentId = '9fc81c7a-1fe8-4b8d-aa52-5a9f60431330';
        $this->changeStatus = false;
        $this->showMenu = false;

        $this->formClass = CommentForm::class;
        $this->viewClass = CommentWorkflowTemplateView::class;

    }


    protected function loadData()
    {

        $commentRow = (new CommentReader())->getRowById($this->dataId);
        $this->comment = $commentRow->comment;

    }


    public function saveType()
    {

        $data = new Comment();
        $data->comment = $this->comment;
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function getSubject()
    {

        $this->loadData();


        // Kommentar von LAU


        $subject = 'Kommentar ' . $this->comment;  // $this->getSubject();
//von '.(new UserSessionType())->getLabel().(new Br())->getHtmlString().
        return $subject;

    }


    public function getJson()
    {

        $data = parent::getJson();

        $row = (new CommentReader())->getRowById($this->dataId);
        $data['comment'] = $row->comment;

        return $data;

    }

}