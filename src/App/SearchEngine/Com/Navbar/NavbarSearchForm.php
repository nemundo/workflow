<?php

namespace Nemundo\Workflow\App\SearchEngine\Com\Navbar;


use Nemundo\Com\Container\AbstractHtmlContainerList;
use Nemundo\Com\Html\Form\Form\SiteForm;
use Nemundo\Com\Html\Form\Button\SubmitButton;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Com\TextBox\SearchAutocompleteTextBox;
use Nemundo\Workflow\App\SearchEngine\Parameter\QueryParameter;
use Nemundo\Workflow\App\SearchEngine\Site\SearchEngineSite;

class NavbarSearchForm extends AbstractHtmlContainerList
{

    /**
     * @var AbstractSite
     */
    public $searchSite;

    public function getHtml()
    {

        $form = new SiteForm($this);
        $form->redirectSite = SearchEngineSite::$site;

        $form->addCssClass('form-inline');

        $input = new SearchAutocompleteTextBox($form);
        $input->name = (new QueryParameter())->getParameterName();
        $input->addCssClass('mr-sm-2');

        $submit = new SubmitButton($form);
        $submit->content = 'Search';
        $submit->addCssClass('btn my-2 my-sm-0');

        //$this->addHtml('<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">');
        //$this->addHtml('<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>');

        return parent::getHtml();
    }


    /*
<form class="form-inline">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
    */

}