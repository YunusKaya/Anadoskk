<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('titles')->insert([
            'hood'=>'Dağcılık Nedir ?',
            'title_article'=>"<p>UIAA (Union Internationale des Associations d'Alpinisme, Uluslararası Dağcılık Federasyonları Birliği) dağcılığı; “dağların zirvesine ve/veya tanımlanmış bir noktasına tırmanarak ulaşılması” olarak tanımlar. Bir diğer tanıma göre dağcılık insanların doğayı, yaşamı ve kendilerini tanımak için, kendi fiziksel ve psikolojik sınırlarını öğrenmek ve geliştirmek için doğada, yükseklere doğru yaptıkları yolculukların oluşturduğu bir spor dalıdır.'Dağcılık, dağlarda yürüyüş ve kamp kurmanın yanı sıra tırmanma sporunu da kapsayan bir doğa sporudur. 18 le 19. yüzyıllarda Avrupalı (İngiliz ve Fransızlar başta olmak üzere) zenginlerin boş zamanlarını değerlendirme ve hayatlarının rutinlerini yeni maceralarla süsleme arayışı neticesinde bir spor sayılmaya başlanan dağcılık, 20.yüzyılın başında diğer ulusların da ilgisini çekmeyi başarmıştır. Uluslararası bir spor haline gelmesi ise, 1931 yılında, merkezi Cenevre'de olan Uluslararası Dağcılar Birliği (UIAA)'nin kurulmasıyla mümkün olmuştur. İzleyen yıllarda, belirli teknik ve emniyet yöntemlerinin geliştirilmesine paralel olarak kendine özgü disiplini ve ilkeleri olan bir spor haline dönüşen dağcılık, birçok doğa sporunun da önünü açmıştır.Dağcılık, yaralanma ve ölüm tehlikesinin bulunduğu spor dalları arasında yer alır. Dağcılık, paraşütçülük, kaya tırmanışı, otomobil yarışçılığı, sürat kayağı gibi spor dalları, yoğun bir heyecan faktörü içerir. Bu sporları yapan sporcular genellikle patlayıcı bir kişiliğe sahiptirler. Güçlü, sert ve kişisel disiplini kuvvetli insanlardır; ani ve doğru kararlar vermek zorundadırlar.</p>",
            'slug'=>Str::slug('Dağcılık Nedir ?').uniqid()
        ]);
        DB::table('titles')->insert([
            'hood'=>'Dağcılık Çeşitleri',
            'title_article'=>"",
            'slug'=>Str::slug('Dağcılık Çeşitleri').uniqid()
        ]);
        DB::table('titles')->insert([
            'hood'=>'Deneme Makale Başlığı',
            'title_article'=>"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nesciunt at deserunt debitis omnis nam fugiat fugit excepturi quae dolorum modi sunt eius accusantium, error, molestias culpa? Provident at voluptate iure expedita sapiente sed earum nesciunt eos neque nemo officiis explicabo voluptatibus suscipit ducimus unde, debitis laboriosam qui minus harum odit blanditiis perferendis maiores consectetur reiciendis. Maiores atque consequatur ad suscipit laboriosam recusandae libero soluta, vel, neque sint veniam tempore repudiandae quae dolorum iste saepe illo. Ad illo, dolores, voluptas unde nesciunt at, aspernatur veritatis libero minus dolore delectus laudantium tempora distinctio exercitationem vel? Suscipit maiores qui tempora quisquam reiciendis sunt, praesentium nihil explicabo dolorum distinctio? Consectetur dignissimos nemo assumenda ipsa, nobis quam ullam doloribus corporis ratione tempore fugiat provident quisquam facere maxime aliquam! Est a maxime totam harum! </p><p>Necessitatibus quidem quibusdam repellat pariatur dolorem. Nesciunt quibusdam molestias aliquam aspernatur. Repellendus eos illum atque nihil dolorem corrupti perferendis! Quia consectetur impedit eos minima! Nemo asperiores eveniet et? Labore vero nesciunt dolore totam rem numquam ipsam ipsum accusantium vitae quia, enim quidem animi iusto magnam optio cum id illo, repellendus nisi perspiciatis adipisci libero laboriosam. Recusandae nemo quos laboriosam porro sint voluptates error debitis quidem atque repellendus. Sed facilis voluptatem voluptates!</p>",
            'slug'=>Str::slug('Deneme Makale Başlığı').uniqid()
        ]);    }
}
