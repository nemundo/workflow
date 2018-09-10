<?php

namespace Nemundo\Workflow\App\Wiki\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapModelForm;
use Nemundo\Workflow\App\Inbox\Builder\InboxBuilder;
use Nemundo\Workflow\App\Wiki\Data\Wiki\Wiki;
use Nemundo\Workflow\App\Wiki\Redirect\WikiContentRedirect;
use Nemundo\App\Content\Type\AbstractContentType;
use Schleuniger\Usergroup\SchleunigerUsergroup;

class WikiForm extends BootstrapModelForm
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var string
     */
    public $pageId;


    public function getHtml()
    {

        $this->model = $this->contentType->getModel();

        return parent::getHtml();
    }


    protected function onSubmit()
    {

        $dataId = parent::onSubmit();

        $data = new Wiki();
        $data->pageId = $this->pageId;
        $data->contentTypeId = $this->contentType->objectId;
        $data->dataId = $dataId;
        $data->save();

        $this->contentType->onCreate($dataId);


        $builder = new InboxBuilder();
        $builder->contentType = $this->contentType;
        $builder->dataId = $dataId;
        $builder->subject = 'Neu: ';
        $builder->createUsergroupInbox(new SchleunigerUsergroup());


        return $dataId;

    }

}