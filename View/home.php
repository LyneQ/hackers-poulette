<?php

function getSanitizedInput(string $key, int $filter = FILTER_DEFAULT): ?string {
    $value = filter_input(INPUT_POST, $key, $filter);
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8') ?: null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = getSanitizedInput('name');
    $firstname = getSanitizedInput('firstname');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $description = getSanitizedInput('description');
    $file = $_FILES['file'] ?? null;


    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $firstname = htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    $file = $_FILES['file'] ?? null;

    if (!$name || !$firstname || !$email || !$description) {
        echo "<p style='color: red;'>Please fill all required fields correctly.</p>";
    } else {

        $fileUploadSuccess = false;
        $allowedFormatTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];

        if (!empty($file['name'])) {
            if (in_array($file['type'], $allowedFormatTypes) && $file['error'] === 0) {
                $uploadDir = './uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $filePath = $uploadDir . basename($file['name']);
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $fileUploadSuccess = true;
                }
            } else {
                echo "<p style='color: red;'>Invalid file type or upload error.</p>";
            }
        }

        echo "<div class='success-message'>";
        echo "<p style='color: green;'>Form submitted successfully!</p>";
        echo "<ul>";
        echo "<li><strong>Name:</strong> " . htmlspecialchars($name) . "</li>";
        echo "<li><strong>First Name:</strong> " . htmlspecialchars($firstname) . "</li>";
        echo "<li><strong>Email:</strong> " . htmlspecialchars($email) . "</li>";
        echo "<li><strong>Description:</strong> " . htmlspecialchars($description) . "</li>";

        if ($fileUploadSuccess) {
            echo "<li><strong>File:</strong> Uploaded successfully to $filePath</li>";
        } elseif (!empty($file['name'])) {
            echo "<li><strong>File:</strong> Upload failed.</li>";
        }

        echo "</ul> </div>";
    }
}


// TODO handle post variable g-recaptcha-response (https://developers.google.com/recaptcha/docs/verify?hl=fr) 
?>

<form action="/index.php" method="post" class="form" enctype="multipart/form-data">
    <h2 class="form-title">Hackers Poulette - tech support </h2>
    <div>
        <label for="name">name:</label>
        <input type="text" name="name" id="name" placeholder="Doe" required/>
    </div>
    <div>
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" id="firstname" placeholder="John" required/>
    </div>
    <div>
        <label for="email">email:</label>
        <input type="email" name="email" id="email" placeholder="johnDoe@exemple.com" required/>
    </div>
    <div>
        <label for="file">file:</label>
        <input type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg, image/gif"/>
        <input type="url" name="file" id="file" placeholder="https://exemple.com/image.png"/>
    </div>
    <div>
        <label for="description">description:</label>
        <textarea name="description" id="description" placeholder="K c'est une constante ..." required></textarea>
    </div>
    
    <div class="g-recaptcha" data-sitekey="6LePbsMqAAAAANj6JEuPNqKLr3p-sdXWxsreezZi" data-callback="callBack"></div>
    <input id="support" type="submit" value="submit" disabled />
</form>

<script type="module" src="./View/assets/js/script.js" defer></script>
<script type="text/javascript">
    function callBack() {
        const support = document.querySelector("#support")
        if (!support) return;
        support.removeAttribute("disabled");
    }
</script>
