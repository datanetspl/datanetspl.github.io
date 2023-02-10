<?php

class Customer{
    
    public $CustomerNumber;
    public $Name;
    public $Address;
    public $Email;
    public $Phone;
    
    
    public function __construct() {
        $this->CustomerNumber = "";
        $this->Name = "";
        $this->Address = "";
        $this->Email = "";
        $this->Phone = "";
    }

    public function MakeInput(string $name, $value): string
    {
        $type = gettype($value);
        $label = sprintf('<label for="%1$s">%1$s</label>', $name);
        switch ($type) {
            case 'boolean':
                $input_type = 'checkbox';
                break;
            case 'integer':
            case 'double':
                $input_type = 'number';
                break;
            case 'string':
                $input_type = 'text';
                break;
            case 'object':
                $class = new ReflectionClass($value);
                if ($class->implementsInterface(DateTimeInterface::class)) {
                    $input_type = 'date';
                    $value = $class
                        ->getMethod('format')
                        ->invoke($value, 'Y-m-d');
                    break;
                }
                
            default:
                throw new InvalidArgumentException($value);
        }
        $input = sprintf('<input name="%1$s" id="%1$s" type="%2$s" value="%3$s" />',
            $name, $input_type, $value);
    
        return $label . $input;
    }
    
    public function MakeInputs(string $class_name): array
    {
        $inputs = [];
        $instance = new $class_name();
        $class = new ReflectionClass($instance);
        $properties = $class->getProperties();
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $name = $property->getName();
            $value = $property->getValue($instance);
            $inputs[] = self::MakeInput("{$class_name}[{$name}]", $value);
        }
    
        return $inputs;
    }
    
    public function MakeForm(string $class_name): string
    {
        $html = '<form method="POST" action="create_db.php">';
        foreach (self::MakeInputs($class_name) as $input)
            $html .= $input;
        $html .= '<input type="submit" />';
        $html .= '</form>';
    
        return $html;
    }  
    
}

?>
