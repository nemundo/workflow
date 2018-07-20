<?php

namespace Nemundo\Workflow\App\Wiki\Content\Type;


use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Core\File\TextFile;
use Nemundo\Project\ProjectConfig;
use Nemundo\Workflow\App\Wiki\Content\Form\WikiPageContentForm;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageModel;
use Nemundo\Workflow\App\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Workflow\App\Wiki\Parameter\PageParameter;
use Nemundo\Workflow\App\Wiki\Site\WikiPageSite;

class WikiPageContentType extends AbstractWikiContentType  // AbstractContentType
{

    protected function loadData()
    {
        $this->name = 'Wiki Page';
        $this->id = 'd6a20e68-3463-491f-a76c-bd8a8df1f57e';
        $this->modelClass = WikiPageModel::class;

        $this->formClass = WikiPageContentForm::class;

        $this->itemSite = WikiPageSite::$site;
        $this->parameterClass = PageParameter::class;
    }


    public function onCreate($dataId)
    {

        $row = (new WikiPageReader())->getRowById($dataId);

        $file = new TextFile();
        $file->overwriteExistingFile = true;
        $file->filename = ProjectConfig::$tmpPath . $row->title . '.txt';
        $file->saveFile();

    }


}