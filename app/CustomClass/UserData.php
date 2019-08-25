<?php

namespace App\CustomClass;

use App\User;

class UserData{
    private $id;
    private $name;
    private $email;
    private $phone;

    public function __construct($id){
        $user=User::where('id',$id)->firstOrFail();
        $this->setId($user->id);
        $this->setName($user->name);
        $this->setEmail($user->email);
        $this->setPhone($user->phone);
    }

    public function getSingleUserData(){
        return $arr=[
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone()
        ];
    }

    public static function getAllUserData($data_arr){
        $arr=[];
        foreach($data_arr as $data){
            $obj=new UserData($data->id);
            array_push($arr,$obj->getSingleUserData());
        }
        return $arr;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}