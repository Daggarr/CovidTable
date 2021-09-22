<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;

class CovidData
{
    private Reader $csv;

    public function __construct()
    {
        $this->csv = Reader::createFromPath('covid_19_valstu_saslimstibas_raditaji.csv', 'r');
        $this->csv->setHeaderOffset(0);
        $this->csv->setDelimiter(';');
    }

    public function getRecords(): \League\Csv\TabularDataReader
    {
        $statement = Statement::create();
        return $statement->process($this->csv);
    }

    public function filterByCountry($records, string $country)
    {
        $filtered = [];

        foreach ($records as $record)
        {
            if ($record['Valsts'] === $country)
            {
                $filtered[] = $record;
            }
        }

        return $filtered;
    }
}