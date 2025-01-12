<?php
    class APIFunctionalities{
        private $API_URL;
        private $API_REQUEST;
        private $API_POST_FIELD;
        private $AUTHORIZATION = "Authorization: Basic Q1ZRVFlXemo5cWxad1N4UktBU0tWdDdNYmVZWmpHOg==";

        function __constructor(){
            
        }
        
        
        public function setupCurlConnection($url, $request, $fields = null){
            $curl = curl_init();
            if($request == "GET" && $fields == null){
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => $request,
                    CURLOPT_HTTPHEADER => array(
                        $this->AUTHORIZATION
                    ),
                    ));
            }elseif($request == "POST"){
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => $request,
                    CURLOPT_POSTFIELDS => $fields,
                    CURLOPT_HTTPHEADER => array(
                        $this->AUTHORIZATION
                    ),
                    ));
            }

            

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            return $response;
        }
        

    }
?>