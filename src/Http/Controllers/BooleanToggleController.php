<?php

namespace Pnpd\BooleanToggle\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
use Pnpd\UserReports\Jobs\UserExportJob;
use Illuminate\Http\Request;

class BooleanToggleController extends Controller
{
    public function toggleField(Request $request)
    {
        $class = $request->get('object');
        $object = $request->get('objectId');
        $value = $request->get('value');
        $option = $request->get('flag');
        try{
            $cl = $class::find($object);
            if($cl instanceof Model) {
                if(Schema::hasColumn($cl->getTable(), $value)){
                    $cl->$value = $option;
                    $cl->save();
                    return new JsonResponse([
                        'code' => 200,
                        'msg' => 'Saved'
                    ], 200);
                } else {
                    return new JsonResponse([
                        'code' => 200,
                        'msg' => 'Failed to save'
                    ], 200);
                }
            }
        } catch (\Throwable $e){
            return new JsonResponse([
                'code' => 200,
                'msg' => $e->getMessage()
            ], 505);
        }
        return new JsonResponse([
            'code' => 200,
            'msg' => 'Failed to save'
        ], 505);
    }
}
