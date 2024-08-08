<?php

namespace App\Http\Controllers\Front\Auth;

use App\Events\Resend;
use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class VerificationController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    /**
     * @param Request $request
     * @return mixed
     */
    public function verify(Request $request)
    {
        $token = $request->hash;
        $id = $request->id;

        $customer = Customer::where('id', $id)->where('verify_token', $token)->first();

        if ($customer) {
            $customer->verify_token = null;
            $customer->email_verified_at = date('Y-m-d');
            $customer->save();

            return redirect()->route('home.index')
                ->with('message', __('Email Verified Success'))
                ->with('message-alert', 'success');
        } else {
            $customer = Customer::where('id', $id)->first();
            if (!$customer)
                return redirect()->route('home.index')
                    ->with('message', __('Email Verified Error'))
                    ->with('message-alert', 'error');

            if (!$customer->hasVerifiedEmail()) {
                event(new Resend($customer));
            }else{
                return redirect()->route('home.index')
                    ->with('message', __('Your email already Verified'))
                    ->with('message-alert', 'error');
            }
        }
    }
}
