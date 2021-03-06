<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $countries = array(
          array('id' => 1, 'isocode' => 'AF', 'name' => 'Afghanistan', 'phonecode' => 93),
          array('id' => 2, 'isocode' => 'AL', 'name' => 'Albania', 'phonecode' => 355),
          array('id' => 3, 'isocode' => 'DZ', 'name' => 'Algeria', 'phonecode' => 213),
          array('id' => 4, 'isocode' => 'AS', 'name' => 'American Samoa', 'phonecode' => 1684),
          array('id' => 5, 'isocode' => 'AD', 'name' => 'Andorra', 'phonecode' => 376),
          array('id' => 6, 'isocode' => 'AO', 'name' => 'Angola', 'phonecode' => 244),
          array('id' => 7, 'isocode' => 'AI', 'name' => 'Anguilla', 'phonecode' => 1264),
          array('id' => 8, 'isocode' => 'AQ', 'name' => 'Antarctica', 'phonecode' => 0),
          array('id' => 9, 'isocode' => 'AG', 'name' => 'Antigua And Barbuda', 'phonecode' => 1268),
          array('id' => 10, 'isocode' => 'AR', 'name' => 'Argentina', 'phonecode' => 54),
          array('id' => 11, 'isocode' => 'AM', 'name' => 'Armenia', 'phonecode' => 374),
          array('id' => 12, 'isocode' => 'AW', 'name' => 'Aruba', 'phonecode' => 297),
          array('id' => 13, 'isocode' => 'AU', 'name' => 'Australia', 'phonecode' => 61),
          array('id' => 14, 'isocode' => 'AT', 'name' => 'Austria', 'phonecode' => 43),
          array('id' => 15, 'isocode' => 'AZ', 'name' => 'Azerbaijan', 'phonecode' => 994),
          array('id' => 16, 'isocode' => 'BS', 'name' => 'Bahamas The', 'phonecode' => 1242),
          array('id' => 17, 'isocode' => 'BH', 'name' => 'Bahrain', 'phonecode' => 973),
          array('id' => 18, 'isocode' => 'BD', 'name' => 'Bangladesh', 'phonecode' => 880),
          array('id' => 19, 'isocode' => 'BB', 'name' => 'Barbados', 'phonecode' => 1246),
          array('id' => 20, 'isocode' => 'BY', 'name' => 'Belarus', 'phonecode' => 375),
          array('id' => 21, 'isocode' => 'BE', 'name' => 'Belgium', 'phonecode' => 32),
          array('id' => 22, 'isocode' => 'BZ', 'name' => 'Belize', 'phonecode' => 501),
          array('id' => 23, 'isocode' => 'BJ', 'name' => 'Benin', 'phonecode' => 229),
          array('id' => 24, 'isocode' => 'BM', 'name' => 'Bermuda', 'phonecode' => 1441),
          array('id' => 25, 'isocode' => 'BT', 'name' => 'Bhutan', 'phonecode' => 975),
          array('id' => 26, 'isocode' => 'BO', 'name' => 'Bolivia', 'phonecode' => 591),
          array('id' => 27, 'isocode' => 'BA', 'name' => 'Bosnia and Herzegovina', 'phonecode' => 387),
          array('id' => 28, 'isocode' => 'BW', 'name' => 'Botswana', 'phonecode' => 267),
          array('id' => 29, 'isocode' => 'BV', 'name' => 'Bouvet Island', 'phonecode' => 0),
          array('id' => 30, 'isocode' => 'BR', 'name' => 'Brazil', 'phonecode' => 55),
          array('id' => 31, 'isocode' => 'IO', 'name' => 'British Indian Ocean Territory', 'phonecode' => 246),
          array('id' => 32, 'isocode' => 'BN', 'name' => 'Brunei', 'phonecode' => 673),
          array('id' => 33, 'isocode' => 'BG', 'name' => 'Bulgaria', 'phonecode' => 359),
          array('id' => 34, 'isocode' => 'BF', 'name' => 'Burkina Faso', 'phonecode' => 226),
          array('id' => 35, 'isocode' => 'BI', 'name' => 'Burundi', 'phonecode' => 257),
          array('id' => 36, 'isocode' => 'KH', 'name' => 'Cambodia', 'phonecode' => 855),
          array('id' => 37, 'isocode' => 'CM', 'name' => 'Cameroon', 'phonecode' => 237),
          array('id' => 38, 'isocode' => 'CA', 'name' => 'Canada', 'phonecode' => 1),
          array('id' => 39, 'isocode' => 'CV', 'name' => 'Cape Verde', 'phonecode' => 238),
          array('id' => 40, 'isocode' => 'KY', 'name' => 'Cayman Islands', 'phonecode' => 1345),
          array('id' => 41, 'isocode' => 'CF', 'name' => 'Central African Republic', 'phonecode' => 236),
          array('id' => 42, 'isocode' => 'TD', 'name' => 'Chad', 'phonecode' => 235),
          array('id' => 43, 'isocode' => 'CL', 'name' => 'Chile', 'phonecode' => 56),
          array('id' => 44, 'isocode' => 'CN', 'name' => 'China', 'phonecode' => 86),
          array('id' => 45, 'isocode' => 'CX', 'name' => 'Christmas Island', 'phonecode' => 61),
          array('id' => 46, 'isocode' => 'CC', 'name' => 'Cocos (Keeling) Islands', 'phonecode' => 672),
          array('id' => 47, 'isocode' => 'CO', 'name' => 'Colombia', 'phonecode' => 57),
          array('id' => 48, 'isocode' => 'KM', 'name' => 'Comoros', 'phonecode' => 269),
          array('id' => 49, 'isocode' => 'CG', 'name' => 'Republic Of The Congo', 'phonecode' => 242),
          array('id' => 50, 'isocode' => 'CD', 'name' => 'Democratic Republic Of The Congo', 'phonecode' => 242),
          array('id' => 51, 'isocode' => 'CK', 'name' => 'Cook Islands', 'phonecode' => 682),
          array('id' => 52, 'isocode' => 'CR', 'name' => 'Costa Rica', 'phonecode' => 506),
          array('id' => 53, 'isocode' => 'CI', 'name' => "Cote D''Ivoire (Ivory Coast)", 'phonecode' => 225),
          array('id' => 54, 'isocode' => 'HR', 'name' => 'Croatia (Hrvatska)', 'phonecode' => 385),
          array('id' => 55, 'isocode' => 'CU', 'name' => 'Cuba', 'phonecode' => 53),
          array('id' => 56, 'isocode' => 'CY', 'name' => 'Cyprus', 'phonecode' => 357),
          array('id' => 57, 'isocode' => 'CZ', 'name' => 'Czech Republic', 'phonecode' => 420),
          array('id' => 58, 'isocode' => 'DK', 'name' => 'Denmark', 'phonecode' => 45),
          array('id' => 59, 'isocode' => 'DJ', 'name' => 'Djibouti', 'phonecode' => 253),
          array('id' => 60, 'isocode' => 'DM', 'name' => 'Dominica', 'phonecode' => 1767),
          array('id' => 61, 'isocode' => 'DO', 'name' => 'Dominican Republic', 'phonecode' => 1809),
          array('id' => 62, 'isocode' => 'TP', 'name' => 'East Timor', 'phonecode' => 670),
          array('id' => 63, 'isocode' => 'EC', 'name' => 'Ecuador', 'phonecode' => 593),
          array('id' => 64, 'isocode' => 'EG', 'name' => 'Egypt', 'phonecode' => 20),
          array('id' => 65, 'isocode' => 'SV', 'name' => 'El Salvador', 'phonecode' => 503),
          array('id' => 66, 'isocode' => 'GQ', 'name' => 'Equatorial Guinea', 'phonecode' => 240),
          array('id' => 67, 'isocode' => 'ER', 'name' => 'Eritrea', 'phonecode' => 291),
          array('id' => 68, 'isocode' => 'EE', 'name' => 'Estonia', 'phonecode' => 372),
          array('id' => 69, 'isocode' => 'ET', 'name' => 'Ethiopia', 'phonecode' => 251),
          array('id' => 70, 'isocode' => 'XA', 'name' => 'External Territories of Australia', 'phonecode' => 61),
          array('id' => 71, 'isocode' => 'FK', 'name' => 'Falkland Islands', 'phonecode' => 500),
          array('id' => 72, 'isocode' => 'FO', 'name' => 'Faroe Islands', 'phonecode' => 298),
          array('id' => 73, 'isocode' => 'FJ', 'name' => 'Fiji Islands', 'phonecode' => 679),
          array('id' => 74, 'isocode' => 'FI', 'name' => 'Finland', 'phonecode' => 358),
          array('id' => 75, 'isocode' => 'FR', 'name' => 'France', 'phonecode' => 33),
          array('id' => 76, 'isocode' => 'GF', 'name' => 'French Guiana', 'phonecode' => 594),
          array('id' => 77, 'isocode' => 'PF', 'name' => 'French Polynesia', 'phonecode' => 689),
          array('id' => 78, 'isocode' => 'TF', 'name' => 'French Southern Territories', 'phonecode' => 0),
          array('id' => 79, 'isocode' => 'GA', 'name' => 'Gabon', 'phonecode' => 241),
          array('id' => 80, 'isocode' => 'GM', 'name' => 'Gambia The', 'phonecode' => 220),
          array('id' => 81, 'isocode' => 'GE', 'name' => 'Georgia', 'phonecode' => 995),
          array('id' => 82, 'isocode' => 'DE', 'name' => 'Germany', 'phonecode' => 49),
          array('id' => 83, 'isocode' => 'GH', 'name' => 'Ghana', 'phonecode' => 233),
          array('id' => 84, 'isocode' => 'GI', 'name' => 'Gibraltar', 'phonecode' => 350),
          array('id' => 85, 'isocode' => 'GR', 'name' => 'Greece', 'phonecode' => 30),
          array('id' => 86, 'isocode' => 'GL', 'name' => 'Greenland', 'phonecode' => 299),
          array('id' => 87, 'isocode' => 'GD', 'name' => 'Grenada', 'phonecode' => 1473),
          array('id' => 88, 'isocode' => 'GP', 'name' => 'Guadeloupe', 'phonecode' => 590),
          array('id' => 89, 'isocode' => 'GU', 'name' => 'Guam', 'phonecode' => 1671),
          array('id' => 90, 'isocode' => 'GT', 'name' => 'Guatemala', 'phonecode' => 502),
          array('id' => 91, 'isocode' => 'XU', 'name' => 'Guernsey and Alderney', 'phonecode' => 44),
          array('id' => 92, 'isocode' => 'GN', 'name' => 'Guinea', 'phonecode' => 224),
          array('id' => 93, 'isocode' => 'GW', 'name' => 'Guinea-Bissau', 'phonecode' => 245),
          array('id' => 94, 'isocode' => 'GY', 'name' => 'Guyana', 'phonecode' => 592),
          array('id' => 95, 'isocode' => 'HT', 'name' => 'Haiti', 'phonecode' => 509),
          array('id' => 96, 'isocode' => 'HM', 'name' => 'Heard and McDonald Islands', 'phonecode' => 0),
          array('id' => 97, 'isocode' => 'HN', 'name' => 'Honduras', 'phonecode' => 504),
          array('id' => 98, 'isocode' => 'HK', 'name' => 'Hong Kong S.A.R.', 'phonecode' => 852),
          array('id' => 99, 'isocode' => 'HU', 'name' => 'Hungary', 'phonecode' => 36),
          array('id' => 100, 'isocode' => 'IS', 'name' => 'Iceland', 'phonecode' => 354),
          array('id' => 101, 'isocode' => 'IN', 'name' => 'India', 'phonecode' => 91),
          array('id' => 102, 'isocode' => 'ID', 'name' => 'Indonesia', 'phonecode' => 62),
          array('id' => 103, 'isocode' => 'IR', 'name' => 'Iran', 'phonecode' => 98),
          array('id' => 104, 'isocode' => 'IQ', 'name' => 'Iraq', 'phonecode' => 964),
          array('id' => 105, 'isocode' => 'IE', 'name' => 'Ireland', 'phonecode' => 353),
          array('id' => 106, 'isocode' => 'IL', 'name' => 'Israel', 'phonecode' => 972),
          array('id' => 107, 'isocode' => 'IT', 'name' => 'Italy', 'phonecode' => 39),
          array('id' => 108, 'isocode' => 'JM', 'name' => 'Jamaica', 'phonecode' => 1876),
          array('id' => 109, 'isocode' => 'JP', 'name' => 'Japan', 'phonecode' => 81),
          array('id' => 110, 'isocode' => 'XJ', 'name' => 'Jersey', 'phonecode' => 44),
          array('id' => 111, 'isocode' => 'JO', 'name' => 'Jordan', 'phonecode' => 962),
          array('id' => 112, 'isocode' => 'KZ', 'name' => 'Kazakhstan', 'phonecode' => 7),
          array('id' => 113, 'isocode' => 'KE', 'name' => 'Kenya', 'phonecode' => 254),
          array('id' => 114, 'isocode' => 'KI', 'name' => 'Kiribati', 'phonecode' => 686),
          array('id' => 115, 'isocode' => 'KP', 'name' => 'Korea North', 'phonecode' => 850),
          array('id' => 116, 'isocode' => 'KR', 'name' => 'Korea South', 'phonecode' => 82),
          array('id' => 117, 'isocode' => 'KW', 'name' => 'Kuwait', 'phonecode' => 965),
          array('id' => 118, 'isocode' => 'KG', 'name' => 'Kyrgyzstan', 'phonecode' => 996),
          array('id' => 119, 'isocode' => 'LA', 'name' => 'Laos', 'phonecode' => 856),
          array('id' => 120, 'isocode' => 'LV', 'name' => 'Latvia', 'phonecode' => 371),
          array('id' => 121, 'isocode' => 'LB', 'name' => 'Lebanon', 'phonecode' => 961),
          array('id' => 122, 'isocode' => 'LS', 'name' => 'Lesotho', 'phonecode' => 266),
          array('id' => 123, 'isocode' => 'LR', 'name' => 'Liberia', 'phonecode' => 231),
          array('id' => 124, 'isocode' => 'LY', 'name' => 'Libya', 'phonecode' => 218),
          array('id' => 125, 'isocode' => 'LI', 'name' => 'Liechtenstein', 'phonecode' => 423),
          array('id' => 126, 'isocode' => 'LT', 'name' => 'Lithuania', 'phonecode' => 370),
          array('id' => 127, 'isocode' => 'LU', 'name' => 'Luxembourg', 'phonecode' => 352),
          array('id' => 128, 'isocode' => 'MO', 'name' => 'Macau S.A.R.', 'phonecode' => 853),
          array('id' => 129, 'isocode' => 'MK', 'name' => 'Macedonia', 'phonecode' => 389),
          array('id' => 130, 'isocode' => 'MG', 'name' => 'Madagascar', 'phonecode' => 261),
          array('id' => 131, 'isocode' => 'MW', 'name' => 'Malawi', 'phonecode' => 265),
          array('id' => 132, 'isocode' => 'MY', 'name' => 'Malaysia', 'phonecode' => 60),
          array('id' => 133, 'isocode' => 'MV', 'name' => 'Maldives', 'phonecode' => 960),
          array('id' => 134, 'isocode' => 'ML', 'name' => 'Mali', 'phonecode' => 223),
          array('id' => 135, 'isocode' => 'MT', 'name' => 'Malta', 'phonecode' => 356),
          array('id' => 136, 'isocode' => 'XM', 'name' => 'Man (Isle of)', 'phonecode' => 44),
          array('id' => 137, 'isocode' => 'MH', 'name' => 'Marshall Islands', 'phonecode' => 692),
          array('id' => 138, 'isocode' => 'MQ', 'name' => 'Martinique', 'phonecode' => 596),
          array('id' => 139, 'isocode' => 'MR', 'name' => 'Mauritania', 'phonecode' => 222),
          array('id' => 140, 'isocode' => 'MU', 'name' => 'Mauritius', 'phonecode' => 230),
          array('id' => 141, 'isocode' => 'YT', 'name' => 'Mayotte', 'phonecode' => 269),
          array('id' => 142, 'isocode' => 'MX', 'name' => 'Mexico', 'phonecode' => 52),
          array('id' => 143, 'isocode' => 'FM', 'name' => 'Micronesia', 'phonecode' => 691),
          array('id' => 144, 'isocode' => 'MD', 'name' => 'Moldova', 'phonecode' => 373),
          array('id' => 145, 'isocode' => 'MC', 'name' => 'Monaco', 'phonecode' => 377),
          array('id' => 146, 'isocode' => 'MN', 'name' => 'Mongolia', 'phonecode' => 976),
          array('id' => 147, 'isocode' => 'MS', 'name' => 'Montserrat', 'phonecode' => 1664),
          array('id' => 148, 'isocode' => 'MA', 'name' => 'Morocco', 'phonecode' => 212),
          array('id' => 149, 'isocode' => 'MZ', 'name' => 'Mozambique', 'phonecode' => 258),
          array('id' => 150, 'isocode' => 'MM', 'name' => 'Myanmar', 'phonecode' => 95),
          array('id' => 151, 'isocode' => 'NA', 'name' => 'Namibia', 'phonecode' => 264),
          array('id' => 152, 'isocode' => 'NR', 'name' => 'Nauru', 'phonecode' => 674),
          array('id' => 153, 'isocode' => 'NP', 'name' => 'Nepal', 'phonecode' => 977),
          array('id' => 154, 'isocode' => 'AN', 'name' => 'Netherlands Antilles', 'phonecode' => 599),
          array('id' => 155, 'isocode' => 'NL', 'name' => 'Netherlands The', 'phonecode' => 31),
          array('id' => 156, 'isocode' => 'NC', 'name' => 'New Caledonia', 'phonecode' => 687),
          array('id' => 157, 'isocode' => 'NZ', 'name' => 'New Zealand', 'phonecode' => 64),
          array('id' => 158, 'isocode' => 'NI', 'name' => 'Nicaragua', 'phonecode' => 505),
          array('id' => 159, 'isocode' => 'NE', 'name' => 'Niger', 'phonecode' => 227),
          array('id' => 160, 'isocode' => 'NG', 'name' => 'Nigeria', 'phonecode' => 234),
          array('id' => 161, 'isocode' => 'NU', 'name' => 'Niue', 'phonecode' => 683),
          array('id' => 162, 'isocode' => 'NF', 'name' => 'Norfolk Island', 'phonecode' => 672),
          array('id' => 163, 'isocode' => 'MP', 'name' => 'Northern Mariana Islands', 'phonecode' => 1670),
          array('id' => 164, 'isocode' => 'NO', 'name' => 'Norway', 'phonecode' => 47),
          array('id' => 165, 'isocode' => 'OM', 'name' => 'Oman', 'phonecode' => 968),
          array('id' => 166, 'isocode' => 'PK', 'name' => 'Pakistan', 'phonecode' => 92),
          array('id' => 167, 'isocode' => 'PW', 'name' => 'Palau', 'phonecode' => 680),
          array('id' => 168, 'isocode' => 'PS', 'name' => 'Palestinian Territory Occupied', 'phonecode' => 970),
          array('id' => 169, 'isocode' => 'PA', 'name' => 'Panama', 'phonecode' => 507),
          array('id' => 170, 'isocode' => 'PG', 'name' => 'Papua new Guinea', 'phonecode' => 675),
          array('id' => 171, 'isocode' => 'PY', 'name' => 'Paraguay', 'phonecode' => 595),
          array('id' => 172, 'isocode' => 'PE', 'name' => 'Peru', 'phonecode' => 51),
          array('id' => 173, 'isocode' => 'PH', 'name' => 'Philippines', 'phonecode' => 63),
          array('id' => 174, 'isocode' => 'PN', 'name' => 'Pitcairn Island', 'phonecode' => 0),
          array('id' => 175, 'isocode' => 'PL', 'name' => 'Poland', 'phonecode' => 48),
          array('id' => 176, 'isocode' => 'PT', 'name' => 'Portugal', 'phonecode' => 351),
          array('id' => 177, 'isocode' => 'PR', 'name' => 'Puerto Rico', 'phonecode' => 1787),
          array('id' => 178, 'isocode' => 'QA', 'name' => 'Qatar', 'phonecode' => 974),
          array('id' => 179, 'isocode' => 'RE', 'name' => 'Reunion', 'phonecode' => 262),
          array('id' => 180, 'isocode' => 'RO', 'name' => 'Romania', 'phonecode' => 40),
          array('id' => 181, 'isocode' => 'RU', 'name' => 'Russia', 'phonecode' => 70),
          array('id' => 182, 'isocode' => 'RW', 'name' => 'Rwanda', 'phonecode' => 250),
          array('id' => 183, 'isocode' => 'SH', 'name' => 'Saint Helena', 'phonecode' => 290),
          array('id' => 184, 'isocode' => 'KN', 'name' => 'Saint Kitts And Nevis', 'phonecode' => 1869),
          array('id' => 185, 'isocode' => 'LC', 'name' => 'Saint Lucia', 'phonecode' => 1758),
          array('id' => 186, 'isocode' => 'PM', 'name' => 'Saint Pierre and Miquelon', 'phonecode' => 508),
          array('id' => 187, 'isocode' => 'VC', 'name' => 'Saint Vincent And The Grenadines', 'phonecode' => 1784),
          array('id' => 188, 'isocode' => 'WS', 'name' => 'Samoa', 'phonecode' => 684),
          array('id' => 189, 'isocode' => 'SM', 'name' => 'San Marino', 'phonecode' => 378),
          array('id' => 190, 'isocode' => 'ST', 'name' => 'Sao Tome and Principe', 'phonecode' => 239),
          array('id' => 191, 'isocode' => 'SA', 'name' => 'Saudi Arabia', 'phonecode' => 966),
          array('id' => 192, 'isocode' => 'SN', 'name' => 'Senegal', 'phonecode' => 221),
          array('id' => 193, 'isocode' => 'RS', 'name' => 'Serbia', 'phonecode' => 381),
          array('id' => 194, 'isocode' => 'SC', 'name' => 'Seychelles', 'phonecode' => 248),
          array('id' => 195, 'isocode' => 'SL', 'name' => 'Sierra Leone', 'phonecode' => 232),
          array('id' => 196, 'isocode' => 'SG', 'name' => 'Singapore', 'phonecode' => 65),
          array('id' => 197, 'isocode' => 'SK', 'name' => 'Slovakia', 'phonecode' => 421),
          array('id' => 198, 'isocode' => 'SI', 'name' => 'Slovenia', 'phonecode' => 386),
          array('id' => 199, 'isocode' => 'XG', 'name' => 'Smaller Territories of the UK', 'phonecode' => 44),
          array('id' => 200, 'isocode' => 'SB', 'name' => 'Solomon Islands', 'phonecode' => 677),
          array('id' => 201, 'isocode' => 'SO', 'name' => 'Somalia', 'phonecode' => 252),
          array('id' => 202, 'isocode' => 'ZA', 'name' => 'South Africa', 'phonecode' => 27),
          array('id' => 203, 'isocode' => 'GS', 'name' => 'South Georgia', 'phonecode' => 0),
          array('id' => 204, 'isocode' => 'SS', 'name' => 'South Sudan', 'phonecode' => 211),
          array('id' => 205, 'isocode' => 'ES', 'name' => 'Spain', 'phonecode' => 34),
          array('id' => 206, 'isocode' => 'LK', 'name' => 'Sri Lanka', 'phonecode' => 94),
          array('id' => 207, 'isocode' => 'SD', 'name' => 'Sudan', 'phonecode' => 249),
          array('id' => 208, 'isocode' => 'SR', 'name' => 'Suriname', 'phonecode' => 597),
          array('id' => 209, 'isocode' => 'SJ', 'name' => 'Svalbard And Jan Mayen Islands', 'phonecode' => 47),
          array('id' => 210, 'isocode' => 'SZ', 'name' => 'Swaziland', 'phonecode' => 268),
          array('id' => 211, 'isocode' => 'SE', 'name' => 'Sweden', 'phonecode' => 46),
          array('id' => 212, 'isocode' => 'CH', 'name' => 'Switzerland', 'phonecode' => 41),
          array('id' => 213, 'isocode' => 'SY', 'name' => 'Syria', 'phonecode' => 963),
          array('id' => 214, 'isocode' => 'TW', 'name' => 'Taiwan', 'phonecode' => 886),
          array('id' => 215, 'isocode' => 'TJ', 'name' => 'Tajikistan', 'phonecode' => 992),
          array('id' => 216, 'isocode' => 'TZ', 'name' => 'Tanzania', 'phonecode' => 255),
          array('id' => 217, 'isocode' => 'TH', 'name' => 'Thailand', 'phonecode' => 66),
          array('id' => 218, 'isocode' => 'TG', 'name' => 'Togo', 'phonecode' => 228),
          array('id' => 219, 'isocode' => 'TK', 'name' => 'Tokelau', 'phonecode' => 690),
          array('id' => 220, 'isocode' => 'TO', 'name' => 'Tonga', 'phonecode' => 676),
          array('id' => 221, 'isocode' => 'TT', 'name' => 'Trinidad And Tobago', 'phonecode' => 1868),
          array('id' => 222, 'isocode' => 'TN', 'name' => 'Tunisia', 'phonecode' => 216),
          array('id' => 223, 'isocode' => 'TR', 'name' => 'Turkey', 'phonecode' => 90),
          array('id' => 224, 'isocode' => 'TM', 'name' => 'Turkmenistan', 'phonecode' => 7370),
          array('id' => 225, 'isocode' => 'TC', 'name' => 'Turks And Caicos Islands', 'phonecode' => 1649),
          array('id' => 226, 'isocode' => 'TV', 'name' => 'Tuvalu', 'phonecode' => 688),
          array('id' => 227, 'isocode' => 'UG', 'name' => 'Uganda', 'phonecode' => 256),
          array('id' => 228, 'isocode' => 'UA', 'name' => 'Ukraine', 'phonecode' => 380),
          array('id' => 229, 'isocode' => 'AE', 'name' => 'United Arab Emirates', 'phonecode' => 971),
          array('id' => 230, 'isocode' => 'GB', 'name' => 'United Kingdom', 'phonecode' => 44),
          array('id' => 231, 'isocode' => 'US', 'name' => 'United States', 'phonecode' => 1),
          array('id' => 232, 'isocode' => 'UM', 'name' => 'United States Minor Outlying Islands', 'phonecode' => 1),
          array('id' => 233, 'isocode' => 'UY', 'name' => 'Uruguay', 'phonecode' => 598),
          array('id' => 234, 'isocode' => 'UZ', 'name' => 'Uzbekistan', 'phonecode' => 998),
          array('id' => 235, 'isocode' => 'VU', 'name' => 'Vanuatu', 'phonecode' => 678),
          array('id' => 236, 'isocode' => 'VA', 'name' => 'Vatican City State (Holy See)', 'phonecode' => 39),
          array('id' => 237, 'isocode' => 'VE', 'name' => 'Venezuela', 'phonecode' => 58),
          array('id' => 238, 'isocode' => 'VN', 'name' => 'Vietnam', 'phonecode' => 84),
          array('id' => 239, 'isocode' => 'VG', 'name' => 'Virgin Islands (British)', 'phonecode' => 1284),
          array('id' => 240, 'isocode' => 'VI', 'name' => 'Virgin Islands (US)', 'phonecode' => 1340),
          array('id' => 241, 'isocode' => 'WF', 'name' => 'Wallis And Futuna Islands', 'phonecode' => 681),
          array('id' => 242, 'isocode' => 'EH', 'name' => 'Western Sahara', 'phonecode' => 212),
          array('id' => 243, 'isocode' => 'YE', 'name' => 'Yemen', 'phonecode' => 967),
          array('id' => 244, 'isocode' => 'YU', 'name' => 'Yugoslavia', 'phonecode' => 38),
          array('id' => 245, 'isocode' => 'ZM', 'name' => 'Zambia', 'phonecode' => 260),
          array('id' => 246, 'isocode' => 'ZW', 'name' => 'Zimbabwe', 'phonecode' => 263)
        );

        DB::table('countries')->insert($countries);

    }
}
