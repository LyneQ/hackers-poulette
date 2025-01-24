# Hackers Poulette ™

The company *Hackers Poulette ™* sells Raspberry Pi accessory kits to build your own. They want to allow their users to contact their support team. Your mission is to create a fully-functioning online "contact support" form, in PHP. It must display a contact form and process the received answer (sanitize, validate, answer the user).
## Initialize project configuration

- create a file named `config.php` in the directory `/Config` 
- fill the information bellow
- then put correct SQL information
```PHP
<?php

return $config = [
    'database' => [
        'host' => 'your_host',
        'dbname' => 'poulette', // or anything else but if you change the DB name, change it on the SQL file to !
        'username' => 'your_username',
        'password' => 'your_password',
        'charset' => 'utf8mb4',
    ],
];
```


## Contact

For any inquiries or support, please contact [hey@lyneq.tech](mailto:hey@lyneq.tech).