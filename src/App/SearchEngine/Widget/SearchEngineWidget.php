<?php

namespace Nemundo\Workflow\App\SearchEngine\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Core\Text\Keyword;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexReader;
use Nemundo\Workflow\App\SearchEngine\Form\SearchEngineForm;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineJsonSite;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;

class SearchEngineWidget extends AbstractAdminWidget
{

    protected function loadWidget()
    {
        $this->widgetTitle = 'Suchmaschine';
        $this->widgetId = '';
        $this->widgetSite = SearchEngineSite::$site;

    }


    public function getHtml()
    {

        $this->widgetTitle = 'Suchmaschine';


       $form= new SearchEngineForm($this);

       /* $form = new SearchForm($this);

        $query = new BootstrapAutocompleteTextBox($form);
        $query->sourceSite = SearchEngineJsonSite::$site;
        $query->minLength = 1;
        $query->name = 'q';
        $query->placeholder = 'Suche';
        $query->value = $query->getValue();*/

        /*$searchTypeListBox = new ApplicationTypeListBox($form);
        $searchTypeListBox->label = 'Application';
        $searchTypeListBox->value = $searchTypeListBox->getValue();*/

        //$submit = new BootstrapSubmitButton($form);
        //$submit->content = 'Suchen';


        $keyword =$form->getKeyword();  // $query->getValue();

        if ($keyword !== '') {


            $indexReader = new SearchIndexReader();
            $indexReader->model->loadWord();
            $indexReader->model->loadContentType();
            $indexReader->model->loadResult();

            //$indexReader->model->loadApplicationType();
            //$indexReader->model->loadSearchText();
            $indexReader->filter->andEqual($indexReader->model->word->word, $keyword);

            /*if ($searchTypeListBox->getValue() !== '') {
                $indexReader->filter->andEqual($indexReader->model->applicationTypeId, $searchTypeListBox->getValue());
            }*/


            $table = new AdminClickableTable($this);

            foreach ($indexReader->getData() as $indexRow) {

                $row = new BootstrapClickableTableRow($table);
                //$row->addText($indexRow->workflow->workflowNumber);
                //$row->addText($indexRow->workflow->subject);


                //$text = new Text($indexRow->result->title);

                $title = $indexRow->result->title;
                $title = preg_replace('/(' . $keyword . ')/i', '<b>$1</b>', $title);
                $row->addText($title);

                $contentType = $indexRow->contentType->getContentTypeClassObject();
                $site = $contentType->getItemSite($indexRow->result->dataId);
                $row->addClickableSite($site);

            }

        }

        return parent::getHtml();

    }

}