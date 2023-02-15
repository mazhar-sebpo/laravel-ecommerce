<?php

namespace App\Http\Livewire\Admin\Brand;

use Session;
use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $image, $status, $brand_id, $old_image,$new_image;
    use WithFileUploads;
    public function rules(){
        return [
            'name' =>'required|string',
            'slug' =>'required|string',
            'image' =>'image|mimes:jpg,jpeg,png',
            'status' =>'nullable',
        ];
    }
    public function showBrand(int $brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $this->name  = $brand->name;
        $this->slug  = $brand->slug;
        $this->image  = $brand->image;
        $this->status  = $brand->status;
    }

    public function resetInput(){
        $this->name = NULL;
        $this->slug = NULL;
        $this->image = NULL;
        $this->status = NULL;
    }
    public function storeBrand(){
        $validateData = $this->validate();
        if($this->image){
            $filename = $this->image->store('brand', 'public');
        }
        Brand::create([
            'name' =>$this->name,
            'slug' =>Str::slug($this->slug) ,
            'image' => $filename??'',
            'status' =>$this->status,
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function closeModal(){
$this->resetInput();
    }
    public function openModal(){
        $this->resetInput();
            }
    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $this->brand = Brand::findOrFail($brand_id);
        $this->name  = $this->brand->name;
        $this->slug  = $this->brand->slug;
        $this->old_image  = $this->brand->image;
        $this->status  = $this->brand->status;
    }
    public function updateBrand(){
        $this->validate([
            'name' => 'nullable|string',
            'slug' => 'nullable|string',
            'status' => 'nullable',
        ]);
        $filename='';
        // $destination = public_path('storage/'.$this->brand->image);

        if ($this->new_image){
            // if(File::exists($destination)){
            //     File::delete($destination);
            // }
            $filename = $this->new_image->store('brand', 'public');
        }else {
            $filename =$this->old_image;
        }
        Brand::findOrFail($this->brand_id)->update([
            'name' =>$this->name,
            'slug' =>Str::slug($this->slug),
            'image' => $filename,
            'status' =>$this->status,
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function destroyBrand()
    {
        $brand = Brand::find($this->brand_id);
        $path = 'storage/' . $brand->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $brand->delete();
        session()->flash('message','Brand Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.brand.index',['brands'=>$brands])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}
