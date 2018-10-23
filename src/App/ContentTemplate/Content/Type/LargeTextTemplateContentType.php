<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;


use Nemundo\App\Content\Type\AbstractModelDataTreeContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\Type\Text\Html;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\LargeTextContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\LargeTextContentView;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeText;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextModel;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate\LargeTextContentTemplate;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeTextContentTemplate\LargeTextContentTemplateReader;
use Nemundo\Workflow\App\Workflow\Content\Type\AbstractWorkflowStatus;


// LargeTextContentTypeTemplate
class LargeTextTemplateContentType extends AbstractWorkflowStatus  // AbstractTreeContentType  // AbstractDataContentType
{

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $largeTextLabel = 'TExt';

    protected function loadType()
    {

        $this->contentLabel = 'Large Text (Template)';
        $this->contentId = '46e84be8-7173-41ff-8c7a-b7f91f33a0fb';
        //$this->modelClass = LargeTextModel::class;
        $this->formClass = LargeTextContentTemplateForm::class;
        $this->viewClass = LargeTextContentView::class;

    }


    protected function loadData()
    {

        $row = (new LargeTextContentTemplateReader())->getRowById($this->dataId);
        $this->text = (new Html($row->text))->getValue();

    }


    public function saveType()
    {

        $data = new LargeTextContentTemplate();  // LargeText();
        $data->text = $this->text;
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function deleteType()
    {
        // TODO: Implement deleteItem() method.
    }


}