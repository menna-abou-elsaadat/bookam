<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class VillageSeeder extends Seeder
{
    public function run(): void
    {
        $villagesByCity = [
            'AE' => ['Abu Dhabi' => ['Al Bateen' => 'البطين', 'Al Mushrif' => 'المشرف', 'Khalifa City' => 'مدينة خليفة']],
            'AR' => ['Buenos Aires' => ['Villa Devoto' => 'فيلا ديفوتو', 'Villa Urquiza' => 'فيلا أوركيثا', 'Villa del Parque' => 'فيلا ديل باركي']],
            'AU' => ['Canberra' => ['Hall' => 'هول', 'Tharwa' => 'ثاروا', 'Uriarra' => 'أوريارا']],
            'BD' => ['Dhaka' => ['Savar' => 'سافار', 'Keraniganj' => 'كيرانيغانج', 'Tongi' => 'تونغي']],
            'BR' => ['Brasília' => ['Planaltina' => 'بلانالتينا', 'Brazlândia' => 'برازلانديا', 'Sobradinho' => 'سوبرادينيو']],
            'CA' => ['Ottawa' => ['Manotick' => 'مانوتيك', 'Carp' => 'كارب', 'Metcalfe' => 'متكالف']],
            'CH' => ['Bern' => ['Muri bei Bern' => 'موري قرب برن', 'Köniz' => 'كونيتس', 'Zollikofen' => 'زوليكوفن']],
            'CN' => ['Beijing' => ['Gubeikou' => 'غوبيكو', 'Cuandixia' => 'تشوانديشيا', 'Shidu' => 'شيدو']],
            'DE' => ['Berlin' => ['Lübars' => 'لوبارس', 'Gatow' => 'غاتوف', 'Kladow' => 'كلادوف']],
            'DK' => ['Copenhagen' => ['Dragør' => 'دراغور', 'Tårnby' => 'تورنباي', 'Brøndby' => 'بروندبي']],
            'EG' => ['Cairo' => ['Dahshur' => 'دهشور', 'Saqqara' => 'سقارة', 'Abusir' => 'أبو صير']],
            'ES' => ['Madrid' => ['Chinchón' => 'تشينتشون', 'Patones' => 'باتونيس', 'Manzanares el Real' => 'مانزاناريس إل ريال']],
            'ET' => ['Addis Ababa' => ['Sebeta' => 'سيبيتا', 'Sululta' => 'سولولتا', 'Holeta' => 'هوليتا']],
            'FR' => ['Paris' => ['Giverny' => 'جيفرني', 'Barbizon' => 'باربيزون', 'Auvers-sur-Oise' => 'أوفير سور واز']],
            'GB' => ['London' => ['Ruislip' => 'رايسليب', 'Chislehurst' => 'تشيسلهيرست', 'Hampstead' => 'هامبستيد']],
            'GH' => ['Accra' => ['Aburi' => 'أبوري', 'Dodowa' => 'دودوا', 'Amasaman' => 'أماسامان']],
            'GR' => ['Athens' => ['Marathon' => 'ماراثون', 'Rafina' => 'رافينا', 'Varnavas' => 'فارنافاس']],
            'ID' => ['Jakarta' => ['Setu Babakan' => 'سيتو باباكان', 'Condet' => 'كونديت', 'Marunda' => 'ماروندا']],
            'IE' => ['Dublin' => ['Howth' => 'هاوث', 'Dalkey' => 'دالكي', 'Skerries' => 'سكيريز']],
            'IN' => ['New Delhi' => ['Najafgarh' => 'نجفغار', 'Mehrauli' => 'مهرولي', 'Narela' => 'ناريلا']],
            'IT' => ['Rome' => ['Ostia Antica' => 'أوستيا أنتيكا', 'Castel Gandolfo' => 'كاستل غاندولفو', 'Frascati' => 'فراسكاتي']],
            'JP' => ['Tokyo' => ['Okutama' => 'أوكوتاما', 'Hinohara' => 'هينوهارا', 'Oshima' => 'أوشيما']],
            'KE' => ['Nairobi' => ['Ruiru' => 'رويرو', 'Kiambu' => 'كيامبو', 'Limuru' => 'ليمورو']],
            'KR' => ['Seoul' => ['Bukchon Hanok Village' => 'قرية بوكتشون هانوك', 'Seorae Village' => 'قرية سوراي', 'Ikseon-dong' => 'إكسون دونغ']],
            'MX' => ['Mexico City' => ['San Ángel' => 'سان أنخيل', 'Xochimilco' => 'سوتشيميلكو', 'Tlalpan' => 'تلالبان']],
            'NG' => ['Abuja' => ['Kuje' => 'كوجي', 'Gwagwalada' => 'غواغوالادا', 'Bwari' => 'بواري']],
            'NL' => ['Amsterdam' => ['Durgerdam' => 'دورخردام', 'Ransdorp' => 'رانسدورب', 'Holysloot' => 'هوليسلوت']],
            'NO' => ['Oslo' => ['Sørkedalen' => 'سوركيدالن', 'Maridalen' => 'ماريدالن', 'Hauketo' => 'هاوكيتو']],
            'NZ' => ['Wellington' => ['Makara' => 'ماكارا', 'Ohariu' => 'أوهاريو', 'Pāuatahanui' => 'باواتاهانوي']],
            'PK' => ['Islamabad' => ['Saidpur Village' => 'قرية سيدبور', 'Tarlai Kalan' => 'تارلاي كالان', 'Bhara Kahu' => 'بهارا كاهو']],
            'PT' => ['Lisbon' => ['Sintra' => 'سينترا', 'Cascais' => 'كاشكايش', 'Óbidos' => 'أوبيدوش']],
            'RU' => ['Moscow' => ['Kolomenskoye' => 'كولومينسكوي', 'Vnukovo' => 'فنوكوفو', 'Peredelkino' => 'بيريديلكينو']],
            'SA' => ['Riyadh' => ['Uyaynah' => 'العيينة', 'Diriyah' => 'الدرعية', 'Al Ammariyah' => 'العمارية']],
            'SE' => ['Stockholm' => ['Vaxholm' => 'فاكسهولم', 'Dalarö' => 'دالارو', 'Grödinge' => 'غرودينغه']],
            'SG' => ['Singapore' => ['Pulau Ubin' => 'جزيرة أوبين', 'Kampong Lorong Buangkok' => 'كامبونغ لورونغ بوانغكوك', 'Kranji' => 'كرانجي']],
            'TH' => ['Bangkok' => ['Bang Krachao' => 'بانغ كراتشاو', 'Ko Kret' => 'كو كريت', 'Bang Pu' => 'بانغ بو']],
            'TR' => ['Ankara' => ['Gölbaşı' => 'غولباشي', 'Beypazarı' => 'بايبازاري', 'Çubuk' => 'تشوبوك']],
            'US' => ['Washington, D.C.' => ['Chevy Chase' => 'تشيفي تشيس', 'Kensington' => 'كنسينغتون', 'Takoma Park' => 'تاكوما بارك']],
            'ZA' => ['Pretoria' => ['Cullinan' => 'كولينان', 'Bronkhorstspruit' => 'برونخورستسبرويت', 'Hartbeespoort' => 'هارتبيسبورت']],
        ];

        $cityAreas = DB::table('areas')
            ->join('cities', 'cities.id', '=', 'areas.city_id')
            ->join('countries', 'countries.id', '=', 'cities.country_id')
            ->whereIn('countries.iso2', array_keys($villagesByCity))
            ->select(['countries.iso2', 'cities.name_en', 'cities.id as city_id', 'areas.id as area_id'])
            ->orderBy('areas.id')
            ->get()
            ->groupBy(fn (object $area): string => $area->iso2 . ':' . $area->name_en);

        $now = now();
        $villages = [];

        foreach ($villagesByCity as $iso2 => $cityGroups) {
            foreach ($cityGroups as $cityName => $names) {
                $key = $iso2 . ':' . $cityName;

                $cityAreaOptions = $cityAreas[$key] ?? collect();

                if ($cityAreaOptions->isEmpty()) {
                    throw new RuntimeException("Seed areas for city [{$cityName}] in country [{$iso2}] before seeding villages.");
                }

                $areaIndex = 0;

                foreach ($names as $nameEn => $nameAr) {
                    $villages[] = [
                        'city_id' => $cityAreaOptions[$areaIndex % $cityAreaOptions->count()]->city_id,
                        'area_id' => $cityAreaOptions[$areaIndex % $cityAreaOptions->count()]->area_id,
                        'name_en' => $nameEn,
                        'name_ar' => $nameAr,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];

                    $areaIndex++;
                }
            }
        }

        DB::table('villages')->upsert($villages, ['area_id', 'name_en'], ['name_ar', 'updated_at']);
    }
}
