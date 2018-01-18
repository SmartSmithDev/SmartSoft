<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create countries Table
        Schema::create('countries', function(Blueprint $table)
        {
            $table->integer('id')->primary();
            $table->string('name', 30);
            $table->string('country_code', 50);
        });

        //Insert into Countries Table
        DB::table('countries')->insert(
          array(
            array(
              'id'=>'1' , 
              'country_code'=>'AF' , 
              'name'=>'Afghanistan' , 
            ),

            array(
              'id'=>'2' , 
              'country_code'=>'AL' , 
              'name'=>'Albania' , 
            ),

            array(
              'id'=>'3' , 
              'country_code'=>'DZ' , 
              'name'=>'Algeria' , 
            ),

            array(
              'id'=>'4' , 
              'country_code'=>'DS' , 
              'name'=>'American Samoa' , 
            ),

            array(
              'id'=>'5' , 
              'country_code'=>'AD' , 
              'name'=>'Andorra' , 
            ),

            array(
              'id'=>'6' , 
              'country_code'=>'AO' , 
              'name'=>'Angola' , 
            ),

            array(
              'id'=>'7' , 
              'country_code'=>'AI' , 
              'name'=>'Anguilla' , 
            ),

            array(
              'id'=>'8' , 
              'country_code'=>'AQ' , 
              'name'=>'Antarctica' , 
            ),

            array(
              'id'=>'9' , 
              'country_code'=>'AG' , 
              'name'=>'Antigua and Barbuda' , 
            ),

            array(
              'id'=>'10' , 
              'country_code'=>'AR' , 
              'name'=>'Argentina' , 
            ),

            array(
              'id'=>'11' , 
              'country_code'=>'AM' , 
              'name'=>'Armenia' , 
            ),

            array(
              'id'=>'12' , 
              'country_code'=>'AW' , 
              'name'=>'Aruba' , 
            ),

            array(
              'id'=>'13' , 
              'country_code'=>'AU' , 
              'name'=>'Australia' , 
            ),

            array(
              'id'=>'14' , 
              'country_code'=>'AT' , 
              'name'=>'Austria' , 
            ),

            array(
              'id'=>'15' , 
              'country_code'=>'AZ' , 
              'name'=>'Azerbaijan' , 
            ),

            array(
              'id'=>'16' , 
              'country_code'=>'BS' , 
              'name'=>'Bahamas' , 
            ),

            array(
              'id'=>'17' , 
              'country_code'=>'BH' , 
              'name'=>'Bahrain' , 
            ),

            array(
              'id'=>'18' , 
              'country_code'=>'BD' , 
              'name'=>'Bangladesh' , 
            ),

            array(
              'id'=>'19' , 
              'country_code'=>'BB' , 
              'name'=>'Barbados' , 
            ),

            array(
              'id'=>'20' , 
              'country_code'=>'BY' , 
              'name'=>'Belarus' , 
            ),

            array(
              'id'=>'21' , 
              'country_code'=>'BE' , 
              'name'=>'Belgium' , 
            ),

            array(
              'id'=>'22' , 
              'country_code'=>'BZ' , 
              'name'=>'Belize' , 
            ),

            array(
              'id'=>'23' , 
              'country_code'=>'BJ' , 
              'name'=>'Benin' , 
            ),

            array(
              'id'=>'24' , 
              'country_code'=>'BM' , 
              'name'=>'Bermuda' , 
            ),

            array(
              'id'=>'25' , 
              'country_code'=>'BT' , 
              'name'=>'Bhutan' , 
            ),

            array(
              'id'=>'26' , 
              'country_code'=>'BO' , 
              'name'=>'Bolivia' , 
            ),

            array(
              'id'=>'27' , 
              'country_code'=>'BA' , 
              'name'=>'Bosnia and Herzegovina' , 
            ),

            array(
              'id'=>'28' , 
              'country_code'=>'BW' , 
              'name'=>'Botswana' , 
            ),

            array(
              'id'=>'29' , 
              'country_code'=>'BV' , 
              'name'=>'Bouvet Island' , 
            ),

            array(
              'id'=>'30' , 
              'country_code'=>'BR' , 
              'name'=>'Brazil' , 
            ),

            array(
              'id'=>'31' , 
              'country_code'=>'IO' , 
              'name'=>'British Indian Ocean Territory' , 
            ),

            array(
              'id'=>'32' , 
              'country_code'=>'BN' , 
              'name'=>'Brunei Darussalam' , 
            ),

            array(
              'id'=>'33' , 
              'country_code'=>'BG' , 
              'name'=>'Bulgaria' , 
            ),

            array(
              'id'=>'34' , 
              'country_code'=>'BF' , 
              'name'=>'Burkina Faso' , 
            ),

            array(
              'id'=>'35' , 
              'country_code'=>'BI' , 
              'name'=>'Burundi' , 
            ),

            array(
              'id'=>'36' , 
              'country_code'=>'KH' , 
              'name'=>'Cambodia' , 
            ),

            array(
              'id'=>'37' , 
              'country_code'=>'CM' , 
              'name'=>'Cameroon' , 
            ),

            array(
              'id'=>'38' , 
              'country_code'=>'CA' , 
              'name'=>'Canada' , 
            ),

            array(
              'id'=>'39' , 
              'country_code'=>'CV' , 
              'name'=>'Cape Verde' , 
            ),

            array(
              'id'=>'40' , 
              'country_code'=>'KY' , 
              'name'=>'Cayman Islands' , 
            ),

            array(
              'id'=>'41' , 
              'country_code'=>'CF' , 
              'name'=>'Central African Republic' , 
            ),

            array(
              'id'=>'42' , 
              'country_code'=>'TD' , 
              'name'=>'Chad' , 
            ),

            array(
              'id'=>'43' , 
              'country_code'=>'CL' , 
              'name'=>'Chile' , 
            ),

            array(
              'id'=>'44' , 
              'country_code'=>'CN' , 
              'name'=>'China' , 
            ),

            array(
              'id'=>'45' , 
              'country_code'=>'CX' , 
              'name'=>'Christmas Island' , 
            ),

            array(
              'id'=>'46' , 
              'country_code'=>'CC' , 
              'name'=>'Cocos (Keeling) Islands' , 
            ),

            array(
              'id'=>'47' , 
              'country_code'=>'CO' , 
              'name'=>'Colombia' , 
            ),

            array(
              'id'=>'48' , 
              'country_code'=>'KM' , 
              'name'=>'Comoros' , 
            ),

            array(
              'id'=>'49' , 
              'country_code'=>'CG' , 
              'name'=>'Congo' , 
            ),

            array(
              'id'=>'50' , 
              'country_code'=>'CK' , 
              'name'=>'Cook Islands' , 
            ),

            array(
              'id'=>'51' , 
              'country_code'=>'CR' , 
              'name'=>'Costa Rica' , 
            ),

            array(
              'id'=>'52' , 
              'country_code'=>'HR' , 
              'name'=>'Croatia (Hrvatska)' , 
            ),

            array(
              'id'=>'53' , 
              'country_code'=>'CU' , 
              'name'=>'Cuba' , 
            ),

            array(
              'id'=>'54' , 
              'country_code'=>'CY' , 
              'name'=>'Cyprus' , 
            ),

            array(
              'id'=>'55' , 
              'country_code'=>'CZ' , 
              'name'=>'Czech Republic' , 
            ),

            array(
              'id'=>'56' , 
              'country_code'=>'DK' , 
              'name'=>'Denmark' , 
            ),

            array(
              'id'=>'57' , 
              'country_code'=>'DJ' , 
              'name'=>'Djibouti' , 
            ),

            array(
              'id'=>'58' , 
              'country_code'=>'DM' , 
              'name'=>'Dominica' , 
            ),

            array(
              'id'=>'59' , 
              'country_code'=>'DO' , 
              'name'=>'Dominican Republic' , 
            ),

            array(
              'id'=>'60' , 
              'country_code'=>'TP' , 
              'name'=>'East Timor' , 
            ),

            array(
              'id'=>'61' , 
              'country_code'=>'EC' , 
              'name'=>'Ecuador' , 
            ),

            array(
              'id'=>'62' , 
              'country_code'=>'EG' , 
              'name'=>'Egypt' , 
            ),

            array(
              'id'=>'63' , 
              'country_code'=>'SV' , 
              'name'=>'El Salvador' , 
            ),

            array(
              'id'=>'64' , 
              'country_code'=>'GQ' , 
              'name'=>'Equatorial Guinea' , 
            ),

            array(
              'id'=>'65' , 
              'country_code'=>'ER' , 
              'name'=>'Eritrea' , 
            ),

            array(
              'id'=>'66' , 
              'country_code'=>'EE' , 
              'name'=>'Estonia' , 
            ),

            array(
              'id'=>'67' , 
              'country_code'=>'ET' , 
              'name'=>'Ethiopia' , 
            ),

            array(
              'id'=>'68' , 
              'country_code'=>'FK' , 
              'name'=>'Falkland Islands (Malvinas)' , 
            ),

            array(
              'id'=>'69' , 
              'country_code'=>'FO' , 
              'name'=>'Faroe Islands' , 
            ),

            array(
              'id'=>'70' , 
              'country_code'=>'FJ' , 
              'name'=>'Fiji' , 
            ),

            array(
              'id'=>'71' , 
              'country_code'=>'FI' , 
              'name'=>'Finland' , 
            ),

            array(
              'id'=>'72' , 
              'country_code'=>'FR' , 
              'name'=>'France' , 
            ),

            array(
              'id'=>'73' , 
              'country_code'=>'FX' , 
              'name'=>'France, Metropolitan' , 
            ),

            array(
              'id'=>'74' , 
              'country_code'=>'GF' , 
              'name'=>'French Guiana' , 
            ),

            array(
              'id'=>'75' , 
              'country_code'=>'PF' , 
              'name'=>'French Polynesia' , 
            ),

            array(
              'id'=>'76' , 
              'country_code'=>'TF' , 
              'name'=>'French Southern Territories' , 
            ),

            array(
              'id'=>'77' , 
              'country_code'=>'GA' , 
              'name'=>'Gabon' , 
            ),

            array(
              'id'=>'78' , 
              'country_code'=>'GM' , 
              'name'=>'Gambia' , 
            ),

            array(
              'id'=>'79' , 
              'country_code'=>'GE' , 
              'name'=>'Georgia' , 
            ),

            array(
              'id'=>'80' , 
              'country_code'=>'DE' , 
              'name'=>'Germany' , 
            ),

            array(
              'id'=>'81' , 
              'country_code'=>'GH' , 
              'name'=>'Ghana' , 
            ),

            array(
              'id'=>'82' , 
              'country_code'=>'GI' , 
              'name'=>'Gibraltar' , 
            ),

            array(
              'id'=>'83' , 
              'country_code'=>'GK' , 
              'name'=>'Guernsey' , 
            ),

            array(
              'id'=>'84' , 
              'country_code'=>'GR' , 
              'name'=>'Greece' , 
            ),

            array(
              'id'=>'85' , 
              'country_code'=>'GL' , 
              'name'=>'Greenland' , 
            ),

            array(
              'id'=>'86' , 
              'country_code'=>'GD' , 
              'name'=>'Grenada' , 
            ),

            array(
              'id'=>'87' , 
              'country_code'=>'GP' , 
              'name'=>'Guadeloupe' , 
            ),

            array(
              'id'=>'88' , 
              'country_code'=>'GU' , 
              'name'=>'Guam' , 
            ),

            array(
              'id'=>'89' , 
              'country_code'=>'GT' , 
              'name'=>'Guatemala' , 
            ),

            array(
              'id'=>'90' , 
              'country_code'=>'GN' , 
              'name'=>'Guinea' , 
            ),

            array(
              'id'=>'91' , 
              'country_code'=>'GW' , 
              'name'=>'Guinea-Bissau' , 
            ),

            array(
              'id'=>'92' , 
              'country_code'=>'GY' , 
              'name'=>'Guyana' , 
            ),

            array(
              'id'=>'93' , 
              'country_code'=>'HT' , 
              'name'=>'Haiti' , 
            ),

            array(
              'id'=>'94' , 
              'country_code'=>'HM' , 
              'name'=>'Heard and Mc Donald Islands' , 
            ),

            array(
              'id'=>'95' , 
              'country_code'=>'HN' , 
              'name'=>'Honduras' , 
            ),

            array(
              'id'=>'96' , 
              'country_code'=>'HK' , 
              'name'=>'Hong Kong' , 
            ),

            array(
              'id'=>'97' , 
              'country_code'=>'HU' , 
              'name'=>'Hungary' , 
            ),

            array(
              'id'=>'98' , 
              'country_code'=>'IS' , 
              'name'=>'Iceland' , 
            ),

            array(
              'id'=>'99' , 
              'country_code'=>'IN' , 
              'name'=>'India' , 
            ),

            array(
              'id'=>'100' , 
              'country_code'=>'IM' , 
              'name'=>'Isle of Man' , 
            ),

            array(
              'id'=>'101' , 
              'country_code'=>'ID' , 
              'name'=>'Indonesia' , 
            ),

            array(
              'id'=>'102' , 
              'country_code'=>'IR' , 
              'name'=>'Iran (Islamic Republic of)' , 
            ),

            array(
              'id'=>'103' , 
              'country_code'=>'IQ' , 
              'name'=>'Iraq' , 
            ),

            array(
              'id'=>'104' , 
              'country_code'=>'IE' , 
              'name'=>'Ireland' , 
            ),

            array(
              'id'=>'105' , 
              'country_code'=>'IL' , 
              'name'=>'Israel' , 
            ),

            array(
              'id'=>'106' , 
              'country_code'=>'IT' , 
              'name'=>'Italy' , 
            ),

            array(
              'id'=>'107' , 
              'country_code'=>'CI' , 
              'name'=>'Ivory Coast' , 
            ),

            array(
              'id'=>'108' , 
              'country_code'=>'JE' , 
              'name'=>'Jersey' , 
            ),

            array(
              'id'=>'109' , 
              'country_code'=>'JM' , 
              'name'=>'Jamaica' , 
            ),

            array(
              'id'=>'110' , 
              'country_code'=>'JP' , 
              'name'=>'Japan' , 
            ),

            array(
              'id'=>'111' , 
              'country_code'=>'JO' , 
              'name'=>'Jordan' , 
            ),

            array(
              'id'=>'112' , 
              'country_code'=>'KZ' , 
              'name'=>'Kazakhstan' , 
            ),

            array(
              'id'=>'113' , 
              'country_code'=>'KE' , 
              'name'=>'Kenya' , 
            ),

            array(
              'id'=>'114' , 
              'country_code'=>'KI' , 
              'name'=>'Kiribati' , 
            ),

            array(
              'id'=>'115' , 
              'country_code'=>'KP' , 
              'name'=>'Korea, Democratic People\'s Republic of' , 
            ),

            array(
              'id'=>'116' , 
              'country_code'=>'KR' , 
              'name'=>'Korea, Republic of' , 
            ),

            array(
              'id'=>'117' , 
              'country_code'=>'XK' , 
              'name'=>'Kosovo' , 
            ),

            array(
              'id'=>'118' , 
              'country_code'=>'KW' , 
              'name'=>'Kuwait' , 
            ),

            array(
              'id'=>'119' , 
              'country_code'=>'KG' , 
              'name'=>'Kyrgyzstan' , 
            ),

            array(
              'id'=>'120' , 
              'country_code'=>'LA' , 
              'name'=>'Lao People\'s Democratic Republic' , 
            ),

            array(
              'id'=>'121' , 
              'country_code'=>'LV' , 
              'name'=>'Latvia' , 
            ),

            array(
              'id'=>'122' , 
              'country_code'=>'LB' , 
              'name'=>'Lebanon' , 
            ),

            array(
              'id'=>'123' , 
              'country_code'=>'LS' , 
              'name'=>'Lesotho' , 
            ),

            array(
              'id'=>'124' , 
              'country_code'=>'LR' , 
              'name'=>'Liberia' , 
            ),

            array(
              'id'=>'125' , 
              'country_code'=>'LY' , 
              'name'=>'Libyan Arab Jamahiriya' , 
            ),

            array(
              'id'=>'126' , 
              'country_code'=>'LI' , 
              'name'=>'Liechtenstein' , 
            ),

            array(
              'id'=>'127' , 
              'country_code'=>'LT' , 
              'name'=>'Lithuania' , 
            ),

            array(
              'id'=>'128' , 
              'country_code'=>'LU' , 
              'name'=>'Luxembourg' , 
            ),

            array(
              'id'=>'129' , 
              'country_code'=>'MO' , 
              'name'=>'Macau' , 
            ),

            array(
              'id'=>'130' , 
              'country_code'=>'MK' , 
              'name'=>'Macedonia' , 
            ),

            array(
              'id'=>'131' , 
              'country_code'=>'MG' , 
              'name'=>'Madagascar' , 
            ),

            array(
              'id'=>'132' , 
              'country_code'=>'MW' , 
              'name'=>'Malawi' , 
            ),

            array(
              'id'=>'133' , 
              'country_code'=>'MY' , 
              'name'=>'Malaysia' , 
            ),

            array(
              'id'=>'134' , 
              'country_code'=>'MV' , 
              'name'=>'Maldives' , 
            ),

            array(
              'id'=>'135' , 
              'country_code'=>'ML' , 
              'name'=>'Mali' , 
            ),

            array(
              'id'=>'136' , 
              'country_code'=>'MT' , 
              'name'=>'Malta' , 
            ),

            array(
              'id'=>'137' , 
              'country_code'=>'MH' , 
              'name'=>'Marshall Islands' , 
            ),

            array(
              'id'=>'138' , 
              'country_code'=>'MQ' , 
              'name'=>'Martinique' , 
            ),

            array(
              'id'=>'139' , 
              'country_code'=>'MR' , 
              'name'=>'Mauritania' , 
            ),

            array(
              'id'=>'140' , 
              'country_code'=>'MU' , 
              'name'=>'Mauritius' , 
            ),

            array(
              'id'=>'141' , 
              'country_code'=>'TY' , 
              'name'=>'Mayotte' , 
            ),

            array(
              'id'=>'142' , 
              'country_code'=>'MX' , 
              'name'=>'Mexico' , 
            ),

            array(
              'id'=>'143' , 
              'country_code'=>'FM' , 
              'name'=>'Micronesia, Federated States of' , 
            ),

            array(
              'id'=>'144' , 
              'country_code'=>'MD' , 
              'name'=>'Moldova, Republic of' , 
            ),

            array(
              'id'=>'145' , 
              'country_code'=>'MC' , 
              'name'=>'Monaco' , 
            ),

            array(
              'id'=>'146' , 
              'country_code'=>'MN' , 
              'name'=>'Mongolia' , 
            ),

            array(
              'id'=>'147' , 
              'country_code'=>'ME' , 
              'name'=>'Montenegro' , 
            ),

            array(
              'id'=>'148' , 
              'country_code'=>'MS' , 
              'name'=>'Montserrat' , 
            ),

            array(
              'id'=>'149' , 
              'country_code'=>'MA' , 
              'name'=>'Morocco' , 
            ),

            array(
              'id'=>'150' , 
              'country_code'=>'MZ' , 
              'name'=>'Mozambique' , 
            ),

            array(
              'id'=>'151' , 
              'country_code'=>'MM' , 
              'name'=>'Myanmar' , 
            ),

            array(
              'id'=>'152' , 
              'country_code'=>'NA' , 
              'name'=>'Namibia' , 
            ),

            array(
              'id'=>'153' , 
              'country_code'=>'NR' , 
              'name'=>'Nauru' , 
            ),

            array(
              'id'=>'154' , 
              'country_code'=>'NP' , 
              'name'=>'Nepal' , 
            ),

            array(
              'id'=>'155' , 
              'country_code'=>'NL' , 
              'name'=>'Netherlands' , 
            ),

            array(
              'id'=>'156' , 
              'country_code'=>'AN' , 
              'name'=>'Netherlands Antilles' , 
            ),

            array(
              'id'=>'157' , 
              'country_code'=>'NC' , 
              'name'=>'New Caledonia' , 
            ),

            array(
              'id'=>'158' , 
              'country_code'=>'NZ' , 
              'name'=>'New Zealand' , 
            ),

            array(
              'id'=>'159' , 
              'country_code'=>'NI' , 
              'name'=>'Nicaragua' , 
            ),

            array(
              'id'=>'160' , 
              'country_code'=>'NE' , 
              'name'=>'Niger' , 
            ),

            array(
              'id'=>'161' , 
              'country_code'=>'NG' , 
              'name'=>'Nigeria' , 
            ),

            array(
              'id'=>'162' , 
              'country_code'=>'NU' , 
              'name'=>'Niue' , 
            ),

            array(
              'id'=>'163' , 
              'country_code'=>'NF' , 
              'name'=>'Norfolk Island' , 
            ),

            array(
              'id'=>'164' , 
              'country_code'=>'MP' , 
              'name'=>'Northern Mariana Islands' , 
            ),

            array(
              'id'=>'165' , 
              'country_code'=>'NO' , 
              'name'=>'Norway' , 
            ),

            array(
              'id'=>'166' , 
              'country_code'=>'OM' , 
              'name'=>'Oman' , 
            ),

            array(
              'id'=>'167' , 
              'country_code'=>'PK' , 
              'name'=>'Pakistan' , 
            ),

            array(
              'id'=>'168' , 
              'country_code'=>'PW' , 
              'name'=>'Palau' , 
            ),

            array(
              'id'=>'169' , 
              'country_code'=>'PS' , 
              'name'=>'Palestine' , 
            ),

            array(
              'id'=>'170' , 
              'country_code'=>'PA' , 
              'name'=>'Panama' , 
            ),

            array(
              'id'=>'171' , 
              'country_code'=>'PG' , 
              'name'=>'Papua New Guinea' , 
            ),

            array(
              'id'=>'172' , 
              'country_code'=>'PY' , 
              'name'=>'Paraguay' , 
            ),

            array(
              'id'=>'173' , 
              'country_code'=>'PE' , 
              'name'=>'Peru' , 
            ),

            array(
              'id'=>'174' , 
              'country_code'=>'PH' , 
              'name'=>'Philippines' , 
            ),

            array(
              'id'=>'175' , 
              'country_code'=>'PN' , 
              'name'=>'Pitcairn' , 
            ),

            array(
              'id'=>'176' , 
              'country_code'=>'PL' , 
              'name'=>'Poland' , 
            ),

            array(
              'id'=>'177' , 
              'country_code'=>'PT' , 
              'name'=>'Portugal' , 
            ),

            array(
              'id'=>'178' , 
              'country_code'=>'PR' , 
              'name'=>'Puerto Rico' , 
            ),

            array(
              'id'=>'179' , 
              'country_code'=>'QA' , 
              'name'=>'Qatar' , 
            ),

            array(
              'id'=>'180' , 
              'country_code'=>'RE' , 
              'name'=>'Reunion' , 
            ),

            array(
              'id'=>'181' , 
              'country_code'=>'RO' , 
              'name'=>'Romania' , 
            ),

            array(
              'id'=>'182' , 
              'country_code'=>'RU' , 
              'name'=>'Russian Federation' , 
            ),

            array(
              'id'=>'183' , 
              'country_code'=>'RW' , 
              'name'=>'Rwanda' , 
            ),

            array(
              'id'=>'184' , 
              'country_code'=>'KN' , 
              'name'=>'Saint Kitts and Nevis' , 
            ),

            array(
              'id'=>'185' , 
              'country_code'=>'LC' , 
              'name'=>'Saint Lucia' , 
            ),

            array(
              'id'=>'186' , 
              'country_code'=>'VC' , 
              'name'=>'Saint Vincent and the Grenadines' , 
            ),

            array(
              'id'=>'187' , 
              'country_code'=>'WS' , 
              'name'=>'Samoa' , 
            ),

            array(
              'id'=>'188' , 
              'country_code'=>'SM' , 
              'name'=>'San Marino' , 
            ),

            array(
              'id'=>'189' , 
              'country_code'=>'ST' , 
              'name'=>'Sao Tome and Principe' , 
            ),

            array(
              'id'=>'190' , 
              'country_code'=>'SA' , 
              'name'=>'Saudi Arabia' , 
            ),

            array(
              'id'=>'191' , 
              'country_code'=>'SN' , 
              'name'=>'Senegal' , 
            ),

            array(
              'id'=>'192' , 
              'country_code'=>'RS' , 
              'name'=>'Serbia' , 
            ),

            array(
              'id'=>'193' , 
              'country_code'=>'SC' , 
              'name'=>'Seychelles' , 
            ),

            array(
              'id'=>'194' , 
              'country_code'=>'SL' , 
              'name'=>'Sierra Leone' , 
            ),

            array(
              'id'=>'195' , 
              'country_code'=>'SG' , 
              'name'=>'Singapore' , 
            ),

            array(
              'id'=>'196' , 
              'country_code'=>'SK' , 
              'name'=>'Slovakia' , 
            ),

            array(
              'id'=>'197' , 
              'country_code'=>'SI' , 
              'name'=>'Slovenia' , 
            ),

            array(
              'id'=>'198' , 
              'country_code'=>'SB' , 
              'name'=>'Solomon Islands' , 
            ),

            array(
              'id'=>'199' , 
              'country_code'=>'SO' , 
              'name'=>'Somalia' , 
            ),

            array(
              'id'=>'200' , 
              'country_code'=>'ZA' , 
              'name'=>'South Africa' , 
            ),

            array(
              'id'=>'201' , 
              'country_code'=>'GS' , 
              'name'=>'South Georgia South Sandwich Islands' , 
            ),

            array(
              'id'=>'202' , 
              'country_code'=>'ES' , 
              'name'=>'Spain' , 
            ),

            array(
              'id'=>'203' , 
              'country_code'=>'LK' , 
              'name'=>'Sri Lanka' , 
            ),

            array(
              'id'=>'204' , 
              'country_code'=>'SH' , 
              'name'=>'St. Helena' , 
            ),

            array(
              'id'=>'205' , 
              'country_code'=>'PM' , 
              'name'=>'St. Pierre and Miquelon' , 
            ),

            array(
              'id'=>'206' , 
              'country_code'=>'SD' , 
              'name'=>'Sudan' , 
            ),

            array(
              'id'=>'207' , 
              'country_code'=>'SR' , 
              'name'=>'Suriname' , 
            ),

            array(
              'id'=>'208' , 
              'country_code'=>'SJ' , 
              'name'=>'Svalbard and Jan Mayen Islands' , 
            ),

            array(
              'id'=>'209' , 
              'country_code'=>'SZ' , 
              'name'=>'Swaziland' , 
            ),

            array(
              'id'=>'210' , 
              'country_code'=>'SE' , 
              'name'=>'Sweden' , 
            ),

            array(
              'id'=>'211' , 
              'country_code'=>'CH' , 
              'name'=>'Switzerland' , 
            ),

            array(
              'id'=>'212' , 
              'country_code'=>'SY' , 
              'name'=>'Syrian Arab Republic' , 
            ),

            array(
              'id'=>'213' , 
              'country_code'=>'TW' , 
              'name'=>'Taiwan' , 
            ),

            array(
              'id'=>'214' , 
              'country_code'=>'TJ' , 
              'name'=>'Tajikistan' , 
            ),

            array(
              'id'=>'215' , 
              'country_code'=>'TZ' , 
              'name'=>'Tanzania, United Republic of' , 
            ),

            array(
              'id'=>'216' , 
              'country_code'=>'TH' , 
              'name'=>'Thailand' , 
            ),

            array(
              'id'=>'217' , 
              'country_code'=>'TG' , 
              'name'=>'Togo' , 
            ),

            array(
              'id'=>'218' , 
              'country_code'=>'TK' , 
              'name'=>'Tokelau' , 
            ),

            array(
              'id'=>'219' , 
              'country_code'=>'TO' , 
              'name'=>'Tonga' , 
            ),

            array(
              'id'=>'220' , 
              'country_code'=>'TT' , 
              'name'=>'Trinidad and Tobago' , 
            ),

            array(
              'id'=>'221' , 
              'country_code'=>'TN' , 
              'name'=>'Tunisia' , 
            ),

            array(
              'id'=>'222' , 
              'country_code'=>'TR' , 
              'name'=>'Turkey' , 
            ),

            array(
              'id'=>'223' , 
              'country_code'=>'TM' , 
              'name'=>'Turkmenistan' , 
            ),

            array(
              'id'=>'224' , 
              'country_code'=>'TC' , 
              'name'=>'Turks and Caicos Islands' , 
            ),

            array(
              'id'=>'225' , 
              'country_code'=>'TV' , 
              'name'=>'Tuvalu' , 
            ),

            array(
              'id'=>'226' , 
              'country_code'=>'UG' , 
              'name'=>'Uganda' , 
            ),

            array(
              'id'=>'227' , 
              'country_code'=>'UA' , 
              'name'=>'Ukraine' , 
            ),

            array(
              'id'=>'228' , 
              'country_code'=>'AE' , 
              'name'=>'United Arab Emirates' , 
            ),

            array(
              'id'=>'229' , 
              'country_code'=>'GB' , 
              'name'=>'United Kingdom' , 
            ),

            array(
              'id'=>'230' , 
              'country_code'=>'US' , 
              'name'=>'United States' , 
            ),

            array(
              'id'=>'231' , 
              'country_code'=>'UM' , 
              'name'=>'United States minor outlying islands' , 
            ),

            array(
              'id'=>'232' , 
              'country_code'=>'UY' , 
              'name'=>'Uruguay' , 
            ),

            array(
              'id'=>'233' , 
              'country_code'=>'UZ' , 
              'name'=>'Uzbekistan' , 
            ),

            array(
              'id'=>'234' , 
              'country_code'=>'VU' , 
              'name'=>'Vanuatu' , 
            ),

            array(
              'id'=>'235' , 
              'country_code'=>'VA' , 
              'name'=>'Vatican City State' , 
            ),

            array(
              'id'=>'236' , 
              'country_code'=>'VE' , 
              'name'=>'Venezuela' , 
            ),

            array(
              'id'=>'237' , 
              'country_code'=>'VN' , 
              'name'=>'Vietnam' , 
            ),

            array(
              'id'=>'238' , 
              'country_code'=>'VG' , 
              'name'=>'Virgin Islands (British)' , 
            ),

            array(
              'id'=>'239' , 
              'country_code'=>'VI' , 
              'name'=>'Virgin Islands (U.S.)' , 
            ),

            array(
              'id'=>'240' , 
              'country_code'=>'WF' , 
              'name'=>'Wallis and Futuna Islands' , 
            ),

            array(
              'id'=>'241' , 
              'country_code'=>'EH' , 
              'name'=>'Western Sahara' , 
            ),

            array(
              'id'=>'242' , 
              'country_code'=>'YE' , 
              'name'=>'Yemen' , 
            ),

            array(
              'id'=>'243' , 
              'country_code'=>'ZR' , 
              'name'=>'Zaire' , 
            ),

            array(
              'id'=>'244' , 
              'country_code'=>'ZM' , 
              'name'=>'Zambia' , 
            ),

            array(
              'id'=>'245' , 
              'country_code'=>'ZW' , 
              'name'=>'Zimbabwe' , 
            ),
          )
        );
      }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop sales Table
        Schema::drop('countries');
    }
}
