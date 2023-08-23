<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ' :attribute қабылдануы керек.',
    'accepted_if' => ':other мен :value мәні тең болғанда :attribute қабылдануы керек.',
    'active_url' => ' :attribute жарамды URL мекенжайы емес.',
    'after' => ' :attribute мәні :date күнінен кейінгі күн болуы керек.',
    'after_or_equal' => ' :attribute мәні :date күнінен кейінгі күн немесе тең болуы керек.',
    'alpha' => ' :attribute тек әріптерден тұруы керек.',
    'alpha_dash' => ' :attribute тек әріптерден, сандардан және сызықшалардан тұруы керек.',
    'alpha_num' => ' :attribute тек әріптерден және сандардан тұруы керек.',
    'array' => ' :attribute жиым болуы керек.',
    'ascii' => ' :attribute тек бір байтты әріптік-сандық таңбалар мен белгілерден болуы керек.',
    'before' => ' :attribute мәні :date күнінен дейінгі күн болуы керек.',
    'before_or_equal' => ' :attribute мәні :date күнінен дейінгі күн немесе тең болуы керек.',
    'between' => [
        'array' => ' :attribute жиымы :min және :max аралығындағы элементтерден тұруы керек.',
        'file' => ' :attribute көлемі :min және :max килобайт аралығында болуы керек.',
        'numeric' => ' :attribute мәні :min және :max аралығында болуы керек.',
        'string' => ' :attribute тармағы :min және :max аралығындағы таңбалардан тұруы керек.',
    ],
    'boolean' => ' :attribute жолы шын немесе жалған мән болуы керек.',
    'confirmed' => ' :attribute растауы сәйкес емес.',
    'current_password' => 'Құпия сөз дұрыс емес.',
    'date' => ' :attribute жарамды күн емес.',
    'date_equals' => ' :attribute мәні :date күнімен тең болуы керек.',
    'date_format' => ' :attribute пішімі :format пішіміне сай емес.',
    'decimal' => ' :attribute :decimal ондық таңбалар болуы керек.',
    'declined' => ' :attribute қабылданбауы керек.',
    'declined_if' => ' :other :value мәніне тең болғанда :attribute қабылданбауы керек.',
    'different' => ' :attribute және :other әр түрлі болуы керек.',
    'digits' => ' :attribute мәні :digits сан болуы керек.',
    'digits_between' => ' :attribute мәні :min және :max аралығындағы сан болуы керек.',
    'dimensions' => ' :attribute сурет өлшемі жарамсыз.',
    'distinct' => ' :attribute жолында қосарланған мән бар.',
    'doesnt_end_with' => ' :attribute осы :values символдармен аяқталмауы керек.',
    'doesnt_start_with' => ' :attribute мына :values символдармен басталмауы керек.',
    'email' => ' :attribute жарамды электрондық пошта мекенжайы болуы керек.',
    'ends_with' => ' :attribute осы :values мәндердің біреуімен аяқталуы керек',
    'enum' => ' таңдалған :attribute жарамсыз.',
    'exists' => ' таңдалған :attribute жарамсыз.',
    'file' => ' :attribute файл болуы тиіс.',
    'filled' => ' :attribute жолы толтырылуы керек.',
    'gt' => [
        'array' => ' :attribute мәні :value элементтерден үлкен болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан үлкен болуы керек.',
        'numeric' => ' :attribute мәні :value үлкен болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан үлкен болуы керек.',
    ],
    'gte' => [
        'array' => ' :attribute мәні :value элементтерден үлкен немесе тең болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан үлкен немесе тең болуы керек.',
        'numeric' => ' :attribute мәні :value үлкен немесе тең болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан үлкен немесе тең болуы керек.',
    ],
    'image' => ' :attribute кескін болуы керек.',
    'in' => ' таңдалған :attribute жарамсыз.',
    'in_array' => ' :attribute жолы :other ішінде жоқ.',
    'integer' => ' :attribute бүтін сан болуы керек.',
    'ip' => ' :attribute жарамды IP мекенжайы болуы керек.',
    'ipv4' => ' :attribute жарамды IPv4 мекенжайы болуы керек.',
    'ipv6' => ' :attribute жарамды IPv6 мекенжайы болуы керек.',
    'json' => ' :attribute жарамды JSON тармағы болуы керек.',
    'lowercase' => ' :attribute кіші әріптерден болуы керек.',
    'lt' => [
        'array' => ' :attribute мәні :value элементтерден кіші болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан кіші болуы керек.',
        'numeric' => ' :attribute мәні :value кіші болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан кіші болуы керек.',
    ],
    'lte' => [
        'array' => ' :attribute мәні :value элементтерден кіші немесе тең болуы керек.',
        'file' => ' :attribute файл өлшемі :value килобайттан кіші неменсе тең болуы керек.',
        'numeric' => ' :attribute мәні :value кіші немесе тең болуы керек.',
        'string' => ' :attribute мәні :value таңбалардан кіші немесе тең болуы керек.',
    ],
    'mac_address' => ' :attribute жарамды MAC мекенжайы болуы керек.',
    'max' => [
        'array' => ' :attribute жиымының құрамы :max элементтен аспауы керек.',
        'file' => ' :attribute мәні :max килобайттан көп болмауы керек.',
        'numeric' => ' :attribute мәні :max мәнінен көп болмауы керек.',
        'string' => ' :attribute тармағы :max таңбадан ұзын болмауы керек.',
    ],
    'max_digits' => ':attribute :max санынан артық болмауы керек.',
    'mimes' => ' :attribute мынадай файл түрі болуы керек: :values.',
    'mimetypes' => ' :attribute мынадай файл түрі болуы керек: :values.',
    'min' => [
        'array' => ' :attribute кемінде :min элементтен тұруы керек.',
        'file' => ' :attribute көлемі кемінде :min килобайт болуы керек.',
        'numeric' => ' :attribute кемінде :min болуы керек.',
        'string' => ' :attribute кемінде :min таңбадан тұруы керек.',
    ],
    'min_digits' => ' :attribute :max санынан кем болмауы керек.',
    'multiple_of' => ' :attribute :value мәнінің еселігі болуы керек.',
    'not_in' => ' таңдалған :attribute жарамсыз.',
    'not_regex' => ' таңдалған :attribute форматы жарамсыз.',
    'numeric' => ' :attribute сан болуы керек.',
    'password' => [
        'letters' => ' :attribute кемінде бір әріп болуы керек.',
        'mixed' => ' :attribute кемінде бір бас әріп және бір кіші әріп болуы керек.',
        'numbers' => ' :attribute кемінде бір сан болуы керек.',
        'symbols' => ' :attribute кемінде бір символ болуы керек.',
        'uncompromised' => 'Берілген :attribute деректердің жария болуынан пайда болды. Басқа :attribute таңдаңыз.',
    ],
    'present' => ' :attribute болуы керек.',
    'prohibited' => ' :attribute өрісіне тыйым салынады.',
    'prohibited_if' => ' :other :value мәніне тең болғанда :attribute өрісіне тыйым салынады.',
    'prohibited_unless' => ' :other :values мәндерінің ішінде болмағанда, :attribute өрісіне тыйым салынады.',
    'prohibits' => ' :attribute өрісінің :other мәнінің болуына тыйым салынады.',
    'regex' => ' :attribute пішімі жарамсыз.',
    'required' => ' :attribute жолы толтырылуы керек.',
    'required_array_keys' => ' :attribute өрісінде :values мәндеріне тиісті жазбалар болуы керек.',
    'required_if' => ' :attribute жолы :other мәні :value болған кезде толтырылуы керек.',
    'required_if_accepted' => ' :other қабылданғанда :attribute өрісінің болуы міндетті.',
    'required_unless' => ' :attribute жолы :other мәні :values ішінде болмағанда толтырылуы керек.',
    'required_with' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_with_all' => ' :attribute жолы :values болғанда толтырылуы керек.',
    'required_without' => ' :attribute жолы :values болмағанда толтырылуы керек.',
    'required_without_all' => ' :attribute жолы ешбір :values болмағанда толтырылуы керек.',
    'same' => ' :attribute және :other сәйкес болуы керек.',
    'size' => [
        'array' => ' :attribute жиымы :size элементтен тұруы керек.',
        'file' => ' :attribute көлемі :size килобайт болуы керек.',
        'numeric' => ' :attribute көлемі :size болуы керек.',
        'string' => ' :attribute тармағы :size таңбадан тұруы керек.',
    ],
    'starts_with' => ' :attribute келесі мәндердің біреуінен басталуы керек: :values',
    'string' => ' :attribute тармақ болуы керек.',
    'timezone' => ' :attribute жарамды аймақ болуы керек.',
    'unique' => ' :attribute бұрын алынған.',
    'uploaded' => ' :attribute жүктелуі сәтсіз аяқталды.',
    'uppercase' => ' :attribute бас әріптерден болуы керек.',
    'url' => ' :attribute пішімі жарамсыз.',
    'ulid' => ' :attribute мәні жарамды ULID болуы керек.',
    'uuid' => ' :attribute мәні жарамды UUID болуы керек.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'басқа хабар',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
