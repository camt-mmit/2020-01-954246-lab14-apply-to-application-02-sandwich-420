
<?php 
// echo '<p>Hello World</p>'; 
require 'vendor/autoload.php';
include 'CommandLine.php';
$args = CommandLine::parseArgs();
$filename;
$start=0;
$end=0;
$step=1.0;
$to_conver;
// print_r($args);
if (isset($args['opts']['help']) && isset($args['opts']['h'])) 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-02.php -h\n";
    exit();
}
elseif ((isset($args['opts']['help']) && !$args['opts']['help'])||(isset($args['opts']['h']) && !$args['opts']['h'])) 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-02.php -h\n";
    exit();
}
elseif ((isset($args['opts']['help']) && $args['opts']['help'])||(isset($args['opts']['h']) && $args['opts']['h'])) 
{
    echo "Usage: php ass-02.php [options] [--] file_name\n";
    echo "Options:\n";
    echo "-h|--help \tprint this manual.\n";
    echo "Arguments:\n";
    echo "file_name \tspecific file name with following format.\n";
    echo "\t\tnumber_of_data\n";
    echo "\t\tdata1\n";
    echo "\t\tdata2\n";
    echo "\t\t...\n";
    exit();
}
elseif ((isset($args['opts']['holy_shit']))) 
{
    if ((isset($args['opts']['s'])&&(isset($args['opts']['t'])||isset($args['opts']['to'])))||(isset($args['opts']['step'])&&(isset($args['opts']['t'])||isset($args['opts']['to'])))&&(count($args['opts'])==3)) 
    {
        if (isset($args['opts']['t'])) 
        {
            $to_conver=strtoupper($args['opts']['t']);
        } 
        else 
        {
            $to_conver=strtoupper($args['opts']['to']);
        }
        if (isset($args['opts']['s'])) 
        {
            $step=floatval($args['opts']['s']);
        } 
        else 
        {
            $step=floatval($args['opts']['step']);
        }
        if(!($to_conver=='usd'||$to_conver=='chy'||$to_conver=='eur'))
        {
            echo "Invalid arguments!!!\n";
            echo "Usage the following command for help.\n";
            echo "php ass-02.php -h\n";
            exit();
        }
    } 
    elseif((isset($args['opts']['s'])&&(count($args['opts'])==2)))
    {
        $to_conver='CHY';
        $step=floatval($args['opts']['s']);
    }
    elseif((isset($args['opts']['step'])&&(count($args['opts'])==2)))
    {
        $to_conver='CHY';
        $step=floatval($args['opts']['step']);
    }
    elseif((isset($args['opts']['t'])&&(count($args['opts'])==2)))
    {
        $to_conver=strtoupper($args['opts']['t']);
        $step=1.0;
        if(!($to_conver=='usd'||$to_conver=='chy'||$to_conver=='eur'))
        {
            echo "Invalid arguments!!!\n";
            echo "Usage the following command for help.\n";
            echo "php ass-02.php -h\n";
            exit();
        }
    }
    elseif((isset($args['opts']['to'])&&(count($args['opts'])==2)))
    {
        $to_conver=strtoupper($args['opts']['to']);
        $step=1.0;
        if(!($to_conver=='usd'||$to_conver=='chy'||$to_conver=='eur'))
        {
            echo "Invalid arguments!!!\n";
            echo "Usage the following command for help.\n";
            echo "php ass-02.php -h\n";
            exit();
        }
    }
    else
    {
        echo "Invalid arguments!!!\n";
        echo "Usage the following command for help.\n";
        echo "php ass-02.php -h\n";
        exit();
    }
    if (isset($args['args'][0])&&(count($args['args'])==2)) 
    {
        // echo "??";
        $start=(float)$args['args'][0];
        $end=(float)$args['args'][1];
        if($start>$end)
        {
            echo "Invalid arguments!!!\n";
            echo "Usage the following command for help.\n";
            echo "php ass-02.php -h\n";
            exit();
        }
    }
}
elseif (isset($args['args'][0])&&(count($args['args'])==2)) 
{
    // echo "??";
    $start=(float)$args['args'][0];
    $end=(float)$args['args'][1];
    if($start>$end)
    {
        echo "Invalid arguments!!!\n";
        echo "Usage the following command for help.\n";
        echo "php ass-02.php -h\n";
        exit();
    }
}
else 
{
    echo "Invalid arguments!!!\n";
    echo "Usage the following command for help.\n";
    echo "php ass-02.php -h\n";
    exit();
}

// $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
// $fp = fopen($filename,'r');
// $i=0;
// $data=[];
// if (file_exists($filename)) 
// {
//     echo "THB\tCHY\n";
//     while(!feof($fp)){
//         $line = fgets($fp);
//         $data[$i++]=floatval($line);
//         // echo (int)$line."\t123\n";
//      }
// }
// array_pop($data);


$converter = new CurrencyConverter\CurrencyConverter;
$converter_data=$converter->convert('THB', 't'.$to_conver); // will print something like 97.44
echo "THB\t".$to_conver."\n";
for ($i=$start; $i<=$end; $i+=$step) {
    echo number_format($i)."\t".number_format($i*$converter_data);
  } 
// foreach ($data as $key => $value) 
// {
//     $tmp_result=$value*$converter_data;
//     echo number_format($value)."\t".number_format($tmp_result)."\n";
// }
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
//     echo "Usage: php ass-02.php [options] [--] file_name";
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