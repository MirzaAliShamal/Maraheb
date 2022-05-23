<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;

class UpdateCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:countries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update countries data from API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = file_get_contents("https://restcountries.com/v2/all");
        $countries = json_decode($response);

        Country::truncate();

        foreach ($countries as $item) {
            Country::create([
                'name' => isset($item->name) ? $item->name : '',
                'topLevelDomain' => isset($item->topLevelDomain) ? $item->topLevelDomain : '' ,
                'alpha2Code' => isset($item->alpha2Code) ? $item->alpha2Code : '' ,
                'alpha3Code' => isset($item->alpha3Code) ? $item->alpha3Code : '' ,
                'callingCodes' => isset($item->callingCodes) ? $item->callingCodes : '' ,
                'capital' => isset($item->capital) ? $item->capital : '' ,
                'altSpellings' => isset($item->altSpellings) ? $item->altSpellings : '' ,
                'subregion' => isset($item->subregion) ? $item->subregion : '' ,
                'region' => isset($item->region) ? $item->region : '' ,
                'population' => isset($item->population) ? $item->population : '' ,
                'latlng' => isset($item->latlng) ? $item->latlng : '' ,
                'demonym' => isset($item->demonym) ? $item->demonym : '' ,
                'area' => isset($item->area) ? $item->area : '' ,
                'timezones' => isset($item->timezones) ? $item->timezones : '' ,
                'borders' => isset($item->borders) ? $item->borders : '' ,
                'nativeName' => isset($item->nativeName) ? $item->nativeName : '' ,
                'numericCode' => isset($item->numericCode) ? $item->numericCode : '' ,
                'flags' => isset($item->flags) ? $item->flags : '' ,
                'currencies' => isset($item->currencies) ? $item->currencies : '' ,
                'languages' => isset($item->languages) ? $item->languages : '' ,
                'translations' => isset($item->translations) ? $item->translations : '' ,
                'flag' => isset($item->flag) ? $item->flag : '' ,
                'regionalBlocs' => isset($item->regionalBlocs) ? $item->regionalBlocs : '' ,
                'cioc' => isset($item->cioc) ? $item->cioc : '' ,
                'independent' => isset($item->independent) ? $item->independent : '' ,
            ]);
        }
    }
}
