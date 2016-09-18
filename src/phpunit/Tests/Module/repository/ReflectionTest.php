<?php
/**
 * @package   ImpressPages
 *
 *
 */

class ReflectionTest extends \PhpUnit\GeneralTestCase
{

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createXMLDataSet(TEST_FIXTURE_DIR.'Repository/reflection.xml');
    }

    public function testCreateRemoveReflection()
    {

        $repository = \Ip\Internal\Repository\Model::instance();

        $repositoryFile = 'impresspages.png';
        $file = 'file/repository/' . $repositoryFile;

        copy(TEST_FIXTURE_DIR.'Repository/impresspages.png', ipFile($file));

        //Bind file to module (twice)
        $repository->bindFile($repositoryFile, 'modulexxx', 1);
        $repository->bindFile($repositoryFile, 'modulexxx', 1);


        //Create reflection
        $transformSmall = array(
            'type' => 'crop',
            'x1' => 11,
            'y1' => 12,
            'x2' => 23,
            'y2' => 24,
            'width' => 15,
            'height' => 16
        );//nearly random coordinates
        $reflectionFile = ipReflection($repositoryFile, $transformSmall, null);
        if ($reflectionFile == 'file/') {
            $e = ipReflectionException();
            $data = $e->getData();
            $this->fail($e->getMessage() . ' at ' . basename($e->getFile()) . ':' . $e->getLine() . ' | ini_set result: ' . $data['ini_set_result']);
        }

        $reflectionAbsolutePath = ipFile($reflectionFile);
        $this->assertEquals('file/' . date('Y/m/d/') . $repositoryFile, $reflectionFile);

        $this->assertFalse(file_exists($reflectionAbsolutePath));

        $reflectionFile = ipReflection($repositoryFile, $transformSmall, null, false);

        $this->assertTrue(file_exists($reflectionAbsolutePath));


        //Unbind file from repository (once)
        $repository->unbindFile($repositoryFile, 'modulexxx', 1);

        //check if reflection still exists
        $this->assertTrue(file_exists($reflectionAbsolutePath), 'Reflection should still exist.');

        //unbind next file instance
        $repository->unbindFile($repositoryFile, 'modulexxx', 1);

        //Check if reflection has been removed
        $this->assertFalse(file_exists($reflectionAbsolutePath), 'Reflection has not been removed.');


    }




}
