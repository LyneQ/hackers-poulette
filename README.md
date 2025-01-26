# Hackers Poulette ™

The company *Hackers Poulette ™* sells Raspberry Pi accessory kits to build your own. They want to allow their users to contact their support team. Your mission is to create a fully-functioning online "contact support" form, in PHP. It must display a contact form and process the received answer (sanitize, validate, answer the user).
## Initialize project configuration

- create a file named `config.php` in the directory `/Config` 
- fill the information bellow
- then put correct SQL information
```PHP
<?php

class Config {
    const HOST = 'your_host';
    const PORT = 'your_DB_Port';
    const DBNAME = 'your_dB_Name';
    const USERNAME = 'your_username';
    const PASSWORD = 'your_password';
    const CHARSET = 'utf8mb4';
    const CAPTCHA_SECRET = "your-gcaptcha_secre";
}

?>
```


## Contact

For any inquiries or support, please contact [hey@lyneq.tech](mailto:hey@lyneq.tech).