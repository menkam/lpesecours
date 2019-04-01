<?php

use Illuminate\Database\Seeder;
use App\Models\Mobile_money;

class MoMoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $object = new Mobile_money();
        $object->id = '1';
        $object->date = '2019-03-15';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '154500';
        $object->compte_momo = '3650';
        $object->compte2 = '42892';
        $object->frais_transfert = '0';
        $object->commission = '23753';
        $object->save();

        $object = new Mobile_money();
        $object->id = '2';
        $object->date = '2019-03-16';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '180500';
        $object->compte_momo = '2650';
        $object->compte2 = '17792';
        $object->frais_transfert = '100';
        $object->commission = '23756';
        $object->save();

        $object = new Mobile_money();
        $object->id = '3';
        $object->date = '2019-03-17';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '183100';
        $object->compte_momo = '50';
        $object->compte2 = '17792';
        $object->frais_transfert = '0';
        $object->commission = '23897';
        $object->save();

        $object = new Mobile_money();
        $object->id = '4';
        $object->date = '2019-03-18';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '183000';
        $object->compte_momo = '2050';
        $object->compte2 = '15667';
        $object->frais_transfert = '50';
        $object->commission = '23913';
        $object->save();

        $object = new Mobile_money();
        $object->id = '5';
        $object->date = '2019-03-19';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '190175';
        $object->compte_momo = '6050';
        $object->compte2 = '4617';
        $object->frais_transfert = '50';
        $object->commission = '23951';
        $object->save();

        $object = new Mobile_money();
        $object->id = '6';
        $object->date = '2019-03-20';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '94525';
        $object->compte_momo = '52050';
        $object->compte2 = '54882';
        $object->frais_transfert = '0';
        $object->commission = '24365';
        $object->save();

        $object = new Mobile_money();
        $object->id = '7';
        $object->date = '2019-03-21';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '70575';
        $object->compte_momo = '106550';
        $object->compte2 = '24232';
        $object->frais_transfert = '100';
        $object->commission = '24656';
        $object->save();

        $object = new Mobile_money();
        $object->id = '8';
        $object->date = '2019-03-22';
        $object->fond = '200000';
        $object->pret = '50000';
        $object->espece = '73375';
        $object->compte_momo = '108200';
        $object->compte2 = '70132';
        $object->frais_transfert = '50';
        $object->commission = '24843';
        $object->save();

        $object = new Mobile_money();
        $object->id = '9';
        $object->date = '2019-03-23';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '119225';
        $object->compte_momo = '62200';
        $object->compte2 = '70032';
        $object->frais_transfert = '100';
        $object->commission = '24968';
        $object->save();

        $object = new Mobile_money();
        $object->id = '10';
        $object->date = '2019-03-24';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '66925';
        $object->compte_momo = '114700';
        $object->compte2 = '70032';
        $object->frais_transfert = '0';
        $object->commission = '25323';
        $object->save();

        $object = new Mobile_money();
        $object->id = '11';
        $object->date = '2019-03-25';
        $object->fond = '200000';
        $object->pret = '-50000';
        $object->espece = '95275';
        $object->compte_momo = '106600';
        $object->compte2 = '82';
        $object->frais_transfert = '0';
        $object->commission = '25507';
        $object->save();

        $object = new Mobile_money();
        $object->id = '12';
        $object->date = '2019-03-26';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '188525';
        $object->compte_momo = '12500';
        $object->compte2 = '82';
        $object->frais_transfert = '0';
        $object->commission = '25741';
        $object->save();

        $object = new Mobile_money();
        $object->id = '13';
        $object->date = '2019-03-27';
        $object->fond = '200000';
        $object->pret = '0';
        $object->espece = '173025';
        $object->compte_momo = '28000';
        $object->compte2 = '82';
        $object->frais_transfert = '0';
        $object->commission = '25859';
        $object->save();

        $object = new Mobile_money();
        $object->id = '14';
        $object->date = '2019-03-28';
        $object->fond = '250000';
        $object->pret = '50000';
        $object->espece = '88925';
        $object->compte_momo = '82650';
        $object->compte2 = '131632';
        $object->frais_transfert = '0';
        $object->commission = '26359';
        $object->save();

        $object = new Mobile_money();
        $object->id = '15';
        $object->date = '2019-03-29';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '191400';
        $object->compte_momo = '110275';
        $object->compte2 = '1482';
        $object->frais_transfert = '50';
        $object->commission = '26788';
        $object->save();

        $object = new Mobile_money();
        $object->id = '16';
        $object->date = '2019-03-30';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '302000';
        $object->compte_momo = '675';
        $object->compte2 = '432';
        $object->frais_transfert = '50';
        $object->commission = '27607';
        $object->save();

        $object = new Mobile_money();
        $object->id = '17';
        $object->date = '2019-03-31';
        $object->fond = '250000';
        $object->pret = '-10000';
        $object->espece = '292000';
        $object->compte_momo = '675';
        $object->compte2 = '432';
        $object->frais_transfert = '0';
        $object->commission = '27607';
        $object->save();

        $object = new Mobile_money();
        $object->id = '18';
        $object->date = '2019-04-01';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '92100';
        $object->compte_momo = '200675';
        $object->compte2 = '282';
        $object->frais_transfert = '50';
        $object->commission = '28250';
        $object->save();

    }
}
