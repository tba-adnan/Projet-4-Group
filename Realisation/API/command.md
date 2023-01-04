### utilisation d'un package  : 
[Laravel Exel](https://laravel-excel.com/).
## Command :
- ``composer require maatwebsite/excel``
- ajouter le ServiceProvider dans config/app.php : ``Maatwebsite\Excel\ExcelServiceProvider::class,
``
-  exécutez la commande vendor publish :``php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config``
- ``php artisan make:import TaskImport --model=Task``
- ``php artisan make:export TaskExport --model=Task``


