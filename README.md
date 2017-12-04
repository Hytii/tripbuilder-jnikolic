# MoementumTravel assesment -By Nikolic Jeremy

Second step in the hiring process, this project respond to MomentumTravel assesment by Jeremy Nikolic.

## Functionnalities
Full documentation here : [Documentation](https://tripbuilder-jnikolic.herokuapp.com/api/docs)
```
* Airports
    * Alphabetical list of airports
* Trips
    * Trips list
    * Get trip info
    * Create a trip
    * Update a trip
    * Delete a trip
    -> Flights
        * Get flights list
        * Create a flight
        * Update a flight
        * Delete a flight 
```
## Installation

```
git clone
composer install
php artisan key:generate
php artisan migrate
```

## Filling airports table

Thanks to [IataCode.org](http://iatacodes.org/)

You may fill and update the airports list with real data using the following command

##### Pre-requisite
Get yourself an API key and setup a few parameters in .env :

```
IATA_CODE_API_KEY=<YOUR_API_KEY_HERE>
IATA_CODE_API_VERSION=6
IATA_CODE_API_URL=http://iatacodes.org/api/
```

### Command
```
	php artisan refresh_airports
	
	Options:
	--with_progression : if present displays progression infos
```

## Vulnerabilities

This is not a finalised application, it is just an aptitude test. Use at your own risks

