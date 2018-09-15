<?php

namespace Nemundo\Workflow\App\ContentTemplate\Content\Type;



use Nemundo\App\Content\Type\AbstractDataContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Workflow\App\ContentTemplate\Content\Form\LargeTextContentTemplateForm;
use Nemundo\Workflow\App\ContentTemplate\Content\Item\LargeTextContentView;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeText;
use Nemundo\Workflow\App\ContentTemplate\Data\LargeText\LargeTextModel;


// LargeTextContentTypeTemplate
class LargeTextTemplateContentType extends AbstractTreeContentType  // AbstractDataContentType
{

    /**
     * @var string
     */
    public $text;

    protected function loadData()
    {

        $this->contentName = 'Large Text (Template)';
        $this->contentId = '46e84be8-7173-41ff-8c7a-b7f91f33a0fb';
        //$this->modelClass = LargeTextModel::class;
        $this->formClass = LargeTextContentTemplateForm::class;
        $this->viewClass = LargeTextContentView::class;

    }


    public function saveType()
    {

        $data = new LargeText();
        $data->text = $this->text;
        $this->dataId = $data->save();

        $this->saveContentLog();

    }


    public function deleteType()
    {
        // TODO: Implement deleteItem() method.
    }


}