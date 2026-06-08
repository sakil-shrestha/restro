<?php

namespace App\Services;

use App\Models\MenuItem;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    public function create(array $data, $image = null)
    {
        $path = null;
        DB::beginTransaction();
        try {

            $menu = new MenuItem();
            // $menu->name = $data['name'];
            // $menu->price = $data['price'];
            // $menu->description = $data['description'];
            // $menu->category_id = $data['category_id'];
            // $menu->is_available = $data['is_available'];
            $menu->fill($data);


            if ($image) {
                // old way
                // $imageName = time() . '.' . $image . '.' . $image->getClientOriginalExtension(); //123burger.jpg
                // $image->move('images', $imageName);
                // $menu->image = 'images/' . $imageName; //saving in database as images/123burger.jpg

                // modern way
                // this will create the unique image name and create the images folder in public disk
                $path = $image->store('images', 'public');
                $menu->image = 'storage/' . $path;
            }
            $menu->save();
            DB::commit();
            return $menu;
        } catch (Exception $e) {
            DB::rollBack();
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            Log::error('Menu Service Created failed' . $e->getMessage());
            throw $e; //sending exception to controller
        }
    }


    public function update(MenuItem $menu, array $data, $image = null)
    {

        // $validation = $request->validated();
        $oldImagePath = $menu->image;
        $fileToDelete = null;
        DB::beginTransaction();
        // $menu->name= $validation['name'];
        // $menu->price= $validation['price'];
        // $menu->description= $validation['description'];
        // $menu->category_id= $validation['category_id'];
        // $menu->is_available= $validation['is_available'];
        // $image=$request->file('image');
        try {
            $menu->fill($data);
            // $image = $request->file('image');
            if ($image) {
                if (!empty($oldImagePath)) {
                    // removing old images if exist
                    $fileToDelete = str_replace('storage/', '', $oldImagePath);
                }

                $path = $image->store('images', 'public');
                $menu->image = 'storage/' . $path;
            } else {
                $menu->image = $oldImagePath;
            }
            $menu->save();
            DB::commit();

            if ($fileToDelete) {
                Storage::disk('public')->delete($fileToDelete);
            }
            return $menu;
        } catch (Exception $e) {
            DB::rollBack();
            if (isset($path)) {
                Storage::disk('public')->delete($path);
            }
            Log::error('Menu Update failed' . $e->getMessage());
            throw $e;
        }
    }
}
