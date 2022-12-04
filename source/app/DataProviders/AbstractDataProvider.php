<?php


namespace App\DataProviders;


use App\Contracts\IDataProvider;
use App\Hydrators\UserHydrator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Promise\PromisorInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class AbstractDataProvider
 * @package App\DataProviders
 */
abstract class AbstractDataProvider implements IDataProvider
{

    protected $users = [];
    protected $providerUsers = [];

    /**
     * AbstractDataProvider constructor.
     */
    public function __construct()
    {
        try {
            $response = $this->getProviderData();
            $response = json_decode($response, true);
            if (isset($response[static::JSON_RESPONSE_PARENT_KEY]))
                $this->users = $response[static::JSON_RESPONSE_PARENT_KEY];
        } catch (GuzzleException $exception) {
            Log::alert('Provider API Down ' . static::API_URL, ['trace' => $exception->getTraceAsString()]);
        } catch (\Exception $exception) {
            Log::alert('؛Provider API Down' . static::API_URL, ['trace' => $exception->getTraceAsString()]);
        }

    }


    /**
     * @return PromisorInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProviderData()
    {
        // TODO: Implement get؛roviderData() method.

        // Load From Web API
        if (Str::startsWith(static::API_URL, "http")){
            $client = new Client();
            $response= $client->request('GET', static::API_URL);
            return $response->getBody();
        }else{
            // Load From Json File Local
            return Storage::disk("dataProvider")->get(static::API_URL);
        }
    }


    public function mockProviderResponse(): array
    {
        // TODO: Implement mockResponse() method.
        foreach ($this->users as $user) {
            $userHydrator = UserHydrator::hydrate($user, static::OBJ_KEYS)
                ->setProviderName(substr(strrchr(static::class, "\\"), 1));

            array_push($this->providerUsers, $userHydrator);
        }
        return $this->providerUsers;
    }

}
