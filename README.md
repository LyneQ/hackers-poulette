# Hackers Poulette ™

The company *Hackers Poulette ™* sells Raspberry Pi accessory kits to build your own. They want to allow their users to contact their support team. Your mission is to create a fully-functioning online "contact support" form, in PHP. It must display a contact form and process the received answer (sanitize, validate, answer the user).
## Initialize project configuration

- create a file named `config.php` in the directory `/Config` 
- fill the information bellow
- then put correct SQL information
```PHP
<?php

class Config {
    const string HOST = 'your_host';
    const string PORT = 'your_DB_Port';
    const string DBNAME = 'your_dB_Name';
    const string USERNAME = 'your_username';
    const string PASSWORD = 'your_password';
    const string CHARSET = 'utf8mb4';
}

?>
```


## Contact

For any inquiries or support, please contact [hey@lyneq.tech](mailto:hey@lyneq.tech).