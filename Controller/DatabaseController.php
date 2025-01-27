<?php
    namespace Controller;

    use Config;
    use Exception;
    use FileHandler;
    use FileStatus;
    use PDO;
    use PDOException;

    class DatabaseController
    {
        private PDO $pdo;
        private static string $uploadDir = './uploads/';

        public function __construct()
        {
            if (!is_dir(self::$uploadDir)) {
                mkdir(self::$uploadDir, 0755, true);
            }

            if (!class_exists('Config')) {
                throw new Exception('Configuration de base de données manquante.');
            }

            $PDO_Link = 'mysql:host='.Config::HOST.';dbname='.Config::DBNAME.';charset='.Config::CHARSET;

            try {
                $this->pdo = new PDO($PDO_Link, Config::USERNAME, Config::PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        public function verifyConnection(): void
        {
            print_r( $this->pdo ? 'Connection OK' : 'Connection failed' );
        }

        public function getConnection()
        {
            return $this->pdo;
        }

        public function saveSupportTicket(array $data): string {
            // TODO file case ok, url case not ok !!!!!!!!!!!!!!!!!!!!!!!
            [$name, $firstname, $email, $description] = $_POST;
            if (!$name || !$firstname || !$email || !$description) {
                return "<p style='color: red;'>Please fill all required fields correctly.</p>";
            }

            if ($_FILES['file']) {
                $file = $this->handleFile($_FILES['file']);
                // TODO treat FileStatus cases
            } else if ($_POST['fileURL']) {
                $file = $_POST['fileURL'];
            }
        }

        private function handleFile(array $file): FileHandler {
            $allowedFileFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
            if (!in_array($file['type'], $allowedFileFormats)) {
                return new FileHandler("", FileStatus::FormatNotAllowed);
            }
            if ($file['error']) {
                return new FileHandler("", FileStatus::RequestError);
            }
            if ($file['size'] > 10**7) {
                return new FileHandler("", FileStatus::MaxSizeExceed);
            }
            if (in_array($file['type'], $allowedFileFormats) && $file['error'] === 0) {
                $filePath = self::$uploadDir . basename($file['name']);
                if (move_uploaded_file($file['name'], $filePath)) {
                    return new FileHandler($filePath, FileStatus::OK);
                }
            }
            return new FileHandler("", FileStatus::UploadFailed);
        }
    }

?>
