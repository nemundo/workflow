<?php

namespace Nemundo\Workflow\App\WorkflowTemplate\Content\Type\Comment;


use Nemundo\Core\Language\LanguageCode;
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

    /**
     * @var string
     */
    public $comment;


    public $commentLabel = 'Kommentar';

    protected function loadType()
    {

        //$this->contentLabel = 'Comment';
        $this->contentLabel = 'Kommentar';

        //$this->contentLabel[LanguageCode::EN] = 'Comment';
        //$this->contentLabel[LanguageCode::DE] = 'Kommentar';


        $this->contentName = 'comment';
        $this->contentId = '9fc81c7a-1fe8-4b8d-aa52-5a9f60431330';
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


    public function getJson()
    {

        $data = parent::getJson();

        $row = (new CommentReader())->getRowById($this->dataId);
        $data['comment'] = $row->comment;

        return $data;

    }

}