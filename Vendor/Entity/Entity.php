<?php
namespace Vendor\Entity;

abstract class Entity
{
    protected $properties = array();
    protected $propertyNames = array();
    
    
    public function __get($name)
    {
        if (in_array($name, $this->propertyNames)) {
            if (isset($this->properties[$name])) {
                return $this->properties[$name];    
            } else {
                return null;   
            }
        } else {
            throw new BadMethodCallException('The property '.$name.' does not exist');
        }
    }
    
    public function __set($name, $value)
    {
        if (in_array($name, $this->propertyNames)) {
            $this->properties[$name] = $value;
        } else {
            throw new \BadMethodCallException('The property '.$name.' does not exist');
        }
    }
    
    public function __isset($name)
    {
        echo "ISSET $name\n";
        return in_array($name, $this->propertyNames) && isset($this->properties[$name]);
    }
    
    public function __unset($name)
    {
        if (isset($this->$name)) {
            unset($this->properties[$name]);    
        } else {
            throw new BadMethodCallException('The property '.$name.' does not exist');
        }
    }
}