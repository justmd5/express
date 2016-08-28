<?php
use JustMd5\Express\Express;

/**
 * Created for express.
 * File: NormalTest.php
 * User: ding21st@gmail.com
 * Date: 16/4/18
 * Time: 下午4:09
 */
class NormalTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return $this
     */
    public function testExpressNameJsonCheck()
    {
        $this->assertJson(Express::getExpressName(881443775034378914));

        return '881443775034378914';
    }

    /**
     * @depends testExpressNameJsonCheck
     */
    public function testExpressInfoJsonCheck($ExpressNumber)
    {
        $ExpressInfo = Express::getExpressInfo($ExpressNumber);
        $this->assertJson($ExpressInfo);

        return $ExpressInfo;
    }

    /**
     * @depends testExpressInfoJsonCheck
     */
    public function testHasInfoData($ExpressInfo)
    {
        $InfoJsonString = $ExpressInfo;
        $InfoJsonObject = json_decode($InfoJsonString);
        if (is_object($InfoJsonObject)) {
            $this->assertObjectHasAttribute('message', $InfoJsonObject, '对象中不包含message属性');
            $this->assertObjectHasAttribute('data', $InfoJsonObject, '对象中不包含data属性');
            $this->assertObjectHasAttribute('ischeck', $InfoJsonObject, '对象中不包含ischeck属性');
            $this->assertObjectHasAttribute('status', $InfoJsonObject, '对象中不包含status属性');
        }

        return $InfoJsonObject;
    }

    /**
     * @depends testHasInfoData
     *
     * @param $InfoJsonObject
     */
    public function testIsStatusOk($InfoJsonObject)
    {
        $this->assertEquals('200', $InfoJsonObject->status);

        return $InfoJsonObject;
    }

    /**
     * @depends  testIsStatusOk
     */
    public function testDataInfo($InfoJsonObject)
    {
        $InfoArray = json_decode(json_encode($InfoJsonObject), true);
        $this->assertArrayHasKey('data', $InfoArray, '数组中data信息不存在');
        $this->assertNotEmpty($InfoArray['data'], '快递信息为空');

    }

}