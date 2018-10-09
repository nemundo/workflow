<?php

namespace Nemundo\Workflow\App\Assignment\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentPaginationReader;
use Nemundo\Workflow\App\Assignment\Data\Assignment\AssignmentTable;
use Nemundo\Workflow\App\Assignment\Parameter\AssignmentParameter;

class AssignmentAdminSite extends AbstractSite
{

    /**
     * @var AssignmentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Assignment Admin';
        $this->url = 'assignment-admin';

        (new AssignmentDeleteSite($this));

    }


    protected function registerSite()
    {
        AssignmentAdminSite::$site = $this;
    }


    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        //$table = new AssignmentTable($page);


        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Subject');


        $assignmentReader = new AssignmentPaginationReader();

        foreach ($assignmentReader->getData() as $assignmentRow) {

            $row = new BootstrapClickableTableRow($table);

            $contentType = $assignmentRow->contentType->getContentTypeClassObject();
            $contentType->dataId = $assignmentRow->dataId;

            $row->addText($assignmentRow->subject);
            //$row->addText($contentType->getSubject());

            $site = AssignmentDeleteSite::$site;
            $site->addParameter(new AssignmentParameter($assignmentRow->id));
            $row->addIconSite($site);


        }


        $page->render();


    }
}