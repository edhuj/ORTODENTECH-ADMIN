<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Question;
use App\TopicIcon;

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

      for ($i = 1; $i <= 43; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>1, 'file_route'=>'/uploads/arte_design'.$pr_id.'.png']);
      }
      for ($i = 0; $i <= 45; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>2, 'file_route'=>'/uploads/negocios'.$pr_id.'.png']);
      }
      for ($i = 0; $i <= 40; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>3, 'file_route'=>'/uploads/educacion'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 20; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>4, 'file_route'=>'/uploads/entretenimiento'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 47; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>5, 'file_route'=>'/uploads/comida'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 37; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>6, 'file_route'=>'/uploads/jogos'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 35; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>7, 'file_route'=>'/uploads/general'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 39; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>8, 'file_route'=>'/uploads/historia'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 36; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>9, 'file_route'=>'/uploads/literatura'.$pr_id.'.png']);
      }

      for ($i = 0; $i <= 30; $i++) {
        $pr_id = sprintf("%02d", $i);
        TopicIcon::create(['category_id'=>10, 'file_route'=>'/uploads/cinema'.$pr_id.'.png']);
      }
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
