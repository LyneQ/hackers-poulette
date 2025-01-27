<?php
    require_once './utils/FileHandler.php';
    require_once './utils/FileStatus.php';
    require_once './Model/SupportTicket.php';
    require_once './View/SupportTicketView.php';

    class SupportTicketController
    {
        private PDO $connexion;
        private static string $uploadDir = './uploads/';
        private SupportTicket $ticket;
        private SupportTicketView $ticketView;

        public function __construct() {
            if (!is_dir(self::$uploadDir)) mkdir(self::$uploadDir, 0755, true);

            if (!class_exists('Config')) throw new Exception('Configuration de base de données manquante.');

            $PDO_Link = 'mysql:host='.Config::HOST.';dbname='.Config::DBNAME.';charset='.Config::CHARSET;

            try {
                $this->connexion = new PDO($PDO_Link, Config::USERNAME, Config::PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        public function verifyConnection(): void {
            print_r( $this->connexion ? 'Connection OK' : 'Connection failed' );
        }

        public function getConnection() {
            return $this->connexion;
        }

        public function setTicket(array $data) {
            ['name' => $name, 'firstname' => $firstname, 'email' => $email, 'description' => $description] = $data;
            if (!$name || !$firstname || !$email || !$description) throw new Exception('Please fill all required fields correctly.');

            $fileURL = null;
            if (!$_FILES['file']["error"]) {
                $fileHandler = $this->handleFile($_FILES['file']);
                if ($fileHandler->status !== FileStatus::OK)
                    throw new Exception($fileHandler->status->value);
                $fileURL = $fileHandler->url;
            } else if (!$_POST['fileURL']) {
                $fileURL = $_POST['fileURL'];
            }
            
            $this->ticket = new SupportTicket($name, $firstname, $email, $fileURL, $description);
            $this->ticketView = new SupportTicketView($this->ticket);
        }

        private function handleFile(array $file): FileHandler {
            $allowedFileFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
            if (!in_array($file['type'], $allowedFileFormats)) return new FileHandler("", FileStatus::FormatNotAllowed);
            if ($file['size'] > 10**7) return new FileHandler("", FileStatus::MaxSizeExceeded);
            $filePath = self::$uploadDir . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $filePath)) return new FileHandler($filePath, FileStatus::OK);
            return new FileHandler("", FileStatus::UploadFailed);
        }
        
        public function saveTicket() {
            if (!isset($this->ticket)) throw new Exception("Support ticket not found !");
            $ticket = $this->ticket;
            $this->connexion->query("INSERT INTO tickets (name, firstname, email, file, description) VALUES ('$ticket->name', '$ticket->firstName', '$ticket->email', '$ticket->fileURL', '$ticket->description')");
        }

        public function setView(): string {
            if (!isset($this->ticketView)) throw new Exception("Support ticket view not found !");
            return $this->ticketView->getView();
        }
    }
?>
