<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\ Support\ Facades\ DB;
use Storage;

class testCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
     function cyrillic($string) {
            $string = preg_replace('/-{1,}/', ' ', $string);
            $string = preg_replace('/[^\p{L}0-9 ]/iu', '', $string);
            return mb_strtolower(preg_replace('/ {1,}/', '-', $string));
        }

        //работа с файлами
        $all_rows = [];
        $file_name = [];
        $files_path = glob(storage_path().'/app/*.txt');
        
        foreach ($files_path as $fp) {
           array_push($file_name, basename($fp));
        }
        print_r($file_name);

        foreach ($file_name as $fn) {
        //исходник - превращаем в массив сторк
        $rfile = Storage::get($fn);
        $fl = preg_split("/\r\n|\n|\r/", $rfile);
        $all_rows = array_merge($all_rows, $fl);
        //кол-во строк в файле 
        print_r("----кол-во строк в данном-----");
        print_r(count($fl));
        print_r("\r\n");
        }

        //массив для проверенных значений
        $array3 = [];
        //строки из базы - -новое
        $arr_for_db = [];
        $results = DB::select('select text from requests');
        foreach($results as $db) {
            array_push($arr_for_db, $db->text);
        }

        //исходник - превращаем в массив сторк
     /*   $ret1 = Storage::get('file.txt');
        $array1 = preg_split("/\r\n|\n|\r/", $ret1);*/


        //кол-во строк в файле 
        print_r("----кол-во строк-----");
        print_r(count($all_rows));
        print_r("\r\n");

        //проверка массива из БД
        foreach($arr_for_db as $arr2) {
            if ((filter_var($arr2, FILTER_VALIDATE_URL) === FALSE) 
                and(str_word_count($arr2) < 6) 
                and(!preg_match("/\p{Han}+/u", $arr2)) 
                and(!preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ ]/u", $arr2))) {
                //массив с проверенными ссылками
                array_push($array3, "https://ua-tao.com/".cyrillic($arr2).
                    "_s");
            } else {}
        }

        //разница
        $result = array_diff($array3, $all_rows);

        //объединение
      /*  foreach($result as $res) {
            Storage::append('file.txt', $res);
        }
*/
    /*    //считываем данные из файла после вставки
        $ret1 = Storage::get('file.txt');
        $array1 = preg_split("/\r\n|\n|\r/", $ret1);
        print_r("----массим массив прошедший проверки-----\r\n"); */

        //массив из бд
        print_r($result);
        //////////////////
        /////////////////
        /////////////////
        ////////////////


        print_r("----кол-во всех строк-----");
        print_r(count($all_rows));
        print_r("\r\n");
      /*  foreach ($all_rows as $lol) {
        print_r($lol);
        print_r("\r\n");
        }*/
        /////////////////////
        //проверка файлов

foreach($result as $res) {

         foreach ($file_name as $fn) {

if($fn != end($file_name)){
     //исходник - превращаем в массив сторк
        $rfile = Storage::get($fn);
        $fl = preg_split("/\r\n|\n|\r/", $rfile);
        if(count($fl)<20){
        //кол-во строк в файле 
        print_r("\r\nPodhodit");
        Storage::append($fn, $res);
        break;
        } else{
            print_r("\r\nnit");
        }
}elseif($fn == end($file_name)){
    $rfile = Storage::get($fn);
    $fl = preg_split("/\r\n|\n|\r/", $rfile);
    if(count($fl)<20){
        echo "запишем в последний";
        Storage::append($fn, $res);
        break;
    } else {
        print_r("Создадим новый");
        Storage::append('se-6.txt', $res);
        break;
    }
    }
       
      }
  }
    }
}
