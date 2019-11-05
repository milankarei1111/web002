# web002 網站開發流程
## 建置環境
>1.建立git管控

>2.建立Laravel專案

>3.安裝套件包 * [jeroennoten/Laravel-AdminLTE]
(https://github.com/jeroennoten/Laravel-AdminLTE)

>4.安裝 adminlte套件(搭配auth) $ php artisan adminlte:install

>5..env文件設定相關資料庫配置

###以上後台完成後.則可使用Adminlate登入與驗證及用戶驗證功能

## 建置表格
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

## 建置新的練習表格-產品、產品目錄

>1.建立模型與遷移文件

 * 方式1: 個別產生模型、遷移

**產生遷移文件(建立資料結構)**

		$ php artisan make:migration create_categories_table
		$ php artisan make:migration create_products_table

**執行遷移**
		
		$ php artisan migrate
**建立模型**

		$ php artisan make:model Models/Category
		$ php artisan make:model Models/Product
		
 * 方式2:產生模型時同時產生遷移文件

**產生模型同時產生遷移**

		$ php artisan make:model Models/Category --migration
		$ php artisan make:model Models/Product --migration

**執行遷移**
		
		$ php artisan migrate

>2.定義模型資料表內容:表格相關屬性、關聯

>3.產生模型工廠
	
>透過工廠:可快速填充資料--model可以讓模型工廠對應模型類
	
**產生工廠Factory**
		
    $ php artisan make:factory CategoryFactory --model=Category

**中文化**

    新增AppServiceProvider register()

    綁定一個單例（Singleton）

    $this->app->singleton(\Faker\Generator::class,function(){
            return \Faker\Factory::create('zh_TW');
        });

>4.產生填充文件

**建立填充文件** 約定名稱:大寫表名+TableSeeder

    $ php artisan make:seeder ProductTableSeeder

**编写好填充器类之后，需要通过 dump-autoload 命令重新生成 Composer 的自动加载器**

    $ composer dump-autoload

**執行填充**

> **方法一 : 直接指定填充器名稱**

    $ php artisan db:seed --class=填充器名稱

> **方法二 : DatabaseSeeder的run函數去call(填充器名稱)**
    
    $ php artisan db:seed

## 建置Category增刪改查功能

>1.新增控制器 CategoryController
    
    $ php artisan make:Controller CategoryController --resource

>2.新增web.php 路由內容 Route::resource('category','CategoryController');
