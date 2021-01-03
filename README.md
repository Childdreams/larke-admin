## larke-admin 后台快速开发框架


### 项目介绍

*  `larke-admin` 是基于 `laravel8` 版本的后台快速开发框架，完全api接口化，适用于前后端分离的项目
*  基于 `JWT` 的用户登录态管理
*  权限判断基于 `php-casbin` 的 `RBAC` 授权
*  本项目为 `后台api服务`，`后台前端页面` 可查看 [Larke Admin Frontend](https://github.com/deatil/larke-admin-frontend) 项目


### 环境要求

 - PHP >= 7.3.0
 - Laravel >= 8.0.0
 - Fileinfo PHP Extension


### 截图预览

![login](https://user-images.githubusercontent.com/24578855/103483910-8cec8780-4e25-11eb-93c5-ea7ce7a09b60.png)

![index](https://user-images.githubusercontent.com/24578855/103433805-aed1e880-4c32-11eb-8d5b-50638bfc13b5.png)

![admin](https://user-images.githubusercontent.com/24578855/101988564-6bd8c100-3cd5-11eb-8524-21151ba3b404.png)

![admin-access](https://user-images.githubusercontent.com/24578855/103433753-db393500-4c31-11eb-8d8a-b40dfa0db84e.png)

![attach](https://user-images.githubusercontent.com/24578855/101988566-6da28480-3cd5-11eb-9532-69d88b2f598d.png)

![config](https://user-images.githubusercontent.com/24578855/101988567-6e3b1b00-3cd5-11eb-8799-66e8ebec6020.png)

![menus](https://user-images.githubusercontent.com/24578855/101988573-71cea200-3cd5-11eb-8e8b-e80ab319b216.png)

![rule2](https://user-images.githubusercontent.com/24578855/102609155-f9992e00-4165-11eb-93ad-82275af134ab.png)

更多截图 
[Larke Admin 后台截图](https://github.com/deatil/larke-admin/issues/1)


### 安装步骤

1. 首先安装 `laravel 8.*`，并确认连接数据库的配置没有问题，开始执行以下命令

```php
composer require lake/larke-admin
```

2. 然后运行下面的命令，推送配置文件

```php
php artisan vendor:publish --tag=larke-admin-config
```

运行完命令后，你可以找到 `config/larkeadmin.php`、`config/larkeauth.php` 及 `config/larkeauth-rbac-model.conf` 三个配置文件

3. 最后运行下面的命令安装完成系统

```php
php artisan larke-admin:install
```

4. 你可能第一次安装需要运行以下命令导入路由权限规则

```php
php artisan larke-admin:import-route
```

5. 如果遇到跨域问题，你可以修改官方的配置文件 `config/cors.php`，在 `paths` 列表增加系统接口前缀 `admin-api/*`

6. 如果官方没有配置，你也可以在 `App\Http\Kernel->middleware` 属性添加

```php
\Larke\Admin\Middleware\RequestOptions::class,
```

7. 后台登录账号：`admin` 及密码 `123456`


### 扩展推荐

| 名称 | 描述 |
| --- | --- |
| [demo](https://github.com/deatil/larke-admin-demo) | 扩展示例 |
| [签名证书](https://github.com/deatil/larke-admin-signcert) | 生成RSA,EDDSA,ECDSA等非对称签名证书 |

注：扩展目录默认为 `/extension` 目录


### 特别鸣谢

感谢以下的项目,排名不分先后

 - laravel/framework

 - lcobucci/jwt

 - casbin/casbin

 - composer/semver


### 开源协议

*  `larke-admin` 遵循 `Apache2` 开源协议发布，在保留本系统版权的情况下提供个人及商业免费使用。 


### 版权

*  该系统所属版权归 deatil(https://github.com/deatil) 所有。
