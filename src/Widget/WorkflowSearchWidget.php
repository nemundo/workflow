<?php

namespace Nemundo\Workflow\Widget;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Design\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox;
use Nemundo\Design\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTable;
use Nemundo\Design\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\SearchEngine\Data\SearchIndex\SearchIndexReader;
use Nemundo\Workflow\Site\Json\SearchEngineJsonSite;
use Nemundo\Admin\Com\Widget\AbstractAdminWidget;

class WorkflowSearchWidget extends AbstractAdminWidget
{

    public function getHtml()
    {

        $this->widgetTitle = 'Suchmaschine';

        $form = new SearchForm($this);

        $query = new BootstrapAutocompleteTextBox($form);
        $query->sourceSite = SearchEngineJsonSite::$site;
        $query->minLength = 1;
        $query->name = 'q';
        $query->placeholder = 'Suche';
        $query->value = $query->getValue();

        /*$searchTypeListBox = new ApplicationTypeListBox($form);
        $searchTypeListBox->label = 'Application';
        $searchTypeListBox->value = $searchTypeListBox->getValue();*/

        $submit = new BootstrapSubmitButton($form);
        $submit->content = 'Suchen';

        if ($query->getValue() !== '') {

            $indexReader = new SearchIndexReader();
            $indexReader->model->loadWord();
            $indexReader->model->workflow->loadProcess();

            //$indexReader->model->loadApplicationType();
            //$indexReader->model->loadSearchText();
            $indexReader->filter->andEqual($indexReader->model->word->word, $query->getValue());

            /*if ($searchTypeListBox->getValue() !== '') {
                $indexReader->filter->andEqual($indexReader->model->applicationTypeId, $searchTypeListBox->getValue());
            }*/


            $table = new AdminClickableTable($this);

            $header = new TableHeader($table);
            //$header->addText('App');
            $header->addText('Nr.');
            $header->addText('Betreff');

            foreach ($indexReader->getData() as $indexRow) {

                $row = new BootstrapClickableTableRow($table);
                $row->addText($indexRow->workflow->workflowNumber);
                $row->addText($indexRow->workflow->subject);

                $process = $indexRow->workflow->process->getProcessClassObject();
                $site = $process->getApplicationSite($indexRow->workflowId);
                $row->addClickableSite($site);

                /*$row->addText($indexRow->applicationType->applicationType);
                $row->addText($indexRow->searchText->workflowNumber);
                $row->addText($indexRow->searchText->text);

                $type = $indexRow->applicationType->getApplicationTypeClassNameObject();

                $site = $type->getApplicationSite($indexRow->dataId);
                $row->addClickableSite($site);*/
                
                //$site->title = $indexRow->searchText->text;
                //$row->addSite($site);

            }

        }

        return parent::getHtml();

    }

}