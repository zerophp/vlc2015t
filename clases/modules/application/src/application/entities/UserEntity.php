<?php
namespace application\entities;

class UserEntity implements UsersEntityInterface
{
    public $iduser;
    public $name;
    public $email;
    public $password;
    public $description;
    public $photo;    
    public $genders_idgender;    
    public $cities_idcity;
    
    
    public function extract($obj)
    {
        
    }
    
    public function hydrate($arr)
    {
        foreach ($arr as $key => $value)
        {
            $this->$key = $value;
        }
        return $this;
    }
    
    
    
}