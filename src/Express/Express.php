<?php
/**
 * Created for Express
 * File: Express.php
 * User: ding21st@gmail.com
 * Date: 16/4/15
 * Time: 下午4:39
 */
/**
 * 查询快递接口
 * Class Express
 */
namespace  JustMd5\Express;
use JustMd5\SimpleHttp\Http;

class Express
{
    /**
     *快递查询接口常量
     */
    const   KUAIDI100 = 'http://www.kuaidi100.com';

    /**返回快递信息
     *
     * @param string $ExpressNumber 快递单号
     *
     * @return bool|string 快递信息json数据
     */
    public static function getExpressInfo($ExpressNumber)
    {
        $keywords     = self::getExpressName($ExpressNumber);
        $ExpressNames = json_decode($keywords, true);
        //未查看到快递信息返回false
        if (empty($ExpressNames) || !isset($ExpressNames[0]['comCode'])) return false;

        //返回查询的信息
        return Http::request('GET', self::KUAIDI100 . '/query', [
            'type'   => $ExpressNames[0]['comCode'],
            'postid' => $ExpressNumber
        ]);

    }

    /**获得快递公司名字
     *
     * @param string $ExpressNumber 订单号
     *
     * @return string 返回订单快递公司名称json数据
     */
    public static function getExpressName($ExpressNumber)
    {
        return Http::request('GET', self::KUAIDI100 . '/autonumber/auto', ['num' => $ExpressNumber]);
    }
}

?>
