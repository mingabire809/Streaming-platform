<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;



use App\Models\Video;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\Format\Video\X264;
use App\Models\LikedVideos;


use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generateThumbnail($videoPath, $thumbnailPath)
{
    $ffmpeg = FFMpeg::create();
    $video = $ffmpeg->open($videoPath);

    // Extract a thumbnail from the video at 5 seconds
    $frame = $video->frame(TimeCode::fromSeconds(5));
    $frame->save($thumbnailPath);
    
   // dd($thumbnailPath);
    return $frame;
}


    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4,mpeg,quicktime|max:50000',

        ]);

        if (request()->hasFile('video')){
            $file = request()->file('video');

            $videoPath = $file->store('video');
    
            // Perform video processing
            //$ffmpeg = FFMpeg::create();
            //$video = $ffmpeg->open(storage_path('app/public/'.$videoPath));
    
            // Extract a thumbnail from the video
            //$thumbnailPath = 'thumbnails/'.$file->hashName().'.jpg';
            //$video->frame(TimeCode::fromSeconds(2))->save(storage_path('app/public/'.$thumbnailPath));
    
            // Generate a preview image by converting the video to a specific format
            //$previewImagePath = 'previews/'.$file->hashName().'.jpg';
            //$format = new X264();
            //$format->setKiloBitrate(500); // Set the desired bitrate
            //$video->save($format, storage_path('app/public/'.$previewImagePath));
            
            /*$ffmpeg_movie = FFMpeg::create();
            $frame = 10;
            // choose file name 
            $movie = $file;
            // choose thumbnail name 
            $thumbnail = Str::random(10) . '.png';

            // make an instance of the class 
            $mov = $ffmpeg_movie->open($movie);

            // get the frame defined above 
            $frame = $mov->getFrameFromSeconds($frame);

           
            $gd_image = $frame->toGDImage();
            
               
            imagepng($gd_image, $thumbnail);
            imagedestroy($gd_image);
                    //echo '<img src="'.$thumbnail.'">';*/

            $thumbnail = Str::random(10) . '.jpg';
            
    
            //$imagePath = request($thumb)->store('uploads', 'public');

           // $image = Image::make(public_path("storage/{$thumb}"))->fit(1200, 1200);
            //$image->save();
    
            //auth()->user()->posts()->create($data);

            $path = request('video')->store('uploads', 'public');

                
            $thumbnailPath = $thumbnail;

            // Generate the thumbnail
            $thumbPath = $this->generateThumbnail( "storage/{$path}", public_path($thumbnailPath));
            //dd($path);

            $videourl = Storage::url($path);
            $thumburl = $thumbPath->getPathfile();
            //dd($thumbPath);
            auth()->user()->video()->create([
                'title' => $data['title'],
                'video' => $path,
                'thumb' => $thumbnailPath,
            ]);
            //  for video is /upload/video
            //for thumb is / storage/app/
            return redirect('/');
        }else{
            dd($data);
        }

       
    }

    public function create(){
        return view('video.create');
    }

    public function like(Request $request, Video $video)
    {
        $user = auth()->user();

        $existingDisLike = $video->likes()
        ->where('user_id', $user->id)
        ->where('type', 'dislike')
        ->first();

        if ($existingDisLike) {
        // Remove the existing like
        $existingDisLike->delete();
        
        // Create a new like
        $like = new LikedVideos();
        $like->user_id = $user->id;
        $like->video_id = $video->id;
        $like->type = 'like';
        $like->save();
        
        return redirect('/video/' . $video->id);
    } else {
        if (!$video->likes()->where('user_id', $user->id)->exists()) {
            $like = new LikedVideos();
            $like->user_id = $user->id;
            $like->video_id = $video->id;
            $like->type = 'like';
            $like->save();

            // You can return a success message or redirect the user as needed
            return redirect('/video/' . $video->id);
        }else{
            // Handle the case where the user has already liked the video
            return redirect('/video/' . $video->id);
        }
    }
        
        
        

        
    }

    public function dislike(Request $request, Video $video)
    {
        $user = auth()->user();

        $existingLike = $video->likes()
        ->where('user_id', $user->id)
        ->where('type', 'like')
        ->first();

         if ($existingLike) {
        // Remove the existing like
        $existingLike->delete();
        
        // Create a new dislike
        $dislike = new LikedVideos();
        $dislike->user_id = $user->id;
        $dislike->video_id = $video->id;
        $dislike->type = 'dislike';
        $dislike->save();
        
        return redirect('/video/' . $video->id);
    } else {
        if (!$video->likes()->where('user_id', $user->id)->exists()) {
            $like = new LikedVideos();
            $like->user_id = $user->id;
            $like->video_id = $video->id;
            $like->type = 'dislike';
            $like->save();

            return redirect('/video/' . $video->id);
            // You can return a success message or redirect the user as needed
        }else{

        // Handle the case where the user has already disliked the video
        return redirect('/video/' . $video->id);
        }
    }
        
        
    }

}
