<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\EstateFurnishing;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;


class EstateFurnishingController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estateFurnishings = EstateFurnishing::all();
        
        return $this->successResponse($estateFurnishings);
      
    }

    /**
     * Create one new Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

          
            'estate_furnishing'=>'required|string',
         
           
        ]);
       
        $estateFurnishing = EstateFurnishing::create($request->all());          
        return $this->successResponse($estateFurnishing,Response::HTTP_CREATED);
       
    }

    /**
     * get one Clinic
     *
     * @return Illuminate\Http\Response
     */
    public function show($estateFurnishing)
    {
        //
        $estateFurnishing = EstateFurnishing::findOrFail($estateFurnishing);
        return $this->successResponse($estateFurnishing);
        
    }

    /**
     * update an existing one Doctor
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$estateFurnishing)
    {

        $this->validate($request,[
           
            
            'estate_furnishing'=>'string',
            
            
        ]);
        $estateFurnishing = EstateFurnishing::findOrFail($estateFurnishing);
        $estateFurnishing->fill($request->all());

        
        if($estateFurnishing->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estateFurnishing->save();
        return $this->successResponse($estateFurnishing);
    }

     /**
     * remove an existing one clinic
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($estateFurnishing)
    {
        $estateFurnishing = EstateFurnishing::findOrFail($estateFurnishing);
        $estateFurnishing->delete();
        return $this->successResponse($estateFurnishing);
      
    }

}
