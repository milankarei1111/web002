# web002 網站開發流程
## 建置環境
>1.建立git管控

>2.建立Laravel專案

>3.安裝套件包 * [jeroennoten/Laravel-AdminLTE]
(https://github.com/jeroennoten/Laravel-AdminLTE)

>4.安裝 adminlte套件(搭配auth) $ php artisan adminlte:install

>5..env文件設定相關資料庫配置

###以上後台完成後.則可使用Adminlate登入與驗證及用戶驗證功能

## 建置平台
>1.更新 jeroennoten/Laravel-AdminLTE套件包設定

    $ composer update jeroennoten/laravel-adminlte

    $ php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\AdminLteServiceProvider" tag=assets --force

    配置
    $ php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config

    語言
    $ php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\AdminLteServiceProvider" --tag=translations

    視圖
    $ php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\AdminLteServiceProvider" --tag=views

>2.控制器設置
   $ php artisan make:controller UserController --resource

>3.CRUD設置

**新增**

* UserController 建立index()、create()、store()方法對應動作
* 對應頁面的模板(user.index、user.create)
* 加入validate()法方來驗證規則以及密碼使用HASH加密
* 因應表單驗證錯誤提示,下載語言包套件: caouecs/laravel-lang

    指令 
    $ composer require caouecs/laravel-lang:~4.0

**修改,刪除,查詢**

* UserController 建立 edit()、update()、 destroy()方法對應動作
* 對應頁面的模板()
