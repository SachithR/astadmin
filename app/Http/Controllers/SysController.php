<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SysController extends Controller
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


                $extconf='/etc/asterisk/extensions.conf';

                // Read the contents of the conf file
                $confContents = file_get_contents($extconf);

                // Extract settings sections
                preg_match_all('/^\[(.+?)\]/m', $confContents, $matches);
                $settingsSections = $matches[1];
                
                $tagsReplace = preg_split('/(\[[^]]+\])/', $confContents, -1, PREG_SPLIT_DELIM_CAPTURE);
                $MainArray=array();
                foreach ($matches[0] as $key => $section) {
                        $arrVall = array_search($section,$tagsReplace,true);
                        $NextValArr=$arrVall+1;

                        if($section!='[campaing]')
                        $MainArray[$section] = $tagsReplace[$NextValArr];
                }

                $queuesconf='/etc/asterisk/queues.conf';

                // Read the contents of the conf file
                $confContents = file_get_contents($queuesconf);

                // Extract settings sections
                preg_match_all('/^\[(.+?)\]/m', $confContents, $matches);
                $Queues = $matches[1];

                $reading = fopen($extconf, 'r');
                $queue_lines=array();
                $i=0;
                while (!feof($reading)) {
                  $line = fgets($reading);
                  if(strpos($line, ',Queue') !== false)
                    $queue_lines[]=$i;
                  
                  $i++;  
                }

                $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'View Extensions.conf',
                                        'cdate' => Carbon::now()
                                    ]);

                return view('setup1', compact('MainArray','Queues','queue_lines'));
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

    public function change_queue(){
        $newq=$_GET['newq'];
        $line_num=$_GET['line_num'];
        $oldq=$_GET['oldq'];

            $extconf='/etc/asterisk/extensions.conf';
            $extconf_tmp='/etc/asterisk/extensions.tmp';
            $reading = fopen($extconf, 'r');
            $writing = fopen($extconf_tmp, 'w');

            $added = false;

            $i=0;
            while (!feof($reading)) {

                $line = fgets($reading);

                if($line_num==$i)
                    $line=str_replace($oldq, $newq, $line);

                $added = true;
                fputs($writing, $line);

                $i++;  
            }

            fclose($reading); fclose($writing);

            // might as well not overwrite the file if we didn't replace anything
            if ($added) 
            {
              rename($extconf_tmp, $extconf);
            } else {
              unlink($extconf_tmp);
            }

            $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Changed Queue from Extensions.conf; Details--> '.$newq.';'.$line_num.';'.$oldq,
                                        'cdate' => Carbon::now()
                                    ]);
        DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']); 
                                           
        echo "success";
    }


    public function add_context(){
        $context_text=trim($_GET['context_text']);

            $extconf='/etc/asterisk/extensions.conf';
            $extconf_tmp='/etc/asterisk/extensions.tmp';
            $reading = fopen($extconf, 'r');
            $writing = fopen($extconf_tmp, 'w');

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
              rename($extconf_tmp, $extconf);
            } else {
              unlink($extconf_tmp);
            }

            $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Add Context to Extensions.conf; Details--> '.$context_text,
                                        'cdate' => Carbon::now()
                                    ]);
            DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']); 
                                    
            echo "success";

    }


    public function delete_context(){
        $context=$_POST['context'];
        $trailing_ctx=$_POST['trailing_ctx'];

        $to_delete=$context.$trailing_ctx;

        $extconf='/etc/asterisk/extensions.conf';

        $data1=file_get_contents($extconf);

        $data=str_replace($to_delete, '', $data1);    
            
        file_put_contents($extconf,$data);


        $ipaddress = (new UsersController())->get_client_ip();
                DB::table('all_log')
                                    ->insert([
                                        'user_id'    => session('userid'),
                                        'username'   => session('username'),
                                        'ip' => $ipaddress,
                                        'data' => 'Delete Context from Extensions.conf; Details--> '.$context.';'.$trailing_ctx,
                                        'cdate' => Carbon::now()
                                    ]);
        DB::table('func_data')
            ->where('type','apply_needed')
            ->update(['data' => '1']); 
                                        
        echo "success";

    }

}