<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Support\Str;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([

            'book_title' => 'required|max:100',
            'book_desc' => 'required|max:500',
            'book_author' => 'required|max:50',
            'book_category' => 'required|max:50',
            'book_price'  =>'required','regex:/[0-9]([0-9]|-(?!-))+/',
            'book_file'  =>'required',
            'book_thumbnail'  =>'required',
        ]);

        $request->request->set('user_id', auth()->user()->user_id);
        // ensure the request has a file before we attempt anything else.
        /*if ($request->hasFile('book_thumbnail')) {
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
               try {
                   //for book thumbnail
                $path = Storage::disk('s3')->put('books/thumbnails', $request->book_thumbnail);
                $path = Storage::disk('s3')->url($path);
                //for book
                $books = Storage::disk('s3')->put('books', $request->book_file);
                $books = Storage::disk('s3')->url($books);
                } catch (\Throwable $th) {
                throw $th;
                }

                if ($request->hasFile('audio_thumbnail')) {

                    $request->validate([
                        'image' => 'mimes:jpeg,bmp,png,jpg'
                    ]);}

             $book = new Book([
                "title" => $request->get('book_title'),
                "author" => $request->get('book_author'),
                "description" => $request->get('book_desc'),
                "category" => $request->get('book_category'),
               // "location" => str_replace("https://hikel-files.s3.amazonaws.com/books/","", $books),
                //"thumbnail" =>str_replace("https://hikel-files.s3.amazonaws.com/books/thumbnail/","", $path),
                "price" => $request->get('book_price'),
                "user_id"=>$request->user_id,
                "tags"=>$request->get('tags'),
                "book_id"=>FunctionsController::generateID(15),
                'size'=> $request->book_file->getSize()+$request->book_thumbnail->getsize(),
            ]);

            $book->save();*/
            if ($request->hasFile('book_thumbnail')) {
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
                ]);

                // Store the record, using the new file hashname which will be it's new filename identity.
                $book = new Book([
                    "title" => $request->get('book_title'),
                    "author" => $request->get('book_author'),
                    "description" => $request->get('book_desc'),
                    "category" => $request->get('book_category'),
                    "location" => $request->book_file->hashName(),
                    "thumbnail" => $request->book_thumbnail->hashName(),
                    "price" => $request->get('book_price'),
                    "user_id"=>$request->user_id,
                    "tags"=>$request->get('tags'),
                    "book_id"=>FunctionsController::generateID(15),
                    "size"=> $request->book_file->getSize()+$request->book_thumbnail->getSize(),

                ]);

                $book->save(); // Finally, save the record.
            // Save the file locally in the storage/public/ folder under a new folder named /images
                $request->book_thumbnail->store('thumbnails', 'public');
                $request->book_file->store('books', 'public');


        } return redirect('/site/')->with('success','Book has uploaded successfully');;

    }

    public function bookview($id)
    {
        $temp=Book::where('book_id',$id)->get();
        $books=$temp[0];
        return view('book.read', compact('books'));
    }
    public function edit($site_name,$id)
    {
        $temp=Book::where('book_id',$id)->get();
        $book=$temp[0];
        return view('book.edit',compact('book','site_name'));
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
        $request->validate([
            'book_title' => 'required|max:35',
            'book_author' => 'required|max:50',
            'book_descr' => 'required|max:500',
            'book_category' => 'required',
            'book_price' => 'required','regex:/[0-9]([0-9]|-(?!-))+/',

            ]);
/*
            $book = Book::find($id);
            $filename= $book->thumbnail;
            $file_path = $book->location;
            if ($request->hasfile('book_thumbnail')) {
                Storage::disk('s3')->delete($filename);
                $path = Storage::disk('s3')->put('books/thumbnail', $request->book_thumbnail);
                $path = Storage::disk('s3')->url($path);
                $book->thumbnail=str_replace("https://hikel-files.s3.amazonaws.com/books/thumbnail/","", $path);
               }
            $book_name = $book->location;
            $book_path = public_path($book_name);
            if ($request->hasfile('book_file')) {
                Storage::disk('s3')->delete($book_name);
                $books = Storage::disk('s3')->put('books', $request->book_file);
                $books = Storage::disk('s3')->url($books);
                $book->location=str_replace("https://hikel-files.s3.amazonaws.com/books/","", $books);
                }
            $book->title = $request->book_title;
            $book->author = $request->book_author;
            $book->description = $request->book_descr;
            $book->category = $request->book_category;
            $book->tags= $request->tags;
            $book->price = $request->book_price;

            $book->update();

            return redirect('/site/'.$request->site_name)
            ->with('success','Book has updated successfully');
            */
            $book = Book::find($id);
            $filename= $book->thumbnail;
            $book_name = $book->location;
            $file_path = public_path('storage/thumbnails/'.$filename);
            if ($request->hasfile('book_thumbnail')) {
                File::delete($file_path);
                $book->thumbnail= $request->book_thumbnail->hashName();
                $request->book_thumbnail->store('thumbnails', 'public');
            }
            $book_path = public_path('storage/books/'.$book_name);
            if ($request->hasfile('book_file')) {
                File::delete($book_path);
                $book->location= $request->book_file->hashName();
                $request->book_file->store('books', 'public');
            }
            $book->title = $request->book_title;
            $book->author = $request->book_author;
            $book->description = $request->book_descr;
            $book->category = $request->book_category;
            $book->tags= $request->tags;
            $book->price = $request->book_price;
            $book->update();

            return redirect('/site/')
            ->with('success','Book has updated successfully');

    }

}

