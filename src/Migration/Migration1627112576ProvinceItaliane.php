<?php declare(strict_types=1);

namespace Vmasciotta\ProvinceItaliane\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Defaults;
use Shopware\Core\Framework\Migration\MigrationStep;
use Shopware\Core\Framework\Uuid\Uuid;

class Migration1627112576ProvinceItaliane extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1627112576;
    }

    public function update(Connection $connection): void
    {
        $countryCode = 'IT';
        $countryId = $connection->fetchOne('select id from country where ISO3 = :isocode',['isocode'=>'ITA']);
        $data = [
            'IT'=>[
                'IT-AG' => 'Agrigento',
                'IT-AL' => 'Alessandria',
                'IT-AN' => 'Ancona',
                'IT-AO' => 'Aosta',
                'IT-AR' => 'Arezzo',
                'IT-AP' => 'Ascoli Piceno',
                'IT-AT' => 'Asti',
                'IT-AV' => 'Avellino',
                'IT-BA' => 'Bari',
                'IT-BT' => 'Barletta-Andria-Trani',
                'IT-BL' => 'Belluno',
                'IT-BN' => 'Benevento',
                'IT-BG' => 'Bergamo',
                'IT-BI' => 'Biella',
                'IT-BO' => 'Bologna',
                'IT-BZ' => 'Bolzano',
                'IT-BS' => 'Brescia',
                'IT-BR' => 'Brindisi',
                'IT-CA' => 'Cagliari',
                'IT-CI' => 'Carbonia-Iglesias',
                'IT-CL' => 'Caltanissetta',
                'IT-CB' => 'Campobasso',
                'IT-CE' => 'Caserta',
                'IT-CT' => 'Catania',
                'IT-CZ' => 'Catanzaro',
                'IT-CH' => 'Chieti',
                'IT-CO' => 'Como',
                'IT-CS' => 'Cosenza',
                'IT-CR' => 'Cremona',
                'IT-KR' => 'Crotone',
                'IT-CN' => 'Cuneo',
                'IT-EN' => 'Enna',
                'IT-FM' => 'Fermo',
                'IT-FE' => 'Ferrara',
                'IT-FI' => 'Firenze',
                'IT-FG' => 'Foggia',
                'IT-FC' => 'Forlì-Cesena',
                'IT-FR' => 'Frosinone',
                'IT-GE' => 'Genova',
                'IT-GO' => 'Gorizia',
                'IT-GR' => 'Grosseto',
                'IT-IM' => 'Imperia',
                'IT-IS' => 'Isernia',
                'IT-SP' => 'La Spezia',
                'IT-AQ' => 'L\'Aquila',
                'IT-LT' => 'Latina',
                'IT-LE' => 'Lecce',
                'IT-LC' => 'Lecco',
                'IT-LI' => 'Livorno',
                'IT-LO' => 'Lodi',
                'IT-LU' => 'Lucca',
                'IT-MC' => 'Macerata',
                'IT-MN' => 'Mantova',
                'IT-MS' => 'Massa-Carrara',
                'IT-MT' => 'Matera',
                'IT-ME' => 'Messina',
                'IT-MI' => 'Milano',
                'IT-MO' => 'Modena',
                'IT-MB' => 'Monza e della Brianza',
                'IT-NA' => 'Napoli',
                'IT-NO' => 'Novara',
                'IT-NU' => 'Nuoro',
                'IT-OG' => 'Ogliastra',
                'IT-OR' => 'Oristano',
                'IT-OT' => 'Olbia-Tempio',
                'IT-PD' => 'Padova',
                'IT-PA' => 'Palermo',
                'IT-PR' => 'Parma',
                'IT-PV' => 'Pavia',
                'IT-PG' => 'Perugia',
                'IT-PU' => 'Pesaro e Urbino',
                'IT-PE' => 'Pescara',
                'IT-PC' => 'Piacenza',
                'IT-PI' => 'Pisa',
                'IT-PT' => 'Pistoia',
                'IT-PN' => 'Pordenone',
                'IT-PZ' => 'Potenza',
                'IT-PO' => 'Prato',
                'IT-RG' => 'Ragusa',
                'IT-RA' => 'Ravenna',
                'IT-RC' => 'Reggio Calabria',
                'IT-RE' => 'Reggio Emilia',
                'IT-RI' => 'Rieti',
                'IT-RN' => 'Rimini',
                'IT-RM' => 'Roma',
                'IT-RO' => 'Rovigo',
                'IT-SA' => 'Salerno',
                'IT-SS' => 'Sassari',
                'IT-SV' => 'Savona',
                'IT-SI' => 'Siena',
                'IT-SR' => 'Siracusa',
                'IT-SO' => 'Sondrio',
                'IT-SU' => 'Sud Sardegna',
                'IT-TA' => 'Taranto',
                'IT-TE' => 'Teramo',
                'IT-TR' => 'Terni',
                'IT-TO' => 'Torino',
                'IT-TP' => 'Trapani',
                'IT-TN' => 'Trento',
                'IT-TV' => 'Treviso',
                'IT-TS' => 'Trieste',
                'IT-UD' => 'Udine',
                'IT-VA' => 'Varese',
                'IT-VE' => 'Venezia',
                'IT-VB' => 'Verbano-Cusio-Ossola',
                'IT-VC' => 'Vercelli',
                'IT-VR' => 'Verona',
                'IT-VV' => 'Vibo Valentia',
                'IT-VI' => 'Vicenza',
                'IT-VT' => 'Viterbo'
            ]
        ];

        foreach ($data[$countryCode] as $isoCode => $name) {
            $storageDate = (new \DateTime())->format(Defaults::STORAGE_DATE_TIME_FORMAT);
            $id = Uuid::randomBytes();
            $countryStateData = [
                'id' => $id,
                'country_id' => $countryId,
                'short_code' => $isoCode,
                'created_at' => $storageDate,
            ];
            $connection->insert('country_state', $countryStateData);
            $connection->insert('country_state_translation', [
                'language_id' => Uuid::fromHexToBytes(Defaults::LANGUAGE_SYSTEM),
                'country_state_id' => $id,
                'name' => $name,
                'created_at' => $storageDate,
            ]);
        }

    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
