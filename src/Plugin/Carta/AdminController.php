<?php

namespace Plugin\Carta;

class AdminController extends \Ip\GridController
{
    protected function config(){

        return array(
            'title' => 'Carta',
            'table' => 'carta',
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
                    'label' => 'PDF',
                    'field' => 'link',
                    'type' => 'RepositoryFile'
                ),
                array(
                    'label' => 'visible',
                    'field' => 'visible',
                    'type' => 'checkbox',
                    'default'=>'checked'
                )
            )
        );
    }
}