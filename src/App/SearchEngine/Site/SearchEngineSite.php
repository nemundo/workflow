<?php

namespace Nemundo\Workflow\App\SearchEngine\Site;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Html\Block\Br;
use Nemundo\Html\Basic\Hr;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Html\Formatting\Small;
use Nemundo\Com\Html\Hyperlink\SiteHyperlink;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\SearchEngine\Form\SearchEngineForm;
use Nemundo\Workflow\App\SearchEngine\Parameter\QueryParameter;
use Nemundo\Workflow\App\SearchEngine\Reader\SearchEngineReader;

class SearchEngineSite extends AbstractSite
{

    /**
     * @var SearchEngineSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Suchmaschine';
        $this->url = 'app-suchmaschine';

        new SearchEngineJsonSite($this);

    }


    protected function registerSite()
    {
        SearchEngineSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $title = new AdminTitle($page);
        $title->content = $this->title;

        $form = new SearchEngineForm($page);



        $table = new AdminClickableTable($page);


        $reader = new SearchEngineReader();
        $reader->keyword = (new QueryParameter())->getValue();  // $form->getKeyword();
        foreach ($reader->getData() as $searchEngineItem) {


            $small = new Small($page);
            $small->content = $searchEngineItem->source;

            (new Br($page));

            $hyperlink = new SiteHyperlink($page);
            $hyperlink->site = $searchEngineItem->site;

$p = new Paragraph($page);
$p->content = $searchEngineItem->text;


            (new Hr($page));


            /*
            $row = new BootstrapClickableTableRow($table);
            $row->addSite($searchEngineItem->site);
            $row->addText($searchEngineItem->text);
            $row->addText($searchEngineItem->source);
            $row->addClickableSite($searchEngineItem->site);*/

        }

        $page->render();


    }

}