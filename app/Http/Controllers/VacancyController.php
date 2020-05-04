<?php

namespace App\Http\Controllers;

use App\Http\Resources\VacancyResource;
use App\Mail\WelcomeEmail;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response()->json(VacancyResource::collection(Vacancy::all()));
    }

    //render feeds
    public function feed()
    {
        /* create new feed */
        $feed = App::make("feed");
        /* cache the feed for 60 minutes */
        $feed->setCache(10);
        if (!$feed->isCached())
        {
            /* creating rss feed with our most recent 10 vacancies */
            $vacancies = VacancyResource::collection(Vacancy::take(10)->get());

            $feed->title = 'Hello';
            $feed->description = 'JOB VACANCY!';
            $feed->logo = env('APP_URL').'/images/front/logo.png';
            $feed->link = url('feed');
            $feed->setDateFormat('datetime');
            $feed->pubdate = $vacancies[0]->posted;
            $feed->lang = 'en';
            $feed->setShortening(true);
            $feed->setTextLimit(100);
            foreach ($vacancies as $vacancy)
            {
             $feed->add($vacancy->title, $vacancy->posted,$vacancy->due_date,$vacancy->category,$vacancy->job_nature,$vacancy->location,\URL::to('vacancies'),$vacancy->description);
            }

        }
        return $feed->render('atom');
    }
    //subscribe to feeds
    public function subscribe(Request $request){
        Mail::to($request->email)->send(new WelcomeEmail($request->email));
        if (Mail::failures()){
            return response('error');
        }
        return response($request->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(new VacancyResource(Vacancy::create($request->all())));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Vacancy::find($id)->update($request->except(['category','location','job_nature','due_date','posted']));
        return response()->json(new VacancyResource(Vacancy::find($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vacancy::destroy($id);
        return response()->json($id);
    }
}
