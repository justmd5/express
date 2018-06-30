<?php
/**
 * Created for Express
 * File: Express.php
 * User: ding21st@gmail.com
 * Date: 16/4/15
 * Time: 下午4:39.
 */
/**
 * 查询快递接口
 * Class Express.
 */

namespace JustMd5\Express;

use Soyhuce\Zttp\Zttp;

class Express
{
    /**
     *快递查询接口常量.
     */
    const   KUAIDI100 = 'http://www.kuaidi100.com';

    /**返回快递信息
     *
     * @param string $ExpressNumber 快递单号
     *
     * @return array|false 快递信息json数据
     */
    public static function getExpressInfo ($ExpressNumber)
    {
        $ExpressNames = static::getExpressName($ExpressNumber);

        //未查看到快递信息返回false
        if (empty($ExpressNames) || !isset($ExpressNames[0]['comCode'])) {
            return false;
        }
        $response = Zttp::asFormParams()->get(static::KUAIDI100 . '/query', [
            'type'   => $ExpressNames[0]['comCode'],
            'postid' => $ExpressNumber,
        ]);

        return $response->json();
    }

    /**获得快递公司名字
     *
     * @param string $ExpressNumber 订单号
     *
     * @return array 返回订单快递公司名称json数据
     */
    public static function getExpressName ($ExpressNumber)
    {
        $response = Zttp::asFormParams()->get(static::KUAIDI100 . '/autonumber/auto', ['num' => $ExpressNumber]);

        return $response->json();
    }
}
