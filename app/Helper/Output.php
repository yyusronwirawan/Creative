<?php

namespace App\Helper;
use App\Helper\Status;
use App\Helper\HelperFunction;

class Output
{
    public function __construct() {
        $this->status = new Status();
        $this->helperFunction = new HelperFunction();
    }

    public function returnError ($error, $tag) { // $tag isi nya kyak NamaController/insert
        $message = 'Unexpected Error'; // default
        $payload = null;
        $statusCode = 400; // default
        $errorCode = 88888; // default
        
        if ($error) {
            if (method_exists($error, 'getMessage')) {
                $error = $error->getMessage();
                if ($this->helperFunction->isJsonString($error) == false) {
                    $message = $error;
                } else {
                    $error = json_decode($error);

                    if (\property_exists($error, 'errorCode')) {
                        if ($error->errorCode == $this->status->error['NOT_AUTHORIZED']['errorCode']) {
                            $statusCode = 401;
                        } else if ($error->errorCode == $this->status->error['FORBIDDEN']['errorCode']) {
                            $statusCode = 403;
                        } else if ($error->errorCode == $this->status->error['USER_NOT_FOUND']['errorCode']) {
                            $statusCode = 406;
                        } else if ($error->errorCode == $this->status->error['RESTRICTED_PRODUCT_COUNTRY']['errorCode']) {
                            $payload = $error->payload;
                        }
                        $message = $error->message;
                        $errorCode = $error->errorCode; 
                    } else {
                        $message = $error;
                    }
                }
            }
        }

        return response()->json([
            'status' => 'failed',
            'statusCode' => $statusCode,
            'errorCode' => $errorCode,
            'message' => $message,
            'payload' => $payload
        ], $statusCode);
    }
    
    public function returnSuccess ($data = NULL) {
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'data' => $data
        ]);
    }
}
