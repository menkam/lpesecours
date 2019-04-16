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
        $object->date = '2019-04-01';
        $object->fond = '250000';
        $object->pret = '400';
        $object->espece = '209500';
        $object->compte_momo = '83675';
        $object->compte2 = '282';
        $object->frais_transfert = '50';
        $object->commission = '28534';
        $object->save();




        $object = new Mobile_money();
        $object->date = '2019-04-02';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '260200';
        $object->compte_momo = '32975';
        $object->compte2 = '282';
        $object->frais_transfert = '0';
        $object->commission = '29182';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-03';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '267650';
        $object->compte_momo = '25475';
        $object->compte2 = '282';
        $object->frais_transfert = '0';
        $object->commission = '29256';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-04';
        $object->fond = '250000';
        $object->pret = '-4700';
        $object->espece = '94250';
        $object->compte_momo = '194275';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '30048';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-05';
        $object->fond = '250000';
        $object->pret = '-1775';
        $object->espece = '52425';
        $object->compte_momo = '233925';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '30296';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-06';
        $object->fond = '250000';
        $object->pret = '-33700';
        $object->espece = '38125';
        $object->compte_momo = '214611';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '30487';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-07';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '40625';
        $object->compte_momo = '212111';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '30571';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-08';
        $object->fond = '250000';
        $object->pret = '350';
        $object->espece = '121975';
        $object->compte_momo = '131111';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '31452';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-09';
        $object->fond = '250000';
        $object->pret = '-3000';
        $object->espece = '124975';
        $object->compte_momo = '125211';
        $object->compte2 = '82';
        $object->frais_transfert = '0';
        $object->commission = '31498';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-10';
        $object->fond = '250000';
        $object->pret = '0';
        $object->espece = '215975';
        $object->compte_momo = '33861';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '31893';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-12';
        $object->fond = '250000';
        $object->pret = '900';
        $object->espece = '246700';
        $object->compte_momo = '4891';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '32239';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-11';
        $object->fond = '250000';
        $object->pret = '800';
        $object->espece = '237625';
        $object->compte_momo = '13061';
        $object->compte2 = '180';
        $object->frais_transfert = '0';
        $object->commission = '32112';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-13';
        $object->fond = '250000';
        $object->pret = '12425';
        $object->espece = '243325';
        $object->compte_momo = '20691';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '32355';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-14';
        $object->fond = '250000';
        $object->pret = '5000';
        $object->espece = '90525';
        $object->compte_momo = '178391';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '33110';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-15';
        $object->fond = '250000';
        $object->pret = '5000';
        $object->espece = '61025';
        $object->compte_momo = '212891';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '33363';
        $object->save();

        $object = new Mobile_money();
        $object->date = '2019-04-16';
        $object->fond = '250000';
        $object->pret = '800';
        $object->espece = '83225';
        $object->compte_momo = '191491';
        $object->compte2 = '182';
        $object->frais_transfert = '0';
        $object->commission = '33570';
        $object->save();


    }
}
