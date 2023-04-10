<?php 

require __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// DB credentials.
$DB_host= getenv('DB_HOST');
$DB_user= getenv('DB_USERNAME');
$DB_pass= getenv('DB_PASSWORD');
$DB_name= getenv('DB_NAME');

// Establish database connection.
try 
{ 
    $dbh = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Sorry an error occured while trying to connect to the system";
}

?>

