<?php 

require __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// DB credentials.
$DB_host= $_ENV['DB_HOST'];
$DB_user= $_ENV['DB_USERNAME'];
$DB_pass= $_ENV['DB_PASSWORD'];
$DB_name= $_ENV['DB_NAME'];
$DB_port= $_ENV['DB_PORT'];

// Establish database connection.
try 
{ 
    $dbh = new PDO("mysql:host={$DB_host};dbname={$DB_name};port={$DB_port};",$DB_user,$DB_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Sorry an error occured while trying to connect to the system";
}

?>

