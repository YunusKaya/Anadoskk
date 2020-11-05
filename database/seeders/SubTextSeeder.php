<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubTextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Alpinizm',
            'article'=>"<p>Hafifliğin ve hızın ön plana çıktığı ve aynı zamanda teknik tırmanış içeren dağcılık sporunun esas ruhunu temsil eden tırmanış sitilidir. Ana ve ara kamp yoktur. Hızlı ve hafif olmak için tek kamp noktasından hareket edilir. 'Temiz tırmanış' diye tabir edilen ve tırmanış sonrası rotayı değiştirmeyen 'doğal' yöntemler kullanılır.</p>",
            'img'=>'img/alpinizim.jpg',
            'slug'=>Str::slug('Alpinizm').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Spor Tırmanışı',
            'article'=>"<p>Genellikle kaya üzerinde ya da yapay duvarlarda kullanılan tırmanma stilidir. Kendi içinde dört ana kısma ayrılır</p>",
            'img'=>'img/sportsclimb.jpg',
            'slug'=>Str::slug('Spor Tırmanışı').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Free-solo',
            'article'=>"<p>Hiçbir emniyet aleti kullanılmadan, kaya tırmanış ayakkabısı ve toz torbasıyla yapılmaktadır. Free-solo fazlasıyla deneyim gerektirir. Dünya genelinde Bu türde tırmanıcı sayısı oldukça azdır. Bu stilde tırmanmak için fiziksel olduğu kadar psikolojik olarak da hazır olmak gerekiyor. Çünkü, yapılan hata çoğunlukla ölümle sonuçlanabilmektedir.</p>",
            'img'=>'img/Free-solo.jpg',
            'slug'=>Str::slug('Free-solo').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Geleneksel Tırmanış',
            'article'=>"<p>Yükselmek için çeşitli aletlerden faydalanılarak yapılan tırmanış türüdür. Yapay tırmanışta, sikke, jumar, hook, ip, merdiven gibi aletler kullanılır. Çıkışta, lider tırmanıcının örneğin sikkeye (emniyet noktası oluşturmak için kayaya çakılan metal) basması durumuna yapay çıkış adı verilir.</p>",
            'img'=>'img/geleneksel.jpg',
            'slug'=>Str::slug('Geleneksel Tırmanış').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Uzun Duvar Tırmanışı',
            'article'=>"<p>Kaya tırmanma tekniklerini ve emniyet malzemelerini kullanarak bir ip boyundan daha yüksek olan kaya üzerinde yapılan tırmanış şeklidir.</p>",
            'img'=>'img/uzunduvar.jpg',
            'slug'=>Str::slug('Uzun Duvar Tırmanışı').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Yapay Duvar Tırmanışı',
            'article'=>"<p>Çoğunlukla kapalı alanlarda kimyasal malzemeler kullanılarak yapılan, sabit veya ayarlanabilen duvar sistemlerine tırmanma etkinliğidir. Yarışma etkinlikleri veya antrenmana yönelik hazırlanan yapay duvarlar, farklı biçimlerde ve aralıklarda basamak ve tutamakları içerir.</p>",
            'img'=>'img/yapayduvar.jpg',
            'slug'=>Str::slug('Yapay Duvar Tırmanışı').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Trekking ve Hiking',
            'article'=>"<p>Türkçede Dağ veya doğa yürüyüşü olarak kullanılmasına karşılık dağ ve doğa yürüyüşünün tam karşılığı 'hiking'dir. Günü birlik olarak yapılır ve kamplı konaklama içermez. Eğer bu aktivite kamplı olacaksa adı 'trekking' olur.</p>",
            'img'=>'img/TrekkingveHiking.jpg',
            'slug'=>Str::slug('Trekking ve Hiking').uniqid()
        ]);
        DB::table('subtexts')->insert([
            'title_id'=>2,
            'textsub'=>'Ekspedisyon',
            'article'=>"<p>Uzun zaman gerektiren ve tırmanılan yükseklik bakımından vücudun iklime uyum sağlayabilmesine olanak sağlamak amacı ile bol miktarda iniş çıkış içeren Yüksek İrtifa Tırmanışı'nın İngilizce adıdır. Tırmanıcılar zirveye çıkana kadar kendi kamp yüklerini bir üst kampa taşırlarken birden fazla gitgel yaptıkları faaliyettir.</p>",
            'img'=>'img/Ekspedisyon.jpg',
            'slug'=>Str::slug('Ekspedisyon').uniqid()
        ]);    }
}
