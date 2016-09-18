<?php

namespace Plugin\SlideShow;


class AdminController
{

    /**
     * GridWidget.js ask to provide widget management popup HTML. This controller does this.
     * @return \Ip\Response\Json
     * @throws \Ip\Exception\View
     */
    public function widgetPopupHtml()
    {
        $versionParts = explode('.', \Ip\Application::getVersion());
        if (empty($versionParts[2]) || $versionParts[0] < 4 || $versionParts[0] == 4 && $versionParts[1] < 2 ||  $versionParts[0] == 4 && $versionParts[1] = 2 && $versionParts[2] < 1) {
            return new \Ip\Response('This widget can be used on ImpressPages 4.2.1 or later.');
        }

        $widgetId = ipRequest()->getQuery('widgetId');
        $widgetRecord = \Ip\Internal\Content\Model::getWidgetRecord($widgetId);
        $widgetData = $widgetRecord['data'];

        //create form prepopulated with current widget data
        $form = $this->managementForm($widgetData);

        $plugin = ipRoute()->plugin();

        //Render form and popup HTML
       $viewData = array(
            'gridUrl' => ipActionUrl(array('aa' => $plugin . '.grid', 'disableAdminNavbar' => 1, 'widgetId' => $widgetId))
        );
        $popupHtml = ipView('view/editPopup.php', $viewData)->render();
        $data = array(
            'popup' => $popupHtml
        );
        //Return rendered widget management popup HTML in JSON format
        return new \Ip\Response\Json($data);
    }


    /**
     * Check widget's posted data and return data to be stored or errors to be displayed
     */
    public function grid()
    {


        $widgetId = ipRequest()->getQuery('widgetId');

        ipAddCss('assets/gridManagement.css');
        $config = Config::grid();


        if (!empty($widgetId)) {
            $config['filter'] = ' `widgetId` = ' . (int) $widgetId;
            $config['gatewayData'] = array('widgetId' => $widgetId);
        }
        return ipGridController($config);

    }

    protected function managementForm($widgetData = array())
    {
        $form = new \Ip\Form();

        $form->setEnvironment(\Ip\Form::ENVIRONMENT_ADMIN);

        //setting hidden input field so that this form would be submitted to 'errorCheck' method of this controller. (http://www.impresspages.org/docs/controller)
        $field = new \Ip\Form\Field\Hidden(
            array(
                'name' => 'aa',
                'value' => 'GridWidget.checkForm'
            )
        );
        $form->addField($field);

        //Input fields to adjust widget settings

        $field = new \Ip\Form\Field\Text(
            array(
                'name' => 'title',
                'label' => 'Título',
                'value' => empty($widgetData['title']) ? null : $widgetData['title']
            )
        );
        $field->addValidator('Required');
        $form->addField($field);

        $field = new \Ip\Form\Field\RichText(
            array(
                'name' => 'text',
                'label' => 'Texto',
                'value' => empty($widgetData['text']) ? null : $widgetData['text']
            )
        );
        $form->addField($field);
		

		
		$field = new \Ip\Form\Field\RepositoryFile(
            array(
                'name' => 'image',
                'label' => 'Imagen',
                'value' => empty($widgetData['image']) ? null : $widgetData['image'],
            )
        );
        $form->addField($field);
		
		$field = new \Ip\Form\Field\Checkbox(
            array(
                'name' => 'isVisible',
                'label' => 'Visible',
                'checked' => 1,
				'defaultValue' => 1 
            )
        );
        $form->addField($field);
        //ADD YOUR OWN FIELDS

		
        return $form;
    }



}
