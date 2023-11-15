<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Validator;
use Framework\Rules\{RequiredRule, EmailRule, MinRule, InRule, UrlRule, MatchRule, LengthMaxRule, NumericRule, DateFormatRule, ExtensionRule, SizeRule};

class ValidatorService
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
        $this->validator->add('required', new RequiredRule());
        $this->validator->add('email', new EmailRule());
        $this->validator->add('min', new MinRule());
        $this->validator->add('in', new InRule());
        $this->validator->add('url', new UrlRule());
        $this->validator->add('match', new MatchRule());
        $this->validator->add('lengthMax', new LengthMaxRule());
        $this->validator->add('numeric', new NumericRule());
        $this->validator->add('dateFormat', new DateFormatRule());
        $this->validator->add('extension', new ExtensionRule());
        $this->validator->add('size', new SizeRule());
    }

    public function validateSignup(array $formData)
    {
        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            // 'age' => ['required', 'numeric', 'min:18'],
            // 'country' => ['required', 'in:USA,Canada,Mexico'],
            // 'url' => ['required', 'url'],
            'password' => ['required'],
            'confirmPassword' => ['required', 'match:password'],
            // 'tos' => ['required']
        ]);
    }

    public function validateSignin(array $formData)
    {

        $this->validator->validate($formData, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    }

    public function validateProfile(array $formData)
    {
        $this->validator->validate($formData, [
            'firstname' => ['required', 'lengthMax:8'],
            'lastname' => ['required'],
            'birthday' => ['dateFormat:Y-m-d']
        ]);
    }
    public function validatePost(array $formData)
    {
        $this->validator->validate($formData, [
            'title' => ['required'],
            'alt' => ['required'],
            'excerpt' => ['required'],
            'content' => ['required'],
            'alt' => ['required']
        ]);
    }
    public function validatorFile(array $files)
    {
        $this->validator->validate($files, [
            'name' => ['extension:jpeg,png,jpg'],
            //'size' => ['size:1000000']
        ]);
    }
}
