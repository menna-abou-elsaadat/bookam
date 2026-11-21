<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $capitalCities = [
            'AE' => ['Abu Dhabi' => 'أبوظبي'],
            'AR' => ['Buenos Aires' => 'بوينس آيرس'],
            'AU' => ['Canberra' => 'كانبرا'],
            'BD' => ['Dhaka' => 'دكا'],
            'BR' => ['Brasília' => 'برازيليا'],
            'CA' => ['Ottawa' => 'أوتاوا'],
            'CH' => ['Bern' => 'برن'],
            'CN' => ['Beijing' => 'بكين'],
            'DE' => ['Berlin' => 'برلين'],
            'DK' => ['Copenhagen' => 'كوبنهاغن'],
            'EG' => [
                            'Cairo' => 'القاهرة',
                            'Alexandria' => 'الإسكندرية',
                            'Giza' => 'الجيزة',
                            'Shubra El Kheima' => 'شبرا الخيمة',
                            'Port Said' => 'بورسعيد',
                            'Suez' => 'السويس',
                            'Luxor' => 'الأقصر',
                            'Aswan' => 'أسوان',
                            'Asyut' => 'أسيوط',
                            'Ismailia' => 'الإسماعيلية',
                            'Faiyum' => 'الفيوم',
                            'Zagazig' => 'الزقازيق',
                            'Damietta' => 'دمياط',
                            'Mansoura' => 'المنصورة',
                            'Tanta' => 'طنطا',
                            'Beni Suef' => 'بني سويف',
                            'Minya' => 'المنيا',
                            'Qena' => 'قنا',
                            'Sohag' => 'سوهاج',
                            'Hurghada' => 'الغردقة',
                            'Sharm El Sheikh' => 'شرم الشيخ',
                            'Marsa Matruh' => 'مرسى مطروح',
                            'Arish' => 'العريش',
                            'Banha' => 'بنها',
                            'Kafr El Sheikh' => 'كفر الشيخ',
                            'Damanhur' => 'دمنهور',
                            'Mahalla El Kubra' => 'المحلة الكبرى',
                            '10th of Ramadan City' => 'مدينة العاشر من رمضان',
                            '6th of October City' => 'مدينة السادس من أكتوبر',
                            'New Cairo' => 'القاهرة الجديدة',
                            'Obour City' => 'مدينة العبور',
                            'Sheikh Zayed City' => 'مدينة الشيخ زايد',
                            'New Administrative Capital' => 'العاصمة الإدارية الجديدة',
                            'Sadat City' => 'مدينة السادات',
                            'Badr City' => 'مدينة بدر',
                            'New Damietta' => 'دمياط الجديدة',
                            'New Mansoura' => 'المنصورة الجديدة',
                            'New Alamein' => 'العلمين الجديدة',
                            'El Alamein' => 'العلمين',
                            'Borg El Arab' => 'برج العرب',
                            'Kafr El Dawwar' => 'كفر الدوار',
                            'Desouk' => 'دسوق',
                            'Rashid' => 'رشيد',
                            'Idku' => 'إدكو',
                            'Bilqas' => 'بلقاس',
                            'Mit Ghamr' => 'ميت غمر',
                            'Talkha' => 'طلخا',
                            'Aga' => 'أجا',
                            'Belbeis' => 'بلبيس',
                            'Abu Hammad' => 'أبو حماد',
                            'Abu Kabir' => 'أبو كبير',
                            'Minya El Qamh' => 'منيا القمح',
                            'Qalyub' => 'قليوب',
                            'Qaha' => 'قها',
                            'Tukh' => 'طوخ',
                            'Kafr Shukr' => 'كفر شكر',
                            'Shebin El Kom' => 'شبين الكوم',
                            'Menouf' => 'منوف',
                            'Ashmoun' => 'أشمون',
                            'Tala' => 'تلا',
                            'Basyoun' => 'بسيون',
                            'Zefta' => 'زفتى',
                            'Samanoud' => 'سمنود',
                            'Kafr El Zayat' => 'كفر الزيات',
                            'Fuwah' => 'فوه',
                            'Metoubes' => 'مطوبس',
                            'Deshna' => 'دشنا',
                            'Nag Hammadi' => 'نجع حمادي',
                            'Qus' => 'قوص',
                            'Edfu' => 'إدفو',
                            'Kom Ombo' => 'كوم أمبو',
                            'Abu Simbel' => 'أبو سمبل',
                            'Dairut' => 'ديروط',
                            'Manfalut' => 'منفلوط',
                            'Abnoub' => 'أبنوب',
                            'Mallawi' => 'ملوي',
                            'Samalut' => 'سمالوط',
                            'Beni Mazar' => 'بني مزار',
                            'Maghagha' => 'مغاغة',
                            'Ihnasya' => 'إهناسيا',
                            'Nasser' => 'ناصر',
                            'El Wasta' => 'الواسطى',
                            'New Beni Suef' => 'بني سويف الجديدة',
                            'New Minya' => 'المنيا الجديدة',
                            'New Assiut' => 'أسيوط الجديدة',
                            'New Qena' => 'قنا الجديدة',
                            'New Sohag' => 'سوهاج الجديدة',
                            'New Luxor' => 'الأقصر الجديدة',
                            'New Aswan' => 'أسوان الجديدة',
                            'Ras Gharib' => 'رأس غارب',
                            'Safaga' => 'سفاجا',
                            'Quseir' => 'القصير',
                            'Marsa Alam' => 'مرسى علم',
                            'Dahab' => 'دهب',
                            'Nuweiba' => 'نويبع',
                            'Taba' => 'طابا',
                            'El Tor' => 'الطور',
                            'Bir al-Abed' => 'بئر العبد',
                            'Rafah' => 'رفح',
                            'Sheikh Zuweid' => 'الشيخ زويد',
                            'Siwa' => 'سيوة',
                            'Sallum' => 'السلوم',
                            'New Valley' => 'الوادي الجديد',
                            'Kharga' => 'الخارجة',
                            'Dakhla' => 'الداخلة',
                        ],
            'ES' => ['Madrid' => 'مدريد'],
            'ET' => ['Addis Ababa' => 'أديس أبابا'],
            'FR' => ['Paris' => 'باريس'],
            'GB' => ['London' => 'لندن'],
            'GH' => ['Accra' => 'أكرا'],
            'GR' => ['Athens' => 'أثينا'],
            'ID' => ['Jakarta' => 'جاكرتا'],
            'IE' => ['Dublin' => 'دبلن'],
            'IN' => ['New Delhi' => 'نيودلهي'],
            'IT' => ['Rome' => 'روما'],
            'JP' => ['Tokyo' => 'طوكيو'],
            'KE' => ['Nairobi' => 'نيروبي'],
            'KR' => ['Seoul' => 'سيول'],
            'MX' => ['Mexico City' => 'مكسيكو سيتي'],
            'NG' => ['Abuja' => 'أبوجا'],
            'NL' => ['Amsterdam' => 'أمستردام'],
            'NO' => ['Oslo' => 'أوسلو'],
            'NZ' => ['Wellington' => 'ويلينغتون'],
            'PK' => ['Islamabad' => 'إسلام آباد'],
            'PT' => ['Lisbon' => 'لشبونة'],
            'RU' => ['Moscow' => 'موسكو'],
            'SA' => ['Riyadh' => 'الرياض'],
            'SE' => ['Stockholm' => 'ستوكهولم'],
            'SG' => ['Singapore' => 'سنغافورة'],
            'TH' => ['Bangkok' => 'بانكوك'],
            'TR' => ['Ankara' => 'أنقرة'],
            'US' => ['Washington, D.C.' => 'واشنطن العاصمة'],
            'ZA' => ['Pretoria' => 'بريتوريا'],
        ];

        $countryIds = DB::table('countries')
            ->whereIn('iso2', array_keys($capitalCities))
            ->pluck('id', 'iso2');

        if ($countryIds->count() !== count($capitalCities)) {
            throw new RuntimeException('Seed countries before seeding cities.');
        }

        $now = now();
        $cities = [];

        foreach ($capitalCities as $iso2 => $names) {
            foreach ($names as $nameEn => $nameAr) {
                $cities[] = [
                    'country_id' => $countryIds[$iso2],
                    'name_en' => $nameEn,
                    'name_ar' => $nameAr,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('cities')->upsert($cities, ['country_id', 'name_en'], ['name_ar', 'updated_at']);
    }
}
