<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Com\Form\AssignmentSearchForm;


class AssignmentSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Aufgaben';
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


        $searchForm = new AssignmentSearchForm($page);

        $table = new \Nemundo\Workflow\App\Assignment\Com\Table\AssignmentTable($page);
        $table->filter = $searchForm->getFilter();



        /*
        $searchForm = new SearchForm($page);

        $row = new BootstrapFormRow($searchForm);

        $mitarbeiterListBox = new MitarbeiterListBox($row);
        $mitarbeiterListBox->value = $mitarbeiterListBox->getValue();
        $mitarbeiterListBox->submitOnChange = true;*/


        //$table = new AssignmentTable($page);

/*
        $assignmentReader = new AssignmentPaginationReader();
        $assignmentReader->paginationLimit = 30;
        $assignmentReader->filter = $searchForm->getFilter();
        $assignmentReader->addOrder($assignmentReader->model->archive);
        $assignmentReader->addOrder($assignmentReader->model->id, SortOrder::DESCENDING);


        //(new UsergroupIdentificationType())


        /*
                $filter = new Filter();
                foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                    foreach ($identification->getUserIdList() as $value) {
                        $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
                    }

                }

                $assignmentReader->filter->andFilter($filter);
        */

/*
        $userId = $mitarbeiterListBox->getValue();
        if ($userId !== '') {
            $filter = new Filter();
            foreach ((new IdentificationConfig())->getIdentificationList() as $identification) {

                foreach ($identification->getIdentificationIdFromUserId($userId) as $value) {
                    $filter->orEqual($assignmentReader->model->assignment->identificationId, $value);
                }

            }

            $assignmentReader->filter->andFilter($filter);
        }*/

/*
        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Quelle');  // 'Type');
        $header->addText('Betreff');
        $header->addText('Zuweisung');
        $header->addText('Erledigen bis');
        $header->addText('Ersteller');
        $header->addText('Archiviert');


        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);


            $class = $assignmentRow->contentType->contentTypeClass;

            /** @var AbstractContentType $contentType */
  /*          $contentType = new $class($assignmentRow->dataId);

            //$contentType = $assignmentRow->contentType->getContentTypeClassObject();
            //$contentType->dataId = $assignmentRow->dataId;

            //$row->addText($assignmentRow->subject);
            $row->addText($contentType->contentName);
            $row->addText($contentType->getSubject());
            $row->addText($assignmentRow->assignment->getValue());

            if ($assignmentRow->deadline !== null) {
                $row->addText($assignmentRow->deadline->getShortDateLeadingZeroFormat());
            } else {
                $row->addEmpty();
            }


            $row->addText($assignmentRow->userCreated->displayName.' '.$assignmentRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $row->addYesNo($assignmentRow->archive);
            $row->addClickableSite($contentType->getItemSite());


            /*
            $site = AssignmentDeleteSite::$site;
            $site->addParameter(new AssignmentParameter($assignmentRow->id));
            $row->addIconSite($site);*/


    /*    }

        $pagination = new BootstrapModelPagination($page);
        $pagination->paginationReader = $assignmentReader;*/


        $page->render();


    }
}