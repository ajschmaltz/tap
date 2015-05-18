<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\UploadHandler;

class UploadController extends Controller {

  protected $uploader;

  public function __construct()
  {
    $this->uploader = new UploadHandler();
    // Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
    $this->uploader->allowedExtensions = array(); // all files types allowed by default
    // Specify max file size in bytes.
    $this->uploader->sizeLimit = 1024 * 1024; // default is 10 MiB
    // Specify the input name set in the javascript.
    $this->uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default
    // If you want to use the chunking/resume feature, specify the folder to temporarily save parts.
    $this->uploader->chunksFolder = "chunks";
  }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function upload(Request $request)
	{
    // Assumes you have a chunking.success.endpoint set to point here with a query parameter of "done".
    // For example: /myserver/handlers/endpoint.php?done
    if ($request->has('done')) {
      $result = $this->uploader->combineChunks("files");
    }
    // Handles upload requests
    else {
      // Call handleUpload() with the name of the folder, relative to PHP's getcwd()
      $result = $this->uploader->handleUpload("files");
      // To return a name used for uploaded file you can use the following line.
      $result["uploadName"] = $this->uploader->getUploadName();
    }
    return Response::json($result);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete()
	{
    $result = $this->uploader->handleDelete("files");
    return Response::json($result);
	}

}
