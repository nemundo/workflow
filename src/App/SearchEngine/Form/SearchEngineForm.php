<?php

namespace Nemundo\Workflow\App\SearchEngine\Form;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapSubmitButton;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineJsonSite;

class SearchEngineForm extends SearchForm
{

    /**
     * @var BootstrapAutocompleteTextBox
     */
    private $query;


    protected function loadCom()
    {
        parent::loadCom();


        $row = new BootstrapFormRow($this);

        $this->query = new BootstrapAutocompleteTextBox($row);
        $this->query->sourceSite = SearchEngineJsonSite::$site;
        $this->query->minLength = 1;
        $this->query->name = 'q';
        $this->query->placeholder = 'Suche';
        $this->query->value = $this->query->getValue();

        $submit = new BootstrapSubmitButton($row);
        $submit->content = 'Suchen';

    }


    public function getHtml()
    {



        return parent::getHtml();

    }


    public function getKeyword()
    {

        $keyword = $this->query->getValue();
        return $keyword;

    }


}