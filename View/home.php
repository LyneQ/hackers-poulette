<form action="/index.php" method="post" class="form" enctype="multipart/form-data">
    <h2 class="form-title">Hackers Poulette - tech support </h2>
    <div>
        <label for="name">name:</label>
        <input type="text" name="name" id="name" placeholder="John Doe" required/>
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
        <textarea name="description" id="description" placeholder="kepwouick..." required></textarea>
    </div>
    <input type="submit" value="submit" />
</form>

<script type="module" src="./View/assets/js/script.js" defer></script>