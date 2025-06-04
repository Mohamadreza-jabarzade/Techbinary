<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = Category::withCount('posts')->addSelect('id', 'name', 'status')->get();
    }

    public function changeStatus($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        if ($category->status == 'active') {
            $category->status = 'inactive';
        }else{
            $category->status = 'active';
        }
        $category->save();
        $this->loadCategories();
    }
    public function delete($categoryId)
    {
        Category::findOrFail($categoryId)->delete();
        $this->loadCategories(); // رفرش لیست
    }

    public function render()
    {
        return view('livewire.admin.categories');
    }
}
