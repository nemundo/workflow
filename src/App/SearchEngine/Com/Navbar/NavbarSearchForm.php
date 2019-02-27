<?php

namespace Nemundo\Workflow\App\SearchEngine\Com\Navbar;


use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Com\TextBox\SearchAutocompleteTextBox;
use Nemundo\Workflow\App\SearchEngine\Parameter\QueryParameter;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;

class NavbarSearchForm extends AbstractHtmlContainer
{

    /**
     * @var AbstractSite
     */
    public $searchSite;

    public function getHtml()
    {

        $form = new SearchForm($this);  // new SiteForm($this);
        $form->site = SearchEngineSite::$site;

        $form->addCssClass('form-inline');

        $input = new SearchAutocompleteTextBox($form);
        $input->name = (new QueryParameter())->getParameterName();
        $input->addCssClass('mr-sm-2');

        $submit = new SubmitButton($form);
        $submit->label[LanguageCode::EN] = 'Search';
        $submit->label[LanguageCode::DE] = 'Suchen';

        $submit->addCssClass('btn my-2 my-sm-0');

        return parent::getHtml();

    }

}