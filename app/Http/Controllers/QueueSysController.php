<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class QueueSysController extends Controller
{


    public function view(){

        $id=session()->get('usertypeid');
        $privilagetypes  = DB::table('user_privilege')
            ->join('section', 'section_id', '=', 'section.id')
            ->select('user_privilege.*')
            ->where([
                ['user_privilege.user_type_id', '=', $id],
                ['section.form_name', '=', 'campaign']])
            ->first();

        if($privilagetypes!="")
        {
            if($privilagetypes->view==1)
            {


                $queuesconf='/etc/asterisk/queues.conf';

                // Read the contents of the conf file
                $confContents = file_get_contents($queuesconf);

                // Extract settings sections
                preg_match_all('/^\[(.+?)\]/m', $confContents, $matches);
                $settingsSections = $matches[1];
                
                $tagsReplace = preg_split('/(\[[^]]+\])/', $confContents, -1, PREG_SPLIT_DELIM_CAPTURE);
                $MainArray=array();
                foreach ($matches[0] as $key => $section) {
                        $arrVall = array_search($section,$tagsReplace,true);
                        $NextValArr=$arrVall+1;

                        $MainArray[$section] = $tagsReplace[$NextValArr];
                }

                $reading = fopen($queuesconf, 'r');
                $music_lines=array();
                $i=0;
                while (!feof($reading)) {
                  $line = fgets($reading);
                  if(strpos($line, 'musicclass=') !== false)
                    $music_lines[]=$i;
                  
                  $i++;  
                }

                $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'View Queue.conf',
                                        'cdate' => Carbon::now()
                                    ]);


                return view('setup2', compact('MainArray','music_lines'));
            }
            else
            {
                return view('permissiondenide');
            }
        }
        else
        {
            if($id!="" || $id!=null){
                return view('permissiondenide');
            }
            else
            {
                return view('login');
            }
        }
    }


    public function add_context_queue(){
        $context_text=trim($_GET['context_text']);

            $queuesconf='/etc/asterisk/queues.conf';
            $queuesconf_tmp='/etc/asterisk/queues.tmp';
            $reading = fopen($queuesconf, 'r');
            $writing = fopen($queuesconf_tmp, 'w');

            $added = false;

            while (!feof($reading)) {

              $line = fgets($reading);
                $added = true;
              fputs($writing, $line);

            }

            fputs($writing, "\n\n".$context_text."\n\n");

            fclose($reading); fclose($writing);

            // might as well not overwrite the file if we didn't replace anything
            if ($added) 
            {
              rename($queuesconf_tmp, $queuesconf);
            } else {
              unlink($queuesconf_tmp);
            }

            $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Add Context to Queue.conf; Details--> '.$context_text,
                                        'cdate' => Carbon::now()
                                    ]);

            DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']);                        

            echo "success";

    }


    public function delete_context_queue(){
        $context=$_POST['context'];
        $queuesconf='/etc/asterisk/queues.conf';

                // Read the contents of the conf file
                $confContents = file_get_contents($queuesconf);

                // Extract settings sections
                preg_match_all('/^\[(.+?)\]/m', $confContents, $matches);
                $settingsSections = $matches[1];
                
                $tagsReplace = preg_split('/(\[[^]]+\])/', $confContents, -1, PREG_SPLIT_DELIM_CAPTURE);

                $arrVall = array_search($context,$tagsReplace,true);
                $NextValArr=$arrVall+1;
                $trailing_ctx=$tagsReplace[$NextValArr];

        $to_delete=$context.$trailing_ctx;


        $data1=file_get_contents($queuesconf);

        $data=str_replace($to_delete, '', $data1);    
            
        file_put_contents($queuesconf,$data);

        $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Delete Context from Queue.conf; Details--> '.$context,
                                        'cdate' => Carbon::now()
                                    ]);

        DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']); 
                                        
        echo "success";

    }

    public function change_music(){
        $newM=$_GET['newM'];
        $line_num=$_GET['line_num'];

            $queuesconf='/etc/asterisk/queues.conf';
            $queuesconf_tmp='/etc/asterisk/queues.tmp';
            $reading = fopen($queuesconf, 'r');
            $writing = fopen($queuesconf_tmp, 'w');

            $added = false;

            $i=0;
            while (!feof($reading)) {

                $line = fgets($reading);

                if($line_num==$i)
                    $line='musicclass='.$newM."\n";

                $added = true;
                fputs($writing, $line);

                $i++;  
            }

            fclose($reading); fclose($writing);

            // might as well not overwrite the file if we didn't replace anything
            if ($added) 
            {
              rename($queuesconf_tmp, $queuesconf);
            } else {
              unlink($queuesconf_tmp);
            }

            $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Changed music of Queue.conf; Details--> '.$newM.';'.$line_num,
                                        'cdate' => Carbon::now()
                                    ]);
        DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']);                             

        echo "success";
    }    

    public function apply_config(){

        $output=shell_exec("/usr/sbin/asterisk -rx 'dialplan reload' ");

        DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '0']);

        $ipaddress = (new UsersController())->get_client_ip();    
        DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Apply Config; Details-->'.$output,
                                        'cdate' => Carbon::now()
                                    ]);
        echo "success";    

    }

}