<?php

use Illuminate\Database\Seeder;
use App\Vacancy;
use App\Category;
use App\Location;
use App\JobType;
class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacancy::create(['title' => 'Full Stack Developer',
            'date_posted'=>'2020-02-05',
            'expiry_date'=>'2020-04-06',
            'category_id' => Category::all()->random()->id,
            'job_type_id' => JobType::all()->random()->id,
            'location_id' => Location::all()->random()->id,
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nulla facilisi cras fermentum odio eu feugiat. Massa tincidunt dui ut ornare lectus sit. Varius vel pharetra vel turpis. Volutpat est velit egestas dui id ornare arcu odio ut. Sed adipiscing diam donec adipiscing tristique risus nec feugiat. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Lacinia quis vel eros donec ac odio. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Tellus mauris a diam maecenas sed enim ut sem.
             Nunc sed id semper risus in hendrerit gravida rutrum quisque. Euismod lacinia at quis risus sed. Enim diam vulputate ut pharetra sit amet aliquam id diam. Turpis massa sed elementum tempus egestas sed. Placerat in egestas erat imperdiet sed. Lacinia at quis risus sed vulputate. Et leo duis ut diam quam. Parturient montes nascetur ridiculus mus mauris vitae ultricies leo integer. Eget velit aliquet sagittis id consectetur purus. Id aliquet risus feugiat in ante. Id eu nisl nunc mi ipsum faucibus. Porttitor lacus luctus accumsan tortor posuere ac ut consequat. Consequat mauris nunc congue nisi vitae suscipit tellus mauris a.
             Tortor aliquam nulla facilisi cras fermentum odio eu feugiat pretium. Vel fringilla est ullamcorper eget. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Et pharetra pharetra massa massa ultricies mi. Ullamcorper malesuada proin libero nunc consequat interdum varius. Praesent elementum facilisis leo vel fringilla. Pellentesque elit eget gravida cum sociis natoque. Non odio euismod lacinia at quis risus. Tincidunt praesent semper feugiat nibh sed pulvinar. Semper eget duis at tellus at urna condimentum mattis pellentesque. Condimentum mattis pellentesque id nibh. Volutpat consequat mauris nunc congue nisi. Viverra adipiscing at in tellus integer feugiat scelerisque varius morbi. Phasellus vestibulum lorem sed risus. Sagittis purus sit amet volutpat consequat mauris nunc congue. Curabitur vitae nunc sed velit dignissim sodales.'
        ]);
        Vacancy::create(['title' => 'Software Engineer',
            'date_posted'=>'2020-04-05',
            'expiry_date'=>'2020-05-10',
            'category_id' => Category::all()->random()->id,
            'job_type_id' => JobType::all()->random()->id,
            'location_id' => Location::all()->random()->id,
            'description' =>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper. Scelerisque viverra mauris in aliquam sem fringilla. Eget gravida cum sociis natoque penatibus et magnis dis. Libero nunc consequat interdum varius sit. Nunc sed id semper risus in. Quis varius quam quisque id diam. Cursus sit amet dictum sit amet justo donec enim diam. Pharetra vel turpis nunc eget lorem dolor sed. Consequat semper viverra nam libero justo laoreet sit. Varius duis at consectetur lorem donec massa sapien faucibus et. Etiam tempor orci eu lobortis elementum nibh tellus. In hendrerit gravida rutrum quisque. Nunc non blandit massa enim nec dui nunc. At varius vel pharetra vel turpis. Tellus cras adipiscing enim eu turpis egestas pretium. Sed vulputate mi sit amet. Venenatis lectus magna fringilla urna.
                             Urna nunc id cursus metus. Eget mauris pharetra et ultrices neque ornare. Faucibus a pellentesque sit amet porttitor eget. Massa tempor nec feugiat nisl pretium fusce id velit ut. Amet aliquam id diam maecenas. Elementum pulvinar etiam non quam lacus. Senectus et netus et malesuada fames. Nisl rhoncus mattis rhoncus urna. Consectetur purus ut faucibus pulvinar elementum integer enim. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin. Aliquam sem fringilla ut morbi tincidunt augue interdum. Risus sed vulputate odio ut enim. Id donec ultrices tincidunt arcu. Est ultricies integer quis auctor. Sit amet justo donec enim diam. Neque sodales ut etiam sit.'
            ]);
    }
}
