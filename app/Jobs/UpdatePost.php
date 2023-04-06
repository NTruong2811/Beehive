<?php

namespace App\Jobs;

use App\Models\musics;
use App\Models\posts;
use App\Models\profiles;
use App\Models\videos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Cloudinary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;

class UpdatePost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $request;
    public function __construct($request)
    {    
        
        $this->request =  $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {       


    //    $file = new SplFileInfo(realpath($this->request->files));
        // Log::info('Showing user profile for user: '. var_dump($this->request->path_files));
         
        $post = new posts();

        if ($this->request->type_postId == 3) {
            
            $image_file = Cloudinary::uploadFile( Storage::path($this->request->path_image_file), [
                'folder' => 'images'
            ])->GetSecurePath();
            $song_file = Cloudinary::uploadFile( Storage::path( $this->request->path_song_file), [
                'folder' => 'sounds'
            ])->GetSecurePath();
            

            $post = $post->Add($this->request);
            
    
            $music = musics::create([
                'post_id' => $post->id,
                'image_file' => $image_file,
                'song_file' => $song_file,
                'song_name' => $this->request->song_name,
                'song_artist' => $this->request->song_artist,
            ]);
            Storage::delete($this->request->path_image_file,$this->request->path_song_file);
            
        } elseif ($this->request->type_postId == 2) {
            $file = Cloudinary::uploadFile(Storage::path($this->request->path_video_file), [
                'folder' => 'videos'
            ])->GetSecurePath();

            $post = $post->Add($this->request);

            $video = videos::create([
                'post_id' => $post->id,
                'file' => $file
            ]);
            Storage::delete($this->request->path_video_file);
            
        } elseif ($this->request->type_postId == 1) {
            $files = Cloudinary::uploadFile(Storage::path($this->request->path_files), [
                'folder' => 'files'
            ])->GetSecurePath();

            $post = $post->Add($this->request);

            $profile = profiles::create([
                'post_id' => $post->id,
                'files' => $files
            ]);
            Storage::delete($this->request->path_files);
        }
        // $NewPost = posts::with('type_post', 'music', 'user', 'video', 'profile')->find($post->id);
        // return $NewPost;
    }
}
