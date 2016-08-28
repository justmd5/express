Express

[![Build Status](https://travis-ci.org/justmd5/Express.svg?branch=master)](https://travis-ci.org/justmd5/Express)

=======
*基于快递100的快递接口封装*
#快速简单查询快递信息
使用:
```shell
composer require justmd5\express:dev_master
```
```php
<?php
use JustMd5\Express\Express;

require 'vendor/autoload.php';
echo var_export(Express::getExpressInfo(881443775034378914), true), PHP_EOL;

```
单元测试用法:
```shell
phpunit --configuration phpunit.xml or phpunit --bootstrap phpunit.php
```
*如果测试结果为:OK (5 tests, 9 assertions),则没有问题,若为:FAILURES! Tests: 1, Assertions: 0, Errors: 1, Skipped: 4.则请更换一个最近的快递单号再测试
*
