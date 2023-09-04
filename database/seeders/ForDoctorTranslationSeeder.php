<?php

namespace Database\Seeders;

use App\Models\Front\ForDoctorTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForDoctorTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'for_doctor_id' => 1,
                'localization_id' => 1,
                'title' => 'Для врача',
                'description' => 'Экономьте время на рутинных задачах и сосредоточьтесьна самом главном - заботе о здоровье ваших пациентов',
                'body' => '<p><strong>Удобство и доступность</strong></p>\r\n\r\n<p>удобный интерфейс и доступ к информации для врачей в любое время и место</p>\r\n\r\n<p><strong>Эффективное управление пациентами</strong></p>\r\n\r\n<p>удобная система управления пациентами и просмотра медицинских данных для врачей</p>\r\n\r\n<p><strong>Автоматизация и оптимизация процессов</strong></p>\r\n\r\n<p>автоматизация документации, освобождающая время для качественной медицинской помощи</p>\r\n\r\n<p><strong>Обеспечение конфиденциальности</strong></p>\r\n\r\n<p>система обеспечивает защиту персональных данных пациентов</p>',
                'link_title' => 'Подробнее'
            ],
            [
                'for_doctor_id' => 1,
                'localization_id' => 2,
                'title' => 'Максимизируйте эффективность вашего медицинского бизнесас нашей операционной системой ir',
                'description' => 'Экономьте время на рутинных задачах и сосредоточьтесьна самом главном - заботе о здоровье ваших пациентов',
                'body' => '<p><strong>Удобство и доступность</strong></p>\r\n\r\n<p>удобный интерфейс и доступ к информации для врачей в любое время и место</p>\r\n\r\n<p><strong>Эффективное управление пациентами</strong></p>\r\n\r\n<p>удобная система управления пациентами и просмотра медицинских данных для врачей</p>\r\n\r\n<p><strong>Автоматизация и оптимизация процессов</strong></p>\r\n\r\n<p>автоматизация документации, освобождающая время для качественной медицинской помощи</p>\r\n\r\n<p><strong>Обеспечение конфиденциальности</strong></p>\r\n\r\n<p>система обеспечивает защиту персональных данных пациентов</p>',
                'link_title' => 'Подробнее ir'
            ],
        ];

        foreach ($items as $item) {
            ForDoctorTranslation::create($item);
        }
    }
}
