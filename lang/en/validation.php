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

    'accepted' => ':attributeは承認されなければなりません。',
    'accepted_if' => ':otherが:valueの時、:attributeは承認されなければなりません。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeは:date以降の日付でなければなりません。',
    'after_or_equal' => ':attributeは:dateと同日かそれ以降の日付でなければなりません。',
    'alpha' => ':attributeは文字のみを含む必要があります。',
    'alpha_dash' => ':attributeは文字、数字、ダッシュ、アンダースコアのみを含む必要があります。',
    'alpha_num' => ':attributeは文字と数字のみを含む必要があります。',
    'array' => ':attributeは配列でなければなりません。',
    'ascii' => ':attributeは、単一バイトの英数字と記号のみを含む必要があります。',
    'before' => ':attributeは:dateより前の日付でなければなりません。',
    'before_or_equal' => ':attributeは:dateと同日かそれ以前の日付でなければなりません。',
    'between' => [
        'array' => ':attributeは:minから:max個の項目を含む必要があります。',
        'file' => ':attributeは:minから:maxキロバイトでなければなりません。',
        'numeric' => ':attributeは:minから:maxの間でなければなりません。',
        'string' => ':attributeは:minから:max文字でなければなりません。',
    ],
    'boolean' => ':attributeフィールドはtrueまたはfalseでなければなりません。',
    'confirmed' => ':attributeの確認が一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと同じ日付でなければなりません。',
    'date_format' => ':attributeは:formatの形式と一致しません。',
    'decimal' => ':attributeは:decimal桁の小数点以下を持つ必要があります。',
    'declined' => ':attributeは拒否されなければなりません。',
    'declined_if' => ':otherが:valueの時、:attributeは拒否されなければなりません。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁でなければなりません。',
    'digits_between' => ':attributeは:minから:max桁の間でなければなりません。',
    'dimensions' => ':attributeの画像寸法が無効です。',
    'distinct' => ':attributeフィールドに重複する値があります。',
    'doesnt_end_with' => ':attributeは次のいずれかで終わってはいけません: :values。',
    'doesnt_start_with' => ':attributeは次のいずれかで始まってはいけません: :values。',
    'email' => ':attributeは有効なメールアドレスでなければなりません。',
    'ends_with' => ':attributeは次のいずれかで終わらなければなりません: :values。',
    'enum' => '選択した:attributeは無効です。',
    'exists' => '選択した:attributeは無効です。',
    'file' => ':attributeはファイルでなければなりません。',
    'filled' => ':attributeフィールドは値を持っていなければなりません。',
    'gt' => [
        'array' => ':attributeは:value個より多くの項目を含まなければなりません。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'string' => ':attributeは:value文字より多くなければなりません。',
    ],
    'gte' => [
        'array' => ':attributeは:value個以上の項目を含まなければなりません。',
        'file' => ':attributeは:valueキロバイト以上でなければなりません。',
        'numeric' => ':attributeは:value以上でなければなりません。',
        'string' => ':attributeは:value文字以上でなければなりません。',
    ],
    'image' => ':attributeは画像でなければなりません。',
    'in' => '選択した:attributeは無効です。',
    'in_array' => ':attributeフィールドは:otherに存在しません。',
    'integer' => ':attributeは整数でなければなりません。',
    'ip' => ':attributeは有効なIPアドレスでなければなりません。',
    'ipv4' => ':attributeは有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attributeは有効なIPv6アドレスでなければなりません。',
    'json' => ':attributeは有効なJSON文字列でなければなりません。',
    'lowercase' => ':attributeは小文字でなければなりません。',
    'lt' => [
        'array' => ':attributeは:value個より少ない項目を含まなければなりません。',
        'file' => ':attributeは:valueキロバイトより小さくなければなりません。',
        'numeric' => ':attributeは:valueより小さくなければなりません。',
        'string' => ':attributeは:value文字より少なくなければなりません。',
    ],
    'lte' => [
        'array' => ':attributeは:value個以下の項目を含まなければなりません。',
        'file' => ':attributeは:valueキロバイト以下でなければなりません。',
        'numeric' => ':attributeは:value以下でなければなりません。',
        'string' => ':attributeは:value文字以下でなければなりません。',
    ],
    'mac_address' => ':attributeは有効なMACアドレスでなければなりません。',
    'max' => [
        'array' => ':attributeは:max個以上の項目を含んではいけません。',
        'file' => ':attributeは:maxキロバイト以上であってはなりません。',
        'numeric' => ':attributeは:max以上であってはなりません。',
        'string' => ':attributeは:max文字以上であってはなりません。',
    ],
    'max_digits' => ':attributeは:max桁以上であってはなりません。',
    'mimes' => ':attributeは次のタイプのファイルでなければなりません: :values。',
    'mimetypes' => ':attributeは次のタイプのファイルでなければなりません: :values。',
    'min' => [
        'array' => ':attributeは少なくとも:min個の項目を含まなければなりません。',
        'file' => ':attributeは少なくとも:minキロバイトでなければなりません。',
        'numeric' => ':attributeは少なくとも:minでなければなりません。',
        'string' => ':attributeは少なくとも:min文字でなければなりません。',
    ],
    'min_digits' => ':attributeは少なくとも:min桁でなければなりません。',
    'missing' => ':attributeフィールドは存在してはいけません。',
    'missing_if' => ':otherが:valueの時、:attributeフィールドは存在していません。',
    'missing_unless' => ':otherが:valueでない限り、:attributeフィールドは存在していません。',
    'missing_with' => ':valuesが存在する場合、:attributeフィールドは存在していません。',
    'missing_with_all' => ':valuesが全て存在する場合、:attributeフィールドは存在していません。',
    'multiple_of' => ':attributeは:valueの倍数でなければなりません。',
    'not_in' => '選択した:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数字でなければなりません。',
    'password' => [
        'letters' => ':attributeは少なくとも1文字の文字を含まなければなりません。',
        'mixed' => ':attributeは少なくとも1文字の大文字と小文字の文字を含まなければなりません。',
        'numbers' => ':attributeは少なくとも1つの数字を含まなければなりません。',
        'symbols' => ':attributeは少なくとも1つの記号を含まなければなりません。',
        'uncompromised' => '指定された:attributeはデータ漏洩に含まれています。別の:attributeを選んでください。',
    ],
    'present' => ':attributeフィールドは存在していなければなりません。',
    'prohibited' => ':attributeフィールドは禁止されています。',
    'prohibited_if' => ':otherが:valueの時、:attributeフィールドは禁止されています。',
    'prohibited_unless' => ':otherが:valuesの中にない限り、:attributeフィールドは禁止されています。',
    'prohibits' => ':attributeフィールドは:otherの存在を禁止しています。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeフィールドは必須です。',
    'required_array_keys' => ':attributeフィールドには:valuesのエントリが含まれていなければなりません。',
    'required_if' => ':otherが:valueの時、:attributeフィールドは必須です。',
    'required_if_accepted' => ':otherが承認された時、:attributeフィールドは必須です。',
    'required_unless' => ':otherが:valuesに含まれない限り、:attributeフィールドは必須です。',
    'required_with' => ':valuesが存在する時、:attributeフィールドは必須です。',
    'required_with_all' => ':valuesが全て存在する時、:attributeフィールドは必須です。',
    'required_without' => ':valuesが存在しない時、:attributeフィールドは必須です。',
    'required_without_all' => ':valuesが全て存在しない時、:attributeフィールドは必須です。',
    'same' => ':attributeと:otherは一致しなければなりません。',
    'size'                 => [
        'array'   => ':attributeの項目は、:size個にしてください。',
        'file'    => ':attributeには、:size KBのファイルを指定してください。',
        'numeric' => ':attributeには、:sizeを指定してください。',
        'string'  => ':attributeは、:size文字にしてください。',
    ],
    'starts_with'          => ':attributeは、次のいずれかで始まる必要があります。:values',
    'string'               => ':attributeには、文字を指定してください。',
    'timezone'             => ':attributeには、有効なタイムゾーンを指定してください。',
    'unique'               => '指定の:attributeは既に使用されています。',
    'uploaded'             => ':attributeのアップロードに失敗しました。',
    'uppercase'            => ':attribute は有効な ULID でなければなりません。',
    'url'                  => ':attributeは、有効なURL形式で指定してください。',
    'ulid'                 => ':attribute は有効な ULID でなければなりません。',
    'uuid'                 => ':attributeは、有効なUUIDでなければなりません。',

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
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes'           => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'quantity' => '数量'
    ],

];
