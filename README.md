# Parent ( Senior Backend Assessment )
-  I've used Laravel to implement an API endpoint that returns a filterable JSON response contains a list of 
   users fetched from different data sources (Providers).

# Perquisite
- `Docker`  
- `docker-compose`
- `Makefile`

# Dev-Ops Description :
- Docker & docker-compose. 
- register services  ``php-fpm ``, ``nginx``
- Link each service to service registry .
- use ``make`` command to automate operations

# Install
- extract the .zip file or download using `git clone https://khaledsabbah@bitbucket.org/khaledsabbah/parentApps.git`
- `cd parentApps` <small> ( go to task location )</small>
- `make init`
- `make install permission`
- You should see the following image
![alt text](https://raw.githubusercontent.com/khaledsabbah/parentApps/master/images/docker.png)

- To Open docker container use the following command 
    
        docker exec -it phpfpm /bin/bash
        
# Running
*        Base Url :   http://localhost:8089
###### List Users :
*       http://localhost:8089/api/v1/users  
###### Filter Users By Data Providers, Status, Currency, And Status Code :
*       http://localhost:8089/api/v1/users?balanceMin=10&balanceMax=200&provider=DataProviderX&statusCode=1

# Test Cases:

- Run   `make test`
- Then, you'll see result like this: ![alt text](https://raw.githubusercontent.com/khaledsabbah/parentApps/master/images/test.png) 

## Code Desgin and Architect
I tried to apply S.O.L.I.D principles & use some design pattern and Hydrate everything into object as possible.

#### Patterns used:
- ``Service Pattern``  Calling repository if any, retrieving data and aggregate multiple processes.
- ``Factory Pattern``   Create an Provider object on the fly .
- ``Hydrator Pattern``  Hydrate inputs ( eg. data ) into entities .
- ``Composite Entity Pattern``  Applying composition and relations between Entities.
- ``Filter Pattern``   Filter data and return only what meet the implemented criteria
- ``Transformer Pattern``  Transform response object to and JSONable type like Array .

##  Usage & steps to add new Provider or data source:
1. Add Provider entry in `config/dataProviders.php`.  <SMALL>ex:`dataProviderZ`</SMALL>.
    >   return [ 'dataProviderX' , 'dataProviderY' , `DataProviderZ` ]
    
2. Inside `App\DataProviders`, Add Provider class named as `DataProviderZ.php` <small> =>`ucfirst(dataProviderZ)`</small> and must extend class ``AbstractDataProvider``.
 
3. Inside `DataProviderZ.php`, Define 3 attributes that works as Mapper for API reposponse:
```php
        const API_URL = '<String containing API url> |  < Path To The Json File Inside Storage Public Disk >'; 
        //     ex: const API_URL= "https://";
        //     ex: const API_URL= "providers/X.json";
    
        CONST OBJ_KEYS = ["<< Key Used In Code and Never Change That Key >> " => "API Reponse Key Mapper & changes Per Provider Response"];
        //     ex: CONST OBJ_KEYS = ['p_email' => 'parentEmail','reg_date' => 'Created_At','parent_id' => 'parentIdentification'];
    
        CONST JSON_RESPONSE_PARENT_KEY = "<< PARENT KEY OF THE JSON RESPONSE THAT HOLDS THE ARRAY OF OBJECTS >> ";
        //     ex: const JSON_RESPONSE_PARENT_KEY = "data";
```
Look at This Image ![alt text](https://raw.githubusercontent.com/khaledsabbah/parentApps/master/images/browser.png)
        
4. Go to the browser and write endpoint url [http://localhost:8089/api/v1/users](http://localhost:8089/api/v1/users)
    > ```Note:  Even after adding Provider classes, You can enable and disable them by removing or commenting them from config/Providers.php ```

# WorkFlow
- `Controller` calls `Service` Method to fetch data
- `Hydrators` used to hydrate data using `Entities`.
- `Fitlers` used do our logic remove repeated rooms and sort hydrated objects 
- `Transformers` used to transform the result in the JSON Output.
