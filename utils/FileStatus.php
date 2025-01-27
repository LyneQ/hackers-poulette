<?php
    enum FileStatus: string {
        case FormatNotAllowed = 'File format forbidden !';
        case MaxSizeExceeded = 'Maximum file size exceeded ! Please chose a file below 10 Mb.';
        case UploadFailed = 'Upload failed !';
        case OK = "ok";
    }
?>
