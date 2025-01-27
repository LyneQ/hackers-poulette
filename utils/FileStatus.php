<?php
    enum FileStatus {
        case FormatNotAllowed;
        case RequestError;
        case MaxSizeExceed;
        case UploadFailed;
        case OK;
    }
?>
