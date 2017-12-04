<?php

namespace App\Console\Commands;

use App\Services\Trips\AirportsService;
use function array_count_values;
use function array_slice;
use Illuminate\Console\Command;
use Libs\IataCode\IataCodeSdk;

/**
 * Class RefreshAirports
 *
 * @package Console\Commands
 *
 * @author  Nikolic Jeremy <nikolic.jeremy@gmail.com>
 */
class RefreshAirports extends Command
{

    /**
     * @var string
     */
    protected $signature = 'refresh_airports 
                            {--with_progression : if present displays progression infos}
                            {--limit= : limit number of airport(useful for heroku database limitation)}';

    /**
     * @var string
     */
    protected $description = 'Fetch airports information from IataCode.org and update airports table. 
                                (use --verbose for progression)';

    /**
     * @var \App\Services\Trips\AirportsService
     */
    private $airportsService;

    /**
     * RefreshAirports constructor.
     *
     * @param \App\Services\Trips\AirportsService $airportsService
     */
    public function __construct(AirportsService $airportsService)
    {
        parent::__construct();
        $this->airportsService = $airportsService;
    }

    /**
     *
     */
    public function handle()
    {
        $this->infoMsg('Request IataCode.org');

        $result = (new IataCodeSdk())->airports();
        $this->infoMsg('Response received');

        if ($result->hasError()) {
            $this->error('An error occured : '.$result->error()['message']);

            return;
        }
        try {
            $this->infoMsg('Processing response');
            $airports = $result->response();
            if ($this->option('limit')) {
                $limit = $this->option('limit');
                $airports = count($airports) > $limit ? array_slice($airports, 0, $limit) : $airports;
            }
            $this->airportsService->refresh($airports);
            $this->info('All good');
        } catch (\Exception $ex) {

            $this->error('Error processing Airport refresh: '.$ex->getMessage());
        }
    }

    private function infoMsg($message = '')
    {
        if ($this->option('with_progression')) {
            $this->info($message);
        }
    }
}