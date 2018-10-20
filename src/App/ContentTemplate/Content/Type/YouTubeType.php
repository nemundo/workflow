<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\App\Content\Type\Business\AbstractBusinessContentType;
use Nemundo\App\Content\Type\Sequence\SequenceContentTypeTrait;
use Nemundo\Com\Container\UserTrait;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\YouTubeTypeForm;
use Nemundo\Workflow\App\ContentTemplate\Content\View\YouTubeView;
use Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate\TextContentTemplate;
use Nemundo\Workflow\App\ContentTemplate\Data\TextContentTemplate\TextContentTemplateReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;
use Nemundo\Workflow\App\Workflow\Content\Type\WorkflowStatusTrait;

class YouTubeType extends AbstractWorkflowStatus   // AbstractTreeContentType  // AbstractBusinessContentType  // AbstractContentType
{

    //use WorkflowStatusTrait;
    //use UserTrait;
    //use SequenceContentTypeTrait;

    /**
     * @var string
     */
    public $youTubeUrl;

    protected function loadType()
    {

        $this->contentName = 'YouTube Video';
        $this->contentId = 'f4be09e9-e901-425e-86ca-fb4b639c067b';

        $this->formClass = YouTubeTypeForm::class;
        $this->viewClass = YouTubeView::class;

        $this->changeStatus = false;

    }


    protected function loadData()
    {

        $row = (new TextContentTemplateReader())->getRowById($this->dataId);
        $this->youTubeUrl = $row->text;

    }


    public function saveType()
    {
        // TODO: Implement saveType() method.


        $data = new TextContentTemplate();
        $data->text = $this->youTubeUrl;
        $this->dataId = $data->save();

        $this->saveContentLog();


    }


}