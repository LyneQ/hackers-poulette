<?php
    use FileStatus;
    
    class FileHandler {
        readonly string $url;
        readonly FileStatus $status;

        function __construct(string $url, FileStatus $status)
        {
            $this->url = $url;
            $this->status = $status;
        }
    }
?>
