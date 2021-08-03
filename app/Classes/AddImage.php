<?php

namespace App\Classes;

class AddImage
{

	public function AddImage($request, $image)
	{

		if ($request->hasFile($image)) {

			//Validate the uploaded file
			$Validation = $request->validate([

				$image => 'file|mimes:jpeg,jpg,png,gif|max:30000'
			]);

			// cache the file
			$file = $Validation[$image];

			// generate a new filename. getClientOriginalExtension() for the file extension
			$filename = 'sponsor-' . time() . '.' . $file->getClientOriginalExtension();

			// save to storage/app/infrastructure as the new $filename
			$imageFileName = $file->storeAs('sponsors', $filename, 'public');

			return $imageFileName;
		} else {
			return 'N/A';
		}
	}
}
