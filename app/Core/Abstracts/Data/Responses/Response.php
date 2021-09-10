<?php


namespace App\Core\Abstracts\Data\Responses;


use App\Core\Modules\Actions\CreateTokenAction;

/**
 * Class Response
 * @package App\Core\Abstracts\Data\Responses
 * json responce = {
 *      "Debug Mod": true / false,
 *      "HTTP response": Illuminate\Http\Response::RESPONSE_CODE,
 *      "type": "error" / "???"
 *      "success": true / false,
 *      "error": true / false,
 *      "message": {
*           "message_type_key": [
*               message_body"
*           ]
*       },
 *      "data": {
            ...some datas
 *      },
 *      "token": {token},
 *      "token_type": "bearer"
 * }
 */
abstract class Response
{
    protected Response $instance;

    protected bool $error = false;
    protected array $response;
    protected int $code;
    protected $message;
    protected $data;
    protected string $token = '';

    abstract public function message($message = null): Response;

    public static function init()
    {
        $instance = new static();

        $instance->message();

        return $instance;
    }

    public function data($data)
    {
        $this->data = $data;

        return $this;
    }

    public function token(string $guard)
    {
        $this->token = \Action::call(CreateTokenAction::class, $guard);

        return $this;
    }

    public function response(int $code)
    {
        $this->code = $code;

        $this->response['Debug Mod'] = config('app.debug');
        $this->response['HTTP response'] = $this->code;
        $this->checkError() ?: $this->response['success'] = true;;
        $this->response['messages'] = $this->message;
        $this->checkData();
        $this->checkToken();

        return response()->json($this->response, $this->code);
    }

    protected function checkError()
    {
        if ($this->error) {
            $this->response['type'] = 'error';
            $this->response['success'] = false;
            $this->response['error'] = true;

            return true;
        }

        return false;
    }

    protected function checkData()
    {
        if ($this->data) $this->response['data'] = $this->data;
    }

    protected function checkToken()
    {
        if ($this->token) {
            $this->response['token'] = $this->token;
            $this->response['token_type'] = 'Bearer';
        }
    }
}
