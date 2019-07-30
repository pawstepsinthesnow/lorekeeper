<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;

use DB;
use Auth;
use App\Models\User\User;
use App\Models\Character\Character;
use App\Models\Currency\Currency;
use App\Models\Submission\Submission;
use App\Models\Submission\SubmissionCharacter;
use App\Models\Prompt\Prompt;

use App\Services\SubmissionManager;

use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the user's submission log.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex(Request $request)
    {
        $submissions = Submission::where('user_id', Auth::user()->id);
        $type = $request->get('type');
        if(!$type) $type = 'Pending';
        
        $submissions = $submissions->where('status', ucfirst($type));

        return view('home.submissions', [
            'submissions' => $submissions->orderBy('id', 'DESC')->paginate(20),
        ]);
    }
    
    /**
     * Show the submission page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getSubmission($id)
    {
        return view('home.submission', [
            'submission' => Submission::viewable(Auth::user())->where('id', $id)->first()
        ]);
    }

    /**
     * Show the submit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getNewSubmission(Request $request)
    {
        return view('home.create_submission', [
            'submission' => new Submission,
            'prompts' => Prompt::active()->sortAlphabetical()->pluck('name', 'id')->toArray(),
            'characterCurrencies' => Currency::where('is_character_owned', 1)->orderBy('sort_character', 'DESC')->pluck('name', 'id')
        ]);
    }

    /**
     * Show character information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getCharacterInfo($slug)
    {
        $character = Character::visible()->where('slug', $slug)->first();

        return view('home._character', [
            'character' => $character,
        ]);
    }

    /**
     * Show prompt information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getPromptInfo($id)
    {
        $prompt = Prompt::active()->where('id', $id)->first();
        if(!$prompt) return response(404);

        return view('home._prompt', [
            'prompt' => $prompt,
            'count' => Submission::where('prompt_id', $id)->where('status', 'Approved')->where('user_id', Auth::user()->id)->count()
        ]);
    }
    
    public function postNewSubmission(Request $request, SubmissionManager $service)
    {
        $request->validate(Submission::$createRules);
        if($service->createSubmission($request->only(['url', 'prompt_id', 'comments', 'slug', 'quantity', 'currency_id']), Auth::user())) {
            flash('Prompt submitted successfully.')->success();
        }
        else {
            foreach($service->errors()->getMessages()['error'] as $error) flash($error)->error();
        }
        return redirect()->to('submissions');
    }

}