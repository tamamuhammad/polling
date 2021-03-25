<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Poll;
use App\Choice;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::where('user_id', auth()->user()->id)->get();
        $id = [];
        if($votes){
            foreach($votes as $vote){
                array_push($id, $vote->poll_id);
            }
            $polls = Poll::orderby('created_at', 'desc')->whereNotIn('id', $id)->where('deadline', '>', date('Y-m-d h:i'))->get();

        }
        
        return view('vote.index', compact('polls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $poll = Poll::where('id', $id)->get()->all()[0];
        $choices = Choice::where('poll_id', $id)->get();
        
        return view('vote.vote', compact('poll', 'choices'));
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
            'choice' => 'required'
        ]);

        Vote::insert([
            'choice_id' => $request->choice,
            'user_id' => auth()->user()->id,
            'poll_id' => $request->poll_id,
            'division_id' => auth()->user()->division_id
        ]);

        return redirect('/mypoll');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function show(Votes $votes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function edit(Votes $votes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votes $votes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votes $votes)
    {
        //
    }
}
