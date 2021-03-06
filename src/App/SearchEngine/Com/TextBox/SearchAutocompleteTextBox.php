<?php

namespace Nemundo\Workflow\App\SearchEngine\Com\TextBox;


use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteTextBox;
use Nemundo\Workflow\App\SearchEngine\Parameter\QueryParameter;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineJsonSite;

class SearchAutocompleteTextBox extends BootstrapAutocompleteTextBox
{

    protected function loadContainer()
    {

        parent::loadContainer();


        $this->sourceSite = SearchEngineJsonSite::$site;
        $this->minLength = 1;
        $this->name = (new QueryParameter())->getParameterName();
        $this->placeholder = 'Suche';
        //$this->value = $this->getValue();*/

    }



    public function getContent()
    {

        $this->value = $this->getValue();

        //$this->name = (new QueryParameter())->getParameterName();
        return parent::getContent();
    }

}