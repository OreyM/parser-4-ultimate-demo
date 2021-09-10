<?php


namespace App\Core\Abstracts\Data;


use App\Backend\Auth\Data\Responses\FailedLoginResponse;
use App\Backend\Auth\Exceptions\FailedLoginException;
use Illuminate\Http\Response;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as LaravelFormRequest;

abstract class FormRequest extends LaravelFormRequest
{
    abstract public function rules(): array;

    /**
     * @param Validator $validator
     * @throws FailedLoginException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new FailedLoginException(
            FailedLoginResponse::init()
                ->message($validator->errors())
                ->response(Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

