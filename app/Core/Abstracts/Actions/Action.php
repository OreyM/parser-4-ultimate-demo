<?php


namespace App\Core\Abstracts\Actions;

use App\Containers\Core\Abstracts\Data\Requests\Request;
use App\Core\Abstracts\Data\FormRequest;
use App\Core\Abstracts\Data\Repositories\Repository;
use Illuminate\Container\Container;

/**
 * Class Action
 * @package App\Core\Abstracts\Actions
 * @property mixed external
 */
abstract class Action
{
    protected Repository $repository;
    protected FormRequest $request;

    abstract protected function run();

    /**
     * @param string $actionClass
     * @param null $params mixed for one param || array for more than one param ['param_name' => 'param_value']
     * @param bool $multipleParam true if more than one parameter is passed to the action
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function call(string $actionClass, $params = null, bool $multipleParam = false)
    {
        $container = Container::getInstance()->make($actionClass);

        if (is_array($params) && $multipleParam) {
            foreach ($params as $key => $value) {
                $container->$key = $value;
            }
        } else {
            $container->external = $params;
        }

        return $container->run();
    }
}
