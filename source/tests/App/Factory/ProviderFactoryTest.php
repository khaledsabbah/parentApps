<?php


namespace Tests\App\Factory;


use App\Contracts\IDataProvider;
use App\Factory\AbstractProviderFactory;
use Tests\TestCase;

class ProviderFactoryTest extends TestCase
{
    private $providers;

    public function setUp(): void
    {
        parent::setUp();
        $this->providers=[
            'dataProviderX',
            'dataProviderY'
        ];
    }
    public function testInstantiate()
    {
        foreach ($this->providers as $provider){
            $obj= AbstractProviderFactory::Instantiate($provider);
            $this->assertIsObject($obj);
            $this->assertInstanceOf(IDataProvider::class, $obj);

            $provider = new \ReflectionClass(get_class($obj));
            $this->assertArrayHasKey('API_URL', $provider->getConstants());
            $this->assertNotNull($provider->getConstant("API_URL"));

            $this->assertArrayHasKey('JSON_RESPONSE_PARENT_KEY', $provider->getConstants());
            $this->assertNotNull($provider->getConstant("JSON_RESPONSE_PARENT_KEY"));

            $this->assertArrayHasKey('OBJ_KEYS', $provider->getConstants());
            $this->assertNotNull($provider->getConstant("OBJ_KEYS"));
        }
    }
}
