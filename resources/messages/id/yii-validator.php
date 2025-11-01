<?php

return [
    // Used in single rule

    /** @see FilledAtLeast */
    'At least {min, number} {min, plural, one{property} other{properties}} from this list must be filled' => 'Minimal {min, number} {min, plural, one{properti} other{properti}} dari daftar ini harus diisi',
    /** @see BooleanValue */
    '{Property} must be either "{true}" or "{false}".' => '{Property} harus bernilai "{true}" atau "{false}".',
    /** @see Count */
    '{Property} must be an array or implement \Countable interface.' => '{Property} harus berupa array atau mengimplementasikan interface \Countable.',
    '{Property} must contain at least {min, number} {min, plural, one{item} other{items}}.' => '{Property} harus berisi minimal {min, number} {min, plural, one{item} other{item}}.',
    '{Property} must contain at most {max, number} {max, plural, one{item} other{items}}.' => '{Property} harus berisi maksimal {max, number} {max, plural, one{item} other{item}}.',
    '{Property} must contain exactly {exactly, number} {exactly, plural, one{item} other{items}}.' => '{Property} harus berisi tepat {exactly, number} {exactly, plural, one{item} other{item}}.',
    /** @see Each */
    '{Property} must be array or iterable.' => '{Property} harus berupa array atau iterable.',
    'Every iterable key must have an integer or a string type.' => 'Setiap key iterable harus bertipe integer atau string.',
    /** @see Email */
    '{Property} is not a valid email address.' => '{Property} bukan alamat email yang valid.',
    /** @see In */
    '{Property} is not in the list of acceptable values.' => '{Property} tidak ada dalam daftar nilai yang dapat diterima.',
    /** @see Ip */
    '{Property} must be a valid IP address.' => '{Property} harus berupa alamat IP yang valid.',
    '{Property} must not be an IPv4 address.' => '{Property} tidak boleh berupa alamat IPv4.',
    '{Property} must not be an IPv6 address.' => '{Property} tidak boleh berupa alamat IPv6.',
    '{Property} contains wrong subnet mask.' => '{Property} mengandung subnet mask yang salah.',
    '{Property} must be an IP address with specified subnet.' => '{Property} harus berupa alamat IP dengan subnet yang ditentukan.',
    '{Property} must not be a subnet.' => '{Property} tidak boleh berupa subnet.',
    '{Property} is not in the allowed range.' => '{Property} tidak berada dalam rentang yang diizinkan.',
    /** @see Integer */
    '{Property} must be an integer.' => '{Property} harus berupa bilangan bulat.',
    /** @see Json */
    '{Property} is not JSON.' => '{Property} bukan format JSON yang valid.',
    /** @see Length */
    '{Property} must contain at least {min, number} {min, plural, one{character} other{characters}}.' => '{Property} harus berisi minimal {min, number} {min, plural, one{karakter} other{karakter}}.',
    '{Property} must contain at most {max, number} {max, plural, one{character} other{characters}}.' => '{Property} harus berisi maksimal {max, number} {max, plural, one{karakter} other{karakter}}.',
    '{Property} must contain exactly {exactly, number} {exactly, plural, one{character} other{characters}}.' => '{Property} harus berisi tepat {exactly, number} {exactly, plural, one{karakter} other{karakter}}.',
    /** @see Nested */
    'Nested rule without rules can be used for objects only.' => 'Aturan bersarang tanpa rules hanya dapat digunakan untuk objek.',
    'An object data set data can only have an array or an object type.' => 'Data objek hanya dapat berupa array atau object.',
    'Property "{path}" is not found.' => 'Properti "{path}" tidak ditemukan.',
    /** @see Number */
    '{Property} must be a number.' => '{Property} harus berupa angka.',
    /** @see FilledOnlyOneOf */
    'Exactly 1 property from this list must be filled: {properties}.' => 'Tepat 1 properti dari daftar ini harus diisi: {properties}.',
    /** @see Regex */
    '{Property} is invalid.' => '{Property} tidak valid.',
    /** @see Required */
    '{Property} cannot be blank.' => '{Property} tidak boleh kosong.',
    '{Property} not passed.' => '{Property} tidak diberikan.',
    /** @see Subset */
    '{Property} must be iterable.' => '{Property} harus dapat diiterasi.',
    '{Property} is not a subset of acceptable values.' => '{Property} bukan subset dari nilai yang dapat diterima.',
    /** @see TrueValue */
    '{Property} must be "{true}".' => '{Property} harus bernilai "{true}".',
    /** @see Url */
    '{Property} is not a valid URL.' => '{Property} bukan URL yang valid.',

    // Used in multiple rules

    /**
     * @see FilledAtLeast
     * @see Nested
     * @see FilledOnlyOneOf
     */
    '{Property} must be an array or an object.' => '{Property} harus berupa array atau object.',
    /**
     * @see BooleanValue
     * @see TrueValue
     */
    'The allowed types are integer, float, string, boolean. {type} given.' => 'Tipe yang diizinkan adalah integer, float, string, boolean. Diberikan tipe {type}.',
    /**
     * @see Compare
     * @see Equal
     * @see GreaterThan
     * @see GreaterThanOrEqual
     * @see LessThan
     * @see LessThanOrEqual
     * @see NotEqual
     */
    'The allowed types are integer, float, string, boolean, null and object implementing \Stringable interface or \DateTimeInterface.' => 'Tipe yang diizinkan adalah integer, float, string, boolean, null dan object yang mengimplementasikan interface \Stringable atau \DateTimeInterface.',
    'The property value returned from a custom data set must have one of the following types: integer, float, string, boolean, null or an object implementing \Stringable interface or \DateTimeInterface.' => 'Nilai properti yang dikembalikan dari kumpulan data kustom harus memiliki salah satu tipe berikut: integer, float, string, boolean, null atau object yang mengimplementasikan interface \Stringable atau \DateTimeInterface.',
    '{Property} must be equal to "{targetValueOrProperty}".' => '{Property} harus sama dengan "{targetValueOrProperty}".',
    '{Property} must be strictly equal to "{targetValueOrProperty}".' => '{Property} harus sama persis dengan "{targetValueOrProperty}".',
    '{Property} must not be equal to "{targetValueOrProperty}".' => '{Property} tidak boleh sama dengan "{targetValueOrProperty}".',
    '{Property} must not be strictly equal to "{targetValueOrProperty}".' => '{Property} tidak boleh sama persis dengan "{targetValueOrProperty}".',
    '{Property} must be greater than "{targetValueOrProperty}".' => '{Property} harus lebih besar dari "{targetValueOrProperty}".',
    '{Property} must be greater than or equal to "{targetValueOrProperty}".' => '{Property} harus lebih besar atau sama dengan "{targetValueOrProperty}".',
    '{Property} must be less than "{targetValueOrProperty}".' => '{Property} harus lebih kecil dari "{targetValueOrProperty}".',
    '{Property} must be less than or equal to "{targetValueOrProperty}".' => '{Property} harus lebih kecil atau sama dengan "{targetValueOrProperty}".',
    /**
     * @see Email
     * @see Ip
     * @see Json
     * @see Length
     * @see Regex
     * @see Url
     */
    '{Property} must be a string.' => '{property} harus berupa string.',
    '{Property} must be a string. {type} given.' => '{property} harus berupa string. Tipe yang diberikan: {type}.',
    '{Property} must be a string. {type} given.' => '{property} harus berupa string. Tipe yang diberikan: {type}.',
    '{Property} must contain at least {min, number} {min, plural, one{character} other{characters}}.' => '{property} harus mengandung setidaknya {min, number} karakter.',
    '{Property} must contain at most {max, number} {max, plural, one{character} other{characters}}.' => '{property} harus mengandung paling banyak {max, number} karakter.',
    '{Property} must contain exactly {exactly, number} {exactly, plural, one{character} other{characters}}.' => '{property} harus mengandung tepat {exactly, number} karakter.',
    /**
     * @see Number
     * @see Integer
     */
    'The allowed types are integer, float and string.' => 'Tipe yang diizinkan adalah integer, float dan string.',
    '{Property} must be no less than {min}.' => '{Property} tidak boleh kurang dari {min}.',
    '{Property} must be no greater than {max}.' => '{Property} tidak boleh lebih besar dari {max}.',
];
