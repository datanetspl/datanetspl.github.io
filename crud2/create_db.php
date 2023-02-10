<?php

require_once('customer.php');

function MakeClassFromArray(string $class_name, array $values)
{
    $class = new ReflectionClass($class_name);
    $instance = $class->newInstanceWithoutConstructor();
    foreach ($values as $name => $value) {
        $property = $class->getProperty($name);
        $property->setAccessible(true);
        $property->setValue($instance, $value);
        print_r($property->getValue($instance));
        echo '<br/>';
    }
    

    return $instance;
}


$class = Customer::class;

$person = MakeClassFromArray($class, $_POST[$class]);

$reflect = new ReflectionClass('Customer');
$props = $reflect->getProperties();
$ownProps = [];
foreach ($props as $prop) {
    $ownProps[] = $prop->getName();
    
}
$vals = [];

$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

foreach ($ownProps as $prop) {
    $vals[] = $person->$prop;    
}

//Serialize the object into a string value that we can store in our database.
$serializedObject = serialize($person);
$iprops = implode(',',$ownProps);
$ivals = implode("','",$vals);
//Prepare our INSERT SQL statement.
$sm = "INSERT INTO customers ({$iprops}) VALUES ('{$ivals}')";
var_dump($sm);
$stmt =  $pdo->prepare($sm);
$stmt->execute();

header("location:index.php");

?>
