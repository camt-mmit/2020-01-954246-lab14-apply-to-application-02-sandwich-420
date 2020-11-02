
<?php 
// echo '<p>Hello World</p>'; 
require 'vendor/autoload.php';
include 'CommandLine.php';
$args = CommandLine::parseArgs();
$filename;
// print_r($args);
if (isset($args['opts']['help']) && isset($args['opts']['h'])) 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-01.php -h\n";
    exit;
}
elseif ((isset($args['opts']['help']) && !$args['opts']['help'])||(isset($args['opts']['h']) && !$args['opts']['h'])) 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-01.php -h\n";
    exit;
}
elseif ((isset($args['opts']['help']) && $args['opts']['help'])||(isset($args['opts']['h']) && $args['opts']['h'])) 
{
    echo "Usage: php ass-01.php [options] [--] file_name\n";
    echo "Options:\n";
    echo "-h|--help \tprint this manual.\n";
    echo "Arguments:\n";
    echo "file_name \tspecific file name with following format.\n";
    echo "\t\tnumber_of_data\n";
    echo "\t\tdata1\n";
    echo "\t\tdata2\n";
    echo "\t\t...\n";
    exit;
}
elseif (isset($args['args'][0])&&(count($args['args'])==1)&&(count($args['opts'])==0)) 
{
    // echo "??";
    $filename=$args['args'][0];
    // exit;
}
else 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-01.php -h\n";
    exit;
}
// $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$fp = fopen($filename,'r');
$i=0;
$data=[];
if (file_exists($filename)) 
{
    echo "THB\tCHY\n";
    while(!feof($fp)){
        $line = fgets($fp);
        $data[$i++]=floatval($line);
        // echo (int)$line."\t123\n";
     }
}
array_pop($data);


$converter = new CurrencyConverter\CurrencyConverter;
$converter_data=$converter->convert('THB', 'tCHY'); // will print something like 97.44
foreach ($data as $key => $value) 
{
    $tmp_result=$value*$converter_data;
    echo number_format($value)."\t".number_format($tmp_result)."\n";
}
// caching currency

// $cacheAdapter = new CurrencyConverter\Cache\Adapter\FileSystem(__DIR__ . '/cache/');
// $cacheAdapter->setCacheTimeout(DateInterval::createFromDateString('10 second'));
// $converter->setCacheAdapter($cacheAdapter);
// echo $converter->convert('USD', 'NPR');
// fwrite($fp,'r mode');
// fclose($fp);
// print_r($filename);
// if (isset($args['opts']['help'])||isset($args['opts']['h']) {
//     if (condition) {
//         # code...
//     } else {
//         # code...
//     }
    
// }
// if ((isset($args['opts']['help']) && $args['opts']['help'])||(isset($args['opts']['h']) &&$args['opts']['h'])) {
//     echo "Usage: php ass-01.php [options] [--] file_name";
//     echo "Options:";
//     echo "-h|--help print this manual.";
//     echo "Arguments:";
//     echo "file_name specific file name with following format.";
//     echo "\t\tnumber_of_data";
//     echo "\t\tdata1";
//     echo "\t\tdata2";
// }
// $cmd = new CommandLine();
// $cmd->option('help', function ($val){
// 	// 处理选项 h 
// 	// $val 选项值
// 	// ...
// 	echo 'Option h handler.';
// });

// $shortopts  = "";
// $shortopts .= "h:";  // Required value

 
// $longopts  = array(
//     "required:",     // Required value
// );
// $options = getopt($shortopts, $longopts);
//  $arguments = getopt(":b:c:"); 

 ?>