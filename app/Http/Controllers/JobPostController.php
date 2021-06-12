<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Support\Str;
use App\Http\Requests\PostJobRequest;
use App\Models\JobType;
use App\Models\JobSkill;
use App\Models\JobShift;
use App\Models\DegreeLevel;


class JobPostController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
        $this->middleware(['auth', 'verified', 'verifiedphone'])->except('logout');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            $posts = JobPost::get();
        } else {
            $posts = JobPost::where('user_id', auth()->user()->id)->get();
        }

        return view('admin.job_post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobTypes = JobType::pluck('name','id')->toArray();
        $jobSkills = JobSkill::pluck('name','id')->toArray();
        $jobShifts = JobShift::pluck('name','id')->toArray();
        $degreeLevels = DegreeLevel::pluck('name','id')->toArray();

        return view('admin.job_post.create',compact( 'jobTypes', 'jobSkills', 'jobShifts', 'degreeLevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( PostJobRequest $request)
    {
        $payload = $request->post();
        $payload[ 'job_skills'] = json_encode( request('job_skills'));
        $payload['slug'] = Str::slug( request('title'), '-');
        $payload['user_id'] = auth()->user()->id;
        $payload['created_by'] = auth()->user()->id;
        $post = JobPost::create($payload);
        flash('Job created successfully')->success();
        return redirect()->route('jobs.edit',['job'=> $post->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = JobPost::find($id);
        $jobTypes = JobType::pluck('name','id')->toArray();
        $jobSkills = JobSkill::pluck('name','id')->toArray();
        $jobShifts = JobShift::pluck('name','id')->toArray();
        $degreeLevels = DegreeLevel::pluck('name','id')->toArray();

        return view('admin.job_post.edit',compact( 'jobTypes', 'jobSkills', 'jobShifts', 'degreeLevels', 'post'));
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
        $payload = $request->post();
        $payload['job_skills'] = json_encode( request('job_skills'));
        $payload['slug'] = Str::slug( request('title'), '-');
        $payload['user_id'] = auth()->user()->id;
        $payload['created_by'] = auth()->user()->id;
        $post = JobPost::findOrFail($id);

        if (!empty($post)) {
            $post->update($payload);
            flash('Job updated successfully')->success();
        } else {
           abort(500, 'Something went wrong');
        }
        return redirect()->route('jobs.edit',['job'=> $post->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = JobPost::findOrFail($id);

        if (!empty($post)) {
            $post->update(['deleted_by' => auth()->user()->id]);
            $post->delete();
            flash('Job deleted successfully')->success();
            return redirect()->route('jobs.index');
        } else {
            abort(400, 'Something went wrong');
        }
    }
}
