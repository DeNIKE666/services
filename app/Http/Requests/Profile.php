<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\ImageManagerStatic as Image;

class Profile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'email' => 'unique:users,email,'.$this->user()->id,
            'name' => 'required|min:5|max:50',
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:1024',
            'about' => 'required|max:1500',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email занят другим пользователем',
            'avatar.mimes' => 'Аватар должен быть следующих типов (JPEG, JPG, PNG, GIF) и не более 1 мб',
        ];
    }

    public function attributes()
    {
        return [
            'avatar' => 'аватар',
            'name' => 'имени'
        ];
    }

    /**
     * @return mixed
     */

    public function updateUser()
    {
        return $this->user()->update([
            'name' => $this->input('name'),
            'email' => $this->input('email'),
            'profile_type' => $this->input('profile_type'),
            'password' => $this->input('password') ? bcrypt($this->input('password')) : $this->user()->password,
            'avatar' => $this->user()->avatar,
            'about' => $this->input('about'),
        ]);
    }

    /**
     * @return mixed
     */

    public function updateAvatar()
    {
        if (\Storage::exists($this->user()->avatar)) {
            \Storage::delete($this->user()->avatar);
        }

        $image = $this->file('avatar');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(290, 235);

        if ($avatar = \Storage::put('avatars/' . $this->user()->login . '/' . $filename, $image_resize->encode('jpg', 100)))
        {
            return $this->user()->update([
                'avatar' => 'avatars/' . $this->user()->login . '/' . $filename,
            ]);

        }
    }
}
