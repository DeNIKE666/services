<?php

namespace App\Http\Requests;

use App\Criteria\SelfServiceCriteria;
use App\Repositories\Service\ServiceRepositoryEloquent;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Service\Service as Model;
use Intervention\Image\ImageManagerStatic as Image;

class Service extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $service;

    public function __construct(ServiceRepositoryEloquent $repositoryEloquent)
    {
        $this->service = $repositoryEloquent;
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required' , 'string'  , 'max:70'],
            'short' => ['required' , 'string' , 'max:100'],
            'category_id' => ['required'],
            'amount' => ['required' , 'string'],
            'body' => ['required' , 'string'  , 'max:2000'],
        ];
    }

    /**
     * @return false|string
     */

    public function imageUpdate($image = null)
    {
        if ($this->hasFile('image')) {

            if (\Storage::exists($image)) {
                \Storage::delete($image);
            }

            $imageFile = $this->file('image');
            $filename = time() . '.' . $imageFile->getClientOriginalExtension();

            $image_resize = Image::make($imageFile->getRealPath());
            $image_resize->resize(300, 240);

            if (\Storage::put('services/' . $this->user()->login . '/' . $filename, $image_resize->encode('jpg', 100))) {
                return 'services/' . $this->user()->login . '/' . $filename;
            }
        }
    }

    /**
     * @return false|string
     */

    public function fileUpdate($file = null)
    {
        if ($this->hasFile('file')) {

            $putDefaullt = 'files/' . $this->user()->login;
            $putFile = $file;

            if (\Storage::exists($putFile)) {
                \Storage::delete($putFile);
            }

            return $file = \Storage::putFile($putDefaullt, $this->file('file'));
        }
    }

    public function productFile($product = null)
    {
        if ($this->hasFile('product')) {

            if (\Storage::exists($product)) {
                \Storage::delete($product);
            }

            $putDefaullt = 'product/' . $this->user()->login;

            return $file = \Storage::putFile($putDefaullt, $this->file('product'));
        }
    }

    public function createService()
    {
        return Model::create([
            'title' => $this->input('title'),
            'short' => $this->input('short'),
            'body' => $this->input('body'),
            'image' => $this->imageUpdate() ?? null,
            'category_id' => $this->input('category_id'),
            'user_id' => auth()->user()->id,
            'amount' => (int)$this->input('amount'),
            'file' => $this->fileUpdate() ?? null,
            'product' => $this->productFile() ?? null,
        ]);
    }

    public function updateService($id) {

        $service = $this->service->pushCriteria(SelfServiceCriteria::class)->find($id);

        return  $service->update([
            'title' => $this->input('title'),
            'short' => $this->input('short'),
            'body' => $this->input('body'),
            'image' => $this->imageUpdate($service->image) ?? $service->image,
            'category_id' => $this->input('category_id'),
            'user_id' => auth()->user()->id,
            'amount' => (int)$this->input('amount'),
            'file' => $this->fileUpdate($service->file) ?? $service->file,
            'product' => $this->productFile($service->product) ?? $service->product,
        ]);
    }
}
