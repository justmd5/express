<h1 align="center">快递100  SDK</h1>

<p align="center">kuaidi100 sdk</p>

<p align="center">
<a href="https://styleci.io/repos/23494261"><img src="https://styleci.io/repos/23494261/shield?branch=master" alt="styleci"></a>
<a href="https://packagist.org/packages/justmd5/Express"><img src="https://img.shields.io/packagist/php-v/justmd5/Express.svg" alt="PHP from Packagist"></a>
<a href="https://packagist.org/packages/justmd5/Express"><img src="https://poser.pugx.org/justmd5/Express/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/justmd5/Express"><img src="https://img.shields.io/github/stars/justmd5/Express.svg?style=social&label=Stars" alt="GitHub stars"></a>
<a href="https://packagist.org/packages/justmd5/Express"><img src="https://poser.pugx.org/justmd5/Express/v/unstable.svg" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/justmd5/Express"><img src="https://img.shields.io/github/license/justmd5/Express.svg" alt="License"></a>
</p>

=======

*基于快递100的快递接口封装*


#### 使用:
```shell
composer require justmd5\express:dev_master
```
```php
<?php
use JustMd5\Express\Express;

require 'vendor/autoload.php';
echo var_export(Express::getExpressInfo(881443775034378914), true), PHP_EOL;

```
> 本sdk 仅供参考，如果商用请使用官方取到申请的api.
