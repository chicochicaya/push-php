<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $primaryKey = 'idSub';
    protected $fillable = ['adminId', 'bankId', 'dateSubStart', 
        'dateSubEnd', 'isSubActive'];


    public static function createSubscription($adminId, $bankId,  $dateSubStart, 
        $dateSubEnd, $isSubActive)
    {
        return Subscription::create([
            'adminId' => $adminId,
            'bankId' => $bankId,
            'dateSubStart' => $dateSubStart,
            'dateSubEnd' => $dateSubEnd,
            'isSubActive' => $isSubActive,
        ]);
    }

    public static function getAdminSubStatus($adminId){

        return Subscription::where('adminId', $adminId)
            ->pluck('isSubActive')
            ->first();

    }

    public static function desactivateSub($adminId){

        return Subscription::where('adminId', $adminId)
            ->update(['isSubActive' => 0, ]);

    }


    public static function activateSub($adminId){

        return Subscription::where('adminId', $adminId)
            ->update(['isSubActive' => 1, ]);

    }


    public static function updateSubscriptionDates($adminId, 
    $subDateStart, $subDateEnd, $isSubActive)
    {
        return Subscription::where('adminId', $adminId)
            ->update([
                'dateSubStart' => $subDateStart,
                'dateSubEnd' => $subDateEnd,
                'isSubActive' => 1,
            ]);
    }


    public static function getSubscriptionEndDate($adminId){

        return Subscription::where('adminId', $adminId)
            ->pluck('dateSubEnd')->first();
    }

    






}
