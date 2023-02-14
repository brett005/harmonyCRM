<?php


namespace App\Repository;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
USE DB;

class SearchRepository implements SearchRepositoryInterface
{
    //private $server = 'https://call3.callbk.tk';
    //private $SERVER = 'https://call3.harmoniecrm.com';
    private $userAdmin = '6666';
    private $passAdmin = 'Capital2023';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }

    ///// serach for one lead
    public function SearchLead($request)
    {
        $phone = $request->phone_number;
        $email = $request->email;
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $data = [];
        if(!$phone && !$email && !$first_name && !$last_name){
            $data['etat'] = 401;
            $data['msg'] = "veuillez remplir au moins un champ !";
            return response()->json($data);
        }else{
            if($phone && $email && $first_name && $last_name){
                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('phone_number',$phone)
                                  ->where('first_name',$first_name)
                                  ->where('last_name',$last_name)
                                  ->first();
            }else{
                if($email){
                    if($phone){
                        if($first_name){
                            /// phone+email+fname
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('phone_number',$phone)
                                  ->where('first_name',$first_name)
                                  ->first();
                        }
                        if($last_name){
                            ///phone+email + lname
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('phone_number',$phone)
                                  ->where('last_name',$last_name)
                                  ->first();
                        }
                        ///phone+email
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('phone_number',$phone)
                                  ->first();
                    }
                    /// email seul
                     $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->first();

                    if($first_name){
                        /// email+fname
                         $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('first_name',$first_name)
                                  ->first();
                        if($last_name){
                            ///email + fname + lname
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('first_name',$first_name)
                                  ->where('last_name',$last_name)
                                  ->first();
                        }
                    }
                    if($last_name){
                        ///email + lname
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('email',$email)
                                  ->where('last_name',$last_name)
                                  ->first();
                    }
                }
                if($phone){
                    if($first_name){
                        if($last_name){
                            //// phone + fname + lname
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('phone_number',$phone)
                                  ->where('first_name',$first_name)
                                  ->where('last_name',$last_name)
                                  ->first();
                        }
                        /// phone+ fname
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('phone_number',$phone)
                                  ->where('first_name',$first_name)
                                  ->first();
                    }
                    if($last_name){
                            //// phone + lname
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('phone_number',$phone)
                                  ->where('last_name',$last_name)
                                  ->first();
                    }
                    //phone seul
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where('phone_number',$phone)
                                  ->orWhere('alt_phone',$phone)
                                  ->first();
                }
                if($first_name){
                    if($last_name){
                         //// lname + fname
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('first_name',$first_name)
                                      ->where('last_name',$last_name)
                                      ->first();
                    }
                    ///fname
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('first_name',$first_name)
                                      ->first();
                }
                if($last_name){
                         //// lname
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('last_name',$last_name)
                                      ->first();
                }
            }
        }
        
        if(!$lead){
            $data['etat'] = 401;
            $data['msg'] = "Aucun Lead existe avec ces informations !";
        }else{
            $data['lead'] = $lead;
            $data['etat'] = 200;
        }
        return response()->json($data);
    }
    //// search for leads
    public function searchCalls($request){
        $date = $request->date;
        
        $phone_number = $request->phone_number;
        $name = $request->name;
        $city = $request->city;
        $status = $request->status;
        //dd($request->date);
        if($status && $status == 'CALLBK'){
            $status = 'CBHOLD';
        }
        $data = [];
        if(!$date && !$status && !$phone_number && !$name && !$city){
            $data['etat'] = 401;
            $data['msg'] = "veuillez remplir au moins un champ !";
            return response()->json($data);
        }else{
            if($date && $status && $phone_number && $name && $city){
                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                          ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                          ->where('status',$status)
                          ->where('phone_number',$phone_number)
                          ->where('first_name','LIKE','%'.$name.'%')
                          ->where('city','LIKE','%'.$city.'%')
                          ->get();
                        $data['leads'] = $lead;
                        $data['etat'] = 200;
                        return response()->json($data);
            }else{
                if($date){
                    if($status){
                        if($phone_number){
                            if($name){
                                ////date + status + phone + name
                                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                            }
                            if($city){
                                ////date + status + phone + city
                                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->where('city','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                            }
                            ////date + status + phone
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }
                        if($name){
                            if($city){
                                ////date + status + name + city
                                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                            } 
                            ////date + status + name
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }
                        if($city){
                            ////date + status + city
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->where('city','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }  
                        ////date + status
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('status',$status)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    if($phone_number){
                        if($name){
                            if($city){
                                /// date + phone + name + city
                                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                            }
                            /// date + phone + name
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }
                        if($city){
                            /// date + phone + city
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                  ->where('phone_number',$phone_number)
                                  ->where('city','LIKE','%'.$city.'%')
                                  ->get();
                                $data['leads'] = $lead;
                                $data['etat'] = 200;
                                return response()->json($data);
                        }
                        /// date + phone
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                      ->where('phone_number',$phone_number)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    if($name){
                        //// date + name
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                              ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                              ->where('first_name','LIKE','%'.$name.'%')
                              ->get();
                            $data['leads'] = $lead;
                            $data['etat'] = 200;
                            return response()->json($data);
                    }
                    if($city){
                        //// date + city
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                              ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                              ->where('city','LIKE','%'.$city.'%')
                              ->get();
                            $data['leads'] = $lead;
                            $data['etat'] = 200;
                            return response()->json($data);
                    }
                    ////date 
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                  ->where(DB::raw("(DATE_FORMAT(modify_date,'%d-%m-%Y'))"),$date)
                                  ->get();
                                $data['leads'] = $lead;
                                $data['etat'] = 200;
                                return response()->json($data);
                }
                if($status){
                    if($phone_number){
                        if($name){
                            if($city){
                                /// status + phone + name + city
                                $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                            }
                            /// status + phone + name
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data); 
                        }
                        /// status + phone
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('phone_number',$phone_number)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    if($name){
                        if($city){
                            /// status + name + city
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }
                        /// status + name
                         $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    if($city){
                            /// status + city
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        }
                    /// status
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('status',$status)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                }
                if($phone_number){
                    if($name){
                        if($city){
                            /// phone + name + city
                            $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                        
                        }
                        /// phone + name
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('phone_number',$phone_number)
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    if($city){
                        /// phone + city
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('phone_number',$phone_number)
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    /// phone
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('phone_number',$phone_number)
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                }
                if($name){
                    if($city){
                        /// name + city
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                    /// name
                    $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('first_name','LIKE','%'.$name.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                }
                if($city){
                        /// city
                        $lead = DB::table('vicidial_list')->where('user',Session::get('user'))
                                      ->where('city','LIKE','%'.$city.'%')
                                      ->get();
                                    $data['leads'] = $lead;
                                    $data['etat'] = 200;
                                    return response()->json($data);
                    }
                
            }
        }
        if(!$lead){
            $data['etat'] = 401;
            $data['msg'] = "Aucun Lead existe avec ces informations !";
        }else{
            $data['leads'] = $lead;
            $data['etat'] = 200;
        }
        return response()->json($data);
    }
}