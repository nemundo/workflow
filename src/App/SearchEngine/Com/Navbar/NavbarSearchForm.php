<?php

namespace Nemundo\Workflow\App\SearchEngine\Com\Navbar;


use Nemundo\App\Search\Parameter\SearchQueryParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteMultipleValueTextBox;
use Nemundo\Process\Search\Site\Json\SearchJsonSite;
use Nemundo\Process\Search\Site\SearchSite;
use Nemundo\Web\Site\AbstractSite;

class NavbarSearchForm extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $searchSite;

    public function getContent()
    {

        $form = new SearchForm($this);
        $form->site = SearchSite::$site;

        $form->addCssClass('form-inline');

        $query = new BootstrapAutocompleteMultipleValueTextBox($form);
        $query->name = (new \Nemundo\Process\Search\Parameter\SearchQueryParameter())->getParameterName();  // (new SearchQueryParameter())->parameterName;
        $query->seperator = ' ';
        $query->searchMode = true;
        $query->placeholder[LanguageCode::EN] = 'Search';
        $query->placeholder[LanguageCode::DE] = 'Suche';
        $query->label = HtmlCharacter::NON_BREAKING_SPACE;
        $query->sourceSite =SearchJsonSite::$site;


        /*$input = new SearchAutocompleteTextBox($form);
        $input->name = (new QueryParameter())->getParameterName();
        $input->addCssClass('mr-sm-2');*/

        $submit = new SubmitButton($form);
        $submit->label = 'Suchen';
        //$submit->label[LanguageCode::EN] = 'Search';
        //$submit->label[LanguageCode::DE] = 'Suchen';
        $submit->addCssClass('btn btn-secondary my-2 my-sm-0');

        return parent::getContent();

    }

}