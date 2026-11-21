<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areasByCity = [
            'AE' => ['Abu Dhabi' => ['Al Khalidiyah' => 'الخالدية', 'Al Reem Island' => 'جزيرة الريم', 'Al Maryah Island' => 'جزيرة المارية', 'Saadiyat Island' => 'جزيرة السعديات', 'Yas Island' => 'جزيرة ياس', 'Al Raha Beach' => 'شاطئ الراحة', 'Corniche Area' => 'منطقة الكورنيش', 'Khalifa City' => 'مدينة خليفة']],
            'AR' => ['Buenos Aires' => ['Palermo' => 'باليرمو', 'Recoleta' => 'ريكوليتا', 'San Telmo' => 'سان تيلمو', 'Puerto Madero' => 'بويرتو ماديرو', 'Belgrano' => 'بيلغرانو', 'Villa Crespo' => 'فيلا كريسبو', 'Retiro' => 'ريتيرو', 'La Boca' => 'لا بوكا']],
            'AU' => ['Canberra' => ['Civic' => 'سيفيك', 'Belconnen' => 'بيلكونن', 'Woden' => 'وودن', 'Tuggeranong' => 'توغرانونغ', 'Gungahlin' => 'غونغاهلين', 'Kingston' => 'كينغستون', 'Braddon' => 'برادون', 'Dickson' => 'ديكسون']],
            'BD' => ['Dhaka' => ['Gulshan' => 'غولشان', 'Dhanmondi' => 'دانموندي', 'Banani' => 'بنانِي', 'Uttara' => 'أوتارا', 'Motijheel' => 'موتيجيل', 'Mohammadpur' => 'محمدبور', 'Mirpur' => 'ميربور', 'Baridhara' => 'باريهارا']],
            'BR' => ['Brasília' => ['Asa Sul' => 'آسا سول', 'Asa Norte' => 'آسا نورتي', 'Lago Sul' => 'لاغو سول', 'Lago Norte' => 'لاغو نورتي', 'Sudoeste' => 'سودويستي', 'Noroeste' => 'نورويستي', 'Taguatinga' => 'تاغواتينغا', 'Plano Piloto' => 'بلانو بيلوتو']],
            'CA' => ['Ottawa' => ['Centretown' => 'سنترتاون', 'Kanata' => 'كاناتا', 'Nepean' => 'نيبيان', 'Orléans' => 'أورليان', 'Barrhaven' => 'بارهافن', 'Westboro' => 'ويستبورو', 'The Glebe' => 'ذا غليب', 'ByWard Market' => 'سوق بايوارد']],
            'CH' => ['Bern' => ['Old City' => 'المدينة القديمة', 'Länggasse' => 'لينغاسه', 'Kirchenfeld' => 'كيرشنفيلد', 'Breitenrain' => 'برايتنراين', 'Mattenhof' => 'ماتنهوف', 'Bümpliz' => 'بومبليتس', 'Lorraine' => 'لورين']],
            'CN' => ['Beijing' => ['Chaoyang' => 'تشاويانغ', 'Dongcheng' => 'دونغتشنغ', 'Xicheng' => 'شيتشنغ', 'Haidian' => 'هايديان', 'Fengtai' => 'فنغتاي', 'Shijingshan' => 'شيجينغشان', 'Tongzhou' => 'تونغتشو', 'Shunyi' => 'شونيي']],
            'DE' => ['Berlin' => ['Mitte' => 'ميته', 'Kreuzberg' => 'كرويتسبرغ', 'Friedrichshain' => 'فريدريشهاين', 'Prenzlauer Berg' => 'برينتسلاور بيرغ', 'Charlottenburg' => 'شارلوتنبورغ', 'Neukölln' => 'نويكولن', 'Wedding' => 'فيدينغ', 'Schöneberg' => 'شونبيرغ']],
            'DK' => ['Copenhagen' => ['Indre By' => 'إندري باي', 'Vesterbro' => 'فيستربرو', 'Nørrebro' => 'نوربرو', 'Østerbro' => 'أستربرو', 'Frederiksberg' => 'فريدريكسبرغ', 'Christianshavn' => 'كريستيانشافن', 'Amager' => 'أماغر', 'Valby' => 'فالباي']],
            'EG' => [
                            'Cairo' => ['Zamalek' => 'الزمالك', 'Maadi' => 'المعادي', 'Heliopolis' => 'مصر الجديدة', 'New Cairo' => 'القاهرة الجديدة', 'Downtown Cairo' => 'وسط البلد', 'Nasr City' => 'مدينة نصر', 'Garden City' => 'جاردن سيتي', 'Dokki' => 'الدقي', 'Mohandessin' => 'المهندسين', 'Agouza' => 'العجوزة', 'Helwan' => 'حلوان', 'Ain Shams' => 'عين شمس', 'Shubra' => 'شبرا', 'Mokattam' => 'المقطم', 'New Capital' => 'العاصمة الإدارية الجديدة', 'Fifth Settlement' => 'التجمع الخامس'],
                            'Alexandria' => ['Miami' => 'ميامي', 'Sidi Bishr' => 'سيدي بشر', 'Montaza' => 'المنتزه', 'Stanley' => 'ستانلي', 'Gleem' => 'جليم', 'Smouha' => 'سموحة', 'Roushdy' => 'رشدي', 'Sidi Gaber' => 'سيدي جابر', 'Agami' => 'العجمي', 'Borg El Arab' => 'برج العرب', 'Mandara' => 'المندرة', 'Mansheya' => 'المنشية'],
                            'Giza' => ['Dokki' => 'الدقي', 'Mohandessin' => 'المهندسين', 'Haram' => 'الهرم', 'Faisal' => 'فيصل', 'Sheikh Zayed' => 'الشيخ زايد', '6th of October' => 'السادس من أكتوبر', 'Agouza' => 'العجوزة', 'Imbaba' => 'إمبابة', 'Bulaq al-Dakrur' => 'بولاق الدكرور', 'Smart Village' => 'القرية الذكية'],
                            'Shubra El Kheima' => ['East Shubra El Kheima' => 'شرق شبرا الخيمة', 'West Shubra El Kheima' => 'غرب شبرا الخيمة', 'Bahteem' => 'بهتيم', 'Mostorod' => 'مسطرد'],
                            'Port Said' => ['Port Fouad' => 'بورفؤاد', 'Al Arab' => 'العرب', 'Al Manakh' => 'المناخ', 'Al Sharq' => 'الشرق', 'Al Dawahi' => 'الضواحي', 'Al Zohour' => 'الزهور'],
                            'Suez' => ['Arbaeen' => 'الأربعين', 'Attaka' => 'عتاقة', 'Faisal' => 'فيصل', 'Ganayen' => 'الجناين', 'Suez District' => 'حي السويس'],
                            'Luxor' => ['East Bank' => 'البر الشرقي', 'West Bank' => 'البر الغربي', 'Karnak' => 'الكرنك', 'Armant' => 'أرمنت', 'Esna' => 'إسنا'],
                            'Aswan' => ['Aswan City' => 'مدينة أسوان', 'Elephantine Island' => 'جزيرة إلفنتين', 'New Aswan' => 'أسوان الجديدة', 'Kom Ombo' => 'كوم أمبو', 'Edfu' => 'إدفو'],
                            'Asyut' => ['East Assiut' => 'شرق أسيوط', 'West Assiut' => 'غرب أسيوط', 'New Assiut' => 'أسيوط الجديدة', 'Dairut' => 'ديروط', 'Manfalut' => 'منفلوط'],
                            'Ismailia' => ['Sheikh Zayed' => 'حي الشيخ زايد', 'El Tal El Kebir' => 'التل الكبير', 'Fayed' => 'فايد', 'Qantara East' => 'القنطرة شرق', 'Qantara West' => 'القنطرة غرب'],
                            'Faiyum' => ['Faiyum City' => 'مدينة الفيوم', 'New Faiyum' => 'الفيوم الجديدة', 'Senoures' => 'سنورس', 'Tamiya' => 'طامية', 'Abshaway' => 'إبشواي'],
                            'Zagazig' => ['East Zagazig' => 'شرق الزقازيق', 'West Zagazig' => 'غرب الزقازيق', 'Heri' => 'هرية رزنة', 'Kafr Abdel Aziz' => 'كفر عبد العزيز'],
                            'Damietta' => ['New Damietta' => 'دمياط الجديدة', 'Ras El Bar' => 'رأس البر', 'Ezbet El Borg' => 'عزبة البرج', 'Faraskur' => 'فارسكور', 'Kafr Saad' => 'كفر سعد'],
                            'Mansoura' => ['Mansoura City Center' => 'وسط المنصورة', 'Gehan Street' => 'شارع جيهان', 'Toriel' => 'توريل', 'New Mansoura' => 'المنصورة الجديدة', 'Talkha' => 'طلخا'],
                            'Tanta' => ['Tanta City Center' => 'وسط طنطا', 'Sibrebay' => 'سبرباي', 'El Geish Street' => 'شارع الجيش', 'Qutour' => 'قطور', 'Basyoun' => 'بسيون'],
                            'Beni Suef' => ['Beni Suef City' => 'مدينة بني سويف', 'New Beni Suef' => 'بني سويف الجديدة', 'El Wasta' => 'الواسطى', 'Nasser' => 'ناصر', 'Ihnasya' => 'إهناسيا'],
                            'Minya' => ['Minya City' => 'مدينة المنيا', 'New Minya' => 'المنيا الجديدة', 'Mallawi' => 'ملوي', 'Samalut' => 'سمالوط', 'Beni Mazar' => 'بني مزار'],
                            'Qena' => ['Qena City' => 'مدينة قنا', 'New Qena' => 'قنا الجديدة', 'Nag Hammadi' => 'نجع حمادي', 'Deshna' => 'دشنا', 'Qus' => 'قوص'],
                            'Sohag' => ['Sohag City' => 'مدينة سوهاج', 'New Sohag' => 'سوهاج الجديدة', 'Akhmim' => 'أخميم', 'Girga' => 'جرجا', 'Tahta' => 'طهطا'],
                            'Hurghada' => ['Sakkala' => 'السقالة', 'Dahar' => 'الدهار', 'Village Road' => 'طريق القرى', 'El Kawther' => 'الكوثر', 'Magawish' => 'مجاويش'],
                            'Sharm El Sheikh' => ['Naama Bay' => 'خليج نعمة', 'Nabq' => 'نبق', 'Hadaba' => 'الهضبة', 'Sharks Bay' => 'خليج القرش', 'Old Market' => 'السوق القديم', 'Montazah' => 'المنتزه'],
                            'Marsa Matruh' => ['Marsa Matruh Center' => 'وسط مرسى مطروح', 'Agiba' => 'عجيبة', 'Cleopatra Beach' => 'شاطئ كليوباترا', 'Alam El Roum' => 'علم الروم'],
                            'Arish' => ['Arish Center' => 'وسط العريش', 'Rays' => 'الريسة', 'Masaeed' => 'المساعيد', 'Dahiyat El Salam' => 'حي السلام'],
                            'Banha' => ['Banha City Center' => 'وسط بنها', 'Kafr El Gazar' => 'كفر الجزار', 'Mit Asem' => 'ميت عاصم'],
                            'Kafr El Sheikh' => ['Kafr El Sheikh Center' => 'وسط كفر الشيخ', 'Desouk' => 'دسوق', 'Fuwah' => 'فوه', 'Metoubes' => 'مطوبس', 'Baltim' => 'بلطيم'],
                            'Damanhur' => ['Damanhur Center' => 'وسط دمنهور', 'Shubra Kheit' => 'شبراخيت', 'Kafr El Dawwar' => 'كفر الدوار', 'Rashid' => 'رشيد', 'Edku' => 'إدكو'],
                            'Mahalla El Kubra' => ['Mahalla Center' => 'وسط المحلة الكبرى', 'Samanoud' => 'سمنود', 'Zefta' => 'زفتى'],
                            '10th of Ramadan City' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني', 'Industrial Zone' => 'المنطقة الصناعية', 'University District' => 'منطقة الجامعة'],
                            '6th of October City' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني', 'Third District' => 'الحي الثالث', 'Fourth District' => 'الحي الرابع', 'Tourist District' => 'الحي السياحي', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'New Cairo' => ['Fifth Settlement' => 'التجمع الخامس', 'Third Settlement' => 'التجمع الثالث', 'First Settlement' => 'التجمع الأول', 'Rehab City' => 'مدينة الرحاب', 'Madinaty' => 'مدينتي', 'South Academy' => 'أكاديمية جنوب'],
                            'Obour City' => ['First District' => 'الحي الأول', 'Fifth District' => 'الحي الخامس', 'Ninth District' => 'الحي التاسع', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'Sheikh Zayed City' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني', 'Beverly Hills' => 'بيفرلي هيلز', 'Green Revolution' => 'الثورة الخضراء'],
                            'New Administrative Capital' => ['Government District' => 'الحي الحكومي', 'Financial District' => 'حي المال والأعمال', 'R7' => 'منطقة R7', 'R8' => 'منطقة R8', 'Downtown' => 'منطقة الداون تاون'],
                            'Sadat City' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'Badr City' => ['First District' => 'الحي الأول', 'Third District' => 'الحي الثالث', 'Fifth District' => 'الحي الخامس', 'New Badr' => 'بدر الجديدة'],
                            'New Damietta' => ['First District' => 'الحي الأول', 'Central District' => 'الحي المركزي', 'Coastal District' => 'المنطقة الساحلية'],
                            'New Mansoura' => ['First Phase' => 'المرحلة الأولى', 'Second Phase' => 'المرحلة الثانية', 'Coastal Zone' => 'المنطقة الساحلية'],
                            'New Alamein' => ['Tourist District' => 'الحي السياحي', 'Heritage City' => 'مدينة التراث', 'Latin District' => 'الحي اللاتيني', 'Downtown' => 'منطقة الداون تاون'],
                            'El Alamein' => ['Marina' => 'مارينا', 'Sidi Abdel Rahman' => 'سيدي عبد الرحمن', 'Maraqia' => 'مراقيا'],
                            'Borg El Arab' => ['Borg El Arab City' => 'مدينة برج العرب', 'Industrial Zone' => 'المنطقة الصناعية', 'King Mariout' => 'كينج مريوط'],
                            'Kafr El Dawwar' => ['Kafr El Dawwar Center' => 'وسط كفر الدوار', 'Abis' => 'أبيس', 'Sidi Ghazi' => 'سيدي غازي'],
                            'Desouk' => ['Desouk Center' => 'وسط دسوق', 'Abu Mandour' => 'أبو مندور'],
                            'Rashid' => ['Rashid Center' => 'وسط رشيد', 'Rashid Corniche' => 'كورنيش رشيد'],
                            'Idku' => ['Idku Center' => 'وسط إدكو', 'Lake District' => 'منطقة البحيرة'],
                            'Bilqas' => ['Bilqas Center' => 'وسط بلقاس', 'Gamasa' => 'جمصة'],
                            'Mit Ghamr' => ['Mit Ghamr Center' => 'وسط ميت غمر', 'Aga' => 'أجا'],
                            'Talkha' => ['Talkha Center' => 'وسط طلخا', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'Aga' => ['Aga Center' => 'وسط أجا'],
                            'Belbeis' => ['Belbeis Center' => 'وسط بلبيس', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'Abu Hammad' => ['Abu Hammad Center' => 'وسط أبو حماد'],
                            'Abu Kabir' => ['Abu Kabir Center' => 'وسط أبو كبير'],
                            'Minya El Qamh' => ['Minya El Qamh Center' => 'وسط منيا القمح'],
                            'Qalyub' => ['Qalyub Center' => 'وسط قليوب'],
                            'Qaha' => ['Qaha Center' => 'وسط قها'],
                            'Tukh' => ['Tukh Center' => 'وسط طوخ'],
                            'Kafr Shukr' => ['Kafr Shukr Center' => 'وسط كفر شكر'],
                            'Shebin El Kom' => ['Shebin El Kom Center' => 'وسط شبين الكوم', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'Menouf' => ['Menouf Center' => 'وسط منوف'],
                            'Ashmoun' => ['Ashmoun Center' => 'وسط أشمون'],
                            'Tala' => ['Tala Center' => 'وسط تلا'],
                            'Basyoun' => ['Basyoun Center' => 'وسط بسيون'],
                            'Zefta' => ['Zefta Center' => 'وسط زفتى'],
                            'Samanoud' => ['Samanoud Center' => 'وسط سمنود'],
                            'Kafr El Zayat' => ['Kafr El Zayat Center' => 'وسط كفر الزيات'],
                            'Fuwah' => ['Fuwah Center' => 'وسط فوه'],
                            'Metoubes' => ['Metoubes Center' => 'وسط مطوبس'],
                            'Deshna' => ['Deshna Center' => 'وسط دشنا'],
                            'Nag Hammadi' => ['Nag Hammadi Center' => 'وسط نجع حمادي'],
                            'Qus' => ['Qus Center' => 'وسط قوص'],
                            'Edfu' => ['Edfu Center' => 'وسط إدفو'],
                            'Kom Ombo' => ['Kom Ombo Center' => 'وسط كوم أمبو'],
                            'Abu Simbel' => ['Abu Simbel Center' => 'وسط أبو سمبل'],
                            'Dairut' => ['Dairut Center' => 'وسط ديروط'],
                            'Manfalut' => ['Manfalut Center' => 'وسط منفلوط'],
                            'Abnoub' => ['Abnoub Center' => 'وسط أبنوب'],
                            'Mallawi' => ['Mallawi Center' => 'وسط ملوي'],
                            'Samalut' => ['Samalut Center' => 'وسط سمالوط'],
                            'Beni Mazar' => ['Beni Mazar Center' => 'وسط بني مزار'],
                            'Maghagha' => ['Maghagha Center' => 'وسط مغاغة'],
                            'Ihnasya' => ['Ihnasya Center' => 'وسط إهناسيا'],
                            'Nasser' => ['Nasser Center' => 'وسط ناصر'],
                            'El Wasta' => ['El Wasta Center' => 'وسط الواسطى'],
                            'New Beni Suef' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني'],
                            'New Minya' => ['First District' => 'الحي الأول', 'Second District' => 'الحي الثاني'],
                            'New Assiut' => ['First District' => 'الحي الأول', 'Industrial Zone' => 'المنطقة الصناعية'],
                            'New Qena' => ['First District' => 'الحي الأول', 'University District' => 'منطقة الجامعة'],
                            'New Sohag' => ['First District' => 'الحي الأول', 'University District' => 'منطقة الجامعة'],
                            'New Luxor' => ['First District' => 'الحي الأول'],
                            'New Aswan' => ['First District' => 'الحي الأول'],
                            'Ras Gharib' => ['Ras Gharib Center' => 'وسط رأس غارب'],
                            'Safaga' => ['Safaga Center' => 'وسط سفاجا', 'Port Area' => 'منطقة الميناء'],
                            'Quseir' => ['Quseir Center' => 'وسط القصير'],
                            'Marsa Alam' => ['Marsa Alam Center' => 'وسط مرسى علم'],
                            'Dahab' => ['Lighthouse' => 'اللايت هاوس', 'Mashraba' => 'المشربة', 'Assalah' => 'العسلة'],
                            'Nuweiba' => ['Nuweiba Tarabin' => 'نويبع الترابين', 'Nuweiba Muzeina' => 'نويبع المزينة'],
                            'Taba' => ['Taba Heights' => 'طابا هايتس', 'Taba Center' => 'وسط طابا'],
                            'El Tor' => ['El Tor Center' => 'وسط الطور'],
                            'Bir al-Abed' => ['Bir al-Abed Center' => 'وسط بئر العبد'],
                            'Rafah' => ['Rafah Center' => 'وسط رفح'],
                            'Sheikh Zuweid' => ['Sheikh Zuweid Center' => 'وسط الشيخ زويد'],
                            'Siwa' => ['Siwa Oasis Center' => 'وسط واحة سيوة', 'Aghurmi' => 'أغورمي'],
                            'Sallum' => ['Sallum Center' => 'وسط السلوم'],
                            'New Valley' => ['Kharga' => 'الخارجة', 'Dakhla' => 'الداخلة'],
                            'Kharga' => ['Kharga Center' => 'وسط الخارجة', 'Paris' => 'باريس'],
                            'Dakhla' => ['Mut' => 'موط', 'Qasr Dakhla' => 'القصر'],
                        ],
            'ES' => ['Madrid' => ['Centro' => 'وسط المدينة', 'Salamanca' => 'سالامانكا', 'Chamberí' => 'تشامبيري', 'Retiro' => 'ريتيرو', 'Chamartín' => 'تشامارتين', 'Malasaña' => 'مالاسانيا', 'Lavapiés' => 'لافابييس', 'La Latina' => 'لا لاتينا']],
            'ET' => ['Addis Ababa' => ['Bole' => 'بولي', 'Kazanchis' => 'كازانتشيس', 'Piassa' => 'بيازا', 'Arada' => 'أرادا', 'Kirkos' => 'كيركوس', 'Old Airport' => 'المطار القديم', 'Megenagna' => 'ميغنانيا']],
            'FR' => ['Paris' => ['Le Marais' => 'لو ماريه', 'Montmartre' => 'مونمارتر', 'Latin Quarter' => 'الحي اللاتيني', 'Saint-Germain-des-Prés' => 'سان جيرمان دي بري', 'Champs-Élysées' => 'الشانزليزيه', 'Bastille' => 'الباستيل', 'Montparnasse' => 'مونبارناس', 'Belleville' => 'بيلفيل']],
            'GB' => ['London' => ['Westminster' => 'وستمنستر', 'Camden' => 'كامدن', 'Kensington' => 'كنسينغتون', 'Chelsea' => 'تشيلسي', 'Soho' => 'سوهو', 'Shoreditch' => 'شورديتش', 'Greenwich' => 'غرينتش', 'Canary Wharf' => 'كناري وارف']],
            'GH' => ['Accra' => ['Osu' => 'أوسو', 'Cantonments' => 'كانتونمنتس', 'East Legon' => 'إيست ليغون', 'Labone' => 'لابوني', 'Airport Residential' => 'حي المطار السكني', 'Ridge' => 'ريدج', 'Dansoman' => 'دانسومان', 'Spintex' => 'سبينتكس']],
            'GR' => ['Athens' => ['Plaka' => 'بلاكا', 'Kolonaki' => 'كولوناكي', 'Monastiraki' => 'موناستيراكي', 'Psiri' => 'بسيري', 'Koukaki' => 'كوكاكي', 'Exarchia' => 'إكسارتشيا', 'Syntagma' => 'سينتاغما', 'Glyfada' => 'غليفاذا']],
            'ID' => ['Jakarta' => ['Menteng' => 'منتنغ', 'Kemang' => 'كيمانغ', 'SCBD' => 'إس سي بي دي', 'Kuningan' => 'كونينغان', 'Senayan' => 'سنايان', 'Kelapa Gading' => 'كيلاپا غادينغ', 'Tanah Abang' => 'تاناه أبانغ', 'Kota Tua' => 'كوتا توا']],
            'IE' => ['Dublin' => ['Temple Bar' => 'تمبل بار', 'Ranelagh' => 'رانيلا', 'Rathmines' => 'راثماينز', 'Ballsbridge' => 'بولزبريدج', 'Docklands' => 'دوكلاندز', 'Smithfield' => 'سميثفيلد', 'Stoneybatter' => 'ستونيباتر', 'Portobello' => 'بورتوبيلو']],
            'IN' => ['New Delhi' => ['Connaught Place' => 'كونوت بليس', 'Hauz Khas' => 'هاوز خاس', 'Chandni Chowk' => 'تشاندني تشوك', 'Karol Bagh' => 'كارول باغ', 'Lajpat Nagar' => 'لاجبت ناغار', 'Greater Kailash' => 'غريتر كايلاش', 'Saket' => 'ساكيت', 'Dwarka' => 'دواركا']],
            'IT' => ['Rome' => ['Trastevere' => 'تراستيفيري', 'Monti' => 'مونتي', 'Centro Storico' => 'المركز التاريخي', 'Prati' => 'براتي', 'Testaccio' => 'تيستاتشيو', 'Tridente' => 'تريدينتي', 'EUR' => 'إي يو آر', 'San Lorenzo' => 'سان لورينزو']],
            'JP' => ['Tokyo' => ['Shibuya' => 'شيبويا', 'Shinjuku' => 'شينجوكو', 'Ginza' => 'غينزا', 'Minato' => 'ميناتو', 'Asakusa' => 'أساكوسا', 'Ueno' => 'أوينو', 'Akihabara' => 'أكيهابارا', 'Roppongi' => 'روبونغي']],
            'KE' => ['Nairobi' => ['Westlands' => 'ويستلاندز', 'Karen' => 'كارين', 'Kilimani' => 'كيليماني', 'Lavington' => 'لافينغتون', 'Upper Hill' => 'أبر هيل', 'Kileleshwa' => 'كيليشوا', 'Central Business District' => 'حي الأعمال المركزي', 'Parklands' => 'باركلاندز']],
            'KR' => ['Seoul' => ['Gangnam' => 'غانغنام', 'Hongdae' => 'هونغداي', 'Itaewon' => 'إيتايوون', 'Myeongdong' => 'ميونغ دونغ', 'Jongno' => 'جونغنو', 'Insadong' => 'إنسادونغ', 'Yeouido' => 'يويدو', 'Jamsil' => 'جامسيل']],
            'MX' => ['Mexico City' => ['Centro Histórico' => 'المركز التاريخي', 'Polanco' => 'بولانكو', 'Condesa' => 'كونديسا', 'Roma Norte' => 'روما نورتي', 'Coyoacán' => 'كويوأكان', 'Reforma' => 'ريفورما', 'Santa Fe' => 'سانتا في', 'San Ángel' => 'سان أنخيل']],
            'NG' => ['Abuja' => ['Maitama' => 'مايتاما', 'Wuse' => 'ووسي', 'Garki' => 'غاركي', 'Asokoro' => 'أسوكورو', 'Jabi' => 'جابي', 'Gwarinpa' => 'غوارينبا', 'Central Business District' => 'حي الأعمال المركزي']],
            'NL' => ['Amsterdam' => ['Jordaan' => 'يوردان', 'De Pijp' => 'دي بايب', 'Centrum' => 'سنتروم', 'Oud-West' => 'أود-ويست', 'Oud-Zuid' => 'أود-زاود', 'Oost' => 'أوست', 'Noord' => 'نورد', 'Zuidas' => 'زاوداس']],
            'NO' => ['Oslo' => ['Grünerløkka' => 'غرونرلُكا', 'Frogner' => 'فروغنر', 'Majorstuen' => 'مايورستوين', 'Sentrum' => 'سنتروم', 'Aker Brygge' => 'آكر بريغه', 'Tøyen' => 'توين', 'St. Hanshaugen' => 'سانت هانسهاوغن', 'Grønland' => 'غرونلاند']],
            'NZ' => ['Wellington' => ['Te Aro' => 'تي آرو', 'Thorndon' => 'ثورندون', 'Cuba Quarter' => 'حي كوبا', 'Lambton Quay' => 'لامبتون كواي', 'Mount Victoria' => 'ماونت فيكتوريا', 'Newtown' => 'نيوتاون', 'Oriental Bay' => 'أورينتال باي', 'Karori' => 'كاروري']],
            'PK' => ['Islamabad' => ['F-6' => 'إف-6', 'F-7' => 'إف-7', 'F-8' => 'إف-8', 'E-7' => 'إي-7', 'G-6' => 'جي-6', 'G-8' => 'جي-8', 'Blue Area' => 'المنطقة الزرقاء', 'Diplomatic Enclave' => 'الحي الدبلوماسي']],
            'PT' => ['Lisbon' => ['Alfama' => 'ألفاما', 'Bairro Alto' => 'بايرو ألتو', 'Baixa' => 'بايشا', 'Chiado' => 'شيادو', 'Belém' => 'بيليم', 'Parque das Nações' => 'حديقة الأمم', 'Príncipe Real' => 'برينسيبي ريال', 'Graça' => 'غراسا']],
            'RU' => ['Moscow' => ['Arbat' => 'أربات', 'Tverskoy' => 'تفيري', 'Presnensky' => 'بريسنينسكي', 'Basmanny' => 'باسماني', 'Zamoskvorechye' => 'زاموسكفوريتشي', 'Khamovniki' => 'خاموفنيكي', 'Yakimanka' => 'ياكيمانكا', 'Tagansky' => 'تاغانسكي']],
            'SA' => ['Riyadh' => ['Olaya' => 'العليا', 'Al Malaz' => 'الملز', 'Al Nakheel' => 'النخيل', 'Al Yasmin' => 'الياسمين', 'Diplomatic Quarter' => 'الحي الدبلوماسي', 'Al Murabba' => 'المربع', 'Al Sulimaniyah' => 'السليمانية', 'Al Wurud' => 'الورود']],
            'SE' => ['Stockholm' => ['Gamla stan' => 'المدينة القديمة', 'Södermalm' => 'سوديرمالم', 'Östermalm' => 'أوستيرمالم', 'Vasastan' => 'فاساستان', 'Norrmalm' => 'نورمالم', 'Kungsholmen' => 'كونغشولمن', 'Djurgården' => 'يورغوردن']],
            'SG' => ['Singapore' => ['Marina Bay' => 'خليج مارينا', 'Orchard' => 'أورتشارد', 'Chinatown' => 'الحي الصيني', 'Little India' => 'الهند الصغيرة', 'Bugis' => 'بوغيس', 'Sentosa' => 'سينتوسا', 'Tiong Bahru' => 'تيونغ باهرو', 'Holland Village' => 'قرية هولاند']],
            'TH' => ['Bangkok' => ['Sukhumvit' => 'سوخومفيت', 'Silom' => 'سيلوم', 'Siam' => 'سيام', 'Sathorn' => 'ساتورن', 'Yaowarat' => 'ياوارات', 'Thonglor' => 'تونغلور', 'Ari' => 'آري', 'Riverside' => 'ضفة النهر']],
            'TR' => ['Ankara' => ['Çankaya' => 'تشانكايا', 'Kızılay' => 'كيزيلاي', 'Kavaklıdere' => 'كافاكليديري', 'Bahçelievler' => 'باهتشلي إيفلر', 'Ulus' => 'أولوس', 'Çayyolu' => 'تشايولو', 'Yenimahalle' => 'يني محله', 'Keçiören' => 'كيتشي أورين']],
            'US' => ['Washington, D.C.' => ['Georgetown' => 'جورج تاون', 'Capitol Hill' => 'كابيتول هيل', 'Dupont Circle' => 'دوبونت سيركل', 'Adams Morgan' => 'آدامز مورغان', 'Navy Yard' => 'نافي يارد', 'Foggy Bottom' => 'فوغي بوتوم', 'Shaw' => 'شو', 'U Street' => 'يو ستريت']],
            'ZA' => ['Pretoria' => ['Hatfield' => 'هاتفيلد', 'Brooklyn' => 'بروكلين', 'Arcadia' => 'أركاديا', 'Menlyn' => 'مينلين', 'Centurion' => 'سينتشوريون', 'Pretoria East' => 'شرق بريتوريا', 'Sunnyside' => 'ساني سايد', 'Waterkloof' => 'واتركلوف']],
        ];

        $cities = DB::table('cities')
            ->join('countries', 'countries.id', '=', 'cities.country_id')
            ->whereIn('countries.iso2', array_keys($areasByCity))
            ->select(['countries.iso2', 'cities.name_en', 'cities.id'])
            ->get()
            ->keyBy(fn (object $city): string => $city->iso2 . ':' . $city->name_en);

        $now = now();
        $areas = [];

        foreach ($areasByCity as $iso2 => $cityGroups) {
            foreach ($cityGroups as $cityName => $areaNames) {
                $key = $iso2 . ':' . $cityName;

                if (! isset($cities[$key])) {
                    throw new RuntimeException("Seed city [{$cityName}] for country [{$iso2}] before seeding areas.");
                }

                foreach ($areaNames as $nameEn => $nameAr) {
                    $areas[] = [
                        'city_id' => $cities[$key]->id,
                        'name_en' => $nameEn,
                        'name_ar' => $nameAr,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }
            }
        }

        DB::table('areas')->upsert($areas, ['city_id', 'name_en'], ['name_ar','updated_at']);
    }
}
