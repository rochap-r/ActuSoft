<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $table="newsletters";
    protected $fillable=['name','email'];
    public static function store($request){
        self::create($request->all());
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.apikey'),
            'server' =>config('services.mailchimp.prefix')
        ]);
        $list_id='12d1984f52';
        try {
            $response = $mailchimp->lists->addListMember($list_id, [
                "email_address" => $request->email,
                "status" => "subscribed",
                "merge_fields" => [
                    "FNAME" => $request->name
                ]
            ]);
            return response()->json([
                'message'=>'Merci pour votre abonnement à la newsletter!'
            ],200);
        } catch (\MailchimpMarketing\ApiException $e) {
            return response()->json([
                'message'=>'L\'adresse email que vous avez fourni est invalide!'
            ],500);
        }


    }
}
