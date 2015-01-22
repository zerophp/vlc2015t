Formulario de registro
<form action="usuarios.php?action=update&id=<?=$usuario[0];?>" method="POST" 
      enctype="multipart/form-data">
<ul>
    <li>
        <label>Id</label>
        <input type="hidden" name="id" />
    </li>
    <li>
        <label>Nombre</label>
        <input type="text" name="name" value="<?=$usuario[1];?>"/>
    </li>
    <li>
        <label>Email</label>
        <input type="text" name="email" value="<?=$usuario[2];?>"/>
    </li>
    <li>
        <label>Password</label>
        <input type="password" name="password" />
    </li>
    <li>
        <label>Descripcion</label>
        <textarea rows="" cols="" name="description">
        <?=$usuario[4];?>
        </textarea>
        
    </li>
    <li>
        <label>Foto</label>
        <input type="file" name="photo" />
        <img src="<?=$usuario[00];?>" width="100"/>
    </li>
    <li>
        <label>Sexo</label>
        M<input type="radio" name="gender" value="m" <?=($usuario[5]=='m')?'checked':'';?>/>
        H<input type="radio" name="gender" value="h" <?=($usuario[5]=='h')?'checked':'';?>/>
        O<input type="radio" name="gender" value="o" <?=($usuario[5]=='o')?'checked':'';?>/>
    </li>
    <li>
        <label>Ciudad</label>
        <select name="city">
            <option value="Valencia" <?=($usuario[6]=='Valencia')?'selected':'';?>>Valencia</option>
            <option value="Barcelona" <?=($usuario[6]=='Barcelona')?'selected':'';?>>Barcelona</option>
            <option value="Madrid" <?=($usuario[6]=='Madrid')?'selected':'';?>>Madrid</option>
        </select>
    </li>
    <li>
        <label>Aficiones</label>
        <select name="hobbies[]" multiple>
            <option value="Leer" <?=(in_array('Leer', $usuario[7]))?'selected':'';?>>Leer</option>
            <option value="Correr" <?=(in_array('Correr', $usuario[7]))?'selected':'';?>>Correr</option>
            <option value="Nadar" <?=(in_array('Nadar', $usuario[7]))?'selected':'';?>>Nadar</option>
        </select>
    </li>
    <li>
        <label>Politica</label>
        Si<input type="checkbox" name="privacy[]" value="si" <?=(in_array('si', $usuario[8]))?'checked':'';?>/>
        No<input type="checkbox" name="privacy[]" value="no" <?=(in_array('no', $usuario[8]))?'checked':'';?>/>
        Talvez<input type="checkbox" name="privacy[]" value="talvez" <?=(in_array('talvez', $usuario[8]))?'checked':'';?>/>
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





