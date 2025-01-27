<?php
    class SupportTicket {
        private string $name;
        private string $firstName;
        private string $email;
        private ?string $fileURL;
        private string $description;

        function __construct(string $name, string $firstName, string $email, ?string $fileURL = null, string $description)
        {
            $this->name = $name;
            $this->firstName = $firstName;
            $this->email = $email;
            $this->fileURL = $fileURL;
            $this->description = $description;
        }
    }
?>
