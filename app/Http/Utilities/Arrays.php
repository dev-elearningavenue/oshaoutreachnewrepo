<?php

namespace App\Http\Utilities;

class Arrays
{
    public static $countries = [
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AG" => "Antigua &amp; Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia &amp; Herzegovina",
        "BW" => "Botswana",
        "BR" => "Brazil",
        "VG" => "British Virgin Islands",
        "BN" => "Brunei",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "TD" => "Chad",
        "CL" => "Chile",
        "C2" => "China",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo - Brazzaville",
        "CD" => "Congo - Kinshasa",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Côte d’Ivoire",
        "HR" => "Croatia",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GT" => "Guatemala",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HN" => "Honduras",
        "HK" => "Hong Kong SAR China",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Laos",
        "LV" => "Latvia",
        "LS" => "Lesotho",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MK" => "Macedonia",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia",
        "MD" => "Moldova",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "NO" => "Norway",
        "OM" => "Oman",
        "PW" => "Palau",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn Islands",
        "PL" => "Poland",
        "PT" => "Portugal",
        "QA" => "Qatar",
        "RE" => "Réunion",
        "RO" => "Romania",
        "RU" => "Russia",
        "RW" => "Rwanda",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "São Tomé &amp; Príncipe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "KR" => "South Korea",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SH" => "St. Helena",
        "KN" => "St. Kitts &amp; Nevis",
        "LC" => "St. Lucia",
        "PM" => "St. Pierre &amp; Miquelon",
        "VC" => "St. Vincent &amp; Grenadines",
        "SR" => "Suriname",
        "SJ" => "Svalbard &amp; Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "TW" => "Taiwan",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania",
        "TH" => "Thailand",
        "TG" => "Togo",
        "TO" => "Tonga",
        "TT" => "Trinidad &amp; Tobago",
        "TN" => "Tunisia",
        "TM" => "Turkmenistan",
        "TC" => "Turks &amp; Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UY" => "Uruguay",
        "VU" => "Vanuatu",
        "VA" => "Vatican City",
        "VE" => "Venezuela",
        "VN" => "Vietnam",
        "WF" => "Wallis &amp; Futuna",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    ];

    public static function countries()
    {
        return static::$countries;
    }

    protected static $roles = [
        1 => 'Admin',
        2 => 'Digital Marketer',
        3 => 'BDM',
        4 => 'Support',
    ];

    public static function roles()
    {
        return static::$roles;
    }

    /*protected static $states = [
        "AL" => "Alabama",
        "AK" => "Alaska",
        "AS" => "American Samoa",
        "AZ" => "Arizona",
        "AR" => "Arkansas",
        "AA" => "Armed Forces Americas",
        "AE" => "Armed Forces Europe",
        "AP" => "Armed Forces Pacific",
        "CA" => "California",
        "CO" => "Colorado",
        "CT" => "Connecticut",
        "DE" => "Delaware",
        "DC" => "District of Columbia",
        "FM" => "Federated States of Micronesia",
        "FL" => "Florida",
        "GA" => "Georgia",
        "GU" => "Guam",
        "HI" => "Hawaii",
        "ID" => "Idaho",
        "IL" => "Illinois",
        "IN" => "Indiana",
        "IA" => "Iowa",
        "KS" => "Kansas",
        "KY" => "Kentucky",
        "LA" => "Louisiana",
        "ME" => "Maine",
        "MH" => "Marshall Islands",
        "MD" => "Maryland",
        "MA" => "Massachusetts",
        "MI" => "Michigan",
        "MN" => "Minnesota",
        "MS" => "Mississippi",
        "MO" => "Missouri",
        "MT" => "Montana",
        "NE" => "Nebraska",
        "NV" => "Nevada",
        "NH" => "New Hampshire",
        "NJ" => "New Jersey",
        "NM" => "New Mexico",
        "NY" => "New York",
        "NC" => "North Carolina",
        "ND" => "North Dakota",
        "MP" => "Northern Mariana Islands",
        "OH" => "Ohio",
        "OK" => "Oklahoma",
        "OR" => "Oregon",
        "PW" => "Palau",
        "PA" => "Pennsylvania",
        "PR" => "Puerto Rico",
        "RI" => "Rhode Island",
        "SC" => "South Carolina",
        "SD" => "South Dakota",
        "TN" => "Tennessee",
        "TX" => "Texas",
        "UT" => "Utah",
        "VT" => "Vermont",
        "VI" => "Virgin Islands",
        "VA" => "Virginia",
        "WA" => "Washington",
        "WV" => "West Virginia",
        "WI" => "Wisconsin",
        "WY" => "Wyoming"
    ];*/

    protected static $states = [
        'Alabama' => 'Alabama',
        'Alaska' => 'Alaska',
        'Arizona' => 'Arizona',
        'Arkansas' => 'Arkansas',
        'California' => 'California',
        'Colorado' => 'Colorado',
        'Connecticut' => 'Connecticut',
        'Delaware' => 'Delaware',
        'District of Columbia' => 'District of Columbia',
        'Florida' => 'Florida',
        'Georgia' => 'Georgia',
        'Hawaii' => 'Hawaii',
        'Idaho' => 'Idaho',
        'Illinois' => 'Illinois',
        'Indiana' => 'Indiana',
        'Iowa' => 'Iowa',
        'Kansas' => 'Kansas',
        'Kentucky' => 'Kentucky',
        'Louisiana' => 'Louisiana',
        'Maine' => 'Maine',
        'Maryland' => 'Maryland',
        'Massachusetts' => 'Massachusetts',
        'Michigan' => 'Michigan',
        'Minnesota' => 'Minnesota',
        'Mississippi' => 'Mississippi',
        'Missouri' => 'Missouri',
        'Montana' => 'Montana',
        'Nebraska' => 'Nebraska',
        'Nevada' => 'Nevada',
        'New Hampshire' => 'New Hampshire',
        'New Jersey' => 'New Jersey',
        'New Mexico' => 'New Mexico',
        'New York' => 'New York',
        'North Carolina' => 'North Carolina',
        'North Dakota' => 'North Dakota',
        'Ohio' => 'Ohio',
        'Oklahoma' => 'Oklahoma',
        'Oregon' => 'Oregon',
        'Pennsylvania' => 'Pennsylvania',
        'Rhode Island' => 'Rhode Island',
        'South Carolina' => 'South Carolina',
        'South Dakota' => 'South Dakota',
        'Tennessee' => 'Tennessee',
        'Texas' => 'Texas',
        'Utah' => 'Utah',
        'Vermont' => 'Vermont',
        'Virginia' => 'Virginia',
        'Washington' => 'Washington',
        'West Virginia' => 'West Virginia',
        'Wisconsin' => 'Wisconsin',
        'Wyoming' => 'Wyoming',
        'American Samoa' => 'American Samoa',
        'Guam' => 'Guam',
        'Johnston Island' => 'Johnston Island',
        'Northern Mariana Islands' => 'Northern Mariana Islands',
        'Puerto Rico' => 'Puerto Rico',
        'Virgin Islands U.S.' => 'Virgin Islands U.S.',
        'Wake Island' => 'Wake Island'
    ];

    public static function states()
    {
        return static::$states;
    }

    protected static $related_courses = [
        '1' => [
            'title' => 'OSHA 10-Hour <span>Construction</span>',
            'image' => '/images/osha-10-hour-construction.webp',
        ],
        '2' => [
            'title' => 'OSHA 30-Hour <span>Construction</span>',
            'image' => '/images/osha-30-hour-construction.webp',
        ],
        '3' => [
            'title' => 'OSHA 10-Hour <span>General Industry</span>',
            'image' => '/images/osha-10-hour-general-industry.webp',
        ],
//        '4' => [
//            'title' => 'OSHA 30-Hour <span>General Industry</span>',
//            'image' => '/images/related_courses/osha-10hour-general-industry.png',
//        ],
        '5' => [
            'title' => 'NEW YORK OSHA 10 <span>Hour Construction</span>',
            'image' => '/images/new-york-osha-10-hour-construction.webp',
        ],
        '6' => [
            'title' => 'NEW YORK OSHA 30 <span>Hour Construction</span>',
            'image' => '/images/new-york-osha-30-hour-construction.webp',
        ],
        '7' => [
            'title' => 'OSHA 10 Construction<span>(Espanol)</span>',
            'image' => '/images/osha-10-construction-spanish.webp',
        ],
        '8' => [
            'title' => 'New York OSHA 10 <span>Hour General</span>',
            'image' => '/images/new-york-osha-10-hour-general.webp',
        ],
        '9' => [
            'title' => 'New York OSHA 10 Hour Construction<span>(Spanish)</span>',
            'image' => '/images/new-york-osha-10-hour-construction-spanish.webp',
        ],
        '2310' => [
            'title' => 'OSHA 30 Hour Construction <span>(Spanish)</span>',
            'image' => '/images/osha-30-hour-construction-spanish.webp',
        ],
        '2311' => [
            'title' => 'NEW YORK OSHA 30-Hour Construction <span>(Spanish)</span>',
            'image' => '/images/new-york-osha-30-hour-construction-spanish.webp',
        ],
        '2312' => [
            'title' => 'OSHA 10-Hour General Industry Spanish',
            'image' => '/images/osha-10-hour-general-industry-spanish.webp',
        ],
        '2313' => [
            'title' => 'NY OSHA 10-Hour General Industry Spanish',
            'image' => '/images/ny-osha-10-hour-general-industry-spanish.webp',
        ],
        '2314' => [
            'title' => 'OSHA 30-Hour General Industry',
            'image' => '/images/osha-30-hour-general-industry.webp',
        ],
        '2315' => [
            'title' => 'OSHA 30 Hour General Industry Spanish',
            'image' => '/images/osha-30-hour-general-industry-spanish.webp',
        ],
        '2316' => [
            'title' => 'NY OSHA 30 Hour General Industry',
            'image' => '/images/ny-osha-30-hour-general-industry.webp',
        ],
        '2317' => [
            'title' => 'OSHA 10 & 30 HOUR CONSTRUCTION',
            'image' => '/images/osha-10-and-30-hour-construction.webp',
        ],
//        '105' => [
//            'title' => 'Advanced Safety Orientation for Construction Industry',
//            'image' => '/images/related_courses/Advanced-Safety-Orientation-for-Construction-Industry.png',
//        ],
//        '107' => [
//            'title' => 'Aerial and Scissor Lifts',
//            'image' => '/images/related_courses/Aerial-and-Scissor-Lifts.png',
//        ],
//        '114' => [
//            'title' => 'Asbestos Hazards Intro, Parts 1-3',
//            'image' => '/images/related_courses/Asbestos-Hazards-Intro-Parts-1-3.png',
//        ],
//        '150' => [
//            'title' => 'Confined Space Hazards for Construction',
//            'image' => '/images/related_courses/Confined-Space-Hazards-for-Construction.png',
//        ],
//        '160' => [
//            'title' => 'Crane Safety and Basic Rigging Training Suite',
//            'image' => '/images/related_courses/Crane-Safety-and-Basic-Rigging-Training-Suite.png',
//        ],
//        '192' => [
//            'title' => 'Electrical Safety and Lockout/Tagout',
//            'image' => '/images/related_courses/Electrical-Safety-and-LockoutTagout.png',
//        ],
//        '206' => [
//            'title' => 'Fall Protection',
//            'image' => '/images/related_courses/Fall-Protection.png',
//        ],
//        '265' => [
//            'title' => 'Hazard Communication for Construction, Parts 1-2',
//            'image' => '/images/related_courses/Hazard-Communication-for-Construction-Parts-1-2.png',
//        ],
//        '312' => [
//            'title' => 'Hydrogen Sulfide Safety, Parts 1-2',
//            'image' => '/images/related_courses/Hydrogen-Sulfide-Safety-Parts-1-2.png',
//        ],
//        '342' => [
//            'title' => 'Ladder Safety for Construction, Parts 1-2',
//            'image' => '/images/related_courses/Ladder-Safety-for-Construction-Parts-1-2.png',
//        ],
//        '346' => [
//            'title' => 'Lead Poisoning',
//            'image' => '/images/related_courses/Lead-Poisoning.png',
//        ],
//        '350' => [
//            'title' => 'Load Securement for Heavy Equipment',
//            'image' => '/images/related_courses/Load-Securement-for-Heavy-Equipment.png',
//        ],
//        '351' => [
//            'title' => 'Lockout/Tagout',
//            'image' => '/images/related_courses/LockoutTagout.png',
//        ],
//        '359' => [
//            'title' => 'Materials Handling and Storage',
//            'image' => '/images/related_courses/Materials-Handling-and-Storage.png',
//        ],
//        '399' => [
//            'title' => 'Personal Protective Equipment (PPE) Parts 1-10',
//            'image' => '/images/related_courses/Personal-Protective-Equipment-PPE-Parts-1-10.png',
//        ],
//        '426' => [
//            'title' => 'Process Safety Management (PSM)',
//            'image' => '/images/related_courses/Process-Safety-Management-PSM.png',
//        ],
//        '460' => [
//            'title' => 'Slips, Trips and Falls for Construction',
//            'image' => '/images/related_courses/Slips-Trips-and-Falls-for-Construction.png',
//        ],
    ];

    public static function relatedCourses()
    {
        return static::$related_courses;
    }

}
