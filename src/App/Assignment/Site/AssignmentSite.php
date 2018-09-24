<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\App\Content\Type\AbstractContentType;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Db\Filter\Filter;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\Pagination\BootstrapModelPagination;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentTable;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationReader;
use Nemundo\Workflow\App\Assignment\Parameter\AssignmentParameter;
use Nemundo\Workflow\App\Identification\Config\IdentificationConfig;
use Schleuniger\App\Org\Com\MitarbeiterListBox;


class AssignmentSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Aufgaben (Zuweisung)';
        $this->url = 'assignment';


    }


    protected function registerSite()
    {
        AssignmentSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $title = new AdminTitle($page);
        $title->content = $this->title;


        /*
        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $mitarbeiterListBox = new MitarbeiterListBox($row);
        $mitarbeiterListBox->value = $mitarbeiterListBox->getValue();
        $mitarbeiterListBox->submitOnChange = true;*/


        //$table = new AssignmentTable($page);




        $assignmentReader = new AssignmentPaginationReader();
        $assignmentReader->paginationLimit = 30;
        $assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);


        $filter = new Filter();
        foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

            foreach ($identification->getUserIdList() as $value) {
                $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
            }

        }

        $assignmentReader->filter->andFilter($filter);
        
        /*
        if ($mitarbeiterListBox->getValue() !== null) {
            $filter = new Filter();
            foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                foreach ($identification->getUserIdList() as $value) {
                    $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
                }

            }

            $assignmentReader->filter->andFilter($filter);
        }*/



        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Quelle');  // 'Type');
        $header->addText('Betreff');
        $header->addText('Zuweisung');
        $header->addText('Archiviert');


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);


            $class = $assignmentRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
            $contentType = new $class($assignmentRow->dataId);

            //$contentType = $assignmentRow->contentType->getContentTypeClassObject();
            //$contentType->dataId = $assignmentRow->dataId;

            //$row->addText($assignmentRow->subject);
            $row->addText($contentType->contentName);
            $row->addText($contentType->getSubject());
            $row->addText($assignmentRow->assignment->getValue());

            $row->addYesNo($assignmentRow->archive);
            $row->addClickableSite($contentType->getItemSite());


            /*
            $site = AssignmentDeleteSite::$site;
            $site->addParameter(new AssignmentParameter($assignmentRow->id));
            $row->addIconSite($site);*/


        }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $assignmentReader;


        $page->render();


    }
}