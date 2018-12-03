<?php

namespace Nemundo\Workflow\App\SearchEngine\Form;


use Nemundo\Admin\Com\Button\AdminSubmitButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Workflow\App\SearchEngine\Com\TextBox\SearchAutocompleteTextBox;
use Nemundo\Workflow\App\SearchEngine\Parameter\QueryParameter;

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

        $this->query = new SearchAutocompleteTextBox($row);
        $this->query->name = (new QueryParameter())->getParameterName();


        /*
        $this->query = new BootstrapAutocompleteTextBox($row);
        $this->query->sourceSite = SearchEngineJsonSite::$site;
        $this->query->minLength = 1;
        $this->query->name = (new QueryParameter())->getParameterName();
        $this->query->placeholder = 'Suche';
        $this->query->value = $this->query->getValue();*/

        //$row = new BootstrapFormRow($this);
        $submit = new AdminSubmitButton($row);
        $submit->content = 'Suchen';

    }


    public function getKeyword()
    {

        $keyword = $this->query->getValue();
        return $keyword;

    }


}