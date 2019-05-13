<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $topics = array("Arte & design", "Negócios", "Educação", "Entretenimento", "Comida e bebida", "Jogos", "Geral", "História", "Literatura", "Cinema", "Música", "Natureza", "Ciência", "Esportes", "TV", "Tecnologia", "Mundo");
      $faker = Factory::create();

      foreach($topics as $topic) {
        App\Category::create([
          'name'=>$topic
        ]);
      }

      App\Quiz::create(['category_id'=>"1",
                        'topic'=>"",
                        'image_url'=>"",
                        'hex_color'=>""] );



    }
}


/*Question::create([
  'statement'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
  'option1'=>$faker->word,
  'option2'=>$faker->word,
  'option3'=>$faker->word,
  'option4'=>$faker->word,
  'category'=>$topics[$faker->numberBetween($min = 0, $max = count($topics)-1)],
  'answer'=>$faker->numberBetween($min = 1, $max = 4),
  'topic'=>$faker->word
]);*/
