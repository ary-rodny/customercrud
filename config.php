<?php

return [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => 'Excelencia07',
        'dbname' => 'customercrud',
    ],

    'table' =>[
        'create_query' => 'CREATE TABLE `customercrud`.`customers` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(30) NOT NULL , `address` VARCHAR(100) NOT NULL , `email` VARCHAR(40) NOT NULL , `phone` VARCHAR(25) NULL , `ceated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;'
    ]

];