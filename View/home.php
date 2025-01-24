<form action="" method="post">
    <div>
        <label for="name">name:</label>
        <input type="text" name="name" id="name" placeholder="your name..." required/>
    </div>
    <div>
        <label for="firstname">firstname:</label>
        <input type="text" name="firstname" id="firstname" placeholder="your firstname..." required/>
    </div>
    <div>
        <label for="email">email:</label>
        <input type="email" name="email" id="email" placeholder="your email..." required/>
    </div>
    <div>
        <label for="file">file:</label>
        <input type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg, image/gif"/>
        <input type="url" name="file" id="file"/>
    </div>
    <div>
        <label for="description">description:</label>
        <textarea name="description" id="description" placeholder="kepwouick..." required></textarea>
    </div>
    <input type="submit" value="submit" />
</form>

<script type="module" src="./View/assets/js/script.js" defer></script>