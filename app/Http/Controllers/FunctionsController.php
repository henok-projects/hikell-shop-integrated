<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Site;
use App\Models\Plan;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Validation\Rules\Exists;

class FunctionsController extends Controller
{
	public static function generateID($id)
	{
		$rule = 'string|unique:' . str_replace('_id', '', $id) . "s";

		$value = Str::random(15);

		do {
			$value = Str::random(15);

			$validator = Validator::make(
				[$id => $value],
				[$id => $rule]
			);
		} while ($validator->fails());

		return $value;
	}

	public static function countries()
	{
        $path = storage_path() . "/json/countries.json";
        $countries = json_decode(file_get_contents($path), true);
        asort($countries);
        return $countries;
	}

	public static function phone_codes()
	{
        $path = storage_path() . "/json/phone_codes.json";
        $codes = json_decode(file_get_contents($path), true);
        ksort($codes);
        return $codes;
	}

	public static function country_phone_code($country_code)
	{
        $path = storage_path() . "/json/phone_codes.json";
        $codes = json_decode(file_get_contents($path), true);
        return $codes[$country_code];
	}

	static function formatSizeUnits($bytes)
	{
		if ($bytes >= 1073741824) {
			$bytes = number_format($bytes / 1073741824, 2) . ' GB';
		} elseif ($bytes >= 1048576) {
			$bytes = number_format($bytes / 1048576, 2) . ' MB';
		} elseif ($bytes >= 1024) {
			$bytes = number_format($bytes / 1024, 2) . ' KB';
		} elseif ($bytes > 1) {
			$bytes = $bytes . ' bytes';
		} elseif ($bytes == 1) {
			$bytes = $bytes . ' byte';
		} else {
			$bytes = '0 bytes';
		}

		return $bytes;
	}

	static function updateUploadSize($uid, $size,$type)
	{
		$user = User::where('user_id', $uid)->first();
		if ($user) {
			if($type == 'add'){
				$new = (float) $user->upload_size + (float) $size;
				$user->update([
					'upload_size' => $new
				]);
			}
			else if('substract'){
				$new = (float) $user->upload_size - (float) $size;
				$user->update([
					'upload_size' => $new
				]);
			}
			return true;
		}
		return false;
	}


	static function canReuse(Site $site)
	{
		if ($site->service == "apply-ek") return true; // EK site have unlimitted access to reuse?

		$reuseAmount = -1;
		if ($site->plan->first()->plan == "basic")
			$reuseAmount = 5;
		elseif ($site->plan->first()->plan == "standard")
			$reuseAmount = 10;
		elseif ($site->plan->first()->plan == "premium")
			$reuseAmount = 15;

		if (($reuseAmount > 0) && ($site->videos()->whereColumn('user_id', '!=', 'original_owner')->count() > $reuseAmount))
			return false;

		return true;
	}

	public static function isConnectAllowed($user)
	{
		$expressAllowedCountries = array('Australia', 'Austria', 'Belgium', 'Bulgaria', 'Canada', 'Cyprus', 'the Czech Republic', 'Denmark', 'Estonia', 'Finland', 'France', 'Germany', 'Greece', 'Hong Kong', 'Hungary', 'Ireland', 'Italy', 'Japan', 'Latvia', 'Lithuania', 'Luxembourg', 'Malta', 'Mexico', 'the Netherlands', 'New Zealand', 'Norway', 'Poland', 'Portugal', 'Romania', 'Singapore', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Switzerland', 'the United Arab Emirates', 'the United Kingdom', 'the United States');

		// if(in_array(static::countries($user->country), $expressAllowedCountries));
	}

	// static function getSitePlan(Site $site)
	// {
	// 	if (!$site) return null;
	// 	$payment = Payment::findOrFail($site->payment_id);
	// 	return Plan::findOrFail($payment->plan_id);
	// }
}