<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Vote;
use App\Choice;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poll.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'deadline' => 'required',
            'choice' => 'required',
            'choice2' => 'required'
        ]);

        if($request->description == null){
            $request->description = 'No Description already set.';
        }

        Poll::insert([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => substr($request->deadline, 19, 35),
            'created_by' => auth()->user()->id
        ]);

        $pollid = Poll::latest()->get()->all()[0]->id;
        $choices = [$request->choice, $request->choice2];

        for( $i = 0; $i < 2; $i++){
            Choice::insert([
                'choice' => $choices[$i],
                'poll_id' => $pollid
            ]);
        }

        if ($request->choice3){
            Choice::insert([
                'choice' => $request->choice3,
                'poll_id' => $pollid
            ]);
            if ($request->choice4){
                Choice::insert([
                    'choice' => $request->choice4,
                    'poll_id' => $pollid
                ]);
                if ($request->choice5){
                    Choice::insert([
                        'choice' => $request->choice5,
                        'poll_id' => $pollid
                    ]);
                }
            }
        }

        return redirect('polls');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $votes = Vote::where('user_id', auth()->user()->id)->get();
        if (auth()->user()->role == 'admin'){
            $polls = Poll::orderby('created_at', 'desc')->get();
        } else {
            $id = [];
            if($votes){
                foreach($votes as $vote){
                    array_push($id, $vote->poll_id);
                }
                $polls = Poll::orderby('created_at', 'desc')->whereIn('id', $id)->orWhere('deadline', '<', date('Y-m-d h:i'))->get();

            }
        }
        
        return view('poll.index', compact('polls'));
    }

    public function result($id){
        $poll = Poll::where('id', $id)->get()->all()[0];
        $choices = Choice::where('poll_id', $id)->get();
        $counts = Vote::where('poll_id', $id)->count();
        $finals = [];
        
        if ($counts){
            foreach($choices as $choice){
                $count = Vote::where('choice_id', $choice->id)->count();
                $results = [
                    'choice_id' => $choice->id,
                    'choice' => $choice->choice,
                    'result' => $count / $counts * 100
                ];
                array_push($finals, $results);
            }
        } else {
            $finals = [0];
        }

        $finals = collect($finals);
        
        return view('poll.result', compact('poll', 'finals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function edit(Polls $polls)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Polls $polls)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Polls  $polls
     * @return \Illuminate\Http\Response
     */
    public function destroy(Polls $polls)
    {
        Poll::destroy($polls);

        return redirect('/polls');
    }
}
