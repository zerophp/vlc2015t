Formulario de registro
<form action="procesar.php" method="POST" 
      enctype="multipart/form-data">
<ul>
    <li>
        <label>Id</label>
        <input type="hidden" name="id" />
    </li>
    <li>
        <label>Nombre</label>
        <input type="text" name="name" />
    </li>
    <li>
        <label>Email</label>
        <input type="text" name="email" />
    </li>
    <li>
        <label>Password</label>
        <input type="password" name="password" />
    </li>
    <li>
        <label>Descripcion</label>
        <textarea rows="" cols="" name="description"></textarea>
        
    </li>
    <li>
        <label>Foto</label>
        <input type="file" name="photo" />
    </li>
    <li>
        <label>Sexo</label>
        M<input type="radio" name="gender" value="m"/>
        H<input type="radio" name="gender" value="h"/>
        O<input type="radio" name="gender" value="o"/>
    </li>
    <li>
        <label>Ciudad</label>
        <select name="city">
            <option>Valencia</option>
            <option>Barcelona</option>
            <option>Madrid</option>
        </select>
    </li>
    <li>
        <label>Aficiones</label>
        <select name="hobbies[]" multiple>
            <option>Leer</option>
            <option>Correr</option>
            <option>Nadar</option>
        </select>
    </li>
    <li>
        <label>Politica</label>
        Si<input type="checkbox" name="privacy[]" value="si" />
        No<input type="checkbox" name="privacy[]" value="no" />
        Talvez<input type="checkbox" name="privacy[]" value="talvez" />
    </li>
    <li>
        <label>Reset</label>
        <input type="reset" name="reset" />
    </li>
    <li>
        <label>Submit</label>
        <input type="submit" name="submit" />
    </li>
</ul>
</form>





