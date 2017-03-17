<?php

namespace App\Http\Controllers;

use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class QuestionsOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions_options = QuestionsOption::all();

        return view('questions_options.index', compact('questions_options'));
    }

    /**
     * Show the form for creating new QuestionsOption.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('questions_options.create', $relations);
    }

    /**
     * Store a newly created QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsOptionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsOptionsRequest $request)
    {
        QuestionsOption::create($request->all());

        return redirect()->route('questions_options.index');
    }


    /**
     * Show the form for editing QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuestionsOption::findOrFail($id);

        return view('questions_options.edit', compact('questions_option') + $relations);
    }

    /**
     * Update QuestionsOption in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsOptionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('questions_options.index');
    }


    /**
     * Display QuestionsOption.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuestionsOption::findOrFail($id);

        return view('questions_options.show', compact('questions_option') + $relations);
    }


    /**
     * Remove QuestionsOption from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('questions_options.index');
    }

    /**
     * Delete all selected QuestionsOption at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = QuestionsOption::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
