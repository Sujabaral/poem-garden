<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => trim($this->title),
            'author' => trim($this->author),
            'genre' => trim($this->genre),
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],

            'author' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[A-Za-z\s]+$/',
            ],

            'body' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],

            'genre' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Poem title is required.',
            'title.min' => 'Poem title must be at least 2 characters.',

            'author.required' => 'Author name is required.',
            'author.min' => 'Author name must be at least 2 characters.',
            'author.regex' => 'Author name must contain only letters and spaces.',

            'body.required' => 'Poem body is required.',
            'body.min' => 'Poem body must be at least 10 characters.',
            'body.max' => 'Poem body cannot be more than 5000 characters.',

            'genre.required' => 'Genre is required.',
            'genre.regex' => 'Genre must contain only letters and spaces.',

            'image.required' => 'the image is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Allowed image formats are jpeg, png, jpg, and gif.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'poem title',
            'author' => 'author name',
            'body' => 'poem body',
            'genre' => 'poem genre',
            'image' => 'poem image',
        ];
    }
}