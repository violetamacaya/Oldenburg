<?php

namespace Plugin\Noticias;

class AdminController extends \Ip\GridController
{
    protected function config(){

        return array(
            'title' => 'Noticias',
            'table' => 'noticias',
            'deleteWarning' => '¿Estás seguro?',
            'sortField' => 'row_number',
            'createPosition' => 'top',
            'pageSize' => 100,
            'fields' => array(

                array(
                    'label' => 'Imagen',
                    'field' => 'image',
                    'type' => 'RepositoryFile',
                    'showInList' => true,
                    'preview' => function($fieldValue, $dbRecord){
                        if($dbRecord['image'] != '')
                            return '<img style="width: 50px;" src="/file/repository/' . $dbRecord['image'] . '"/>';
                        else
                            return '';
                    }
                ),

                array(
                    'label' => 'Título',
                    'field' => 'title',
                ),
                array(
                    'label' => 'Entradilla',
                    'field' => 'abstract',
                ),
                array(
                    'label' => 'Texto completo',
                    'field' => 'text',
                ),
                array(
                    'label' => 'Fecha',
                    'field' => 'date',
                ),
                array(
                    'label' => 'Enlace original',
                    'field' => 'link',
                ),
            )
        );
    }
}