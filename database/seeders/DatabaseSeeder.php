<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
     \App\Models\User::factory(10)->create();
    $this->call([
      UserSeeder::class,
      LocalizationSeeder::class,
      PageSeeder::class,
      PageTranslationSeeder::class,
      MenuSeeder::class,
      MenuTranslationSeeder::class,
      OurPhilosophy::class,
      OurPhilosophyTranslation::class,
        AppealSeeder::class,
        AppealTranslationSeeder::class,
        BannerSeeder::class,
        BannerTranslationSeeder::class,
        CheckboxSeeder::class,
        CheckboxTranslationSeeder::class,
        DirectSpeechSeeder::class,
        DirectSpeechTranslationSeeder::class,
//        FeedbackSeeder::class,
//        FeedbackTranslationSeeder::class,
        ForDoctorSeeder::class,
        ForDoctorTranslationSeeder::class,
        ForItSeeder::class,
        ForItTranslationSeeder::class,
        ForLeaderSeeder::class,
        ForLeaderTranslationSeeder::class,
        ForMarketologySeeder::class,
        ForMarketologyTranslationSeeder::class,
        GallerySeeder::class,
        InfoBlockSeeder::class,
        InfoBlockTranslationSeeder::class,
        OurClientSeeder::class,
        OurClientTranslationSeeder::class,
        OurClientLogoSeeder::class,
        OurPartnerLogoSeeder::class,
        RecommendationSeeder::class,
        RecommendationTranslationSeeder::class,
        RecommendationBlockSeeder::class,
        RecommendationBlockTranslationSeeder::class,
        TextBlockSeeder::class,
        TextBlockTranslationSeeder::class,
        VideoPlayerSeeder::class,
    ]);
  }
}
