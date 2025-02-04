<?php
    class SupportTicket {
        readonly string $name;
        readonly string $firstName;
        readonly string $email;
        readonly ?string $fileURL;
        readonly string $description;

        function __construct(string $name, string $firstName, string $email, string $description, ?string $fileURL = null)
        {
            $this->name = $name;
            $this->firstName = $firstName;
            $this->email = $email;
            $this->fileURL = $fileURL;
            $this->description = $description;
        }
    }
?>
