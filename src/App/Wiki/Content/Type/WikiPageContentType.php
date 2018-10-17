<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\App\Content\Type\AbstractTreeContentType;
use Nemundo\Core\File\TextFile;
use Nemundo\Project\ProjectConfig;
use Nemundo\Workflow\App\Notification\Builder\NotificationBuilder;
use Nemundo\Workflow\App\Wiki\Content\Form\WikiPageContentForm;
use Nemundo\Workflow\App\Wiki\Content\Form\WikiPageContentFormUpdate;
use Nemundo\Workflow\App\Wiki\Content\View\WikiPageView;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageUpdate;
use Nemundo\Workflow\App\Wiki\Parameter\WikiPageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;
use Schleuniger\Usergroup\SchleunigerUsergroup;


class WikiPageContentType extends AbstractTreeContentType
{

    /**
     * @var string
     */
    public $title;


    protected function loadData()
    {
        $this->contentName = 'Wiki Page';
        $this->contentId = 'd6a20e68-3463-491f-a76c-bd8a8df1f57e';

        $this->formClass = WikiPageContentForm::class;
        //$this->formUpdateClass = WikiPageContentForm::class;  // WikiPageContentFormUpdate::class;
        $this->viewClass = WikiPageView::class;
        $this->viewSite = WikiPageSite::$site;
        $this->parameterClass = WikiPageParameter::class;

    }


    public function saveType()
    {


        if ($this->dataId!== null) {

        $data = new WikiPage();
        $data->title = $this->title;
        $this->dataId = $data->save();

        $this->saveContentLog();

        } else {

            $update = new WikiPageUpdate();
            $update->title = $this->title;
            $this->dataId = $update->updateById($this->dataId);


        }


        return $this->dataId;

    }


    public function onChildAddEvent(AbstractTreeContentType $contentType)
    {

        $update = new WikiPageUpdate();
        $update->count = $this->getChildCount();
        $update->updateById($this->dataId);


        $builder = new NotificationBuilder();
        $builder->contentType = $this;
        $builder->dataId = $this->dataId;
        $builder->subject = $this->getSubject();
        $builder->message = 'Neuer Eintrag: ' . $contentType->getSubject();
        $builder->createUsergroupNotification(new SchleunigerUsergroup());


    }


    public function getSubject()
    {

        $row = (new WikiPageReader())->getRowById($this->dataId);
        return $row->title;

    }

}