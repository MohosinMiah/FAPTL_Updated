<?php

namespace App\Http\Controllers;

use App\Models\OrganizationSetting;
// use App\Http\Requests\StoreOrganizationSettingRequest;
// use App\Http\Requests\UpdateOrganizationSettingRequest;
use App\Models\Authentication;
use Carbon\Carbon;
use DB;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class OrganizationSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{

			$organization_info = OrganizationSetting::where( 'id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->first();
			$data = [
				'organization_info' => $organization_info
			];
			return view('backend.layout.organization.index', compact('data'));
		}
		else
		{
			return redirect()->route('login_form');

		}

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_user()
    {
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			return view('backend.layout.organization.addUser');
		}
		else
		{
			return redirect()->route('login_form');

		}
    }

	public function user_list()
    {
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$users = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->orderBy( 'id','DESC' )->get();
			$data = [
				'users' => $users
			];
        return view('backend.layout.organization.userList' , compact( 'data' ) );
		}
		else
		{
			return redirect()->route('login_form');
		}
		
    }


	public function organization_user_edit( $userID )
	{
		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$user = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id' , $userID )->first();

			$data = [
				'user' => $user,
			];

			return view( 'backend.layout.organization.editUser' , compact( 'data' ) );
		}
		else
		{
			return redirect()->route('login_form');

		}

		

	}


	public function organization_update_user( Request $request, $userID )
	{

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$adminUser = Authentication::where( 'clinic_id' , session( 'clinicID' ) )->where( 'id', $userID )->firstOrFail();

			$validator =  Validator::make($request->all(), [
				'phone'    => [
					'required',
					'max:11',
					Rule::unique('authentications')->ignore($userID),
				],
				'name'     => 'required',
			]);
	
			if( $validator->fails() )
			{
				return redirect( route('organization_user_edit' , $userID ))->with('status', 'Fail, This phone number is alrady used.');
			}
			else
			{
				$adminUser->name      = $request->name;
				$adminUser->phone     = $request->phone;
				$adminUser->email     = $request->email;
				if( !empty( $request->password ) or $request->password != '' )
				{
					$password                = md5( $request->password );
					$adminUser->password     = $password;
				}
				$save =  $adminUser->save();
				return redirect( route('organization_user_edit' , $userID ))->with('status', 'User Data Updated');
			
			}
		}
		else
		{
			return redirect()->route('login_form');

		}

		
        
	}


    public function add_new_user_post( Request $request )
    {

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			$adminUser = new Authentication;
			// $validatedData = $request->validate([
			// 	'phone'    => 'required|unique:authentications|max:30',
			// 	'name'     => 'required',
			// 	'password' => 'required',
			// ]);
	
			// if( $validatedData )
			// {
			// 	return redirect( route('add_new_user') )->with('status', 'This phone number alrady used');
			// }
			$validator =  Validator::make($request->all(), [
				'phone'    => 'required|unique:authentications|max:30',
				'name'     => 'required',
				'password' => 'required',
			]);
		
			if ($validator->fails()) {
				return redirect( route('add_new_user') )->with('status', 'This phone number alrady used.Use different phone number');
			} else {
				$adminUser->clinic_id = session( 'clinicID' );
				$adminUser->name      = $request->name;
				$adminUser->phone     = $request->phone;
				$adminUser->email     = $request->email;
	
				$password = md5( $request->password );
				$adminUser->password     = $password;
	
				$save =  $adminUser->save();
	
				return redirect(route('add_new_user'))->with('status', 'Form Data Has Been Inserted');
			}
	
		}
		else
		{
			return redirect()->route('login_form');

		}

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrganizationSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationSetting  $organizationSetting
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationSetting $organizationSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationSetting  $organizationSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationSetting $organizationSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationSettingRequest  $request
     * @param  \App\Models\OrganizationSetting  $organizationSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {

		if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) && session( 'role' ) == 1  )
		{
			
			$clinic = OrganizationSetting::where( 'id' , session( 'clinicID' ) )->firstOrFail();

			$clinic->phone   = $request->phone;
			$clinic->email   = $request->email;
			$clinic->address = $request->address;
			$clinic->note    = $request->note;
	
			if( $request->hasfile( 'logo' ) )
			{
				$clinic_logo = $request->logo;
				$imageName = time().'_'.$clinic_logo->getClientOriginalName();
				$clinic_logo->move(public_path().'/images/', $imageName);  
				$clinic->logo =  $imageName;
			}
	
			$save =  $clinic->save();
	
			return redirect( route('organization_info' ))->with('status', 'Organization Info Record Updated Successfully');
	
		}
		else
		{
			return redirect()->route('login_form');

		}

		

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationSetting  $organizationSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationSetting $organizationSetting)
    {
        
    }
}
