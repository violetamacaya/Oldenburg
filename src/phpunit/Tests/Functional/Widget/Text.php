<?php

namespace Tests\Functional;

use PhpUnit\Helper\MinkTestCase;

class WidgetTextTest extends MinkTestCase
{
    /**
     * @group Sauce
     * @group Selenium
     */
    public function testTextWidget()
    {
        // install fresh copy of ImpressPages:
        $installation = new \PhpUnit\Helper\Installation(); //development version
        $installation->install();

        $session = $this->session();
        $page = $session->getPage();

        $adminHelper = new \PhpUnit\Helper\User\Admin($session, $installation);

        $adminHelper->login();

        //These four lines are redundand and has to be removed when installation will be fixed
        $session->wait(10000, "typeof $ !== 'undefined' && $('._disable .ipsContentPublish').length != 0");
        $duplicateRevisionLink = $page->find('css', '.ipsItemCurrent');
        $duplicateRevisionLink->click();
        $session->wait(10000, "typeof $ !== 'undefined' && $('.ipsContentPublish').length != 0");
        //TODO remove all existing widgets

        $adminHelper->addWidget('Text');
        $session->wait(10000, "typeof $ !== 'undefined' && $('#ipBlock-main .ipWidget-Text').length != 0");
        $page = $session->getPage();
        $textWidgets = $page->findAll('css', '#ipBlock-main .ipWidget-Text');

        //asset we have one and only one Text widget
        $this->assertEquals(1, count($textWidgets));



        //Text we are going to add to the text widget
        $testText = 'Sample text';

        $session->wait(10000, "typeof $ !== 'undefined' && $('.mce-container-body').is(':visible')"); //wait for widget to init
        $session->executeScript('tinyMCE.activeEditor.setContent(\'' . $testText . '\');');

        //change cur line to list. This is only way I've found to force widget save on selenium
        $listButton = $page->find('css', '.mce-container-body .mce-i-bullist');
        $listButton->click();

        //wait for widget reload
        $session->wait(10000, "typeof $ !== 'undefined' && $('.mce-container-body').is(':visible')"); //wait for widget to init

        //reload the page
        $session->reload();

        //wait for page to load
        $session->wait(10000, "typeof $ !== 'undefined' && $('#ipBlock-main .ipWidget-Text').length != 0");

        //asset we have one and only one Text widget
        $page = $session->getPage();
        $textWidgets = $page->findAll('css', '#ipBlock-main .ipWidget-Text');
        $this->assertEquals(1, count($textWidgets));

        //check if we have the same text that we have stored before
        $widgetText = $session->evaluateScript("return $('#ipBlock-main .ipWidget-Text .ipsContent ul li').text()");
        $this->assertEquals($testText, $widgetText);

        //REMOVE THE WIDGET
        $session->executeScript("$('#ipBlock-main .ipWidget-Text .ipsWidgetDelete').css('visibility', 'visible')");
        $deleteLink = $page->find('css', '#ipBlock-main .ipWidget-Text .ipsWidgetDelete');
        $deleteLink->click();

        //wait while widget disappears
        $session->wait(10000, "typeof $ !== 'undefined' && $('#ipBlock-main .ipWidget').length == 0");

        //refresh the page and check if widget has gone
        $session->reload();

        $session->wait(10000, "typeof $ !== 'undefined' && $('#ipBlock-main').length != 0");
        $exampleContent = $session->evaluateScript("return $('#ipBlock-main .ipbExampleContent').length");
        $this->assertEquals(1, $exampleContent);


    }


}
